# ilateral SilverStripe Kitchen Sink Recipe

Base SilverStripe website install that contains
all the modules we commonly use.

## Creating a new project

Recipes can be introduced to any existing project (even if not created on a silverstripe base project)

### SS5 Version:

````shell
$ composer init
$ composer require dft/silverstripe-recipe:5.x-dev
````

### SS4 Version (depreciated):

````shell
$ composer init
$ composer require dft/silverstripe-recipe:4.x-dev
````

Alternatively you can create a new project based on an existing recipe

### SS5 Version:

````shell
$ composer create-project dft/silverstripe-recipe ./myssproject 5.x-dev
````

### SS4 Version (depreciated):

````shell
$ composer create-project dft/silverstripe-recipe ./myssproject 4.x-dev
````

## Inlining recipes

You can "inline" either a previously installed recipe, or a new one that you would like to include
dependencies for in your main project. By inlining a recipe, you promote its requirements, as well as
its project files, up into your main project, and remove the recipe itself from your dependencies.

This can be done with either `update-recipe`, which will update a recipe, or `require-recipe` which will
install a new recipe.

Note that if you wish to run this command you must first install either a recipe via normal composer
commands, or install the recipe plugin:

```shell
$ composer init
$ composer require dft/silverstripe-recipe ^0.1
$ composer require-recipe dft/silverstripe-recipe ^1.0@dev
```

or

```shell
$ composer init
$ composer require dft/silverstripe-recipe ^1.0@dev
$ composer update-recipe dft/silverstripe-recipe
```

## Further Docs

More comprehensive documentation can be found at the [recipe
plugin github page](https://github.com/silverstripe/recipe-plugin)

## Themes

This recipe installs multiple possible base themes, but
also builds a "custom" theme that can be used to overwrite
the default selected theme.

If you want to switch out the default base theme to an
alternative, it is recommended that you change `bootstrap`
in `theme.yml` to your alternative, EG:

    SilverStripe\View\SSViewer:
      themes:
        - 'custom'
        - 'deferedimages'
        - 'bootstrap' # Change this to your base theme
        - '$default'

### Webpack

The custom theme (and parent themes) are designed to use
[webpack](https://webpack.js.org/) to help package and
manage CSS and JS requirements.

Alternativley you can just use the default SilverStripe way
(add your own files to dist/css or dist/js) but you will have
to manage combining and compressing them.

This is handled automatically via `webpack`.

#### Getting Started

To get started using webpack to manage your JS and CSS
requirements, first you have to install [yarn](https://yarnpkg.com/getting-started/install)

Once you have installed yarn, navigate to your theme dir:

    # cd /path/to/my/project/themes/custom

Now install node modules (can take a little while)

    # yarn install

#### Adding Custom CSS/JS

Next add your custom JS or CSS (SASS) to the relevent folders
(`themes/custom/src/javascript` or `themes/custom/src/scss` respectivley), if you add any new files, you will need to
import them in the following locations:

* SCSS Files are added to `themes/custom/src/scss/bundle.scss`
* JS files will need to be mapped directly in `themes/custom/webpack.common.js` 

Finally, run one of the following command to transpile/minify your files

* `yarn dev`: Transpile all files for development purposes (do not minify)
* `yarn build`: Transpile AND minify for production

##### Linting

Some linting functionality is included to help keep code tidy.
If you want to lint/tidy your CSS/JS you can run the following:

* `yarn lint:styles` or `yarn lint:styles:fix` Check or attempt to fix issues with SCSS
* `yarn lint:scripts` or `yarn lint:scripts:fix` Check or attempt to fix issues with JS
