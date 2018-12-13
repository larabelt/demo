<template>
    <div class="modal-content" :class="template">
        <div class="image" :style="{backgroundImage: `url(${sideImage})`}"></div>
        <div class="copy" v-html="templateContent"></div>
    </div>
</template>

<script>
    import nexia_template from './modal-templates/nexia.html'
    import tolero_template from './modal-templates/tolero.html'
    import oneup_template from './modal-templates/oneup.html'
    import avail_template from './modal-templates/avail.html'

    export default {
        computed: {
            sideImage() {
                switch(this.template) {
                    case 'nexia':
                        return '/images/nexia-photo.jpg'
                    case 'tolero':
                        return '/images/tolero-image.jpg'
                    case 'oneup':
                        return '/images/oneup-image.jpg'
                    case 'avail':
                        return '/images/avail-image.jpg'
                    default:
                        return '/images/form-image.jpg'
                }
            },
            templateContent() {
                switch(this.template) {
                    case 'nexia':
                        return nexia_template
                        break;
                    case 'tolero':
                        return tolero_template
                        break;
                    case 'oneup':
                        return oneup_template
                        break;
                    case 'avail':
                        return avail_template
                        break;
                    default:

                }
            }
        },
        data() {
            return {
                template: 'nexia'
            }
        },
        created() {
            this.$root.$on('modal:show', template => {
                this.template = template
            })
        }
    }
</script>