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

namespace SignNow\Api\DocumentInvite\Request;

use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\RequestInterface;

#[Endpoint(
    name: 'cancelFreeFormInvite',
    url: '/invite/{invite_id}/cancel',
    method: 'put',
    auth: 'bearer',
    namespace: 'documentInvite',
    entity: 'cancelFreeFormInvite',
    type: 'application/json',
)]
final class CancelFreeFormInvitePut implements RequestInterface
{
    private array $uriParams = [];

    public function __construct(
        private string $reason = '',
    ) {
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function withInviteId(string $inviteId): self
    {
        $this->uriParams['invite_id'] = $inviteId;

        return $this;
    }

    public function uriParams(): array
    {
        return $this->uriParams;
    }

    public function toArray(): array
    {
        return [
           'reason' => $this->getReason(),
        ];
    }
}
