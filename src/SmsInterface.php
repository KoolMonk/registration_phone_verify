<?php

namespace Drupal\registration_phone_verify;

/**
 * Handling send sms message.
 *
 * @package \Drupal\registration_phone_verify.
 */
interface SmsInterface {

  /**
   * Handling sent sms message.
   *
   * @param string $phone
   *   Receiver phone number.
   * @param string $message
   *   Receiver message.
   *
   * @return bool
   *   Return boolean.
   */
  public function send($phone, $message):bool;

}
