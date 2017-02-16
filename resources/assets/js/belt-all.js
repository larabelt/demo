import './belt-bootstrap';

import  BeltCore  from 'belt/core/js/core';
import  BeltClip  from 'belt/clip/js/clip';
import  BeltContent  from 'belt/content/js/content';
import  BeltGlue  from 'belt/glue/js/glue';
import  BeltSpot  from 'belt/spot/js/spot';

$(document).ready(function() {
    
    new BeltCore([
        BeltClip,
        BeltContent,
        BeltGlue,
        BeltSpot
    ]);
});