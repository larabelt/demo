import './belt-bootstrap';

import BeltCore from 'belt/core/js/core';
import BeltClip from 'belt/clip/js/clip';
import BeltContent from 'belt/content/js/content';
import BeltGlue from 'belt/glue/js/glue';
import BeltMenu from 'belt/menu/js/menu';
import BeltSpot from 'belt/spot/js/spot';

/**
 * Additional config options
 */
window.larabelt.clip.accept = 'image/*,application/pdf,text/plain';

$(document).ready(function () {
    new BeltCore([
        BeltClip,
        BeltContent,
        BeltGlue,
        BeltMenu,
        BeltSpot
    ]);
});