# Simple SSL Extension for TYPO3

This TYPO3 extension allows to simply activate SSL for a full domain.

The goals are simple for sure:
 * Security made simple.
 * Having HTTPS-only websites increases SEO rankings.
 * We wanted to create a helpful and useful tool for administrators to handle SSL for a full domain,
   and not just for a page (as TYPO3 ships by default).

## Requirements

A webserver with SSL enabled for a domain and - of course - a running TYPO3 instance.

## Installation

Install the extension via TER (extension key "simplessl") or composer (`composer require cmsexperts/simplessl`)
and make sure the Extension Manager has the extension activated.

Once this is done, feel free to configure your domain records via the list module and activate SSL for a specific
domain. Everything else is taken care of.

## Important notes

Because we want to make TYPO3 easier to use, this extension also disables the possibility to set the scheme on a
per page basis. If you already use this feature (pages.url_scheme) you should *not* use this extension, as the two
paradigma don't go along quite well.

## Contribute

Maintenance of the TYPO3 extension is handled by the CMS experts through this GitHub Repository.

Feel free to put any pull request to the repository, or put ideas in the issue tracker.

## Credits

* Benni Mack
* Matthias Stegmann