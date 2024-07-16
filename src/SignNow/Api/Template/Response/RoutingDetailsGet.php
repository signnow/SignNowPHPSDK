<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response;

use SignNow\Api\Template\Response\Data\RoutingDetailGetCollection;
use SignNow\Api\Template\Response\Data\CcGetCollection;
use SignNow\Api\Template\Response\Data\CcStepGetCollection;
use SignNow\Api\Template\Response\Data\ViewerGetCollection;
use SignNow\Api\Template\Response\Data\ApproverGetCollection;
use SignNow\Api\Template\Response\Data\InviteLinkInstructionGetCollection;

readonly class RoutingDetailsGet
{
    public function __construct(
        private RoutingDetailGetCollection $routingDetails,
        private CcGetCollection $cc,
        private CcStepGetCollection $ccStep,
        private ViewerGetCollection $viewers,
        private ApproverGetCollection $approvers,
        private InviteLinkInstructionGetCollection $inviteLinkInstructions,
    ) {
    }

    public function getRoutingDetails(): RoutingDetailGetCollection
    {
        return $this->routingDetails;
    }

    public function getCc(): CcGetCollection
    {
        return $this->cc;
    }

    public function getCcStep(): CcStepGetCollection
    {
        return $this->ccStep;
    }

    public function getViewers(): ViewerGetCollection
    {
        return $this->viewers;
    }

    public function getApprovers(): ApproverGetCollection
    {
        return $this->approvers;
    }

    public function getInviteLinkInstructions(): InviteLinkInstructionGetCollection
    {
        return $this->inviteLinkInstructions;
    }
}
