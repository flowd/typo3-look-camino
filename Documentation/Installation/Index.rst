..  include:: /Includes.rst.txt

..  _installation:

============
Installation
============

..  _installation-requirements:

Requirements
============

*   TYPO3 14.3 or later, PHP 8.2 or later
*   :code:`typo3/theme-camino` and :code:`flowd/typo3-look` 1.1 or later,
    both installed automatically

Camino itself requires TYPO3 14, so this extension does too.

..  _installation-composer:

Install with Composer
=====================

..  code-block:: bash

    composer require flowd/typo3-look-camino
    vendor/bin/typo3 extension:setup

..  _installation-site-set:

Add the site set
================

Add the site set **Look previews for Camino** (:code:`flowd/typo3-look-camino`)
to your site under :guilabel:`Sites > Setup`, next to :guilabel:`Theme: Camino`.
The set depends on Camino's set, so it loads after it and replaces Camino's
preview configuration. Reload the page module.

No further configuration is needed.

..  _installation-fonts:

Web fonts
=========

Camino's web fonts are loaded cross-origin inside the preview frame. The web
server has to send :code:`Access-Control-Allow-Origin: *` for the path the
fonts come from, :file:`/_assets/*/Fonts/` in a Composer based installation.
Without the header the previews still work, they just use fallback fonts. See
`If your frontend uses web fonts <https://docs.typo3.org/p/flowd/typo3-look/main/en-us/Installation/Index.html#installation-webserver>`__
in the Look documentation.
