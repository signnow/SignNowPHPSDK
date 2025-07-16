<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Sdk\Tests\Core\Mock;

use SignNow\Api\Document\Request\Data\Attachment;
use SignNow\Api\Document\Request\Data\AttachmentCollection;
use SignNow\Api\Document\Request\Data\Check;
use SignNow\Api\Document\Request\Data\CheckCollection;
use SignNow\Api\Document\Request\Data\DeactivateElement;
use SignNow\Api\Document\Request\Data\DeactivateElementCollection;
use SignNow\Api\Document\Request\Data\DocumentIdCollection;
use SignNow\Api\Document\Request\Data\Field;
use SignNow\Api\Document\Request\Data\FieldCollection;
use SignNow\Api\Document\Request\Data\Hyperlink;
use SignNow\Api\Document\Request\Data\HyperlinkCollection;
use SignNow\Api\Document\Request\Data\IntegrationObject;
use SignNow\Api\Document\Request\Data\IntegrationObjectCollection;
use SignNow\Api\Document\Request\Data\Line\ControlPointCollection;
use SignNow\Api\Document\Request\Data\Line\Line;
use SignNow\Api\Document\Request\Data\Line\LineCollection;
use SignNow\Api\Document\Request\Data\Radiobutton\Radio;
use SignNow\Api\Document\Request\Data\Radiobutton\Radiobutton;
use SignNow\Api\Document\Request\Data\Radiobutton\RadiobuttonCollection;
use SignNow\Api\Document\Request\Data\Radiobutton\RadioCollection;
use SignNow\Api\Document\Request\Data\Signature;
use SignNow\Api\Document\Request\Data\SignatureCollection;
use SignNow\Api\Document\Request\Data\Tag\Tag;
use SignNow\Api\Document\Request\Data\Tag\TagCollection;
use SignNow\Api\Document\Request\Data\Text;
use SignNow\Api\Document\Request\Data\TextCollection;
use SignNow\Api\DocumentField\Request\Data\Field as PrefillField;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Invite as EmbeddedGroupInvite;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\InviteCollection as EmbeddedGroupInviteCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\SignerCollection as EmbeddedGroupInviteSignerCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Signer as EmbeddedGroupInviteSigner;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\DocumentCollection as EmbeddedGroupInviteDocumentCollection;
use SignNow\Api\EmbeddedGroupInvite\Request\Data\Invite\Document as EmbeddedGroupInviteDocument;
use SignNow\Api\DocumentGroupInvite\Request\Data\UpdateInviteActionAttributeCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\UpdateInviteActionAttribute as GroupUpdateInviteActionAttribute;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteEmail as ReassignGroupInviteEmail;
use SignNow\Api\DocumentGroup\Request\Data\DocumentIdCollection as GroupDocumentIdCollection;
use SignNow\Api\DocumentGroup\Request\Data\DocumentOrderCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\CompletionEmail as GroupCompletionEmail;
use SignNow\Api\DocumentGroupInvite\Request\Data\CompletionEmailCollection as GroupCompletionEmailCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\EmailGroup\Email as GroupEmail;
use SignNow\Api\DocumentGroupInvite\Request\Data\EmailGroup\EmailCollection as GroupEmailCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\EmailGroup\EmailGroup as GroupEmailGroup;
use SignNow\Api\DocumentGroupInvite\Request\Data\EmailGroup\EmailGroupCollection as GroupEmailGroupCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\CcCollection as GroupCcCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteStep as GroupInviteStep;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteStepCollection as GroupInviteStepsCollection;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteAction as GroupInviteAction;
use SignNow\Api\DocumentGroupInvite\Request\Data\InviteStep\InviteActionCollection as GroupInviteActionCollection;
use SignNow\Api\DocumentInvite\Request\Data\CcCollection;
use SignNow\Api\DocumentInvite\Request\Data\CcStep;
use SignNow\Api\DocumentInvite\Request\Data\CcStepCollection;
use SignNow\Api\DocumentInvite\Request\Data\EmailGroup\Email;
use SignNow\Api\DocumentInvite\Request\Data\EmailGroup\EmailCollection;
use SignNow\Api\DocumentInvite\Request\Data\EmailGroup\EmailGroup;
use SignNow\Api\DocumentInvite\Request\Data\EmailGroup\EmailGroupCollection;
use SignNow\Api\DocumentInvite\Request\Data\To;
use SignNow\Api\DocumentInvite\Request\Data\ToCollection;
use SignNow\Api\DocumentInvite\Request\Data\Viewer;
use SignNow\Api\DocumentInvite\Request\Data\ViewerCollection;
use SignNow\Api\EmbeddedInvite\Request\Data\Invite as EmbeddedInvite;
use SignNow\Api\EmbeddedInvite\Request\Data\InviteCollection as EmbeddedInviteInviteCollection;
use SignNow\Api\Template\Request\Data\ApproverPut;
use SignNow\Api\Template\Request\Data\ApproverPutCollection;
use SignNow\Api\Template\Request\Data\CcPutCollection;
use SignNow\Api\Template\Request\Data\CcStepPut;
use SignNow\Api\Template\Request\Data\CcStepPutCollection;
use SignNow\Api\Template\Request\Data\InviteLinkInstructionPutCollection;
use SignNow\Api\Template\Request\Data\RoutingDetail\InviteAction;
use SignNow\Api\Template\Request\Data\RoutingDetail\InviteActionCollection;
use SignNow\Api\Template\Request\Data\RoutingDetail\InviteStep;
use SignNow\Api\Template\Request\Data\RoutingDetail\InviteStepCollection;
use SignNow\Api\Template\Request\Data\RoutingDetail\RoutingDetail;
use SignNow\Api\Template\Request\Data\TemplateDataObjectPut;
use SignNow\Api\Template\Request\Data\TemplateDataObjectPutCollection;
use SignNow\Api\Template\Request\Data\TemplateDataPut;
use SignNow\Api\Template\Request\Data\TemplateIdsToAddCollection;
use SignNow\Api\Template\Request\Data\TemplateIdsToRemoveCollection;
use SignNow\Api\SmartFields\Request\Data\Data as SmartFieldsData;
use SignNow\Api\SmartFields\Request\Data\DataCollection as SmartFieldsDataCollection;
use SignNow\Api\DocumentField\Request\Data\FieldCollection as PrefillFieldCollection;
use SignNow\Api\Template\Request\Data\ViewerPut;
use SignNow\Api\Template\Request\Data\ViewerPutCollection;
use SignNow\Api\Webhook\Request\Data\Attribute;
use SignNow\Api\WebhookV2\Request\Data\Attribute as AttributeV2;
use SplFileInfo;
use Faker\Factory as BaseFakerFactory;
use Faker\Generator as BaseFaker;

