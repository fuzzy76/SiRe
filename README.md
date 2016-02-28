# Sire - A databaseless site rendering engine

A small webapp in PHP for rendering a site from a backend of pages.

First version with Git repositories as backend and only supports
markdown / commonmark pages through static page look.

## Installation

Clone and install dependencies with composer. I might provide complete
tarballs at some point. Requirements: Git and a non-EOL'd version of
PHP.

For now, check out your default backend repo under data/backend (this
part will improve soon).

Run from source with ```php -S localhost:8000 index.php```

## Plans
(in prioritized order)
- Use a templating system (plates or twig).
- Include a .htaccess file for hosting on Apache
- Automatic checkout of git backends
- Check that installation with composer create-project works, and write a tutorial based on it.
- Support edit-links to repository provider (autodetect GitHub / BitBucket GIT repositories).
- Support static filetype fallback (unidentified files served "as-is" with proper mimetype)
- Page metadata header (title etc).
- Create homepage for Sire, with Sire.
- Support more backends (Local directory and Evernote are both high on the list).
- Support more filetypes (textile, html, txt, source code, etc).
- Implement some special pages (all pages, etc).
- Implement search (backend-specific implementation).
- Better configuration format (YML?)
- PHPUnit tests
