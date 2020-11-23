# Changelog

All Notable changes to `Backpack CRUD` will be documented in this file

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

## [2.0.24] - 2016-07-13

### Added
- model_function_attribute column type (kudos to [rgreer4](https://github.com/rgreer4))


## [2.0.23] - 2016-07-13

### Added
- Support for $primaryKey variable on the model (no longer dependant on ID as primary key).


## [2.0.22] - 2016-06-27

### Fixed
- Fix removeField method
- Improve autoSetFromDB method


## [2.0.21] - 2016-06-21

### Fixed
- Old input value on text fields in the create form;
- "Please fix" lang text.


## [2.0.20] - 2016-06-19

### Fixed
- Translate browse and page_or_link fields


## [2.0.19] - 2016-06-16

### Fixed
- Split the Crud.php class into multiple traits, for legibility;
- Renamed the Crud.php class to CrudPanel;


## [2.0.18] - 2016-06-16

### Removed
- Tone's old field types (were only here for reference);
- Tone's old layouts (were only here for reference);


## [2.0.17] - 2016-06-16

### Added
- $crud->hasAccessToAny($array) method;
- $crud->hasAccessToAll($array) method;


## [2.0.16] - 2016-06-15

### Fixed
- CrudController - use passed request before fallback to global one;


## [2.0.15] - 2016-06-14

### Fixed
- select_multiple worked, select2_multiple did not; #26


## [2.0.14] - 2016-06-13

### Fixed
- Allow HTML in fields help block;


## [2.0.13] - 2016-06-09

### Added
- Italian translation;
- Browse field parameter to disable readonly state;


## [2.0.12] - 2016-06-06

### Fixed
- multiple browse fields on one form did not work;


## [2.0.11] - 2016-06-06

### Fixed
- multiple browse fields on one form did not work;


## [2.0.10] - 2016-06-06

### Fixed
- browse field did not work if Laravel was installed in a subfolder;
- browse field Clear button did not clear the input;
- select_from_array field did not work;
- Crud::setFromDb() now defaults to NULL instead of empty string;


## [2.0.9] - 2016-05-27

### Deprecated
- Route::controller() - it's been deprecated in Laravel 5.2, so we can't use it anymore;


## [2.0.8] - 2016-05-26

### Added
- page_or_link field type now has a 'page_model' attribute in its definition;


## [2.0.7] - 2016-05-25

### Added
- Text columns can now be added with a string $this->crud->addColumn('title');
- Added hint to the 'text' field type;
- Added the 'custom_html' field type;


## [2.0.6] - 2016-05-25

### Fixed
- Elfinder triggered an error on file upload, though uploads were being done fine.


## [2.0.5] - 2016-05-20

### Fixed
- Removing columns was fixed.


## [2.0.4] - 2016-05-20

### Fixed
- Fields with subfields did not work any more (mainly checklist_dependency);


## [2.0.3] - 2016-05-20

### Fixed
- Easier CRUD Field definition - complex fields no longer need a separate .js and .css files; the extra css and js for a field will be defined in the same file, and then pushed to a stack in the form_content.blade.php view, which will put in the proper after_styles or after_scripts section. By default, the styles and scripts will be pushed to the page only once per field type (no need to have select2.js five times onpage if we have 5 select2 inputs)
- Changed existing complex fields (with JS and CSS) to this new definition.


## [2.0.2] - 2016-05-20

### Added
- Working CRUD API functions for adding fields and removing fields.
- Removed deprecated file: ToneCrud.php


## [2.0.1] - 2016-05-19

### Fixed
- Crud.php fixes found out during Backpack\PermissionManager development.
- Added developers to readme file.


## [2.0.0] - 2016-05-18

### Added
- Call-based API.


## [0.9.10] - 2016-03-17

### Fixed
- Fixed some scrutinizer bugs.


## [0.9.9] - 2016-03-16

### Added
- Added page title.


## [0.9.8] - 2016-03-14

### Added
- Added a custom theme for elfinder, called elfinder.backpack.theme, that gets published with the CRUD public files.


## [0.9.7] - 2016-03-12

### Fixed
- Using LangFileManager for translatable models instead of Dick's old package.


## [0.9.6] - 2016-03-12

### Fixed
- Lang files are pushed in the correct folder now. For realsies.


## [0.9.5] - 2016-03-12

### Fixed
- language files are published in the correct folder, no /vendor/ subfolder


## [0.9.4] - 2016-03-11

### Added
- CRUD::resource() now also acts as an implicit controller too.

### Removed
- firstViewThatExists() method in CrudController - its functionality is already solved by the view() helper, since we now load the views in the correct order in CrudServiceProvider



## [0.9.3] - 2016-03-11

### Fixed
- elFinder erro "Undefined variable: file" is fixed with a composer update. Just make sure you have studio-42/elfinder version 2.1.9 or higher.
- Added authentication middleware to elFinder config.


## [0.9.2] - 2016-03-10

### Fixed
- Fixed ckeditor field type.
- Added menu item instructions in readme.


## [0.9.1] - 2016-03-10

### Fixed
- Changed folder structure (Http is in app folder now).


## [0.9.0] - 2016-03-10

### Fixed
- Changed name from Dick/CRUD to Backpack/CRUD.

### Removed
- Entrust permissions.


## [0.8.17] - 2016-02-23

### Fixed
- two or more select2 or select2_multiple fields in the same form loads the appropriate .js file two times, so error. this fixes it.


## [0.8.13] - 2015-10-07

### Fixed
- CRUD list view bug fixed thanks to Bradis García Labaceno. The DELETE button didn't work for subsequent results pages, now it does.


## [0.8.12] - 2015-10-02

### Fixed
- CrudRequest used classes from the 'App' namespace, which rendered errors when the application namespace had been renamed by the developer;


## [0.8.11] - 2015-10-02

### Fixed
- CrudController used classes from the 'App' namespace, which rendered errors when the application namespace had been renamed by the developer;


## [0.8.9] - 2015-09-22

### Added
- added new column type: "model_function", that runs a certain function on the CRUD model;


## [0.8.8] - 2015-09-17

### Fixed
- bumped version;


## [0.8.7] - 2015-09-17

### Fixed
- update_fields and create_fields were being ignored because of the fake fields; now they're taken into consideration again, to allow different fields on the add/edit forms;

## [0.8.6] - 2015-09-11

### Fixed
- DateTime field type needed some magic to properly use the default value as stored in MySQL.

## [0.8.5] - 2015-09-11

### Fixed
- Fixed bug where reordering multi-language items didn't work through AJAX (route wasn't defined);


## [0.8.4] - 2015-09-10

### Added
- allTranslations() method on CrudTrait, to easily get all connected entities;


## [0.8.3] - 2015-09-10

### Added
- withFakes() method on CrudTrait, to easily get entities with fakes fields;

## [0.8.1] - 2015-09-09

### Added
- CRUD Alias for handling the routes. Now instead of defining a Route::resource() and a bunch of other routes if you need reorder/translations etc, you only define CRUD:resource() instead (same syntax) and the CrudServiceProvider will define all the routes you need. That, of course, if you define 'CRUD' => 'Dick\CRUD\CrudServiceProvider' in your config/app.php file, under 'aliases'.


## [0.8.0] - 2015-09-09

### Added
- CRUD Multi-language editing. If the EntityCrudController's "details_row" is set to true, by default the CRUD will output the translations for that entity's row. Tested and working add, edit, delete and reordering both for original rows and for translation rows.


## [0.7.9] - 2015-09-09

### Added
- CRUD Details Row functionality: if enabled, it will show a + sign for each row. When clicked, an AJAX call will return the showDetailsRow() method on the controller and place it in a row right below the current one; Currently that method just dumps the entry; But hey, it works.


## [0.7.8] - 2015-09-08

### Fixed
- In CRUD reordering, the leaf ID was outputted for debuging.


## [0.7.7] - 2015-09-08

### Added
- New field type: page_or_link; It's used in the MenuManager package, but can be used in any other model;


## [0.7.4] - 2015-09-08

### Added
- Actually started using CHANGELOG.md to track modifications.

### Fixed
- Reordering echo algorithm. It now takes account of leaf order.

