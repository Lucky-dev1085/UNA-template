# Sample template module for UNA

This module contains sample template module which can be easily renamed and used as bootstrap of your own UNA template and shows examples of some basic things.

Custom templates can change different things in base template and add own features. If it's enough to change just some colors and backgrounds, you can use "Styles" in [Protean](https://una.io/page/view-product?id=3) or [Decorous](https://una.io/page/view-product?id=81) template, for more advanced changes it's better to create own template. It possible for example to change representation of menu in custom template, like it's done in Decorous template.

When developing a template module it's recommended to turn off the following settings in Studio > Settings > System > Cache:
- Enable Page cache
- Enable page blocks cache
- Enable cache for HTML files
- Enable cache for CSS files

It's recommended to use build-in into browsers "Inspector" to check existing styles of the page.

## Template module structure 

Structure of template module is the same as [other modules structure](https://github.com/unaio/una/wiki/Directories-structure#module-structure), but with addition of `data/template` folder. This folders consists of the following subfolders:
- `system` - system template files, it consists of overridden files from `/template/`folder
- `studio` - template files, there are overridden files from `/studo/template/`
- `vendor_modulename` - particular modules template files (instead of `vendor` and `modulename` should be real values), for the files which can be overridden refer to the particular module folder, for example `/modules/vendor/modulename/template`

Each of these folders has structure like this:
- Root folder consists of overridden .html templates.
- `css` - Overridden CSS files. Each file must refer to the parent file and contain only overridden CSS classes and styles. It can be LESS files there, if parent class is LESS file as well. No need to place CSS file there if no styles are changed - then original css file will be used automatically.
- `images` - Overridden or own images. Not all images can be overridden. To override file which is referring from CSS, you need to override particular CSS class.
- `scripts` - Template classes with overridden methods. In contrast with other folders this folder has all possible files by default, but they don't add/change any styles by default. You can add methods to these existing classes, for the list of possible methods refer to original source code of the class, for example to see all possible methods of `BxTemplFormView` file in `system` folder, you need to open `/template/scripts/BxBaseFormView` file.

Files in these folders usually have the name which represents it's purpose, but there are some of files which has special meaning.

**Special CSS files:**
- `common.css` - common styles which are used in user's frontend interface and Studio backend.
- `default.less` - default classes, such as default paddings, marginns, avatar sizes, etc.
- `general.css` - general styles for the user's frontend, such as toolbar, logo, footer, etc styles.
- `media-(desktop|phone|print|tablet).css` - styles which are used on the particular size of the screen or viewing mode, which usually represents some type of device.

**Special scripts:**
- `BxBaseConfig.php` - templates config with LESS variables and other configs and helper methods
- `BxBaseFunctions.php` - general functions which are used in different places on the site, such as message box, popup, time/date displaying.

**Special HTML files:**
- `_header.html`, `_footer.html` - all pages header and footer without design
- `_sub_header.html`, `_sub_footer.html` - all pages header and footer with some design, like menus, toolbar, etc
- `layout_*.html` - pages layouts
- `designbox_*.html` - different pages boxes
	- `0` - content only
	- `1` - content, title and background
	- `2` - just empty box
	- `3` - content, background
	- `4` - content, title
	- `10` - content with default padding
	- `11` - content with default padding, title background
	- `13` - content with default padding, background
	- `14` - content with default padding, title
- `default.html`, `page_*.html` - whole pages
	- `default` - page which used by default
	- `2` - clear page, without any headers and footers
	- `44` - popup page, without any headers and footers
	- `150` - transition page with redirect to display some msg, like 'please wait', without headers footers

## Module renaming

To use this module you need to rename it to your own. You need to think of how you name your template module and your name and your company name also know as vendor. 

You can use search and replace in PHP, XML and SQL files to clone module just in minutes, keep in mind that it's case sensitive and you can use letters and number only. Note that full vendor name and module name in lower case are path to your module.

You need replace:
- `vnd` - with your own short vendor name
- `vendor` - with your own full vendor name
- `modulename` - with your own module name

In the following order:
1. `co_flowers` to `vnd_modulename`
2. `CoFlowers` to `VndModulename`
3. `Flowers` to `Modulename`
4. `Company` to `Vendor`
5. `flowers` to `modulename`
6. `company` to `vendor`


## Overriding CSS files

For example we need to change color of the toolbar. Using browser Inspector we identified that it is `#bx-toolbar` style in `/template/css/general.css` file. According to this we need to add `data/template/system/css/general.css` file in our template folder with the following contents:
```
@import url(../../../../../../../template/css/general.css);

#bx-toolbar {    
	background-color: #a05da5;
}
```
In above code we've imported original file first, then we've overridden color of the toolbar. All other styles wasn't changes, as the result less changes will be required when base template will be changed.

## Override images which are referring from CSS 

For example we need to change default cover image in our template. We've identified that it's cover.jpg file in `/template/images/` folder, then placed our custom image into `data/template/system/images/cover.jpg`, but nothing changed. This is because images referring from CSS need changes in CSS styles. By checking again we've found that reference to this image is from `/template/css/cover.css` file and `.bx-cover-wrapper` class. Then we need to add own `cover.css` file into `data/template/system/css/` folder with the following contents:
```
@import url(../../../../../../../template/css/cover.css);

.bx-cover-wrapper {
    background-image: url(../images/cover.jpg);
}
```
It refers to the original file as well, then adds custom styles. It should work now.

## Overriding LESS files

Some of CSS files are in LESS format and you can override particular styles as well. Let's assume that we want to add round avatars all over the site, we've identified that this styles is in `.bx-def-thumb` class in some strange `cache_public/lessphp_1098aabb777f7121e987846ecb65c69a9fb12fcc.css` file. This is compiled LESS file. LESS files can't be read directly by the browser, so they are always compiled to CSS. It makes it a bit difficult to find particular place to change, so we've tried to use LESS format for a few files only. Now we need to use search by `.bx-def-thumb` in `/template/css/` folder to see where it's defined, and found it in `template/css/default.less` file. As the result we need to add custom `default.less` file into `data/template/system/css/` folder with the following contents:
```
@import '../../../../../../../template/css/default.less';

.bx-def-ava,
.bx-def-thumb,
.bx-def-icon {
    .radius(96px);
    overflow:hidden;
}
```
First we've imported parent LESS file, very similar to CSS import and then added custom styles for different sizes of user avatar representation, we've found other classes for avatar in original `default.less` file.

Overriding LESS variables which are defined out of LESS files

Some LESS variables are defined on the backend, so it can be changed via interface in other templates. To override these values we need to make changes in `data/template/system/scripts/BxTemplConfig.php` file.

For example we need to change default page width, then we need to make our BxTemplConfig class as the following:
```php
class BxTemplConfig extends BxBaseConfig
{
    function __construct()
    {
        parent::__construct();

        $this->_aConfig['aLessConfig'] = array_merge($this->_aConfig['aLessConfig'], array(
            'bx-page-width' => '1000px',
        ));
    }
}
```
For the list of all possible LESS variables and their default values refer to `template/scripts/BxBaseConfig.php` file.