/**
 * @method string code()
 * @method string action()
 * @method string event()
 * @method string firstName()
 * @method string lastName()
 * @method string oldPassword()
 * @method string subject()
 * @method string emailMessage()
 * @method string message()
 * @method string ccSubject()
 * @method string ccMessage()
 * @method string nameFormula()
 * @method string reason()
 * @method string groupName()
 * @method string logoutAll()
 * @method string number()
 * @method string type()
 * @method string withHistory()
 * @method string parseType()
 * @method string refreshToken()
 * @method string verificationToken()
 * @method string expirationTime()
 * @method string templateGroupName()
 */
class Faker
{
    private BaseFaker $faker;

    public function __construct()
    {
        $this->faker = BaseFakerFactory::create();
    }

    public function uid(): string
    {
        return $this->faker->regexify('[0-9a-f]{40}');
    }

    public function documentId(): string
    {
        return $this->uid();
    }

    public function documentGroupId(): string
    {
        return $this->uid();
    }

    public function folderId(): string
    {
        return $this->uid();
    }

    public function templateId(): string
    {
        return $this->uid();
    }

    public function templateGroupId(): string
    {
        return $this->uid();
    }

    public function eventSubscriptionId(): string
    {
        return $this->uid();
    }

    public function callbackId(): string
    {
        return $this->uid();
    }

    public function entityId(): string
    {
        return $this->uid();
    }

    public function fieldInviteId(): string
    {
        return $this->uid();
    }

    public function inviteId(): string
    {
        return $this->uid();
    }

