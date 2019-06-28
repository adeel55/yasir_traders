// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from "vue";
import VueRouter from "vue-router";
import App from "./App.vue";
require('./bootstrap');
// router setup
import routes from "./routes/routes";

// Plugins
import GlobalComponents from "./globalComponents";
import GlobalDirectives from "./globalDirectives";
import Notifications from "./components/NotificationPlugin";


// import 'bootstrap/dist/css/bootstrap.min.css'
// import 'bootstrap/dist/js/bootstrap.min.js'

// MaterialDashboard plugin
import MaterialDashboard from "./material-dashboard";

import Chartist from "chartist";


// configure router
const router = new VueRouter({
  routes, // short for routes: routes
  linkExactActiveClass: "nav-item active"
});

Vue.component('vendor-table', require('./components/Tables/VendorTable.vue').default);
Vue.component('create-profile-form', require('./pages/UserProfile/CreateProfile.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('DialogPrompt', require('./components/Dialogs/DialogPrompt.vue').default);
Vue.component('product-row', require('./components/ProductRow.vue').default);


// Pagination
Vue.component('pagination', require('laravel-vue-pagination'));




Vue.prototype.$Chartist = Chartist;

Vue.use(VueRouter);
Vue.use(MaterialDashboard);
Vue.use(GlobalComponents);
Vue.use(GlobalDirectives);
Vue.use(Notifications);

/* eslint-disable no-new */
new Vue({
  el: "#app",
  render: h => h(App),
  router,
  data: {
    Chartist: Chartist
  }
});
