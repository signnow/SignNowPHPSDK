# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).
## [v2.2.4] - 2022-10-19
### Added
- Support filling smart fields of document  

## [v2.2.3] - 2022-09-27
### Updated
- Fixed typo in the documentation (README.md)
- Support `null` at `link_expiration` parameter in embedded invite signing link

## [v2.2.2] - 2022-06-21
### Updated
- Example of code to create field invite 

## [v2.2.1] - 2022-05-06

### Added
- Parameters expiration_days, subject, message to Invite object

## [v2.2.0] - 2021-12-22
### Added
- Actions for document, invites, document groups, event subscription, templates
- Functional tests
- Additional entities to make API calls more handy
- Upload a document using text tags which allow creating fillable fields in the document automatically
- Support of Webhooks 2.0
- Embedded signing for document groups
- Prefill document text fields
- The PHP script to try SignNow API

### Deleted
- Examples. Use tests instead.

## [v2.1.0] - 2021-10-13
### Added
- Embedded invite action
- OAuth action

## 2.0.0
### Changed
- Update rest-entity-manager package (Guzzle v7) 

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