    public function stepId(): string
    {
        return $this->uid();
    }

    public function embeddedInviteId(): string
    {
        return $this->uid();
    }

    public function documentName(): string
    {
        return 'document_' . $this->name();
    }

    public function name(): string
    {
        return $this->faker->name();
    }

    public function email(): string
    {
        return $this->faker->email();
    }

    public function url(): string
    {
        return $this->faker->url();
    }

    public function redirectUri(): string
    {
        return $this->url();
    }

    public function closeRedirectUri(): string
    {
        return $this->url();
    }

    public function from(): string
    {
        return $this->email();
    }

    public function to(): string
    {
        return $this->email();
    }

    public function userToUpdate(): string
    {
        return $this->email();
    }

    public function replaceWithThisUser(): string
    {
        return $this->email();
    }

    public function username(): string
    {
        return $this->faker->userName();
    }

    public function password(): string
    {
        return $this->faker->password();
    }

    public function scope(): string
    {
        return '*';
    }

    public function grantType(?string $default = null): string
    {
        return $default ?? 'password';
    }

    public function token(): string
    {
        return $this->faker->regexify('[0-9a-f]{64}');
    }

    public function saveFields(): int
    {
        return 0;
    }

    public function makeTemplate(): int
    {
        return 0;
    }

    public function originTemplateId(): string
    {
        return $this->uid();
    }

    public function role($suffix = ''): string
    {
        return 'Signer' . $suffix;
    }

    public function actionSign(): string
    {
        return 'sign';
    }

    public function actionView(): string
    {
        return 'view';
    }

    public function authMethod(): string
    {
        return $this->faker->randomElement(
            [
                $this->authMethodEmail(),
                $this->authMethodMfa(),
                $this->authMethodPassword(),
                $this->authMethodSocial(),
                $this->authMethodBiometric(),
                $this->authMethodNone(),
            ]
        );
    }

    public function authMethodEmail(): string
    {
        return 'email';
    }

    public function authMethodMfa(): string
    {
        return 'mfa';
    }

    public function authMethodSocial(): string
    {
        return 'social';
    }

    public function authMethodBiometric(): string
    {
        return 'biometric';
    }

    public function authMethodPassword(): string
    {
        return 'password';
    }

    public function authMethodNone(): string
    {
        return 'none';
    }

    public function linkExpiration(): int
    {
        return 40;
    }

    public function file(): SplFileInfo
    {
        return new SplFileInfo(dirname(__DIR__, 2) . '/_data/demo.pdf');
    }

    public function string(): string
    {
        return $this->faker->word();
    }

    public function language(): string
    {
        return $this->faker->randomElement(
            [
                'en',
                'es',
                'fr',
            ]
        );
    }

    public function redirectTarget(): string
    {
        return $this->faker->randomElement(
            [
                'blank',
                'self',
            ]
        );
    }

    public function boolean(): bool
    {
        return $this->faker->boolean();
    }

    public function color(): string
    {
        return $this->faker->safeHexColor();
    }

    public function dataImageBase64(): string
    {
        return 'data:image/png;base64,'
            . base64_encode(file_get_contents(dirname(__DIR__, 2) . '/_data/demo.png'));
    }

    public function callbackUrl(): string
    {
        return $this->url();
    }

    public function clientTimestamp(bool $asString = true): string|int
    {
        return $asString ? (string) time() : time();
    }

    public function documentFieldExtractTags(): TagCollection
    {
        $tags = new TagCollection();

        $tags->add(new Tag('text', 100, 100, 0, 'Signer', true, 100, 16));

        return $tags;
    }

    public function documentFields(): FieldCollection
    {
        $fields = new FieldCollection();

        $fields->add(
            new Field(
                x: 100,
                y: 150,
                pageNumber: 0,
                height: 15,
                width: 20,
                type: 'text',
                required: true,
                role: 'Signer',
                customDefinedOption: false,
                name: 'field_1',
                label: 'Text Field_1',
                validatorId: $this->uid(),
            )
        );

        return $fields;
    }

    public function documentDocumentMergeDocumentIds(int $count = 2): DocumentIdCollection
    {
        $ids = new DocumentIdCollection();

        for ($i = 1; $i <= $count; $i++) {
            $ids->add($this->documentId());
        }

        return $ids;
    }

