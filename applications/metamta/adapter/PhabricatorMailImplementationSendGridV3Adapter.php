<?php

/**
 * SendGrid API v3 packaged implementation for Phabricator.
 * TODO: cleanup dependencies and make it a shorter package.
 *
 * @author    Vinícius Zani <@aldeia.io>
 * @copyright 2018 Aldeia (https://aldeia.io)
 * @license   https://opensource.org/licenses/MIT The MIT License
 */
final class PhabricatorMailImplementationSendGridV3Adapter
    extends PhabricatorMailImplementationAdapter {

    protected $mailer;
    protected $sendGrid;

    /**
     * Instantiates the objects to be used to send the emails.
     */
    public function __construct() {
        // load extensions
        require_once __DIR__ . '/lib/SendGrid.php';
        require_once __DIR__ . '/lib/Client.php';
        require_once __DIR__ . '/lib/Response.php';
        require_once __DIR__ . '/lib/helpers/mail/Mail.php';

        $this->mailer = new Mail();
        $this->sendGrid = new SendGrid(PhabricatorEnv::getEnvConfig('sendgrid3.api-key'));
    }

    public function supportsMessageIDHeader() {
        return true;
    }

    public function setFrom($email, $name = '') {
        $this->mailer->setFrom(new Email($name, $email));
        return $this;
    }

    public function addReplyTo($email, $name = '') {
        $this->mailer->setReplyTo(new ReplyTo($email, $name));
        return $this;
    }

    /**
     * Multiple destinations are supported through personalizations
     * in SendGrid's API.
     */
    public function addTos(array $emails) {
        $personalization = new Personalization();
        foreach ($emails as $email) {
        $personalization->addTo($email);
        }
        $this->mailer->addPersonalization($personalization);
        return $this;
    }

    public function addCCs(array $emails) {
        $personalization = new Personalization();
        foreach ($emails as $email) {
        $personalization->addCc($email);
        }
        $this->mailer->addPersonalization($personalization1);
        return $this;
    }

    public function addAttachment($data, $filename, $mimetype) {
        $attachment = new Attachment();

        $attachment->setContent($data);
        $attachment->setType($mimetype);
        $attachment->setFilename($filename);
        $attachment->setDisposition("attachment");
        $attachment->setContentId($filename);

        $this->mailer->addAttachment($attachment);
        return $this;
    }

    public function addHeader($header_name, $header_value) {
        if (strtolower($header_name) == 'message-id') {
        $this->mailer->addHeader("MessageID", $header_value);
        } else {
        $this->mailer->addHeader($header_name, $header_value);
        }
        return $this;
    }

    public function setBody($body) {
        $this->mailer->addContent(new Content("text/plain", $body));
        return $this;
    }

    public function setHTMLBody($html_body) {
        $this->mailer->addContent(new Content("text/html", $html_body));
        return $this;
    }

    public function setSubject($subject) {
        $this->mailer->setSubject($subject);
        return $this;
    }

    public function hasValidRecipients() {
        return true;
    }

    public function send() {
        // 2xx codes mean success
        $response = $this->sendGrid->client->mail()->send()->post($this->mailer);
        if ($response->statusCode() >= 200 && $response->statusCode() < 300) {
        return true;
        }
        return false;
    }
}
