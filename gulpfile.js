let elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.webpack('ohio-core.js');
    mix.webpack('ohio-content.js');
    mix.webpack('ohio-spot.js');
    mix.webpack('ohio-storage.js');
    mix.sass('ohio.scss');
});