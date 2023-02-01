import Vue from "vue";
import axios from 'axios';
import VueAxios from "vue-axios";

const instance = axios.create({
    baseURL: 'http://127.0.0.1:8000/',
    proxy: {
        '^/': {
            target: 'http://127.0.0.1:8000/',
            ws: false,
            changeOrigin: true
        }
    }
});

Vue.use(VueAxios, instance);
