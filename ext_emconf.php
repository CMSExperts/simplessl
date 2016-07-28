<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "simplessl".
 *
 * Auto generated 08-06-2016 17:46
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Simple SSL',
	'description' => 'Allows to set domains to redirect to SSL. Also disables the page-specific scheme enforcing for simplicity reasons.',
	'category' => 'fe',
	'author' => 'CMS Experts',
	'author_email' => 'benni@typo3.org',
	'dependencies' => 'frontend',
	'conflicts' => '',
	'priority' => '',
	'state' => 'stable',
	'version' => '1.0.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-8.9.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
