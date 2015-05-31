## Add inner script to view

To run inner js script in selected view:

* put js script code into string var, e.g. `$script`. In this code you can pass any php variable into js script.

* register this script as follows: `registerJS($script)`. By default it will also register jQuery and launch this script after DOM is ready.

* you can also add simple js script as an action attribute (e.g. `onClick`) of a DOM element.

