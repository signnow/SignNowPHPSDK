# SignNow API PHP Client

Simple API Client to integrate SignNow with your application or website. Sign documents, request e-signatures, and build role-based workflows with multiple signers: https://www.signnow.com/developers
### <a name="table-of-contents"></a>Table of Contents

1. [Requirements](#requirements)
2. [Install](#install)
3. [Setting up](#setting-up)
4. [Entity manager](#entity-manager)
5. [Examples & use cases](#examples)
    * [OAuth 2.0](#oauth2)
      * [Request Access Token](#get-token)
      * [Verify Access Token](#verify-token)
      * [Refresh Access Token](#refresh-token)
    * [Document](#document)
      * [Upload document](#upload-document)
      * [Upload document with text tags and convert them to fillable fields](#fieldextract-document)
      * [Retrieve document](#retrieve-document)
      * [Delete document](#delete-document)
      * [Download document](#download-document)
      * [Create a single-use link for document downloading](#document-download-link)
      * [Create a role-based invite to sign a document](#role-invite-document)
      * [Create a simple free form invite to sign a document](#free-form-invite-document)
      * [Cancel an invite to sign a document](#cancel-document-invite)
      * [Create a signing link](#create-signing-link)
      * [Add fillable fields to a document](#add-field-document)
    * [Template](#template)
      * [Create a template](#create-template)
      * [Generate a document from template (Copy template)](#copy-template)
    * [Document group](#document-group)
      * [Retrieve document group](#retrieve-document-group)
      * [Delete document group](#delete-document-group)
      * [Cancel document group invite](#document-group-inivite-cancel)
    * [Event subscriptions](#event-subscription)
      * [Get User Event Subscriptions](#get-event-subscriptions)
      * [Create User Event Subscription](#create-event-subscription)
      * [Delete User Event Subscription](#delete-event-subscription)
      
## <a name="requirements"></a>Requirements 

PHP 7.1 or newer

## <a name="install"></a>Install

```bash
composer require signnow/api-php-sdk
```
### <a name="setting-up"></a>Setting up
Register an annotation loader:
```php
AnnotationRegistry::registerLoader('class_exists');
```
Prepare options for the Guzzle client. We recommend the following configuration: 
```php
$stack = HandlerStack::create();
$stack->setHandler(new CurlMultiHandler());
$stack->push(new AuthorizationMiddleware(new BasicToken($token))));
$stack->push(new ResponseCheckerMiddleware());
$options = [
    'base_uri'        => $host,
    'headers'         => ['Content-Type' => 'application/json'],
    'connect_timeout' => 30,
    'request_timeout' => 30,
    'handler'         => $stack,
];
```
Or you can use builder for configuring the default options:
```php
$options = (new OptionBuilder())
    ->setUri($uri)
    ->useAuthorization($token)
    ->getOptions();
```
Create the instance of Entity Manager:
```php
$entityManager = (new EntityManagerFactory())->createEntityManager($options);
```
Setup update http method for Entity Manager:
```php
$entityManager->setUpdateHttpMethod(Request::METHOD_PUT);
```
### <a name="entity-manager"></a>Entity manager

Entity manager is the main class which controls communication with 3rd party REST API where JSON is used as main data type.
It's responsible for saving objects to and fetching objects from the API.

Each entity is described by:
- API resource url (via HttpEntity annotation),
- API payload (via properties and theirs types),
- API response type (via ResponseType annotation, optional).
### <a name="examples"></a>Examples & use cases
Upload Document to SignNow
```php
$uploadFile = (new Document\Upload(new \SplFileInfo('realFilePath')));
$document = $entityManager->create($uploadFile);
```
Download Document from SignNow
```php
$document = $entityManager->get(Document\Download::class, ['id' => $document_id], ['type' => 'collapsed']);
```
### <a name="oauth2"></a>OAuth 2.0

#### <a name="get-token"></a>Request Access Token
```php
$entityManager->create(new TokenRequestPassword($username, $password));
```
#### <a name="verify-token"></a>Verify Access Token
```php
$entityManager->get(Token::class);
```
#### <a name="refresh-token"></a>Refresh Access Token
```php
$entityManager->create(new TokenRequestRefresh($refresh_token));
```
### <a name="document"></a>Document
#### <a name="upload-document"></a>Upload document
```php
$entityManager->create(new Document\Upload(new \SplFileInfo($filePath)));
```
#### <a name="fieldextract-document"></a>Upload document with text tags & convert them to fillable fields
```php
$entityManager->create(new Document\FieldExtract(new \SplFileInfo($filePath)));
```
#### <a name="retrieve-document"></a>Retrieve document
```php
$entityManager->get(Document\Document::class, ['id' => $document_id]);
```
#### <a name="delete-document"></a>Delete document
```php
$entityManager->delete(Document\Document::class, ['id' => $document_id]);
```
#### <a name="download-document"></a>Download document
```php
$entityManager->get(Document\Download::class, ['id' => $document_id], ['type' => 'collapsed']);
// type can be 'collapsed' or 'zip' 

// if need table containing the document's history set with_history=1
$entityManager->get(Document\Download::class, ['id' => $document_id], ['type' => 'collapsed', 'with_history' => 1]);
```
#### <a name="document-download-link"></a>Create a single-use link for document downloading
 ```php
$entityManager->create(new Document\DownloadLink(), ['id' => $document_id])
```
#### <a name="role-invite-document"></a>Create a role-based invite to sign a document
```php
$to[] = new Recipient($recipient_email, $role, $roleId, $order);
$invite = new Invite($email, $to, $cc);
$entityManager->create($invite, ['documentId' => $document_id]);
```
#### <a name="free-form-invite-document"></a>Create a simple free form invite to sign a document
```php
$invite = (new Invite())
            ->setDocumentId($document_id)
            ->setTo($to)
            ->setFrom($from)
            ->setCc([])
            ->setSubject($subject)
            ->setMessage($message);
              
$entityManager->create($invite, ["documentId" => $document_id]);
```
#### <a name="cancel-document-invite"></a>Cancel an invite to sign a document
```php
$entityManager
    ->setUpdateHttpMethod(Request::METHOD_PUT)
    ->update(new CancelInvite(), ['documentId' => $document_id]);
```
#### <a name="create-signing-link"></a>Create a signing link
```php
$entityManager->create(new SigningLink($document_id));
```
#### <a name="add-field-document"></a>Add fillable fields to a document
```php
$signature = (new SignatureField())
    ->setName('My Signature')
    ->setPageNumber(0)
    ->setRole('role 1')
    ->setRequired(true)
    ->setHeight(20)
    ->setWidth(10)
    ->setX(5)
    ->setY(10);

$text = (new TextField())
    ->setName('My text')
    ->setLabel('Some label')
    ->setPrefilledText('prefilled text')
    ->setPageNumber(0)
    ->setRole('role 1')
    ->setRequired(true)
    ->setHeight(20)
    ->setWidth(10)
    ->setX(100)
    ->setY(150);

$document = (new Document\Document())
    ->setId($document_id)
    ->setFields([$signature, $text]);
               
$entityManager->update($document);
```
### <a name="template"></a>Template
#### <a name="create-template"></a>Create a template
```php
$template = (new Template\Template())
    ->setDocumentId($document_id)
    ->setDocumentName($document_name);
 
$entityManager->create($template);
```
#### <a name="copy-template"></a>Generate a document from template (Copy template)
```php
$templateCopy = (new Template\Copy())
        ->setTemplateId($template_id)
        ->setDocumentName($document_name);

$entityManager->create($templateCopy);
```
### <a name="document-group"></a>Document group
#### <a name="retrieve-document-group"></a>Retrieve document group
```php
$entityManager->get(DocumentGroup\DocumentGroup::class, ['id' => $document_group_id])
```
#### <a name="delete-document-group"></a>Delete document group
```php
$entityManager->delete(DocumentGroup\DocumentGroup::class, ['id' => $document_group_id])
```
#### <a name="document-group-inivite-cancel"></a>Cancel document group invite
```php
$entityManager->create(
    new DocumentGroup\GroupInvite\Cancel(),
    [
        'documentGroupId' => $documentGroupId,
        'groupInviteId' => $groupInviteId
    ]
);
```
### <a name="event-subscription"></a>Event subscriptions
#### <a name="get-event-subscriptions"></a>Get User Event Subscriptions
```php
$entityManager->get(new EventSubscription\GetEventSubscriptions());
```
#### <a name="create-event-subscription"></a>Create User Event Subscription
```php
$entityManager->create(
    (new EventSubscription\CreateEventSubscription())
    ->setEvent('document.update')
    ->setCallbackUrl('https://google.com.ua')
);
```
#### <a name="delete-event-subscription"></a>Delete User Event Subscription
```php
$entityManager->delete(
    new EventSubscription\DeleteEventSubscription(),
    ['uniqueId' => $uniqueId]
);
```