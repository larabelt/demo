import './belt-bootstrap';

import  BeltCore  from 'belt/core/js/core';
import  BeltContent  from 'belt/content/js/content';
import  BeltSpot  from 'belt/spot/js/spot';
import  BeltClip  from 'belt/clip/js/clip';

$(document).ready(function() {
    
    new BeltCore([
        BeltContent,
        BeltSpot,
        BeltClip
    ]);
});