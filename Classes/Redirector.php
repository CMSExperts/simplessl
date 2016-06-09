<?php
namespace CMSExperts\SimpleSSL;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Class Redirector
 */
class Redirector
{
    /**
     * Checks if the sys_domain record for this domain has the forceSSL option
     * enabled, and redirects to the https:// version of the URL.
     *
     * @param array $parameters
     * @param TypoScriptFrontendController $parentObject
     */
    public function redirectCurrentDomainToHttps($parameters, $parentObject)
    {
        // SSL is active, nothing to be done
        if (GeneralUtility::getIndpEnv('TYPO3_SSL')) {
            return;
        }
        $domain = explode(':', GeneralUtility::getIndpEnv('HTTP_HOST'));
        $domain = strtolower(preg_replace('/\\.$/', '', $domain[0]));
        // Removing extra trailing slashes from path
        $path = GeneralUtility::getIndpEnv('SCRIPT_NAME');
        $path = trim(preg_replace('/\\/[^\\/]*$/', '', $path));

        $domain = preg_replace('/\\/*$/', '', $domain . $path);
        $databaseRecord = $this->getDatabaseConnection()->exec_SELECTgetSingleRow(
            'domainName,forcessl,redirectTo',
            'sys_domain',
            'hidden=0 AND redirectTo="" AND forcessl=1 AND (domainName='
            . $this->getDatabaseConnection()->fullQuoteStr($domain, 'sys_domain')
            . ' OR domainName=' . $this->getDatabaseConnection()->fullQuoteStr($domain . '/', 'sys_domain')
            . ')'
        );
        if (is_array($databaseRecord)) {
            // exchange http:// with https:// and keep everything else
            $currentUrl = GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL');
            if (strpos($currentUrl, 'http://') === 0) {
                $currentUrlWithSsl = 'https://' . substr($currentUrl, 7);
                HttpUtility::redirect($currentUrlWithSsl);
            }
        }
    }

    /**
     * @return DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }
}
