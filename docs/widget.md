## Simple js widget in view

We assume that js widget is based on jQuery and has bower package.

To include any js widget to the view you have to make appropriate extension:

* In *bower.json* file of the widget project find the name of bower package (see the *name* key)
* To the *require* section of your main *composer.json* file add following element:

    `"bower-asset/widget-bower-package-name": "*"`

* Update the composer of your project. Make sure that the folder with required js widget exists in *vendor/bower*.
* Create the folder for widget extension files, e.g. *@app/widgets/mywidget*
* Check required js and css files  in *vendor/bower/widget folder*. Create asset bundle class in widget extension folder. Public vars of the class:
    * `$sourcePath` - path to folder with widget files
    * `$css` - relative path to widget css files
    * `$js` - relative path to widget js files
    * `$depends` - namespace of jQuery asset
* Create the widget class in widget extension folder. Main public vars of the class:
    * `$options` - array of HTML attributes for the widget container tag. Container id will be created automatically if not set manually.
    * `$clientOptions` - array of setting options of the widget. Refer for widget documentation for option's list.
    * `$clientEvents` - array of the event handlers of the widget. Every element of array has the following structure: `event name => handler function`. Refer for widget documentation for event's list.
    * `$items` - array of the HTML tags that are the body of the widget.
* Create main method *run* of the widget class. This method
    * creates the HTML structure of the widget
    * register js code of the widget and handlers of widget events.




