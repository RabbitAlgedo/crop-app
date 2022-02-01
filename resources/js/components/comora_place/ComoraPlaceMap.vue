<template>
    <div>
        <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    <div v-if="info.display" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{info.status}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="info.display = false"></button>
                    </div>
                    <div class="col-md-4">
                        <form @submit.prevent="update">
                            <div class="form-group my-2">
                                <label for="name">Назва</label>
                                <input type="text" id="name" v-model="form.name" class="form-control">
                            </div>
                            <div class="form-group my-2">
                                <label for="address">Адрес</label>
                                <input type="text" id="address" v-model="form.address" class="form-control" disabled>
                            </div>

                            <div class="row mb-3">
                                <label for="place_type" class="col-form-label">Тип</label>
                                <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Тип складу">
                                        <input type="radio" class="btn-check" v-model="form.place_type" id="place_type_comora" value="COMORA" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="place_type_comora">Комора</label>

                                        <input type="radio" class="btn-check" v-model="form.place_type" id="place_type_zavod" value="ZAVOD" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="place_type_zavod">Завод</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary my-2">Зберегти</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <gmap-map :center="startLocation" :zoom="zoom" :options="options" style="width: 100%; height: 350px;">
                            <gmap-marker :position="placeLocation" :draggable="true" @drag="updateCoordinates" @dragend="updateMapCenter"></gmap-marker>
                        </gmap-map>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ComoraPlaceMap",
    data() {
        return {
            id: '',
            zoom: 7.14,
            info: {
                display: false,
                status: ''
            },
            startLocation: {
                lat: 49.1280915,
                lng: 30.8602691
            },
            placeLocation: {
                lat: '',
                lng: ''
            },
            form: {
                name: null,
                address: null,
                place_type: null,
                lat: null,
                lng: null
            },
            options: {
                mapId: 'e05c23c1b569a6bf',
                disableDefaultUI: true,
                minZoom: 6.6,
                clickableIcons: false,
                restriction: {
                    latLngBounds: {
                        north: 52.711661,
                        south: 44.121487,
                        west: 21.749725,
                        east: 40.615880
                    },
                    strictBounds: false,
                }
            }
        }
    },
    mounted() {
        this.getPlaceId()
        this.getLocationData()
    },
    methods: {
        async update() {
            var lat = this.form.lat
            lat = lat.toString()

            var lng = this.form.lng
            lng = lng.toString()

            await this.axios.post('/api/place/' + this.id, {
                name: this.form.name,
                place_type: this.form.place_type,
                address: this.form.address,
                lat: lat,
                lng: lng,
                _method: 'patch'
            })
            .then((response) => {
                this.info.display = true
                this.info.status = response.data.status
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        getPlaceId() {
            this.id = document.getElementById("place_data").getAttribute('data-place-id')
        },
        async getLocationData() {
            await this.axios.get('/api/place/' + this.id).then((response) => {
                this.form.name = response.data[0].name
                this.form.address = response.data[0].address

                var lat = parseFloat(response.data[0].lat)
                var lng = parseFloat(response.data[0].lng)

                this.form.lat = lat
                this.form.lng = lng

                this.startLocation.lat = lat
                this.startLocation.lng = lng

                this.placeLocation.lat = lat
                this.placeLocation.lng = lng
            })
        },
        updateCoordinates(location) {
            this.placeLocation = {
                lat: location.latLng.lat(),
                lng: location.latLng.lng(),
            };
        },
        updateMapCenter(location) {
            this.startLocation = {
                lat: location.latLng.lat(),
                lng: location.latLng.lng(),
            }

            this.form.lat = location.latLng.lat()
            this.form.lng = location.latLng.lng()

            this.getLocationAddress()
        },
        getLocationAddress() {
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                'latLng': this.startLocation
            }, (results) => {
                this.updateAddress(results[1].formatted_address)
            });
        },
        updateAddress(address) {
            this.form.address = address
        }
    },
}
</script>

<style scoped>

</style>
