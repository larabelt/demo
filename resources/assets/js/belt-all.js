import BeltCore from 'belt/core/js/core';
import BeltContent from 'belt/content/js/content';
import BeltConvo from 'belt/convo/js/convo';
import BeltElastic from 'belt/elastic/js/elastic';
import BeltMenu from 'belt/menu/js/menu';
import BeltSpot from 'belt/spot/js/spot';
import BeltWorkflow from 'belt/workflow/js/workflow';

/**
 * Additional config options
 */
window.larabelt.content.accept = 'image/*,application/pdf,text/plain';

Vue.config.devtools = process.env.MIX_VUEJS_DEBUG;

$(document).ready(function () {
    new BeltCore([
        BeltContent,
        BeltConvo,
        BeltElastic,
        BeltMenu,
        BeltSpot,
        BeltWorkflow
    ]);
});