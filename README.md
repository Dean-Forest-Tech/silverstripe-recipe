# ilateral SilverStripe Kitchen Sink Recipe

Base SilverStripe website install that contains
all the modules we commonly use.

## Creating a new project

Recipes can be introduced to any existing project (even if not created on a silverstripe base project)

```shell
$ composer init
$ composer require i-lateral/ss4-recipe
````

Alternatively you can create a new project based on an existing recipe

```shell
$ composer create-project i-lateral/ss4-recipe ./myssproject ^1.0@dev
```

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
$ composer require i-lateral/ss4-recipe ^0.1
$ composer require-recipe i-lateral/ss4-recipe ^1.0@dev
```

or

```shell
$ composer init
$ composer require i-lateral/ss4-recipe ^1.0@dev
$ composer update-recipe i-lateral/ss4-recipe
```

## Further Docs

More comprehensive documentation can be found at the [recipe
plugin github page](https://github.com/silverstripe/recipe-plugin)