<?php

use Examples\Auth\AuthorizationCodeExample;
use Examples\Auth\AuthorizationPasswordExample;
use Examples\Auth\AuthorizationRefreshTokenExample;
use Examples\Document\Upload\UploadExample;
use Examples\Document\AddFieldsExample;
use Examples\EventSubscription\CreateUserEventSubscriptionExample;
use Examples\EventSubscription\DeleteUserEventSubscriptionExample;
use Examples\EventSubscription\GetUserEventSubscriptionsExample;
use Examples\FreeForm\FreeFormInviteExample;
use Examples\Invite\InviteExample;
use Examples\Invite\CancelInviteExample;
use Examples\Invite\SigningLinkExample;

return [
    'map' => [
        'auth_code' => AuthorizationCodeExample::class,
        'password' => AuthorizationPasswordExample::class,
        'refresh_token' => AuthorizationRefreshTokenExample::class,
        'add_fields' => AddFieldsExample::class,
        'field_invite' => InviteExample::class,
        'upload' => UploadExample::class,
        'free_form_invite' => FreeFormInviteExample::class,
        'cancel_invite' => CancelInviteExample::class,
        'signing_link' => SigningLinkExample::class,
        'get_event_subscription' => GetUserEventSubscriptionsExample::class,
        'create_event_subscription' => CreateUserEventSubscriptionExample::class,
        'delete_event_subscription' => DeleteUserEventSubscriptionExample::class,
    ],
    'parameters' => [
        'authtype' => 'YOUR_AUTHORIZATION_TYPE',
        'token' => 'YOUR_TOKEN',
        'host' => 'HOSTNAME',
        'username' => 'USERNAME',
        'password' => 'USER_PASSWORD',
        'scope' => 'ACCESS_SCOPE',
        'code' => "AUTHORIZATION_CODE",
        'refresh_token' => 'REFRESH_TOKEN',
    ],
];
