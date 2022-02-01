<template>
    <div class="add-culture">
        <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    <div v-if="info.display" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{info.status}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="info.display = false"></button>
                    </div>
                    <div class="col-md-4">
                        <form @submit.prevent="create">
                            <div class="row mb-3">
                                <label for="buying_selling" class="col-form-label">Тип</label>
                                <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Тип пропозиції">
                                        <input type="radio" class="btn-check" v-model="form.type" id="buying" value="BUYING" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="buying">Покупка</label>

                                        <input type="radio" class="btn-check" v-model="form.type" id="selling" value="SELLING" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="selling">Продаж</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <label for="culture-name">Зерно</label>
                                <select class="form-select select-filter"
                                        id="culture-name"
                                        v-model="form.culture">
                                    <option value="center" disabled hidden>Зерно</option>
                                    <option value="SOY">Соя</option>
                                    <option value="BARLEY">Ячмінь</option>
                                    <option value="CORN">Кукурудза</option>
                                </select>
                            </div>
                            <div class="form-group my-2">
                                <label for="weight">Тонаж</label>
                                <div class="input-group">
                                    <input type="text" id="weight" v-model="form.weight" class="form-control" aria-describedby="weight-text">
                                    <span class="input-group-text" id="weight-text">т.</span>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <label for="price">Ціна за 1т.</label>
                                <div class="input-group">
                                    <input type="text" id="price" v-model="form.price" class="form-control" aria-describedby="price-text">
                                    <span class="input-group-text" id="price-text">$</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="termin" class="col-form-label">Активно днів</label>
                                <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Тип складу">
                                        <input type="radio" class="btn-check" v-model="form.termin" id="termin_5" value="5" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="termin_5">5</label>

                                        <input type="radio" class="btn-check" v-model="form.termin" id="termin_14" value="14" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="termin_14">14</label>

                                        <input type="radio" class="btn-check" v-model="form.termin" id="termin_30" value="30" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="termin_30">30</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="delivery" class="col-form-label">Тип доставки</label>
                                <div class="col-md-6">
                                    <div class="btn-group" role="group" aria-label="Тип складу">
                                        <input type="radio" class="btn-check" v-model="form.delivery" id="fca_delivery" value="FCA" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="fca_delivery">FCA</label>

                                        <input type="radio" class="btn-check" v-model="form.delivery" id="cpt_delivery" value="CPT" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="cpt_delivery">CPT</label>

                                        <input type="radio" class="btn-check" v-model="form.delivery" id="exw_delivery" value="EXW" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="exw_delivery">EXW</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary my-2">Створити</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <gmap-map :center="startLocation" :zoom="zoom" :options="options" style="width: 100%; height: 550px;">
                            <gmap-marker :position="cultureLocation" :draggable="true" @drag="updateCoordinates" @dragend="updateMapCenter"></gmap-marker>
                        </gmap-map>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateCulture",
    data() {
        return {
            user_id: null,
            zoom: 7.14,
            info: {
                display: false,
                status: ''
            },
            startLocation: {
                lat: 49.1280915,
                lng: 30.8602691
            },
            cultureLocation: {
                lat: 49.1280915,
                lng: 30.8602691
            },
            form: {
                culture: 'SOY',
                place_id: 1,
                termin: null,
                user_id: null,
                type: null,
                delivery: null,
                price: 0,
                weight: 0,
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
        this.getUserId()
    },
    methods: {
        async create() {
            var lat = this.form.lat
            lat = lat.toString()

            var lng = this.form.lng
            lng = lng.toString()

            await this.axios.post('/api/culture', {
                user_id: this.user_id,
                termin: this.form.termin,
                place_id: this.form.place_id,
                culture: this.form.culture,
                type: this.form.type,
                delivery: this.form.delivery,
                price: this.form.price,
                weight: this.form.weight,
                lat: lat,
                lng: lng,
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
        getUserId() {
            this.user_id = document.getElementById("user_id").getAttribute('data-user-id')
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
        }
    }
}
</script>

<style scoped>
.select-filter {
    cursor: pointer;
}
.form-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    background-repeat: no-repeat !important;
    background-size: 1.25rem !important;
    background-position-x: calc(100% - 15px);
}
.add-culture .btn-group > .btn:not(:last-child):not(.dropdown-toggle) {
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}
</style>
