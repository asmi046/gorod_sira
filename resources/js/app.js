import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';

import axios from 'axios'

import VueAxios from 'vue-axios'

import AcordionElement from './components/AcordionElement.vue'

const global_app = createApp({
    components:{
        AcordionElement,
    },
})

global_app.use(VueAxios, axios)
global_app.mount("#global_app")
