import Vue from 'vue';
import router from './router.js';
import App from './components/App';
import Example from './components/ExampleComponent';

require('./bootstrap');

// window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
