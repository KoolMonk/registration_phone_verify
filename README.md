# Drupal registration form phone verification

Drupal custom module for phone verification on new user registration, using sms `Twilio` gateway.

## Installation

- download module files and set folder in path `modules\custom`.
- go to your project root and add to `composer.json` with code.


    "repositories": [
    {
        "type": "path",
        "url": "modules/custom/registration_phone_verify"
    }
],

- run this command to download dependencies.

```bash
composer require drupal/registration_phone_verify
```
go to '/admin/modules' and install 'Registration Phone Verify' module

## CONFIGURATIONS

Please go to `/admin/config/system/twilio-otp-verify` to explore the configuration
options of the widget.

## UNINSTALL

Just uninstall the module since the connector.


