<?php

declare(strict_types=1);

namespace SignNow\Api\Template\Response;

use SignNow\Api\Template\Response\Data\RoutingDetailPostCollection;
use SignNow\Api\Template\Response\Data\CcPostCollection;
use SignNow\Api\Template\Response\Data\CcStepPostCollection;
use SignNow\Api\Template\Response\Data\ViewerPostCollection;
use SignNow\Api\Template\Response\Data\ApproverPostCollection;
use SignNow\Api\Template\Response\Data\InviteLinkInstructionPostCollection;

readonly class RoutingDetailsPost
{
    public function __construct(
        private RoutingDetailPostCollection $routingDetails,
        private CcPostCollection $cc = new CcPostCollection(),
        private CcStepPostCollection $ccStep = new CcStepPostCollection(),
        private ViewerPostCollection $viewers = new ViewerPostCollection(),
        private ApproverPostCollection $approvers = new ApproverPostCollection(),
        private InviteLinkInstructionPostCollection $inviteLinkInstructions = new InviteLinkInstructionPostCollection(),
    ) {
    }

    public function getRoutingDetails(): RoutingDetailPostCollection
    {
        return $this->routingDetails;
    }

    public function getCc(): CcPostCollection
    {
        return $this->cc;
    }

    public function getCcStep(): CcStepPostCollection
    {
        return $this->ccStep;
    }

    public function getViewers(): ViewerPostCollection
    {
        return $this->viewers;
    }

    public function getApprovers(): ApproverPostCollection
    {
        return $this->approvers;
    }

    public function getInviteLinkInstructions(): InviteLinkInstructionPostCollection
    {
        return $this->inviteLinkInstructions;
    }
}
