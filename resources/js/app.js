require('./bootstrap');
require('../../public_html/vendor/bootstrap/dist/js/bootstrap.bundle.min');
require('./blockUI');

window.Vue = require('vue');

// COMPONENTS FOR PANGAS.
Vue.component('create-panga', require('./components/panga/create-panga.vue').default);
Vue.component('edit-panga', require('./components/panga/edit-panga.vue').default);
Vue.component('only-panga', require('./components/panga/only-panga.vue').default);
Vue.component('panga-boat-specs', require('./components/panga/panga-boat-specs.vue').default);
Vue.component('panga-boat-specs-captain', require('./components/panga/panga-boat-specs-captain.vue').default);
Vue.component('panga-boat-specs-rates', require('./components/panga/panga-boat-specs-rates.vue').default);
Vue.component('panga-boat-specs-rates-captain', require('./components/panga/panga-boat-specs-rates-captain.vue').default);
Vue.component('not-rates', require('./components/panga/not-rates.vue').default);
Vue.component('no-captain-no-rates', require('./components/panga/no-captain-no-rates.vue').default);
Vue.component('no-captain', require('./components/panga/no-captain.vue').default);
Vue.component('panga-rates', require('./components/panga/panga-rates.vue').default);

//COMPONENTS FOR CHARTERS.
Vue.component('create-charter', require('./components/charter/create-charter.vue').default);
Vue.component('edit-charter', require('./components/charter/edit-charter.vue').default);
Vue.component('only-charter', require('./components/charter/only-charter.vue').default);
Vue.component('charter-boat-specs', require('./components/charter/charter-boat-specs.vue').default);
Vue.component('charter-boat-specs-rates', require('./components/charter/charter-boat-specs-rates.vue').default);
Vue.component('charter-boat-specs-captain', require('./components/charter/charter-boat-specs-captain.vue').default);
Vue.component('charter-boat-specs-rates-captain', require('./components/charter/charter-boat-specs-rates-captain.vue').default);
Vue.component('charter-rates-captain', require('./components/charter/charter-rates-captain.vue').default);
Vue.component('not-rates', require('./components/charter/not-rates.vue').default);
Vue.component('no-rates-no-boat-specs', require('./components/charter/no-rates-no-boat-specs.vue').default);
Vue.component('no-captain-no-rates', require('./components/charter/no-captain-no-rates.vue').default);
Vue.component('no-captain', require('./components/charter/no-captain.vue').default);
Vue.component('charter-rates', require('./components/charter/charter-rates.vue').default);

var app = new Vue({
    el: '#app',
});