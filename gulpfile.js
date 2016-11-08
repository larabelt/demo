let elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.webpack('ohio-core.js');
    mix.webpack('ohio-content.js');
    mix.sass('ohio.scss');
});