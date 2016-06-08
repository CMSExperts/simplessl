<?php

// add a new field "forcessl" to "sys_domain"
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_domain', [
    'forcessl' => [
        'label' => 'LLL:EXT:simplessl/Resources/Private/Language/db.xlf:sys_domain.forcessl',
        'exclude' => true,
        'config' => [
            'type' => 'check'
        ]
    ]
]);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'sys_domain',
    'forcessl',
    '',
    'after:domainName'
);