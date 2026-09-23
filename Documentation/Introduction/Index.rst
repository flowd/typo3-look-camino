..  include:: /Includes.rst.txt

..  _introduction:

============
Introduction
============

..  _what-it-does:

What does it do?
================

Camino ships its own previews for the page module: a text summary of the
element and, for images, thumbnails of the crop variants. Whether the headline
wraps, whether the coloured section fits the image above it, whether the button
sits right: the frontend shows that, the page module does not.

This extension replaces those summaries with the real thing. Every Camino
content type is rendered with the frontend templates, the stylesheet and the
colour scheme of the site and shown in the page module, scaled down to fit.

The extension works out of the box with Camino. It is just as much a showcase:
a complete, small example of how to wire Look into a TypoScript based theme,
with two Fluid templates and one page TSconfig file. If your site has its own
theme, copy the pattern into your site package instead of installing this
extension, see :ref:`own-project`.

..  figure:: /Images/HeroBefore.png
    :alt: Camino's preview of the hero element in the page module: headline and subline as bold text, below it five small crops of the image and a line with the link target
    :class: with-shadow

    The hero element of the start page as Camino shows it: the crop variants
    of the image as thumbnails.

..  figure:: /Images/Hero.jpg
    :alt: Look's preview of the same hero element: headline, subline and button on a light area, on the right the photo, as the frontend shows it
    :class: with-shadow

    The same element with Look: the element itself.

The whole page module changes with it. The page "Camino Route Comparison" from
the Camino demo content, on the left as Camino shows it, on the right with
Look:

..  figure:: /Images/PageModuleBefore.png
    :alt: The page module of a Camino page with Camino's own previews: hero with crop thumbnails, a text element as running text, text with image as a text block with a small map image, on the right the sidebar with author and text teaser as text
    :class: with-shadow

    Camino's previews.

..  figure:: /Images/PageModule.jpg
    :alt: The same page module with Look: hero with photo and headline, text element in the frontend layout, text with image with a list and a map, on the right the sidebar with the author card and a coloured text teaser
    :class: with-shadow

    The same page with Look.

..  _covered-elements:

Which elements are covered?
===========================

All content types Camino ships, and the three core types Camino styles:

*   :code:`camino_hero`, :code:`camino_hero_small`, :code:`camino_hero_text_only`
*   :code:`camino_textmedia_teaser`, :code:`camino_textmedia_teaser_grid`,
    :code:`camino_textteaser`
*   :code:`camino_author`, :code:`camino_testimonial`
*   :code:`camino_linklist`, :code:`camino_sociallinks`
*   :code:`text`, :code:`textmedia`, :code:`textpic`

A few examples of what the previews make visible:

..  figure:: /Images/TeaserGridBefore.png
    :alt: Camino's preview of a textmedia teaser grid: headline, intro text, link line and five teasers as plain text blocks in three columns
    :class: with-shadow

    Five teasers in a grid on a dark section. Camino's preview keeps a text
    list of them.

..  figure:: /Images/TeaserGrid.png
    :alt: Look's preview of the same teaser grid: dark brown section with serif headline, intro, button and five light cards, each with a more button
    :class: with-shadow

    The grid with Look.

..  figure:: /Images/TextpicBefore.png
    :alt: Camino's preview of a text with image element: headline, one long paragraph without list formatting and a small thumbnail of a map below
    :class: with-shadow

    Text with image. The list, the paragraphs and the size of the image are
    not visible in the summary.

..  figure:: /Images/Textpic.jpg
    :alt: Look's preview of the same element: serif headline, a list with distance, difficulty and target group, two paragraphs and below them the map of the Camino Francés in full width
    :class: with-shadow

    The same element with Look.

..  figure:: /Images/TextmediaTeaserBefore.png
    :alt: Camino's preview of a textmedia teaser in the narrow sidebar: headline, subline, running text and a small portrait thumbnail of a hilly landscape below
    :class: with-shadow

    A teaser in the narrow sidebar as Camino shows it.

..  figure:: /Images/TextmediaTeaser.jpg
    :alt: Look's preview of the same teaser: the landscape photo in full card width, below it the serif headline begins and disappears in a fade-out because the preview is limited in height
    :class: with-shadow

    The same teaser with Look, limited to 340 pixels. The fade-out shows that
    the element continues.

..  _colour-scheme:

The colour scheme of the site
=============================

Camino's colour scheme is a site setting (:code:`camino.colorScheme`). The
previews read it and render with the scheme the site uses. Switching the scheme
switches the previews.

..  figure:: /Images/Hero.jpg
    :alt: Hero element in the Look preview in the colour scheme Caramel Cream: light area, dark brown text, orange brown button
    :class: with-shadow

    Caramel Cream.

..  figure:: /Images/HeroForestMist.jpg
    :alt: The same hero element in the colour scheme Forest Mist: grey area, green button
    :class: with-shadow

    Forest Mist.

..  _edit-overlay:

Click to edit
=============

With Look's :code:`editOverlay` feature flag enabled, an edit button appears on
hover and opens the element for editing, see the
`Look documentation <https://docs.typo3.org/p/flowd/typo3-look/main/en-us/Configuration/Index.html>`__.

..  figure:: /Images/EditOverlay.jpg
    :alt: Look preview of a text with image element with a map, above the middle a round white edit icon that appears on hover
    :class: with-shadow

    The edit overlay on a Camino element.

..  _how-it-works:

How does it work?
=================

The extension is configuration only. Its site set brings the page TSconfig
that routes every Camino content type to one preview template. The template
hands the record to Look's view helper :code:`look:backend.contentPreview`,
which renders it with the frontend TypoScript of its page in a separate,
isolated request. Camino's templates, partials and data processors apply as on
the website, including overrides from your site package, and none of that PHP
runs inside the page module. See :ref:`configuration`.
