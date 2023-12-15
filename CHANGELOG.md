# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [v1.5.9] - 2023-12-11
### Added
- New fields for Embedded Invites
- Possibility to send custom User-Agent header

## [v1.5.8] - 2023-09-18
### Added
- Endpoints for uploading and getting user's initials
- Endpoints for uploading and getting user's signature

## [v1.5.7] - 2023-03-24
### Updated
- Fixed type of `invite_link_instructions` parameter in routing detail

## [v1.5.6] - 2023-02-28
### Added
- Action to modify document name

## [v1.5.5] - 2022-11-22
### Added
- Support move document 

## [v1.5.4] - 2022-10-19
### Added
- Support filling smart fields of document 

## [v1.5.3] - 2022-09-27
### Updated
- Fixed typo in the documentation (README.md)
- Support `null` at `link_expiration` parameter in embedded invite signing link

## [v1.5.2] - 2022-06-21
### Updated
- Field invite code example in README.md

## [v1.5.1] - 2022-05-06
### Added
- Properties expiration_days, subject, message to Invite object

## [v1.5.0] - 2021-12-22
### Added
- Actions for document, invites, document groups, event subscription, templates
- Functional tests
- Additional entities to make API calls more handy
- Embedded signing for document groups
- Prefill document text fields
- Upload a document using text tags which allow creating fillable fields in the document automatically
- Support of Webhooks 2.0
- The PHP script to try SignNow API

### Deleted
- Examples. Use tests instead.

## [v1.4.0] - 2021-10-13
### Added
- Embedded invite action
- OAuth action

## 1.3.0
### Changed
- Update rest-entity-manager package (Guzzle  v6)

## 1.2.0
### Changed
- Update rest-entity-manager package

## 1.1.0
### Changed
- User-Agent added to header

## 1.0.1
### Fixed
- Fixed incorrect example

## 1.0.0
### Added
- Initial stable release
