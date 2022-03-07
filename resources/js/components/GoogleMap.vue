<template>
    <div class="row flex-column-reverse flex-lg-row">
        <div class="col-md-2 ps-4 sideboard">
            <div>
                <ul class="nav nav-pills my-2 justify-content-between" id="sidebarTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="filters-tab" data-bs-target="#filters" data-bs-toggle="tab" type="button" role="tab" aria-controls="filters" aria-selected="true">Фільтри</button>
                    </li>
                    <li v-on:click="getCulturesPrice" class="nav-item" role="presentation">
                        <button class="nav-link" id="prices-tab" data-bs-target="#prices" data-bs-toggle="tab" type="button" role="tab" aria-controls="prices" aria-selected="false">Ціни</button>
                    </li>
                </ul>
                <div class="tab-content" id="sidebar-tabs">
                    <div class="tab-pane fade active show" id="filters" role="tabpanel" aria-labelledby="filters-tab">
                        <div class="d-flex flex-column justify-content-between" style="height: 87vh">
                            <Filters v-on:updateFilter="updateFilter" v-on:changeZoom="changeZoomMap" :filters="filters" />
                            <LegendList/>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="prices" role="tabpanel" aria-labelledby="prices-tab">
                        <culture-list v-for="culture in culture_prices" :culture="culture" :key="culture.culture_id" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 crop-map">
            <gmap-map
                :zoom="zoom"
                :center="this.regions[this.filters.region]"
                :options="options"
                style="width:100%;  height: 90vh;"
            >
                <div v-for="place in markers.type">
                    <gmap-custom-marker v-show="filters.type.includes(place.place_type)"
                                        :key="place.id"
                                        :draggable="false"
                                        :marker="{ lat: place.lat, lng: place.lng }"
                    >
                        <place-icon :place="place" v-on:openInfoWindow="openInfoWindow" />
                    </gmap-custom-marker>
                </div>
                <div v-for="culture in markers.cultures">
                    <gmap-custom-marker v-show="filters.culture.includes(culture.culture) && filters.delivery.includes(culture.delivery) && filters.status.includes(culture.type)"
                                        :key="culture.id"
                                        :draggable="false"
                                        :marker="{ lat: culture.lat, lng: culture.lng }"
                    >
                        <culture-icon :culture="culture" v-on:openInfoWindowCulture="openInfoWindowCulture" />
                    </gmap-custom-marker>
                </div>

                <div v-for="region in delivery">
                    <gmap-custom-marker :key="region.id"
                                        :draggable="false"
                                        :marker="{ lat: region.position.lat, lng: region.position.lng }">
                        <avaible-delivery :types="region.types" />
                    </gmap-custom-marker>
                </div>

                <gmap-info-window
                    v-if="selectedLocation !== null"
                    :opened="infoWindow.show"
                    :position="{lat: parseFloat(selectedLocation.lat), lng: parseFloat(selectedLocation.lng) }"
                    @closeclick="infoWindow.show = false">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="card-header d-flex justify-content-between">
                                {{selectedLocation.name}}
                                <favorite-button />
                            </div>
                            <ul class="list-group list-group-flush">
                                <h5 class="list-group-item card-title card-selected-padding">{{this.place_types[selectedLocation.place_type]}}</h5>
                                <li class="list-group-item">{{selectedLocation.address}}</li>
                                <li class="list-group-item">Скупляє: Ячмінь, Сою</li>
                                <li class="list-group-item"><a href="#" class="card-link">Детальніше</a></li>
                            </ul>
                        </div>
                    </div>
                </gmap-info-window>

                <gmap-info-window
                    v-if="selectedCulture !== null"
                    :opened="infoWindowCulture.show"
                    :position="{lat: parseFloat(selectedCulture.lat), lng: parseFloat(selectedCulture.lng) }"
                    @closeclick="infoWindowCulture.show = false">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="card-header">
                                {{this.culture_types[selectedCulture.type]}}
                            </div>
                            <h5 class="card-title card-selected-padding">{{this.culture_names[selectedCulture.culture]}}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Тип: {{selectedCulture.delivery}}</li>
                                <li class="list-group-item">Ціна: {{selectedCulture.price}}$ за 1т.</li>
                                <li class="list-group-item">Термін: {{selectedCulture.termin}}д.</li>
                                <li class="list-group-item">Вага: {{selectedCulture.weight}}т.</li>
                                <li class="list-group-item">Актуальність: {{this.culture_statuses[selectedCulture.status]}}</li>
                                <li class="list-group-item"><a href="#" class="card-link">Контакти</a></li>
                            </ul>
                        </div>
                    </div>
                </gmap-info-window>
            </gmap-map>
        </div>
    </div>

</template>

<script>
import Filters from "./filters/Filters";
import CultureIcon from "./markers/CultureIcon";
import LegendList from "./LegendList";
import PlaceMarker from "./place/PlaceMarker";
import PlaceIcon from "./markers/PlaceIcon";
import CultureList from "./prices/cultureList";
import FavoriteButton from "./favoriteButton";
import AvaibleDelivery from "./avaibleDelivery";

