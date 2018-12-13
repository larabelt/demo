
Vue.config.devtools = process.env.MIX_VUEJS_DEBUG;

import PotatoContainer from './components/PotatoContainer.vue'
import HeightSetter from './mixins/height-setter'

const app = new Vue({
    el: '#app',
    components: {
        PotatoContainer
    },
    mixins: [HeightSetter],
    computed: {
        heightRatio() {
            return 1024 / 768
        }
    }
});