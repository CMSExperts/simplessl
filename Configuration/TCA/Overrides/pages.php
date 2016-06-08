<?php

// remove "url_scheme" from pages to make the interface cleaner for editors
if (isset($GLOBALS['TCA']['pages']['columns']['url_scheme'])) {
    unset($GLOBALS['TCA']['pages']['columns']['url_scheme']);
}