    public function documentDeactivateElements(): DeactivateElementCollection
    {
        $toDeactivate = new DeactivateElementCollection();

        $toDeactivate->add(new DeactivateElement('text', $this->uid()));
        $toDeactivate->add(new DeactivateElement('check', $this->uid()));

        return $toDeactivate;
    }

    public function documentLines(): LineCollection
    {
        $lines = new LineCollection();

        $lines->add(
            new Line(
                x: 100,
                y: 100,
                width: 100,
                height: 15,
                subtype: 'line',
                pageNumber: 0,
                fillColor: $this->color(),
                lineWidth: 2,
                controlPoints: new ControlPointCollection(
                    [
                        158.0,
                        100.0,
                    ]
                )
            )
        );

        return $lines;
    }

    public function documentChecks(): CheckCollection
    {
        $checks = new CheckCollection();

        $checks->add(
            new Check(
                x: 100,
                y: 100,
                width: 100,
                height: 15,
                subtype: 'check',
                pageNumber: 0,
            )
        );

        return $checks;
    }

    public function documentRadiobuttons(): RadiobuttonCollection
    {
        $radiobuttons = new RadiobuttonCollection();

        $radiobuttons->add(
            new Radiobutton(
                pageNumber: 0,
                x: 100,
                y: 100,
                lineHeight: 3,
                status: 0,
                isPrinted: 0,
                size: 10,
                subtype: 'radiobutton',
                name: 'radiobutton_1',
                font: 'Arial',
                radio: new RadioCollection(
                    [
                        new Radio(
                            x: 100,
                            y: 100,
                            width: 100,
                            height: 15,
                            value: 'Yes',
                            checked: 0,
                            pageNumber: 0
                        ),
                    ]
                )
            )
        );

        return $radiobuttons;
    }

    public function documentSignatures(): SignatureCollection
    {
        $signatures = new SignatureCollection();

        $signatures->add(
            new Signature(
                x: 100,
                y: 100,
                width: 100,
                height: 15,
                pageNumber: 0,
                data: $this->dataImageBase64(),
                subtype: 'signature',
            )
        );

        return $signatures;
    }

    public function documentTexts(): TextCollection
    {
        $texts = new TextCollection();

        $texts->add(
            new Text(
                x: 100,
                y: 100,
                size: 10,
                width: 115,
                height: 15,
                subtype: 'text',
                pageNumber: 0,
                data: 'Text',
                font: 'Arial',
                lineHeight: 3,
            )
        );

        return $texts;
    }

    public function documentAttachments(): AttachmentCollection
    {
        $attachments = new AttachmentCollection();

        $attachments->add(
            new Attachment(
                $this->uid(),
                $this->uid(),
            )
        );

        return $attachments;
    }

    public function documentHyperlinks(): HyperlinkCollection
    {
        $hyperlinks = new HyperlinkCollection();

        $hyperlinks->add(
            new Hyperlink(
                x: 100,
                y: 100,
                size: 3,
                width: 100,
                height: 15,
                pageNumber: 0,
                font: 'Arial',
                lineHeight: 3,
            )
        );

        return $hyperlinks;
    }

    public function documentIntegrationObjects(): IntegrationObjectCollection
    {
        $integrationObjects = new IntegrationObjectCollection();

        $integrationObjects->add(
            new IntegrationObject(
                x: 100,
                y: 100,
                size: 3,
                width: 100,
                height: 15,
                pageNumber: 0,
                font: 'Arial',
                data: 'Integration Object',
                status: 1,
                color: $this->color(),
                created: $this->clientTimestamp(false),
                active: true,
                lineHeight: 3,
            )
        );

        return $integrationObjects;
    }

    public function documentFieldDocumentPrefillFields(): PrefillFieldCollection
    {
        $data = new PrefillFieldCollection();

        $data->add(
            new PrefillField('field_1', 'prefilled text')
        );

        return $data;
    }

    public function smartFieldsDocumentPrefillSmartFieldData(): SmartFieldsDataCollection
    {
        $data = new SmartFieldsDataCollection();

        $data->add(
            new SmartFieldsData('to be inserted into smart field')
        );

        return $data;
    }

