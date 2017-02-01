require('./ohio-bootstrap');

import  OhioCore  from 'ohio/core/js/core';
import  OhioContent  from 'ohio/content/js/content';
import  OhioSpot  from 'ohio/spot/js/spot';
import  OhioStorage  from 'ohio/storage/js/storage';

$(document).ready(function() {
    
    new OhioCore([
        OhioContent,
        OhioSpot,
        OhioStorage
    ]);
});