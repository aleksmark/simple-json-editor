'use strict'

const elixir = require('laravel-elixir');

elixir((mix) => {
    mix.copy(`./node_modules/jsoneditor/dist/jsoneditor.min.js`, 'public/js/node_modules/jsoneditor.min.js');
    mix.copy(`./node_modules/jsoneditor/dist/jsoneditor.min.css`, 'public/css/node_modules/jsoneditor.min.css');
    mix.copy(`./node_modules/jsoneditor/dist/img/jsoneditor-icons.svg`, 'public/css/node_modules/img/jsoneditor-icons.svg');
});
