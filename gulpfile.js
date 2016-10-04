let elixir = require('laravel-elixir');
require('laravel-elixir-vue');

elixir(function(mix) {
    mix.webpack('ohio.js');
    mix.sass('ohio.scss');
});