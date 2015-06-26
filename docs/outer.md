## Add script file to view

To run outer js script in selected view:

* put script file into *web/js* folder

* create asset class, e.g. *OnceAsset* for this view

* specify script file in the `$js` property of asset class

* add `yii\web\JqueryAsset` class in `$depends` property of asset class if your script uses jQuery

* register asset class in the view as follows: `OnceAsset::register($this);`
