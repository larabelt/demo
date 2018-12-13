<template>
    <div id="potato-hit-spots">
        <div class="hotspot"
             v-for="location in locations"
             @click="hotspotClick(location.slug)"
             :class="location.slug"
             :style="styles(location.styles)">
            <img :src="imageSrc(location.slug)" :alt="location.slug" class="img-fluid">
        </div>
    </div>
</template>

<script>
    import HeightSetter from '../mixins/height-setter'

    export default {
        mixins: [HeightSetter],
        computed: {
            heightRatio() {
                return this.widthFactor / (768 - 97)
            },
            heightFactor() {
                return this.$el ? this.$el.offsetHeight : 671
            },
            widthFactor() {
                return this.$el ? this.$el.offsetWidth : 512
            }
        },
        data() {
            return {
                locations: [
                    {
                        slug: 'tolero',
                        styles: {
                            height: 212,
                            width: 195,
                            left: 142,
                            top: 220,
                            zindex: 1
                        }
                    },
                    {
                        slug: 'oneup',
                        styles: {
                            height: 160,
                            width: 142,
                            left: 70,
                            top: 450,
                            zindex: 2
                        }
                    },
                    {
                        slug: 'avail',
                        styles: {
                            height: 230,
                            width: 145,
                            left: 155,
                            top: 420,
                            zindex: 1
                        }
                    },
                    {
                        slug: 'nexia',
                        styles: {
                            height: 255,
                            width: 203,
                            left: 242,
                            top: 480,
                            zindex: 1
                        }
                    }
                ]
            }
        },
        created() {
            window.addEventListener('resize', this.resized)
        },
        methods: {
            hotspotClick(slug) {
                console.log('click', slug)
                this.$root.$emit('modal:show', slug)
            },
            imageSrc(slug) {
                return `/images/hotspots/hotspot-${slug}.svg`
            },
            styles(params) {
                return {
                    width: (params.width / this.heightFactor) * 100 + '%',
                    left: (params.left / this.widthFactor) * 100 + '%',
                    top: (params.top / this.heightFactor) * 100 + '%',
                    'z-index': params.zindex
                }
            },
            resized() {
                this.$forceUpdate()
            }
        }
    }
</script>