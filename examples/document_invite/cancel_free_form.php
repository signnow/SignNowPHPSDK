<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\DocumentInvite\Request\CancelFreeFormInvitePut;
use SignNow\Api\DocumentInvite\Response\CancelFreeFormInvitePut as CancelFreeFormInvitePutResponse;
use SignNow\ApiClient;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    // source data
    // you can use these IDs from the previous example ./free_form.php
    // by calling SignNow\Api\DocumentInvite\Response\FreeFormInvitePost::getId()
    $signatureRequestIdOrFreeFormInviteId = 'signature_request_id_or_free_form_invite_id';

    $request = new CancelFreeFormInvitePut(
        reason: 'Test cancel free form invite',
    );
    $request->withInviteId($signatureRequestIdOrFreeFormInviteId);
    /** @var CancelFreeFormInvitePutResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
