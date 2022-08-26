<?php

namespace Drupal\registration_phone_verify\Service;

use Drupal\registration_phone_verify\Service\Gateway\TwilioGateway;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Handler sms gateways messages.
 *
 * @package Drupal\registration_phone_verify\Service.
 */
class SmsService {
  /**
   * Drupal\registration_phone_verify\Service\SMSGateways\TwilioGateway definition.
   *
   * @var Drupal\registration_phone_verify\Service\Gateway\TwilioGateway
   */
  private $smsGateway;

  /**
   * Constructor.
   *
   * @param Drupal\registration_phone_verify\Service\Gateway\TwilioGateway $smsGateway
   *   Sms gateway type.
   */
  public function __construct(TwilioGateway $smsGateway) {
    $this->smsGateway = $smsGateway;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('registration_phone_verify.twilio')
    );
  }

  /**
   * Send sms message to user phone with verification message.
   *
   * @param string $phone
   *   User phone number.
   * @param string $message
   *   Verification message context.
   *
   * @throws \Exception
   */
  public function sendSmsMessage($phone, $message): bool {
    return $this->smsGateway->send($phone, $message);
  }

}
