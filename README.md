# SignNow API PHP Client

Simple API Client to integrate SignNow with your application or website. Sign documents, request e-signatures, and build role-based workflows with multiple signers: https://www.signnow.com/developers
### <a name="table-of-contents"></a>Table of Contents

1. [Requirements](#requirements)
2. [Install](#install)
3. [Setting up](#setting-up)
4. [Tests](#tests)
5. [Sandbox](#sandbox)   
6. [Entity manager](#entity-manager)
7. [Actions](#actions)
8. [Examples & use cases](#examples)
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
      * [Prefill fillable text fields in a document](#prefill-text-fields)
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
    * [Embedded invites] (#embedded-invites)
      * [Create embedded invites](#create-embedded-invites)
      * [Create signing link](#create-signing-link)
      * [Prolong signing link](#prolong-signing-link)
      * [Delete embedded invites](#delete-embedded-invites)
      * [Reassign signers](#reassign-signers)
      
## <a name="requirements"></a>Requirements 

PHP 7.1 or newer

## <a name="install"></a>Install

```bash
composer require signnow/api-php-sdk
```
### <a name="setting-up"></a>Setting up
Register an annotation loader if only there is `doctrine/annotations` less v2.0 in use.
This method is deprecated and will be removed in `doctrine/annotations 2.0` so
annotations will be autoloaded in 2.0.
```php
AnnotationRegistry::registerLoader('class_exists');
```
Create the instance of Entity Manager:
```php
use SignNow\Api\Service\Factory\EntityManagerFactory;
use SignNow\Api\Service\Factories\TokenFactory;

// configuring entity manager with the basic token 
$entityManager = 
    (new EntityManagerFactory())->create(
         'https://api.signnow.com',
         (new TokenFactory())->basicToken('YOUR_BASIC_TOKEN_STRING')
     );
```
```php
use SignNow\Api\Service\Factory\EntityManagerFactory;
use SignNow\Api\Service\Factories\TokenFactory;

// configuring entity manager with the bearer token
$entityManager = 
    (new EntityManagerFactory())->create(
         'https://api.signnow.com',
         (new TokenFactory())->bearerToken('BEARER_TOKEN_STRING')
     );
```
Setup update http method for Entity Manager:
```php
use SignNow\Rest\Http\Request;

$entityManager->setUpdateHttpMethod(Request::METHOD_PUT);
```
Also, it is possible to use the wrapper using OAuth authorization
```php
use SignNow\Api\Action\OAuth as SignNowOAuth;

$auth = new SignNowOAuth('https://api.signnow.com');

$entityManager = $auth->bearerByPassword('YOUR_BASIC_TOKEN_STRING', 'username', 'password');
```
### <a name="tests"></a>Tests
SignNow PHP SDK is covered with functional tests using Codeception and Phiremock.
Phiremock allows us to mock calls to SignNow API. All the calls pass at 127.0.0.1 port 8008. Ensure that this port is not in use in the local machine before running test.

Test execution in console:
```bash
vendor/bin/codecept run functional
```
Also, tests might be useful as examples of using SignNow PHP SDK.
### <a name="sandbox"></a>Sandbox
Directory [sandbox](sandbox) contains php script to taste some SDK feature.
Please, provide this scripts with your personal credentials, write some code or use existing code.
Execute sandbox script in console:
```bash
php sandbox/execute.php
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
use SignNow\Api\Entity\Document\Upload as DocumentUpload;

$uploadFile = (new DocumentUpload(new \SplFileInfo('realFilePath')));
$document = $entityManager->create($uploadFile);
```
Download Document from SignNow
```php
use SignNow\Api\Entity\Document\Download as DocumentDownload;

$documentUniqueId = 'e896ec9311a74a8a8ee9faff7049446fe452e461';

$document = $entityManager->get(
    new DocumentDownload(),
     [
        'id' => $documentUniqueId,
     ],
     [
        'type' => 'collapsed',
     ]);
```
### <a name="actions"></a>Actions
Actions - this is just a new abstraction layer above Entity Manager and implemented as services.
So that, both Entity Manager and Actions are equivalent options to use SignNow API. 
See actions in directory [src/Action](src/Action).
### <a name="oauth2"></a>OAuth 2.0

#### <a name="get-token"></a>Request Access Token
```php
use SignNow\Api\Entity\Auth\TokenRequestPassword;

$entityManager->create(new TokenRequestPassword($username, $password));
```
#### <a name="verify-token"></a>Verify Access Token
```php
use  SignNow\Api\Entity\Auth\Token;

$entityManager->get(Token::class);
```
#### <a name="refresh-token"></a>Refresh Access Token
```php
use SignNow\Api\Entity\Auth\TokenRequestRefresh;

$entityManager->create(new TokenRequestRefresh($refreshToken));
```
### <a name="document"></a>Document
#### <a name="upload-document"></a>Upload document
```php
use SignNow\Api\Entity\Document\Upload as DocumentUpload;

$entityManager->create(new DocumentUpload(new \SplFileInfo($filePath)));
```
#### <a name="fieldextract-document"></a>Upload document with text tags & convert them to fillable fields
```php
use SignNow\Api\Entity\Document\FieldExtract;

$entityManager->create(new FieldExtract(new \SplFileInfo($filePath)));
```
#### <a name="retrieve-document"></a>Retrieve document
```php
use SignNow\Api\Entity\Document\Document;

$documentUniqueId = 'e896ec9311a74a8a8ee9faff7049446fe452e461';

$entityManager->get(new Document(), ['id' => $documentUniqueId]);
```
#### <a name="delete-document"></a>Delete document
```php
use SignNow\Api\Entity\Document\Document;

$documentUniqueId = 'e896ec9311a74a8a8ee9faff7049446fe452e461';

$entityManager->delete(new Document(), ['id' => $documentUniqueId]);
```
#### <a name="download-document"></a>Download document
```php
use SignNow\Api\Entity\Document\Download as DocumentDownload;

$documentUniqueId = 'e896ec9311a74a8a8ee9faff7049446fe452e461';

$entityManager->get(new DocumentDownload(), ['id' => $documentUniqueId], ['type' => 'collapsed']);
// type can be 'collapsed' or 'zip' 

// if need table containing the document's history set with_history=1
$entityManager->get(new DocumentDownload(), ['id' => $documentUniqueId], ['type' => 'collapsed', 'with_history' => 1]);
```
#### <a name="document-download-link"></a>Create a single-use link for document downloading
 ```php
use SignNow\Api\Entity\Document\DownloadLink;

$documentUniqueId = 'e896ec9311a74a8a8ee9faff7049446fe452e461';
$entityManager->create(new DownloadLink(), ['id' => $documentUniqueId])
```
#### <a name="role-invite-document"></a>Create a role-based invite to sign a document
```php
use SignNow\Api\Entity\Invite\Recipient;
use SignNow\Api\Entity\Invite\Invite;

$to[] = new Recipient(
    $recipientEmail,
    $role,
    $roleId,
    $order,
    $expirationDays,
    $subject,
    $message
);
$invite = new Invite($email, $to, $cc);
$entityManager->create($invite, ['documentId' => $documentUniqueId]);
```
#### <a name="free-form-invite-document"></a>Create a simple free form invite to sign a document
```php
use SignNow\Api\Entity\Invite\Invite;

$invite = (new Invite())
            ->setDocumentId($documentUniqueId)
            ->setTo($to)
            ->setFrom($from)
            ->setCc([])
            ->setSubject($subject)
            ->setMessage($message);
              
$entityManager->create($invite, ["documentId" => $documentUniqueId]);
```
#### <a name="cancel-document-invite"></a>Cancel an invite to sign a document
```php
use SignNow\Api\Entity\Invite\CancelInvite;
use SignNow\Rest\Http\Request;

$entityManager
    ->setUpdateHttpMethod(Request::METHOD_PUT)
    ->update(new CancelInvite(), ['documentId' => $documentUniqueId]);
```
#### <a name="create-signing-link"></a>Create a signing link
```php
use SignNow\Api\Entity\Invite\SigningLink;

$entityManager->create(new SigningLink($documentUniqueId));
```
#### <a name="add-field-document"></a>Add fillable fields to a document
```php
use SignNow\Api\Entity\Document\Document;
use SignNow\Api\Entity\Document\Field\SignatureField;
use SignNow\Api\Entity\Document\Field\TextField;

$signatureField = (new SignatureField())
    ->setName('My Signature')
    ->setPageNumber(0)
    ->setRole('role 1')
    ->setRequired(true)
    ->setHeight(20)
    ->setWidth(10)
    ->setX(5)
    ->setY(10);

$textField = (new TextField())
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

$document = (new Document())
    ->setId($documentUniqueId)
    ->setFields([$signatureField, $textField]);
               
$entityManager->update($document);
```
#### <a name="prefill-text-fields"></a>Prefill text fields
```php
use SignNow\Api\Action\PrefillTextFields;
use SignNow\Api\Entity\Document\PrefillText\FieldRequest;

$prefill = new PrefillTextFields($bearer);
    
$fields = [];
$fields[] = (new FieldRequest())
   ->setFieldName('Document')
   ->setPrefilledText('Agreement #12-820/01');

$prefill->prefill($documentUniqueId, $fields);
```
### <a name="template"></a>Template
#### <a name="create-template"></a>Create a template
```php
use SignNow\Api\Entity\Template\Template;

$template = (new Template())
    ->setDocumentId($documentUniqueId)
    ->setDocumentName('My document name');
 
$entityManager->create($template);
```
#### <a name="copy-template"></a>Generate a document from template (Copy template)
```php
use SignNow\Api\Entity\Template\Copy as TemplateCopy;

$templateCopy = (new TemplateCopy())
        ->setTemplateId($templateId)
        ->setDocumentName('My document');

$entityManager->create($templateCopy);
```
### <a name="document-group"></a>Document group
#### <a name="retrieve-document-group"></a>Retrieve document group
```php
use SignNow\Api\Entity\DocumentGroup\DocumentGroup;

$entityManager->get(
    (new DocumentGroup())
        ->setGroupName('my group')
        ->setId($documentGroupId)
        ->setDocuments($documentsArray)
);
```
#### <a name="delete-document-group"></a>Delete document group
```php
use SignNow\Api\Entity\DocumentGroup\DocumentGroup;

$entityManager->delete(new DocumentGroup(), ['id' => $documentGroupId]);
```
#### <a name="document-group-inivite-cancel"></a>Cancel document group invite
```php
use SignNow\Api\Entity\DocumentGroup\GroupInvite\Cancel as DocumentGroupInviteCancel;

$entityManager->create(
    new DocumentGroupInviteCancel(),
    [
        'documentGroupId' => $documentGroupId,
        'groupInviteId' => $groupInviteId,
    ]
);
```
### <a name="event-subscription"></a>Event subscriptions
#### <a name="get-event-subscriptions"></a>Get User Event Subscriptions
```php
use SignNow\Api\Entity\EventSubscription\GetEventSubscriptions;

$entityManager->get(new GetEventSubscriptions());
```
#### <a name="create-event-subscription"></a>Create User Event Subscription
```php
use SignNow\Api\Entity\EventSubscription\CreateEventSubscription;

$entityManager->create(
    (new CreateEventSubscription())
    ->setEvent('document.update')
    ->setCallbackUrl('https://google.com.ua')
);
```
#### <a name="delete-event-subscription"></a>Delete User Event Subscription
```php
use SignNow\Api\Entity\EventSubscription\DeleteEventSubscription;

$entityManager->delete(
    new DeleteEventSubscription(),
    ['uniqueId' => $uniqueId]
);
```
### <a name="embedded-invites"></a>Embedded Invites
#### <a name="create-embedded-invites"></a>Create embedded invites
```php
use SignNow\Api\Action\OAuth as SignNowOAuth;
use SignNow\Api\Action\EmbeddedInvite;
use SignNow\Api\Entity\Embedded\Invite\InviteRequest;
use SignNow\Api\Service\OAuth\AuthMethod\Method\None;

$auth = new SignNowOAuth('https://api.signnow.com');

$embedInvite = new EmbeddedInvite(
  $auth->bearerByPassword('YOUR_BASIC_TOKEN', 'user', 'password')
);

$invites[] = (new InviteRequest())
     ->setEmail('name.surname@domain.com')
     ->setRoleId('4d4122e8574b4462a67505c0a89c6015780518f1')
     ->setOrder(1)
     ->setAuthMethod(new None())
     ->setFirstName('Name')
     ->setLastName('Surname');

$embeddedInvites = $embedInvite->create(DOCUMENT_UID, $invites);

foreach ($embeddedInvites->getInvites() as $invite) {
  echo $invite->getId() , PHP_EOL,
     $invite->getEmail() , PHP_EOL,
     $invite->getRoleId(), PHP_EOL,
     $invite->getOrder(), PHP_EOL,
     $invite->getStatus(), PHP_EOL,
     PHP_EOL;
}
```
#### <a name="create-signing-link"></a>Create signing link
```php
use SignNow\Api\Action\OAuth as SignNowOAuth;
use SignNow\Api\Action\EmbeddedInvite;

$auth = new SignNowOAuth('https://api.signnow.com');

$embedInvite = new EmbeddedInvite(
  $auth->bearerByPassword('YOUR_BASIC_TOKEN', 'user', 'password')
);

$documentUniqueId = '0d3122a857514462a67515c0a39c6015780518f2';
$inviteUniqueId = '3313c8fb12594004babb98a5f7418c11ad572b05';
echo $embedInvite->createSigningLink($documentUniqueId, $inviteUniqueId)->getLink();

```
#### <a name="prolong-signing-link"></a>Prolong signing link
```php
use SignNow\Api\Action\OAuth as SignNowOAuth;
use SignNow\Api\Action\EmbeddedInvite;

$auth = new SignNowOAuth('https://api.signnow.com');

$embedInvite = new EmbeddedInvite(
  $auth->bearerByPassword('YOUR_BASIC_TOKEN', 'user', 'password')
);

$expiration = 45;
$documentUniqueId = '0d3122a857514462a67515c0a39c6015780518f2';
$inviteUniqueId = '3313c8fb12594004babb98a5f7418c11ad572b05';
echo $embedInvite->setSigningLinkExpiration($documentUniqueId, $inviteUniqueId, $expiration)->getLink();
```
#### <a name="delete-embedded-invites"></a>Delete embedded invites
```php
use SignNow\Api\Action\OAuth as SignNowOAuth;
use SignNow\Api\Action\EmbeddedInvite;

$auth = new SignNowOAuth('https://api.signnow.com');

$embedInvite = new EmbeddedInvite(
  $auth->bearerByPassword('YOUR_BASIC_TOKEN', 'user', 'password')
);

$documentUniqueId = '0d3122a857514462a67515c0a39c6015780518f2';
$embedInvite->delete($documentUniqueId);
```
#### <a name="reassign-signers"></a>Reassign signers
