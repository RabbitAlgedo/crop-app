require('./bootstrap');

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
import axios from "axios"
import VueAxios from "vue-axios"
import Map from './components/culture/EditCulture.vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(VueAxios, axios)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBX9VzP4EtgebB1iQw6L-eAbOLxdJR7yKI',
        libraries: 'places',
        map_ids: 'e05c23c1b569a6bf',
        language: 'uk'
    }
})
const edit_culture = new Vue({
    el: '#edit_culture',
    render: h => h(Map)
});
