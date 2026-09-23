# Look previews for the TYPO3 Camino theme

Real frontend previews in the TYPO3 page module for the content elements of
[Camino](https://docs.typo3.org/c/typo3/theme-camino/main/en-us/), the default
theme of TYPO3 v14. Built on [Look](https://github.com/flowd/typo3-look)
(`flowd/typo3-look`).

Editors see hero, teaser grid, text teaser, author card and the other Camino
elements in the page module exactly as the website renders them, inside Look's
isolated preview frame. Camino's own previews (text summaries and crop
thumbnails) are replaced for all content types the theme ships.

## Requirements

- TYPO3 14.3 or later, PHP 8.2 or later
- `typo3/theme-camino` and `flowd/typo3-look`, both installed automatically

Camino itself requires TYPO3 14, so this extension does too.

## Installation

```bash
composer require flowd/typo3-look-camino
vendor/bin/typo3 extension:setup
```

Add the site set **Look previews for Camino** (`flowd/typo3-look-camino`) to your
site under *Sites > Setup*, next to *Theme: Camino*. The set brings the page
TSconfig that routes the Camino content types to the Look preview. No further
configuration is needed. Reload the page module.

## How it works

The extension is configuration only. Its site set maps every Camino content
type to one preview template (`Resources/Private/Templates/Preview/Content.html`):

```html
<look:backend.contentPreview
    record="{record}"
    bodyClass="{look:site.setting(pageUid: record.pid, name: 'camino.colorScheme')}"
    css="{0: 'EXT:theme_camino/Resources/Public/Css/main.css'}"
    js="{0: 'EXT:theme_camino/Resources/Public/JavaScript/main.js'}" />
```

With `record`, Look renders the element with the frontend TypoScript of its
page in a separate request, so Camino's templates, partials and data
processors apply as on the website, including overrides from your site
package, and none of that PHP runs inside the page module. `look:site.setting`
puts the colour scheme from the site settings on the body of the preview
frame, so switching the scheme switches the previews. Sidebar teasers get a
second template (`Teaser.html`) with a fixed height, as an example of a
per-type setting.

## Options

Look's extension configuration and feature flags apply unchanged: scale and
maximum height of the previews, `editOverlay` for click-to-edit,
`allowSiteScripts` for Camino's JavaScript inside the frame, `allowMedia` for
videos. See the [Look documentation](https://docs.typo3.org/p/flowd/typo3-look/main/en-us/).

Camino's web fonts are loaded cross-origin inside the preview frame. The web
server has to send `Access-Control-Allow-Origin` for
`/_assets/*/Fonts/`, see *Installation* in the Look documentation.

## License

GPL-2.0-or-later. Made by [Flowd GmbH](https://www.flowd.de).
