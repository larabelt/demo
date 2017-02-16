import './belt-bootstrap';

import  BeltCore  from 'belt/core/js/core';
import  BeltContent  from 'belt/content/js/content';
import  BeltSpot  from 'belt/storage/js/spot';
import  BeltStorage  from 'belt/storage/js/storage';

$(document).ready(function() {
    
    new BeltCore([
        BeltContent,
        BeltSpot,
        BeltStorage
    ]);
});