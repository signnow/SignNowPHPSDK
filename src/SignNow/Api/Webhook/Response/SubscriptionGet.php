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

namespace SignNow\Api\Webhook\Response;

use SignNow\Api\Webhook\Response\Data\Data\DataSubscriptionCollection;

readonly class SubscriptionGet
{
    public function __construct(
        private DataSubscriptionCollection $data,
    ) {
    }

    public function getData(): DataSubscriptionCollection
    {
        return $this->data;
    }
}
