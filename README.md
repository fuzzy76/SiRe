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
- Support edit-links to repository provider (autodetect GitHub / BitBucket GIT repositories).
- Check that installation with composer create-project works, and write a tutorial based on it.
- Create homepage for Sire, with Sire.
- Use template engine for error pages
- Fix initial cloning for git backend
- Page metadata header (title etc) for markdown.
- Figure out a way to serve static files directly through .htaccess (atleast for some backends)
- Support more backends (Local directory and Evernote are both high on the list).
- Support more filetypes (textile, html, txt, source code, etc).
- Implement some special pages (all pages, etc).
- Implement search (backend-specific implementation).
- Better configuration format (YML?)
- PHPUnit tests

