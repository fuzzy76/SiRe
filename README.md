# SiRe - Site Renderer

A small webapp in PHP for rendering a site from a backend of pages.

First version with Git repositories as backend and only supports
markdown / commonmark pages through static page look.

## Installation

Composer and all that stuff. Might provide complete tarballs at some
point. Requirements: Git and a non-EOL'd version of PHP.

For now, check out your default backend repo under data/backends/default.

Run from source with ```php -S localhost:8000 index.php```

## Plans
- Automatic checkout on empty repositories
- Use templating (plates or twig).
- .htaccess to run on apache
- Install procedure with composer create-project
- Support more backends (Evernote? Local directory? Scrape webpage? Dunno).
- Support edit-links to repository provider (autodetect GitHub / BitBucket).
- Support more filetypes (textile, html, txt, source code, etc).
- Page metadata header.
- YML config.
- Implement some special pages (all pages, etc).
- Implement search (backend-specific implementation).
- PHPUnit tests
