/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
/* 2 Realty component */
import './bootstrap.js';
//import '../css/app.css';
//import store from "./store";
//import store from "../../Modules/Realty/Resources/assets/js/store";
/*
import { createApp } from 'vue'; //Не работает!!!!*/
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from "./router/router";
import store from "./store";
//import components from "./components/UI"
/*import { ZiggyVue } from 'ziggy'; // работает если прописать псевдоним в vite.config ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),*/
//import { ZiggyVue } from '/vendor/tightenco/ziggy/dist/vue.es.js';




/*components.forEach(component => {
    app.component(component.name, component)
})*/
// глобальный доступ к стат ресурсам для vite при компиляции app.js
import.meta.glob([
    '../img/**',
    '../css/**',
   // '../../Resources/assets/img/**',
   // '../../Resources/assets/css/**',
]);

const App = createApp({
    /*   components: {
           RealtyViewsUserComponent,
           RealtyLikesUserComponent,
       }*/
});
// import Realty components
/*realtyComponents.forEach(component => {
    App.component(component.name, component)
    // console.log(component.name, component)
})*/



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/RealtyExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

App.use(router).use(store).mount('#app');