export default {
    name: "AddGoogleMap",
    components: {
        AvaibleDelivery,
        FavoriteButton,
        CultureList,
        PlaceIcon,
        PlaceMarker,
        LegendList,
        CultureIcon,
        Filters,
    },
    data() {
        return {
            selectedLocation: null,
            selectedCulture: null,
            infoWindow: {
                show: false,
                position: {},
                options: {
                    pixelOffset: {
                        width: 0,
                        height: -25,
                    }
                }
            },
            infoWindowCulture: {
                show: false,
                position: {},
                options: {
                    pixelOffset: {
                        width: 0,
                        height: -25,
                    }
                }
            },
            filters: {
                region: 'center',
                status: ["SELLING", "BUYING"],
                delivery: ["FCA", "CPT", "EXW"],
                culture: ["BARLEY", "SOY", "CORN"],
                type: ["ELEVATOR", "ZAVOD", "COMORA"]
            },
            markers: {
                type: [],
                cultures: []
            },
            delivery: {
                ternopil: {
                    id: 0,
                    position: {
                        lat: 49.748405,
                        lng: 25.5626497
                    },
                    types: [
                        {
                            name: 'EXW',
                            producers: [
                                {
                                    id: 1,
                                    name: 'ОЛІЯР'
                                },
                                {
                                    id: 2,
                                    name: 'МХП',
                                },
                            ]
                        },
                        {
                            name: 'FCA',
                            producers: [
                                {
                                    id: 1,
                                    name: 'ОЛІЯР'
                                }
                            ]
                        },
                    ]
                },
                lviv: {
                    id: 1,
                    position: {
                        lat: 50.0327787,
                        lng: 23.9421962
                    },
                    types: [
                        {
                            name: 'EXW',
                            producers: [
                                {
                                    id: 1,
                                    name: 'ОЛІЯР'
                                },
                                {
                                    id: 2,
                                    name: 'МХП',
                                },
                            ]
                        }
                    ]
                },
                poltava: {
                    id: 2,
                    position: {
                        lat: 49.7920134,
                        lng: 34.5263093
                    },
                    types: [
                        {
                            name: 'EXW',
                            producers: [
                                {
                                    id: 1,
                                    name: 'ОЛІЯР'
                                },
                                {
                                    id: 2,
                                    name: 'МХП',
                                },
                            ]
                        },
                        {
                            name: 'FCA',
                            producers: [
                                {
                                    id: 1,
                                    name: 'ОЛІЯР'
                                }
                            ]
                        }
                    ]
                }
            },
            place_types: {
                "ZAVOD": "Завод",
                "COMORA": "Комора",
                "ELEVATOR": "Елеватор"
            },
            culture_statuses: {
                "STOPED": "Призупинено",
                "IN_PROGRESS": "Торгується",
                "HOLDING": "Утримується"
            },
            culture_types: {
                "SELLING": "Продаж",
                "BUYING": "Покупка"
            },
            culture_names: {
              "BARLEY": "Ячмінь" ,
              "SOY": "Соя",
              "CORN": "Кукурудза"
            },
            culture_prices: {},
            regions: {
                "center": {
                    lat: 48.7977037,
                    lng: 31.7699537
                },
                "ternopil": {
                    lat: 49.548405,
                    lng: 25.5626497
                },
                "lviv": {
                    lat: 49.8327787,
                    lng: 23.9421962
                }
            },
            zoom: 6.3,
            options: {
                mapId: 'e05c23c1b569a6bf',
                disableDefaultUI: true,
                minZoom: 6.4,
                clickableIcons: false,
                gestureHandling: 'greedy',
                restriction: {
                    latLngBounds: {
                        north: 52.711661,
                        south: 44.121487,
                        west: 21.749725,
                        east: 40.615880
                    },
                    strictBounds: false,
                },
            },
            center: {
                lat: 48.7977037,
                lng: 31.7699537
            }
        };
    },
    mounted() {
        this.getCultures()
        this.getPlaces()
    },
    methods: {
        locateGeoLocation: function () {
            navigator.geolocation.getCurrentPosition(res => {
                this.center = {
                    lat: res.coords.latitude,
                    lng: res.coords.longitude
                };
            });
        },
        changeZoomMap: function(zoom) {
            this.zoom = zoom
        },
        updateFilter: function (filters) {
            this.filters = filters
        },
        openInfoWindow: function (place) {
            this.infoWindow.show = true
            this.selectedLocation = place
        },
        openInfoWindowCulture: function (culture) {
            this.infoWindowCulture.show = true
            this.selectedCulture = culture
        },
        getCultures: function () {
            this.axios.get('/api/culture' ).then((response) => {
                this.markers.cultures = response.data.cultures
            });
        },
        getPlaces: function () {
            this.axios.get('/api/place' ).then((response) => {
                this.markers.type = response.data.places
            });
        },
        getCulturesPrice: function () {
            this.axios.get('/api/culture-prices' ).then((response) => {
                this.culture_prices = response.data.cultures
            });
        }
    }
};
</script>

<style scoped>
.crop-map {
    position: relative;
}
.cluster img {
    width: 100%;
}
.sideboard {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 90vh;
}
</style>
