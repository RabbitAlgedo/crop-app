require('./bootstrap');

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
import axios from "axios"
import VueAxios from "vue-axios"
import Map from './components/mainMap.vue'
import GmapCustomMarker from 'vue2-gmap-custom-marker'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.component("gmap-custom-marker", GmapCustomMarker)
Vue.component('favorite', {
    data: function() {
        return { };
    },
    props: {
        'name': {
            type: String,
            default: 'favorite'
        },
        'value': {
            type: Boolean,
            default: false
        },
        'disabled': {
            type: Boolean,
            default: false
        }
    },
    methods: {
        favorite: function() {
            if (this.disabled == true) {
                return;
            }
            this.value = !this.value;
        }
    }
});
Vue.use(VueAxios, axios)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBX9VzP4EtgebB1iQw6L-eAbOLxdJR7yKI',
        libraries: 'places',
        // map_ids: 'e05c23c1b569a6bf',
        language: 'uk'
    }
})
const map = new Vue({
    el: '#map',
    render: h => h(Map)
});
