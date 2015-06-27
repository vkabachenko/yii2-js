JavaScript in Yii2
============================

Contents
--------

[Script file in layout](docs/layout.md)

[Script file in view](docs/outer.md)

[Inner script in view](docs/inner.md)

[Simple js widget in view](docs/widget.md)

[Simple loading html content using ajax](docs/load.md)

[Passing data from server in json format](docs/json.md)

[Simple pjax with forms and links](docs/pjax.md)

[CRUD grid with ajax and modal windows](docs/grid.md)


Installation
------------

1. Install the application via composer using the following commands:

    `composer global require "fxp/composer-asset-plugin:*"`

    `composer create-project --prefer-dist --stability=dev vkabachenko/yii2-js yii2-js`

    `cd yii2-js`

2. Create a new database and adjust the `components['db']` configuration in `config/web.php` file.

3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.

4. Now you should be able to access the application through the following URL:

    `http://localhost/yii2-js/web/`





