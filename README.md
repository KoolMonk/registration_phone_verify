# Drupal registration form phone verification

Drupal custom module for phone verification on new user registration, using SMS `Twilio` Service.

## HOW TO INSTALL

- Go to 'modules/custom' and git clone https://github.com/KoolMonk/registration_phone_verify.git or download module files and put folder (registration_phone_verify) at path `modules/custom`.

- At you project's root 'composer.json' add to "repositories" as follow.

```php
    "repositories": [
    {
        "type": "path",
        "url": "modules/custom/registration_phone_verify"
    }
],
```

- At you project's root run following command to download dependencies (Twilio) that will go in your project's root 'vendor' folder.

```bash
composer require drupal/registration_phone_verify
```
- Go to '/admin/modules' and install 'Registration Phone Verify' module

## HOW TO CONFIGURE
Go to twilio.com and signup for a trial account. 
1. get 'Sender ID' from twilio account 
2. get 'Auth Token' from twilio account 
3. get 'Provider phone number' from twilio account

Please go to `/admin/config/system/twilio-otp-verify` to explore the configuration. Fill out the form with above mentioned (Sender ID, Auth Token, Provider phone number) obtained from twilio trial account. Also set 'Verification Message' as per your needs.

## Note
Its a very basic module to explain and implement Twilio integration with Drupal 8. You can modify it as per your needs. This will send SMS to only a twilio verified phone number, if you want to test it with an unverified number you should purchase account at twilio instead of using a trial account.


