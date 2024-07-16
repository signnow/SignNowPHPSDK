<?php

declare(strict_types=1);

namespace SignNow\Api\DocumentInvite\Request;

use SignNow\Api\DocumentInvite\Request\Data\ToCollection;
use SignNow\Api\DocumentInvite\Request\Data\EmailGroup\EmailGroupCollection;
use SignNow\Api\DocumentInvite\Request\Data\CcCollection;
use SignNow\Api\DocumentInvite\Request\Data\CcStepCollection;
use SignNow\Api\DocumentInvite\Request\Data\ViewerCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'sendFieldInvite',
    url: '/document/{document_id}/invite',
    method: 'post',
    auth: 'bearer',
    namespace: 'documentInvite',
    entity: 'sendInvite',
    type: 'application/json',
)]
final class SendInvitePost implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $documentId,
        private ToCollection $to,
        private string $from,
        private string $subject,
        private string $message,
        private EmailGroupCollection $emailGroups = new EmailGroupCollection(),
        private CcCollection $cc = new CcCollection(),
        private CcStepCollection $ccStep = new CcStepCollection(),
        private ViewerCollection $viewers = new ViewerCollection(),
        private string $ccSubject = '',
        private string $ccMessage = '',
    ) {
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getTo(): ToCollection
    {
        return $this->to;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getEmailGroups(): EmailGroupCollection
    {
        return $this->emailGroups;
    }

    public function getCc(): CcCollection
    {
        return $this->cc;
    }

    public function getCcStep(): CcStepCollection
    {
        return $this->ccStep;
    }

    public function getViewers(): ViewerCollection
    {
        return $this->viewers;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCcSubject(): string
    {
        return $this->ccSubject;
    }

    public function getCcMessage(): string
    {
        return $this->ccMessage;
    }

    public function withDocumentId(string $documentId): self
    {
        $this->uriParams['document_id'] = $documentId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'document_id' => $this->getDocumentId(),
           'to' => $this->getTo()->toArray(),
           'from' => $this->getFrom(),
           'email_groups' => $this->getEmailGroups()->toArray(),
           'cc' => $this->getCc()->toArray(),
           'cc_step' => $this->getCcStep()->toArray(),
           'viewers' => $this->getViewers()->toArray(),
           'subject' => $this->getSubject(),
           'message' => $this->getMessage(),
           'cc_subject' => $this->getCcSubject(),
           'cc_message' => $this->getCcMessage(),
        ];
    }
}
