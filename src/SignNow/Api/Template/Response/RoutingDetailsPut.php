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

namespace SignNow\Api\Template\Response;

use SignNow\Api\Template\Response\Data\Data;
use SignNow\Api\Template\Response\Data\CcPutCollection;
use SignNow\Api\Template\Response\Data\CcStepPutCollection;
use SignNow\Api\Template\Response\Data\ViewerPutCollection;
use SignNow\Api\Template\Response\Data\ApproverPutCollection;
use SignNow\Api\Template\Response\Data\InviteLinkInstructionPutCollection;

readonly class RoutingDetailsPut
{
    public function __construct(
        private string $id,
        private string $documentId,
        private Data $data,
        private CcPutCollection $cc,
        private CcStepPutCollection $ccStep,
        private ViewerPutCollection $viewers,
        private ApproverPutCollection $approvers,
        private InviteLinkInstructionPutCollection $inviteLinkInstructions,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }

    public function getData(): Data
    {
        return $this->data;
    }

    public function getCc(): CcPutCollection
    {
        return $this->cc;
    }

    public function getCcStep(): CcStepPutCollection
    {
        return $this->ccStep;
    }

    public function getViewers(): ViewerPutCollection
    {
        return $this->viewers;
    }

    public function getApprovers(): ApproverPutCollection
    {
        return $this->approvers;
    }

    public function getInviteLinkInstructions(): InviteLinkInstructionPutCollection
    {
        return $this->inviteLinkInstructions;
    }
}
