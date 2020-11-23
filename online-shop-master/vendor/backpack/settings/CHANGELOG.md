# Changelog

All Notable changes to `Backpack Settings` will be documented in this file

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


## 2.0.5 - 2016-07-12

### Fixed
- Seeds had missing Field column for two demo entries.


## 2.0.4 - 2016-06-06

### Fixed
- Seeds had slashes, which caused installation problems for some users.


## 2.0.3 - 2016-06-02

### Fixed
- It did not load the correct field type on edit (from the db). Now it does.


## 2.0.2 - 2016-06-02

### Fixed
- Routes are now defined in the SettingsServiceProvider;
- Using the Admin middleware instead of Auth, as of Backpack\Base v0.6.0;


## 2.0.1 - 2016-05-20

### Fixed
- composer.json now requires Backpack\CRUD v2


## 2.0.0 - 2016-05-20

### Added
- SettingCrudController syntax changed to match the new API-based Backpack\CRUD v2.


## 1.2.3 - 2016-03-16

### Fixed
- Added page titles.


## 1.2.2 - 2016-03-11

### Fixed
- Changed folder structure to resemble a Laravel application - Http and Models are in an app folder.


## 1.2.1 - 2016-03-11

### Fixed
- Removed some more Dick mentions and fixed readme badges.


## 1.2.0 - 2016-03-11

### Fixed
- Changes namespaces to Backpack and removed every mention of Dick.


## 1.1.3 - 2015-09-10

### Fixed
- Namespacing and classes in seedfile, to allow seeding without publishing the assets.
