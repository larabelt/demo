<template>
    <div id="potato-container">
        <div class="d-flex">
            <div class="content-column">
                <potato-content></potato-content>
            </div>
            <div class="content-column">
                <potato-hit-spots></potato-hit-spots>
            </div>
        </div>

        <potato-banner></potato-banner>

        <modal-container>
            <modal-content></modal-content>
        </modal-container>
    </div>
</template>

<script>
    import PotatoBanner from './PotatoBanner'
    import PotatoContent from './PotatoContent'
    import PotatoHitSpots from './PotatoHitSpots'
    import ModalContainer from './PotatoModalContainer'
    import ModalContent from './PotatoModalContent'

    export default {
        components: {
            PotatoBanner,
            PotatoContent,
            PotatoHitSpots,
            ModalContainer,
            ModalContent
        }
    }
</script>