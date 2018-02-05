<?php

final class PhabricatorSendGridV3ConfigOptions
  extends PhabricatorApplicationConfigOptions {

  public function getName() {
    return pht('Integration with SendGrid, API v3');
  }

  public function getDescription() {
    return pht('Configure SendGrid API v3 integration.');
  }

  public function getIcon() {
    return 'fa-send-o';
  }

  public function getGroup() {
    return 'core';
  }

  public function getOptions() {
    return array(
      $this->newOption('sendgrid3.api-key', 'string', null)
        ->setLocked(true)
        ->setDescription(pht('SendGrid API key.')),
    );

  }

}

