<?php

declare(strict_types=1);

namespace SignNow\Api\Action\Data\EventSubscription\V2;

/**
 * Class EventsList
 *
 * @package SignNow\Api\Action\Data\EventSubscription\V2
 */
class EventsList
{
    /**
     * Document events
     */
    public const DOCUMENT_FIELD_INVITE_CREATE = 'document.fieldinvite.create';
    public const DOCUMENT_FIELD_INVITE_DECLINE = 'document.fieldinvite.decline';
    public const DOCUMENT_FIELD_INVITE_DELETE = 'document.fieldinvite.delete';
    public const DOCUMENT_FIELD_INVITE_REASSIGN = 'document.fieldinvite.reassign';
    public const DOCUMENT_FIELD_INVITE_SENT = 'document.fieldinvite.sent';
    public const DOCUMENT_FIELD_INVITE_SIGNED = 'document.fieldinvite.signed';
    public const DOCUMENT_FIELD_INVITE_REPLACE = 'document.fieldinvite.replace';
    public const DOCUMENT_FREE_FORM_CREATE = 'document.freeform.create';
    public const DOCUMENT_FREE_FORM_SIGNED = 'document.freeform.signed';
    public const DOCUMENT_COMPLETE = 'document.complete';
    public const DOCUMENT_DELETE = 'document.delete';
    public const DOCUMENT_OPEN = 'document.open';
    public const DOCUMENT_UPDATE = 'document.update';
    public const TEMPLATE_CREATE_DOCUMENT = 'template.copy';

    /**
     * User events
     */
    public const USER_DOCUMENT_FIELD_INVITE_CREATE = 'user.document.fieldinvite.create';
    public const USER_DOCUMENT_FIELD_INVITE_DECLINE = 'user.document.fieldinvite.decline';
    public const USER_DOCUMENT_FIELD_INVITE_DELETE = 'user.document.fieldinvite.delete';
    public const USER_DOCUMENT_FIELD_INVITE_REASSIGN = 'user.document.fieldinvite.reassign';
    public const USER_DOCUMENT_FIELD_INVITE_SENT = 'user.document.fieldinvite.sent';
    public const USER_DOCUMENT_FIELD_INVITE_SIGNED = 'user.document.fieldinvite.signed';
    public const USER_DOCUMENT_FIELD_INVITE_REPLACE = 'user.document.fieldinvite.replace';
    public const USER_DOCUMENT_FREE_FORM_CREATE = 'user.document.freeform.create';
    public const USER_DOCUMENT_FREE_FORM_SIGNED = 'user.document.freeform.signed';
    public const USER_DOCUMENT_COMPLETE = 'user.document.complete';
    public const USER_DOCUMENT_CREATE = 'user.document.create';
    public const USER_DOCUMENT_DELETE = 'user.document.delete';
    public const USER_DOCUMENT_OPEN = 'user.document.open';
    public const USER_DOCUMENT_UPDATE = 'user.document.update';
    public const USER_TEMPLATE_CREATE_DOCUMENT = 'user.template.copy';
    public const TEAM_MEMBER_DELETE = 'team.member.delete';
    public const TEAM_MEMBER_INVITE = 'team.member.invite';
    public const DOCUMENT_INVITE_CANCEL = 'document.invite.cancel';
    public const DOCUMENT_INVITE_SENT = 'document.invite.sent';
    public const DOCUMENT_INVITE_SIGNED = 'document.invite.signed';
    public const DOCUMENT_INVITE_DECLINED = 'document.invite.declined';
    public const DOCUMENT_INVITE_REMINDER_SENT = 'document.invite.reminder.sent';
    public const DOCUMENT_GROUP_INVITE_SENT = 'document_group.invite.sent';
    public const DOCUMENT_COUNT_UNSENT = 'document.count.unsent';
}