    public function webhookSubscriptionAttributes(): Attribute
    {
        return new Attribute($this->url());
    }

    public function webhookV2EventSubscriptionAttributes(): AttributeV2
    {
        return new AttributeV2($this->url());
    }

    public function templateGroupTemplateRoutingDetails(): RoutingDetail
    {
        $steps = new InviteStepCollection();
        $actions = new InviteActionCollection();

        $actions->add(
            new InviteAction(
                $this->email(),
                $this->role(),
                $this->actionSign(),
                $this->documentId(),
                $this->documentName()
            )
        );
        $steps->add(new InviteStep(1, $actions));

        return new RoutingDetail($steps, 1);
    }

    public function templateGroupTemplateTemplateIdsToAdd(): TemplateIdsToAddCollection
    {
        $ids = new TemplateIdsToAddCollection();

        $ids->add($this->documentId());

        return $ids;
    }

    public function templateGroupTemplateTemplateIdsToRemove(): TemplateIdsToRemoveCollection
    {
        return new TemplateIdsToRemoveCollection();
    }

    public function documentInviteSendInviteTo(): ToCollection
    {
        $to = new ToCollection();

        $to->add(
            new To(
                $this->email(),
                $this->uid(),
                $this->role(),
                1,
                'Invite to sign a document',
                'Please, sign this document',
            )
        );

        return $to;
    }

    public function documentInviteSendInviteCc(): CcCollection
    {
        $cc = new CcCollection();

        $cc->add($this->email());
        $cc->add($this->email());

        return $cc;
    }

    public function documentInviteFreeFormInviteCc(): CcCollection
    {
        return $this->documentInviteSendInviteCc();
    }

    public function documentInviteSendInviteCcStep(): CcStepCollection
    {
        $ccSteps = new CcStepCollection();

        $ccSteps->add(
            new CcStep(
                $this->name(),
                $this->email(),
                1,
            )
        );
        $ccSteps->add(
            new CcStep(
                $this->name(),
                $this->email(),
                2,
            )
        );

        return $ccSteps;
    }

    public function documentInviteSendInviteViewers(): ViewerCollection
    {
        $viewers = new ViewerCollection();

        $viewers->add(
            new Viewer(
                $this->email(),
                $this->role(),
                1,
                $this->subject(),
                $this->message()
            )
        );

        return $viewers;
    }

    public function documentInviteSendInviteEmailGroups(): EmailGroupCollection
    {
        $emailGroups = new EmailGroupCollection();

        $emails = new EmailCollection();
        $emails->add(new Email($this->email()));
        $emails->add(new Email($this->email()));

        $emailGroups->add(
            new EmailGroup(
                id: $this->uid(),
                name: $this->name(),
                emails: $emails
            )
        );

        return $emailGroups;
    }

    public function embeddedInviteDocumentInviteInvites(): EmbeddedInviteInviteCollection
    {
        $invites = new EmbeddedInviteInviteCollection();

        $invites->add(
            new EmbeddedInvite(
                $this->email(),
                $this->uid(),
                1,
                $this->authMethodNone(),
            )
        );

        return $invites;
    }

    public function documentGroupDocumentIds(): GroupDocumentIdCollection
    {
        return new GroupDocumentIdCollection(
            [
                $this->documentId(),
                $this->documentId(),
            ]
        );
    }

    public function documentGroupDownloadDocumentGroupDocumentOrder(): DocumentOrderCollection
    {
        return new DocumentOrderCollection(
            [
                $this->documentId(),
                $this->documentId(),
            ]
        );
    }

    public function documentGroupInviteGroupInviteInviteSteps(): GroupInviteStepsCollection
    {
        $steps = new GroupInviteStepsCollection();

        $steps->add(
            new GroupInviteStep(
                1,
                new GroupInviteActionCollection(
                    [
                        new GroupInviteAction(
                            $this->email(),
                            $this->role(),
                            $this->actionSign(),
                            $this->documentId(),
                        ),
                    ]
                )
            )
        );

        return $steps;
    }

    public function documentGroupInviteGroupInviteCc(): GroupCcCollection
    {
        $cc = new GroupCcCollection();

        $cc->add($this->email());
        $cc->add($this->email());

        return $cc;
    }

