<template>
    <div id="potato-banner">
        <a href="#">
            <img src="/images/signup-win.png" alt="Signup Win">
        </a>
    </div>
</template>

<script>
    import HeightSetter from '../mixins/height-setter'

    export default {
        mixins: [HeightSetter],
        computed: {
            heightRatio() {
                return 1024 / 97
            }
        }
    }
</script>