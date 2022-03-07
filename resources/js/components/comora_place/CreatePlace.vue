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
                        <form @submit.prevent="create">
                            <div class="form-group my-2">
                                <label for="name">Назва</label>
                                <input type="text" id="name" v-model="form.name" class="form-control">
                            </div>
                            <div class="form-group my-2">
                                <label for="address">Адрес</label>
<!--                                <input type="text" id="address" v-model="form.address" class="form-control" disabled>-->
                                <gmap-autocomplete @place_changed="updateAddress"
                                                   id="address"
                                                   class="form-control"
                                                   :options="{fields: ['geometry', 'formatted_address', 'address_components']}"
                                />
                            </div>

                            <!-- Тип місця -->
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
                        <gmap-map :center="currentPlace" :zoom="zoom" :options="options" style="width: 100%; height: 350px;">
                            <gmap-marker :position="currentPlace" :draggable="false"></gmap-marker>
                        </gmap-map>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreatePlace",
    data() {
        return {
            user_id: null,
            zoom: 7.14,
            info: {
                display: false,
                status: ''
            },
            currentPlace: {
                lat: 49.1280915,
                lng: 30.8602691
            },
            form: {
                name: null,
                address: null,
                place_type: null
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
        this.getUserId()
    },
    methods: {
        getUserId() {
            this.user_id = document.getElementById("user_id").getAttribute('data-user-id')
        },
        async create() {
            await this.axios.post('/api/place', {
                user_id: this.user_id,
                name: this.form.name,
                address: this.form.address,
                place_type: this.form.place_type,
                lat: this.currentPlace.lat.toString(),
                lng: this.currentPlace.lng.toString(),
                _method: 'post'
            })
                .then((response) => {
                    this.info.display = true
                    this.info.status = response.data.status
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        updateAddress(address) {
            this.currentPlace = {
                lat: address.geometry.location.lat(),
                lng: address.geometry.location.lng()
            }
            this.form.address = address.formatted_address
        }
    },
}
</script>

<style scoped>

</style>
