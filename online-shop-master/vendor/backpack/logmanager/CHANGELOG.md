# Changelog

All Notable changes to `LogManager` will be documented in this file

## NEXT - YYYY-MM-DD

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing


## [2.3.5] - 2016-06-02

### Fixed
- Using the Admin middleware instead of Auth, as of Backpack\Base v0.6.0;
- Moved routes definition to LogManagerServiceProvider instead of routes.php file;


## [2.3.4] - 2016-03-16

### Fixed
- Added page title.


## [2.3.3] - 2016-03-12

### Fixed
- Lang files are pushed in the correct folder now. For realsies.


## 2.3.2 - 2016-03-12

### Fixed
- language files are published in the correct folder, no /vendor/ subfolder


## 2.3.1 - 2016-03-10

### Fixed
- In views, switched to one header section instead of separate sections for page title and breadcrumbs.


## 2.3.0 - 2016-03-10

### Added
- Working notification bubbles (alerts).

## 2.2.1 - 2016-03-10

### Fixed
- Changed BackPack\Base requirement in composer.json to ^0.2


## 2.2.0 - 2016-03-04

### Fixed
- Changed base layout usage to work with BackPack\Base 0.4.x


## 2.1.1 - 2016-03-04

### Fixed
- "The log file doesn't exist." error message wasn't in the lang files. Now it is.


## 2.1.0 - STABLE - 2016-03-04

### Security
- Log pages now need the user to be authenticated.

### Fixed
- Changed directory structure to resemble Laravel: Http folder is inside an app folder now.


## 2.0.1 - 2016-03-03

### Fixed
- Removed screenshots from readme file.
- Added backpack/base dependency.


## 2.0.0 - 2016-03-03

### Fixed
- Made it work on Backpack instead of Dick.