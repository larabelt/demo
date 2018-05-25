import BeltCore from 'belt/core/js/core';
import BeltClip from 'belt/clip/js/clip';
import BeltContent from 'belt/content/js/content';
import BeltMenu from 'belt/menu/js/menu';
import BeltSpot from 'belt/spot/js/spot';

/**
 * Additional config options
 */
window.larabelt.clip.accept = 'image/*,application/pdf,text/plain';

Vue.config.devtools = process.env.MIX_VUEJS_DEBUG;

$(document).ready(function () {
    new BeltCore([
        BeltClip,
        BeltContent,
        BeltMenu,
        BeltSpot
    ]);
});