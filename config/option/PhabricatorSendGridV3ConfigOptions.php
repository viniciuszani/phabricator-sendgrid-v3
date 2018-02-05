<?php

/**
  * SendGrid API v3 packaged implementation for Phabricator.
  *
  * @author    Vinícius Zani <@aldeia.io>
  * @copyright 2018 Aldeia (https://aldeia.io)
  * @license   https://opensource.org/licenses/MIT The MIT License
  */
final class PhabricatorSendGridV3ConfigOptions
    extends PhabricatorApplicationConfigOptions {

    public function getName() {
        return pht('Integration with SendGrid using API v3');
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
            ->setHidden(true)
            ->setDescription(pht('SendGrid API key.')),
        );
    }
}

