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

namespace SignNow\Api\WebhookV2\Response;

use SignNow\Api\WebhookV2\Response\Data\Data\DataCollection;

readonly class EventSubscriptionsCallbacksAllGet
{
    public function __construct(
        private DataCollection $data = new DataCollection(),
    ) {
    }

    public function getData(): DataCollection
    {
        return $this->data;
    }
}
