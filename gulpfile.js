let elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.webpack('ohio.js');
    mix.sass('ohio.scss');
});