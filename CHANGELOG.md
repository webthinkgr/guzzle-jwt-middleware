# Changelog

All Notable changes to `webthink/guzzle-jwt` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## v0.4.0 - 2018-06-25

### Changed
- Change the minimum required version of guzzle from `^6.2` to `6.*`
- Fixed the alias version in composer.

## v0.3.0 - 2017-09-14

### Bug
- Function that was calculating the timeout token if it was valid was wrong.

## v0.2.0 - 2017-09-14

### Changed
- **BC CHANGE** Renamed the `TokenRequestException` to `BadTokenRequestException` and made it extend `RequestException`
and not `BadResponseException`. Bad Response exception is reserved by Guzzle for 4xx and 5xx code and not if the server
returned 2xx but the token was invalid. 

## v0.1.0 - 2017-08-02.

### Added
- Created the initial functionality.
