
var list = $('#articleList');

list.change(function() {
    var url = list.val(); // url of selected .md file
    $('#text').load(url); // load is ajax call that returns html
});

list.change(); // initial output
