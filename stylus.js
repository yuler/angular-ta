var express = require('express');
var stylus  = require('stylus');
var nib = require('nib');

var app = express();

app.use(stylus.middleware({
    src     : __dirname + '/public/assets/styl',
    dest    : __dirname + '/public/assets/css',
    compile : function(str, path) {
      return stylus(str)
        .set('filename', path)
        .set('warn', true)
        .set('compress', true)
        .use(nib());
    }
}));

app.use(express.static(__dirname + '/public/assets/css'));

app.listen(3000);