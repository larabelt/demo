let elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.webpack('belt-core.js');
    mix.webpack('belt-content.js');
    mix.webpack('belt-spot.js');
    mix.webpack('belt-storage.js');
    mix.sass('belt.scss');
});