<template>
    <div id="modal-container" v-show="active">
        <div class="mask">
            <div @click="toggleModal" class="modal-close text-potato-darkish-green">X</div>
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                active: false
            }
        },
        created() {
            this.$root.$on('modal:show', template => {
                this.toggleModal()
            })
        },
        methods: {
            toggleModal() {
                this.active = !this.active
            }
        }
    }
</script>