// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */
//
require('./bootstrap');
//
// window.Vue = require('vue').default;
window.$ = window.jQuery = require('jquery');
//
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

import {createApp} from 'vue'
import FilterMainComponent from './components/Filter/FilterMainComponent.vue'
import Preloader from './plugins/Preloader.vue'
import Jquery from 'jquery';
import { i18nVue } from 'laravel-vue-i18n'
import ApiPlugin from './plugins/api.js';
import FilterData from "./mixins/filter";
import GlobalData from "./mixins/global-data";



const app = createApp({})
app.config.globalProperties.$api = ApiPlugin;
app.mixin(FilterData);
app.mixin(GlobalData);
app.use(i18nVue, {
    resolve: lang => require(`../lang/${lang}/main.json`),
});
app.component('preloader', Preloader);
app.component('filter-main-component', FilterMainComponent);
app.mount('#app');
