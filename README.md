# Sire - A databaseless site rendering engine

A small webapp in PHP for rendering a site from a backend of pages.

First version supports pages as markdown/commonmark and Git backend through [Plates](http://platesphp.com) templates.

## Installation

### Requirements
- [Composer](https://getcomposer.org)
- git command available from PHP
- PHP 5.4

### How to
1. ```composer create-project --stability dev fuzzy76/sire```
2. Copy config.default.php to config.php and edit the contents to suit your site.
3. Create a folder data/backend which PHP has write permissions for, and check out your backend inside (automated soon!).

Optionally add http://yoursite.com/sire/updatehook as a webhook to your Git provider. You can run directly from source with ```php -S localhost:8000 index.php```

## Roadmap

### v1.0
- Create homepage for Sire, with Sire.
- Real documentation?
- Use template engine for error pages
- Fix initial cloning for git backend
- Changeable themes

### v1.1 (or later)
- Page metadata header (title etc) for markdown.
- Support edit-links to repository provider (autodetect GitHub / BitBucket GIT repositories).
- Figure out a way to serve static files directly through .htaccess (atleast for some backends)
- Support more backends (Local directory and Evernote are both high on the list).
- Support more filetypes (textile, html, txt, source code, etc).
- Implement some special pages (all pages, etc).
- Implement search (backend-specific implementation).
- Better configuration format (YML?)
- PHPUnit tests
