<?php

/**
 * SendGrid API v3 packaged implementation for Phabricator.
 * This file was NOT generated by arc.
 * 
 * @author    Vinícius Zani <@aldeia.io>
 * @copyright 2018 Aldeia (https://aldeia.io)
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

 phutil_register_library_map(array(
	'__library_version__' => 2,
	'class' => array(
		"PhabricatorMailImplementationSendGridV3Adapter" => "applications/metamta/adapter/PhabricatorMailImplementationSendGridV3Adapter.php",
		"PhabricatorSendGridV3ConfigOptions" => "applications/config/option/PhabricatorSendGridV3ConfigOptions.php",
		"Mail" => "applications/metamta/adapter/lib/helpers/mail/Mail.php",
		"Client" => "applications/metamta/adapter/lib/Client.php",
		"Response" => "applications/metamta/adapter/lib/Response.php",
		"SendGrid" => "applications/metamta/adapter/lib/SendGrid.php",
	),
  	'function' => array(),
  	'xmap' => array(
		"PhabricatorMailImplementationSendGridV3Adapter" => "PhabricatorMailImplementationAdapter",
		"PhabricatorSendGridV3ConfigOptions" => "PhabricatorApplicationConfigOptions",
  	),
));
