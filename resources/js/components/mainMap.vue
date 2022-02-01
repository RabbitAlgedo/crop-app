<template>
    <GoogleMap class="map-margin-top" />
</template>
<script>
import GoogleMap from './GoogleMap.vue'

export default {
    name: 'MainMap',
    components: {
        GoogleMap
    }
}
</script>

<style scoped>
.map-margin-top {
    margin-top: -3rem !important;
}
</style>
