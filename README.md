# Laravel Up (`lup`)

A fork of the [Laravel Installer](http://github.com/laravel/installer) by the core Laravel team.

Laravel Up includes some great features for speedily spinning up preset builds of Laravel.

## Installation

Install using composer:

```
composer global require blacklab/laravel-up
```

Ensure you have the `~/.composer/bin` directory in your `$PATH`.

## The presets file.

The presets file allows you to specify packages and configuration that you would otherwise have to add manually each time you create a new laravel app.

```
{
    "preset-name": {
        "require":{

        },
        "require-dev": {

        },
        "repositories": {

        },
        "autoload": [].
        "scripts": [
            "git add .",
            "git commit -am \"First Commit\""],
            "cp .env.example .env",
            "php artisan migrate"
        ]
    }
}
```

### Whitelisted composer segments

Each preset can add to any of the whitelisted composer segments:

- `require`
- `require-dev`
- `repositories`
- `autoload`

...More will be added soon.

## The `scripts` segment

This is the only part of the preset body that is NOT based around a composer segment. Instead, when using a preset, these scripts will be ran on the command line for you after composer has finished installing your packages.

Use it to publish service providers and config files for the packages you've created - or create .env files and more.

## Basic Usage

The basic syntax is something like:

```
lup new mysitefolder --preset=medialibrary
```

Your `medialibrary` preset might contain several packages, as well as some custom configuration or helper files and post-install scripts.

But it can also support multiple presets via comma delimitation, and merge them.

So you can split your presets to add groups of packages and configs that make sense separately, but can also be combined:

```
lup new mysitefolder --preset=medialibrary,blog,shoppingcart
```

Merging of each `require` section will be done sequentially in the order you specify - the same goes for `scripts` - they'll be ran in the order specified here.





