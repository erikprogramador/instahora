window.axios = require('axios');

window.Vue = require('vue');

window.events = new Vue();

window.flash = (message) => window.events.$emit('flash', message);

Vue.component('register-login', require('./components/RegisterLogin.vue'));
Vue.component('upload', require('./components/Upload.vue'));
Vue.component('notification', require('./components/Notification.vue'));

new Vue({
  el: '#app',
  data: {
    isLogin: false,
    upload: false
  }
});
