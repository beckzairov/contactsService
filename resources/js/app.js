require('./bootstrap');

// Require Vue
window.Vue = require('vue').default;

// Register Vue Components
Vue.component('v-favorite', require('./components/FavoriteComponent.vue').default);
Vue.component('drop-down', require('./components/DropDown.vue').default);
Vue.component('v-edit', require('./components/Edit.vue').default);

// Initialize Vue
const app = new Vue({
    el: '#app',
});