    public function documentGroupInviteGroupInviteEmailGroups(): GroupEmailGroupCollection
    {
        $emailGroups = new GroupEmailGroupCollection();

        $emailGroups->add(
            new GroupEmailGroup(
                $this->uid(),
                $this->name(),
                new GroupEmailCollection(
                    [
                        new GroupEmail($this->email()),
                        new GroupEmail($this->email()),
                    ]
                )
            )
        );

        return $emailGroups;
    }

    public function documentGroupInviteGroupInviteCompletionEmails(): GroupCompletionEmailCollection
    {
        $completionEmails = new GroupCompletionEmailCollection();

        $completionEmails->add(
            new GroupCompletionEmail(
                $this->email(),
                0,
                $this->subject(),
                $this->message()
            )
        );

        return $completionEmails;
    }

    public function documentGroupInviteReassignSignerInviteEmail(): ReassignGroupInviteEmail
    {
        return new ReassignGroupInviteEmail(
            $this->email(),
        );
    }

    public function documentGroupInviteReassignSignerUpdateInviteActionAttributes(): UpdateInviteActionAttributeCollection
    {
        $attributes = new UpdateInviteActionAttributeCollection();

        $attributes->add(
            new GroupUpdateInviteActionAttribute(
                $this->documentId(),
            )
        );

        return $attributes;
    }

    public function embeddedGroupInviteGroupInviteInvites(): EmbeddedGroupInviteCollection
    {
        $embeddedGroupInvites = new EmbeddedGroupInviteCollection();

        $documents = new EmbeddedGroupInviteDocumentCollection();
        $documents->add(
            new EmbeddedGroupInviteDocument(
                $this->documentId(),
                $this->role(),
                $this->actionSign()
            )
        );

        $signers = new EmbeddedGroupInviteSignerCollection();
        $signers->add(
            new EmbeddedGroupInviteSigner(
                $this->email(),
                $this->authMethodNone(),
                $documents,
                $this->firstName(),
                $this->lastName(),
            )
        );

        $embeddedGroupInvites->add(
            new EmbeddedGroupInvite(
                1,
                $signers
            )
        );

        return $embeddedGroupInvites;
    }

    public function templateRoutingDetailsTemplateData(): TemplateDataPut
    {
        return new TemplateDataPut(
            inviterRole: $this->boolean(),
            name: $this->name(),
            roleId: $this->uid(),
            signingOrder: 1,
        );
    }

    public function templateRoutingDetailsTemplateDataObject(): TemplateDataObjectPutCollection
    {
        $objects = new TemplateDataObjectPutCollection();

        $objects->add(
            new TemplateDataObjectPut(
                name: $this->name(),
                roleId: $this->uid(),
            )
        );

        return $objects;
    }

    public function templateRoutingDetailsCc(): CcPutCollection
    {
        return new CcPutCollection([$this->email()]);
    }

    public function templateRoutingDetailsCcStep(): CcStepPutCollection
    {
        $ccSteps = new CcStepPutCollection();

        $ccSteps->add(
            new CcStepPut(
                $this->name(),
                $this->email(),
                1
            )
        );

        return $ccSteps;
    }

    public function templateRoutingDetailsViewers(): ViewerPutCollection
    {
        $viewers = new ViewerPutCollection();

        $viewers->add(
            new ViewerPut(
                $this->name(),
                1,
                $this->email(),
                $this->boolean()
            )
        );

        return $viewers;
    }

    public function templateRoutingDetailsApprovers(): ApproverPutCollection
    {
        $approvers = new ApproverPutCollection();

        $approvers->add(
            new ApproverPut($this->name(), 1)
        );

        return $approvers;
    }

    public function templateRoutingDetailsInviteLinkInstructions(): InviteLinkInstructionPutCollection
    {
        return new InviteLinkInstructionPutCollection(
            [
                $this->string(),
                $this->string(),
            ]
        );
    }

    public function __call(string $name, array $arguments)
    {
        if (in_array($name, ['refreshToken', 'verificationToken'])) {
            return $this->token();
        }

        return $this->string();
    }
}
