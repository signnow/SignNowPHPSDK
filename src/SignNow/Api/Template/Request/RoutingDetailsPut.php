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

namespace SignNow\Api\Template\Request;

use SignNow\Api\Template\Request\Data\TemplateDataPut;
use SignNow\Api\Template\Request\Data\TemplateDataObjectPutCollection;
use SignNow\Api\Template\Request\Data\CcPutCollection;
use SignNow\Api\Template\Request\Data\CcStepPutCollection;
use SignNow\Api\Template\Request\Data\ViewerPutCollection;
use SignNow\Api\Template\Request\Data\ApproverPutCollection;
use SignNow\Api\Template\Request\Data\InviteLinkInstructionPutCollection;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'updateRoutingDetails',
    url: '/document/{document_id}/template/routing/detail',
    method: 'put',
    auth: 'bearer',
    namespace: 'template',
    entity: 'routingDetails',
    type: 'application/json',
)]
final class RoutingDetailsPut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private ?TemplateDataPut $templateData = null,
        private ?TemplateDataObjectPutCollection $templateDataObject = new TemplateDataObjectPutCollection(),
        private ?CcPutCollection $cc = new CcPutCollection(),
        private ?CcStepPutCollection $ccStep = new CcStepPutCollection(),
        private ?ViewerPutCollection $viewers = new ViewerPutCollection(),
        private ?ApproverPutCollection $approvers = new ApproverPutCollection(),
        private ?InviteLinkInstructionPutCollection $inviteLinkInstructions = new InviteLinkInstructionPutCollection(),
    ) {
    }

    public function getTemplateData(): ?TemplateDataPut
    {
        return $this->templateData;
    }

    public function getTemplateDataObject(): ?TemplateDataObjectPutCollection
    {
        return $this->templateDataObject;
    }

    public function getCc(): ?CcPutCollection
    {
        return $this->cc;
    }

    public function getCcStep(): ?CcStepPutCollection
    {
        return $this->ccStep;
    }

    public function getViewers(): ?ViewerPutCollection
    {
        return $this->viewers;
    }

    public function getApprovers(): ?ApproverPutCollection
    {
        return $this->approvers;
    }

    public function getInviteLinkInstructions(): ?InviteLinkInstructionPutCollection
    {
        return $this->inviteLinkInstructions;
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
           'template_data' => !is_null($this->getTemplateData()) ? $this->getTemplateData()->toArray() : null,
           'template_data_object' => !is_null($this->getTemplateDataObject())
               ? $this->getTemplateDataObject()->toArray()
               : null,
           'cc' => !is_null($this->getCc()) ? $this->getCc()->toArray() : null,
           'cc_step' => !is_null($this->getCcStep()) ? $this->getCcStep()->toArray() : null,
           'viewers' => !is_null($this->getViewers()) ? $this->getViewers()->toArray() : null,
           'approvers' => !is_null($this->getApprovers())
               ? $this->getApprovers()->toArray()
               : null,
           'invite_link_instructions' => !is_null($this->getInviteLinkInstructions())
               ? $this->getInviteLinkInstructions()->toArray()
               : null,
        ];
    }
}
