<template>
    <div>
        <div v-for="place in places">
            <gmap-custom-marker v-show="this.filters.type.includes(place.place_type)"
                                :key="place.id"
                                :draggable="false"
                                :marker="{ lat: place.lat, lng: place.lng }"
            >
                <place-icon :place="place"/>
            </gmap-custom-marker>
        </div>
    </div>
</template>

<script>
import PlaceIcon from "../markers/PlaceIcon";

export default {
    name: "PlaceMarker",
    components: { PlaceIcon },
    props: ['filters'],
    data() {
        return {
            places: []
        }
    },
    mounted() {
        this.getPlaces()
    },
    methods: {
        getPlaces: function () {
            this.axios.get('/api/place' ).then((response) => {
                this.places = response.data.places
            });
        }
    }
}
</script>
