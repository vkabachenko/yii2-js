## Add script file to layout

To run js script in all views:

* put script file into *web/js* folder

* specify this file in the `$js` property of main asset file *AppAsset.php*

* register `AppAsset` class in the template view file such as *views/layouts/main.php*

`AppAsset::register($this);`

