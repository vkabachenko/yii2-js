## Simple pjax with forms and links

Pjax is a widget that makes automatic ajax request for link clicks and form submissions. The widget automatically replaces the old html content with the new one based on ajax request without reloading the whole page.

* put the html content of the widget between `begin()` and `end()` pjax calls.

* if you don't want to update the browser's URL after ajax request set the `enablePushState` pjax option to `false`.

* add `data-pjax = ''` attribute to the form(s) inside the pjax widget.

* use `renderAjax` method in controller's actions that make ajax response.

* don't use `data-method` or `data-confirm` attributes in the links inside pjax widget. Those attributes destroy ajax call.

