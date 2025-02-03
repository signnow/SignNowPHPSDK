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

namespace SignNow\Api\User\Response;

use SignNow\Api\User\Response\Data\EmailCollection;
use SignNow\Api\User\Response\Data\SubscriptionCollection;
use SignNow\Api\User\Response\Data\CloudExportAccountDetail;
use SignNow\Api\User\Response\Data\BillingPeriod;
use SignNow\Api\User\Response\Data\PremiumAccess\PremiumAccess;
use SignNow\Api\User\Response\Data\CompanyCollection;
use SignNow\Api\User\Response\Data\Team\TeamCollection;
use SignNow\Api\User\Response\Data\Status;
use SignNow\Api\User\Response\Data\Settings;
use SignNow\Api\User\Response\Data\OrganizationSettingsCollection;
use SignNow\Api\User\Response\Data\IssueNotificationCollection;
use SignNow\Api\User\Response\Data\MerchantAccount\MerchantAccountCollection;
use SignNow\Api\User\Response\Data\Organization;
use Symfony\Component\Serializer\Annotation\SerializedName;

readonly class UserGet
{
    public function __construct(
        private string $id,
        private string $firstName,
        private string $lastName,
        private string $active,
        private string $verified,
        private int $type,
        private int $pro,
        private string $created,
        private EmailCollection $emails,
        private string $primaryEmail,
        private SubscriptionCollection $subscriptions,
        private int $credits,
        private bool $hasAtticusAccess,
        private bool $isLoggedIn,
        private BillingPeriod $billingPeriod,
        private PremiumAccess $premiumAccess,
        private CompanyCollection $companies,
        private int $documentCount,
        private int $monthlyDocumentCount,
        private int $lifetimeDocumentCount,
        private TeamCollection $teams,
        #[SerializedName('googleapps')]
        private bool $googleApps,
        #[SerializedName('facebookapps')]
        private bool $facebookApps,
        #[SerializedName('microsoftapps')]
        private bool $microsoftApps,
        private Status $status,
        private Settings $settings,
        private OrganizationSettingsCollection $organizationSettings,
        private IssueNotificationCollection $issueNotifications,
        private MerchantAccountCollection $merchantAccounts,
        private ?CloudExportAccountDetail $cloudExportAccountDetails = null,
        private ?Organization $organization = null,
        private ?string $registrationSource = null,
        private ?string $avatarUrl = null,
        private ?string $signerPhoneInvite = null,
        private ?string $locale = null,
        private ?int $passwordChanged = null,
        private ?int $uploadLimit = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getActive(): string
    {
        return $this->active;
    }

    public function getVerified(): string
    {
        return $this->verified;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getPro(): int
    {
        return $this->pro;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getEmails(): EmailCollection
    {
        return $this->emails;
    }

    public function getPrimaryEmail(): string
    {
        return $this->primaryEmail;
    }

    public function getSubscriptions(): SubscriptionCollection
    {
        return $this->subscriptions;
    }

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function hasAtticusAccess(): bool
    {
        return $this->hasAtticusAccess;
    }

    public function getCloudExportAccountDetails(): ?CloudExportAccountDetail
    {
        return $this->cloudExportAccountDetails;
    }

    public function isLoggedIn(): bool
    {
        return $this->isLoggedIn;
    }

    public function getBillingPeriod(): BillingPeriod
    {
        return $this->billingPeriod;
    }

    public function getPremiumAccess(): PremiumAccess
    {
        return $this->premiumAccess;
    }

    public function getCompanies(): CompanyCollection
    {
        return $this->companies;
    }

    public function getDocumentCount(): int
    {
        return $this->documentCount;
    }

    public function getMonthlyDocumentCount(): int
    {
        return $this->monthlyDocumentCount;
    }

    public function getLifetimeDocumentCount(): int
    {
        return $this->lifetimeDocumentCount;
    }

    public function getTeams(): TeamCollection
    {
        return $this->teams;
    }

    public function hasGoogleApps(): bool
    {
        return $this->googleApps;
    }

    public function hasFacebookApps(): bool
    {
        return $this->facebookApps;
    }

    public function hasMicrosoftApps(): bool
    {
        return $this->microsoftApps;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getSettings(): Settings
    {
        return $this->settings;
    }

    public function getOrganizationSettings(): OrganizationSettingsCollection
    {
        return $this->organizationSettings;
    }

    public function getIssueNotifications(): IssueNotificationCollection
    {
        return $this->issueNotifications;
    }

    public function getMerchantAccounts(): MerchantAccountCollection
    {
        return $this->merchantAccounts;
    }

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function getRegistrationSource(): ?string
    {
        return $this->registrationSource;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function getSignerPhoneInvite(): ?string
    {
        return $this->signerPhoneInvite;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function getPasswordChanged(): ?int
    {
        return $this->passwordChanged;
    }

    public function getUploadLimit(): ?int
    {
        return $this->uploadLimit;
    }
}
