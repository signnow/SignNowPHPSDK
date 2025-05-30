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

namespace SignNow\Api\Document\Request;

use SignNow\Api\Document\Request\Data\FieldCollection;
use SignNow\Api\Document\Request\Data\Line\LineCollection;
use SignNow\Api\Document\Request\Data\CheckCollection;
use SignNow\Api\Document\Request\Data\Radiobutton\RadiobuttonCollection;
use SignNow\Api\Document\Request\Data\SignatureCollection;
use SignNow\Api\Document\Request\Data\TextCollection;
use SignNow\Api\Document\Request\Data\AttachmentCollection;
use SignNow\Api\Document\Request\Data\HyperlinkCollection;
use SignNow\Api\Document\Request\Data\IntegrationObjectCollection;
use SignNow\Api\Document\Request\Data\DeactivateElementCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'updateDocument',
    url: '/document/{document_id}',
    method: 'put',
    auth: 'bearer',
    namespace: 'document',
    entity: 'document',
    type: 'application/json',
)]
final class DocumentPut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private FieldCollection $fields,
        private LineCollection $lines = new LineCollection(),
        private CheckCollection $checks = new CheckCollection(),
        private RadiobuttonCollection $radiobuttons = new RadiobuttonCollection(),
        private SignatureCollection $signatures = new SignatureCollection(),
        private TextCollection $texts = new TextCollection(),
        private AttachmentCollection $attachments = new AttachmentCollection(),
        private HyperlinkCollection $hyperlinks = new HyperlinkCollection(),
        private IntegrationObjectCollection $integrationObjects = new IntegrationObjectCollection(),
        private DeactivateElementCollection $deactivateElements = new DeactivateElementCollection(),
        private string $documentName = '',
        private string $clientTimestamp = '',
    ) {
    }

    public function getFields(): FieldCollection
    {
        return $this->fields;
    }

    public function getLines(): LineCollection
    {
        return $this->lines;
    }

    public function getChecks(): CheckCollection
    {
        return $this->checks;
    }

    public function getRadiobuttons(): RadiobuttonCollection
    {
        return $this->radiobuttons;
    }

    public function getSignatures(): SignatureCollection
    {
        return $this->signatures;
    }

    public function getTexts(): TextCollection
    {
        return $this->texts;
    }

    public function getAttachments(): AttachmentCollection
    {
        return $this->attachments;
    }

    public function getHyperlinks(): HyperlinkCollection
    {
        return $this->hyperlinks;
    }

    public function getIntegrationObjects(): IntegrationObjectCollection
    {
        return $this->integrationObjects;
    }

    public function getDeactivateElements(): DeactivateElementCollection
    {
        return $this->deactivateElements;
    }

    public function getDocumentName(): string
    {
        return $this->documentName;
    }

    public function getClientTimestamp(): string
    {
        return $this->clientTimestamp;
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
           'fields' => $this->getFields()->toArray(),
           'lines' => !is_null($this->getLines()) ? $this->getLines()->toArray() : null,
           'checks' => !is_null($this->getChecks()) ? $this->getChecks()->toArray() : null,
           'radiobuttons' => !is_null($this->getRadiobuttons()) ? $this->getRadiobuttons()->toArray() : null,
           'signatures' => !is_null($this->getSignatures()) ? $this->getSignatures()->toArray() : null,
           'texts' => !is_null($this->getTexts()) ? $this->getTexts()->toArray() : null,
           'attachments' => !is_null($this->getAttachments()) ? $this->getAttachments()->toArray() : null,
           'hyperlinks' => !is_null($this->getHyperlinks()) ? $this->getHyperlinks()->toArray() : null,
           'integration_objects' => !is_null($this->getIntegrationObjects())
               ? $this->getIntegrationObjects()->toArray()
               : null,
           'deactivate_elements' => !is_null($this->getDeactivateElements())
               ? $this->getDeactivateElements()->toArray()
               : null,
           'document_name' => $this->getDocumentName(),
           'client_timestamp' => $this->getClientTimestamp(),
        ];
    }
}
