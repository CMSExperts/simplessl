<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['connectToDB']['SimpleSSL'] = CMSExperts\SimpleSSL\Redirector::class . '->redirectCurrentDomainToHttps';
