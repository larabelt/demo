/**
 *  requires there be a ratio data item
 */

export default {
    computed: {
        heightRatio() {
            return 1/1
        }
    },
    created() {
        window.addEventListener('resize', this.setHeight)
    },
    mounted() {
        this.setHeight()
    },
    methods: {
        height() {
            return this.$el.offsetWidth / this.heightRatio
        },
        setHeight() {
            Vue.nextTick(() => {
                this.$el.style.height = `${this.height()}px`
            })
        }
    }
}