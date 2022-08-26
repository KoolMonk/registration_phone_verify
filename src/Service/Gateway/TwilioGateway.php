<?php

namespace Drupal\registration_phone_verify\Service\Gateway;

use Drupal\registration_phone_verify\SmsInterface;
use Twilio\Rest\Client;

/**
 * Handling Twilio sms gateway.
 *
 * @package Drupal\registration_phone_verify\Service\SMSGateways.
 */
class TwilioGateway implements SmsInterface {

  /**
   * Send sms message using twilio gateway.
   *
   * @param string $phone
   *   User phone number.
   * @param string $message
   *   Message text.
   *
   * @return bool
   *   Return boolean.
   *
   * @throws \Exception
   */
  public function send($phone, $message = ''): bool {
    try {
      $config = \Drupal::config('registration_phone_verify.settings');
      // Your Account SID from www.twilio.com/console.
      $sid = $config->get('registration_phone_verify.sender_id');
      // Your Auth Token from www.twilio.com/console.
      $token = $config->get('registration_phone_verify.token');
      // From a valid Twilio number.
      $provider = $config->get('registration_phone_verify.provider_number');

      if (is_null($sid) || is_null($token) || is_null($provider)) {
        throw new \Exception(t('Invalid gateway configurations'));
      }
      $client = new Client($sid, $token);
      $message = $client->messages->create(
        $phone,
        [
          'from' => $provider,
          'body' => $message,
        ]
      );
      if ($message->sid) {
        return TRUE;
      }
    }
    catch (\Exception $ex) {
      \Drupal::messenger()->addError($ex->getMessage());
    }
    return FALSE;
  }

}
