=== Simple Google Docs Viewer ===
Contributors: maor, illuminea
Tags: google-docs, embed-pdf, documents
Requires at least: 3.0
Tested up to: 3.5
Stable tag: 1.0
License: GPLv2 or later

Enables you to easily embed documents with Google Docs Viewer - that are supported by Google Docs (PDF/DOC/DOCX/PPTX/etc).

== Description ==

Enables you to easily embed documents with Google Docs Viewer - that are supported by Google Docs (PDF/DOC/DOCX/PPTX/etc) with a simple shortcode. `[gviewer]`

A full list of attributes:

* `file` -- __Required__. The URL of the file you wish to show
* `width` -- Optional. The desired width of the viewer in pixels. If nothing set, the value of the theme's `$content_width` will be used. If no value set, the height of 600 pixels will be used.
* `height` -- Optional. The desired height of the viewer in pixels. If nothing set, the height will 1.2 times the width. So for instance, if the width was 100px, the height will be 120px.
* `language` -- The language of the document. If the document is written in a RTL language (Hebrew, Arabic, etc) then specifying the language will also apply right-to-left settings.

A yet another way to embed a Google Document is possible by using the template tag provided by the plugin. Here's an example.

`
<?php

echo simple_gviewer_embed( 'http://.../file.pdf', $args );
`

The second argument, `$args`, is an associative array. Keys can be found in the list above.

= Short Demonstration =

[youtube http://www.youtube.com/watch?v=aU1Ekd2D-kI]

== Installation ==

Add via the plugin installer, or download the ZIP file and upload from the "Upload" tab.

== Screenshots ==

1. What the shortcode translates to on the front-end
2. A sample use of the "gviewer" shortcode

== Changelog ==

= 1.0 =

* Initial release