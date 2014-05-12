#Wordpress Boilerplate Theme
## Beta Version

**Starting point for custom Wordpress theme development.**

The primary goals of this build process are a clean, component based organization, mixed with automation for CSS/SASS and JavaScript concatenation and minification/uglification. 

## Author(s) / Inspiration
Build process, base styles, and JavaScript by [Nick Katarow](http://github.com/nkatarow).

Original [Starkers Theme](https://github.com/viewportindustries/starkers) built by [Viewport Industries, Ltd](http://http://viewportindustries.com/).

SASS Structure and base styles inspired by [Brad Frost](http://bradfrostweb.com/)'s [Pattern Lab](http://demo.patternlab.io/).

## What it does

**CSS/SASS**

CSS files are compiled into the **_ui/compiled/** directory from the files imported by the **_ui/css/main.scss** file. Note that whenever a new .scss file is added, it must be manually added to the **_ui/css/main.scss** file.

The CSS directory structure broken into three categories.

* **helpers** - Used primarily for things like CSS reset/normalize files, SASS variables and mixins.
* **base** - Intended for base, classless, global styles for HTML elements. In addition, utilities like clear fixes and offscreen text can be considered base styles. 
* **components** - Where the majority of your custom styling should take place. For best organization, create a new file for each new component you build and take advantage of SASS nesting techniques to keep your components self contained.

**JavaScript**

The JavaScript build process varies slightly from the CSS process for easier debugging in development. Details on the differences between the development and production processes can be found in the **Usage** section below.

The JavaScript directory structure broken into three categories.

* **head-libs** - Some JS libraries need to be loaded in the header in order to work properly, place those libraries in this directory, but only if you have to. Best practices dictate to load as much of the JS in the footer as possible. This comes with jQuery 1.11.1 and the dev build of Modernizr by default.
* **foot-libs** - Put the rest of your JS libraries that can be loaded in the footer here.
* **components** - Outside of the **_ui/js/app.main.js** file, all of your JS components should be placed here. By default, this comes with an empty name spaced file to used as a template.

**Templates**

The included templates are largely unchanged from the Starkers Wordpress theme. There are two includes that have been edited include conditional loading based on the compiled files as described below.

Each of these files detect the host and perform an if/then to see if it matches your development host (default is **wordpress-boilerplate.dev/**). You'll need to change this if your development host differs. 

* **parts/shared/html-header.php** - If the development host is detected, the extended syntax **main-dev.css** and compiled list of scripts as described in the **Usage** section below (**header-scripts.php**) files will be loaded. If the host is anything other than the one mentioned in the if/then, the compiled and minified **main.min.css** and the concatenated and uglified **header-scripts.min.js** will be loaded instead.

* **parts/shared/html-footer.php** - Similar to the **html-header.php** file above, this performs the same test, but instead will either load the compiled list of scripts (**footer-scripts.php**) or the concatenated and uglified **footer-scripts.min.js** will be loaded instead.

## Setup
To get the app up and running, you will need to make sure you have the following software installed prior to running. If you've already got these all installed, skip to the app dependencies.

### System Dependancies
* [Node](http://nodejs.org/) - Download and install using the link provided.
* [NPM](https://npmjs.org/) - This should be installed automatically with Node.js.
* [Grunt](http://gruntjs.com/getting-started) - Run the following command after Node/NPM are installed:

```
$ npm install grunt-cli -g
```
 
* [Sass](http://sass-lang.com/) - Assuming you're running ruby, run the following command (if you get an error, try running with sudo):

```
gem install sass
```

### Application Dependencies
Once you have the proper system dependencies installed, run the following command in the application's root directory:

```
npm install
```

## Usage
Below you'll fine a list of commands to perform varying tasks followed by a detailed description of what each does.

```
grunt
```
* **CSS/SASS**
	* The default grunt task will check the **_ui/css/main.scss** file and compile all the specified scss files into **_ui/compiled/main-dev.css**. This CSS style is expanded, have a sourcemap file, trace, debug info and line number. This is the CSS file loaded when viewing the development site.
* **JavaScript**
	* The default grunt task will also run through the js directories and create the two PHP files to include (**parts/shared/header-scripts.php** and **parts/shared/footer-scripts.php**). **header-scripts.php** includes only libraries that live in the **_ui/js/head-libs/** directory. **footer-libs.php** includes those in the **_ui/js/foot-libs/** and **_ui/js/component/** directories as well as **_ui/js/app.main.js**.

```
grunt watch
```
The watch task will look for changes on all SCSS and JS files, automatically run the same processes as the default grunt task, and reload your webpage for you. (**Note:** If new files are added, you will make sure they are added as described above and the default grunt task will need to be run first.)

```
grunt build
``` 
The build task should be run when you're ready to generate or update your optimized production files.

* **CSS/SASS**
	* Again, the task will check your **_ui/css/main.scss** file for which SASS files to include. 
	* This time, it will compile to **_ui/compiled/main-prod.css** but will be compressed and will not include any of the debug options turned on for the development build. 
	* From that compiled file, CSSMIN minification will be performed, further compressing the file size.
* **JavaScript** 
	* Again, the **header-scripts.php** and **footer-scripts.php** files will be created. 
	* From those, two files will be created (**_ui/compiled/header-scripts.js** and **_ui/compiled/footer-scripts.js**) where all of the separate files listed in the PHP includes will be concatenated. 
	* From there, two additional files will be created (**header-scripts.min.js** and **footer-scripts.min.js**) where each of the concatenated files from the previous step will be uglified (compressed).

## Libraries Included
* jQuery 1.11.1
* Modernizr

