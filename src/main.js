import "@babel/polyfill";
import "mutationobserver-shim";
import Vue from "vue";
import "./plugins/bootstrap-vue";
import "./plugins/bootstrap-vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import VueSweetalert2 from "vue-sweetalert2";
window.swal = require("sweetalert2");
Vue.use(VueSweetalert2);
import "./js/myJavaScript";

import "popper.js";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

import "sweetalert2/dist/sweetalert2.min.css";
import "./css/style.css";
Vue.config.productionTip = false;

import VueAwesomeSwiper from 'vue-awesome-swiper';
import 'swiper/swiper-bundle.css';
 
Vue.use(VueAwesomeSwiper, /* { default global options } */);

export const fBus = new Vue();
export const darkTheme = new Vue();
export const lightTheme = new Vue();
export const Theme = new Vue();

import AOS from 'aos';
import 'aos/dist/aos.css';


new Vue({
  created : function(){
    AOS.init();
  },
  router,
  store,
  render: h => h(App)
}).$mount("#app");
