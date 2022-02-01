require('./bootstrap');

import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
import axios from "axios"
import VueAxios from "vue-axios"
import Map from './components/comora_place/CreatePlace'
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
const place = new Vue({
    el: '#create_place',
    render: h => h(Map)
});
