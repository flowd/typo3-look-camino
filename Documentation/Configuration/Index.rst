..  include:: /Includes.rst.txt

..  _configuration:

=============
Configuration
=============

..  _configuration-look:

Look's options apply
====================

Everything Look offers applies unchanged: the default scale and maximum
height of the previews in the extension configuration, and the feature flags
:code:`editOverlay` (click to edit), :code:`allowSiteScripts` (Camino's
JavaScript inside the frame) and :code:`allowMedia` (videos). See the
`Look documentation <https://docs.typo3.org/p/flowd/typo3-look/main/en-us/Configuration/Index.html>`__.

..  _configuration-templates:

The preview templates
=====================

The site set maps the Camino content types to two templates.

:file:`Resources/Private/Templates/Preview/Content.html` serves all types:

..  code-block:: html

    <look:backend.contentPreview
        record="{record}"
        bodyClass="{look:site.setting(pageUid: record.pid, name: 'camino.colorScheme')}"
        css="{0: 'EXT:theme_camino/Resources/Public/Css/main.css'}"
        js="{0: 'EXT:theme_camino/Resources/Public/JavaScript/main.js'}" />

*   :code:`record` makes Look render the element with the frontend TypoScript
    of its page in a separate request.
*   :code:`bodyClass` puts the colour scheme from the site settings on the body
    of the preview frame, as Camino does on the website.
*   :code:`css` and :code:`js` load Camino's stylesheet and script inside the
    frame. The script only runs when :code:`allowSiteScripts` is enabled.

:file:`Resources/Private/Templates/Preview/Teaser.html` is the same with
:code:`height="340"` and serves :code:`camino_textmedia_teaser`. Teasers in the
sidebar can get tall (image plus text); the fixed height keeps the page module
compact, the fade-out shows editors that the element continues.

..  _configuration-override:

Adjusting the mapping
=====================

The mapping is plain page TSconfig in the site set:

..  code-block:: typoscript
    :caption: Configuration/Sets/typo3-look-camino/page.tsconfig (excerpt)

    mod.web_layout.tt_content.preview {
      camino_hero = EXT:look_camino/Resources/Private/Templates/Preview/Content.html
      camino_textmedia_teaser = EXT:look_camino/Resources/Private/Templates/Preview/Teaser.html
    }

To change the height, the assets or the body class for one type, point that
type to a template of your site package in your own page TSconfig, which
loads after the set. To keep Camino's summary for a type, point the type back
to Camino's own preview template:

..  code-block:: typoscript

    mod.web_layout.tt_content.preview.camino_sociallinks = EXT:theme_camino/Resources/Private/Templates/ContentPreviews/Linklist.fluid.html

..  _own-project:

Using the pattern in your own project
=====================================

For a theme other than Camino, take the three pieces of this extension and
adjust them in your site package:

#.  A preview template that hands the record to Look and loads the stylesheet
    of your theme (:code:`css`, optionally :code:`js` and :code:`bodyClass`).
#.  Page TSconfig that maps your content types to that template via
    :typoscript:`mod.web_layout.tt_content.preview.<CType>`.
#.  A site set, or your existing one, that ships the TSconfig.

Nothing else is needed; this extension has no PHP. The
`Look documentation <https://docs.typo3.org/p/flowd/typo3-look/main/en-us/Usage/Index.html>`__
explains the view helper arguments and when to prefer Content Blocks with
Fluid Components instead of the TypoScript way.
