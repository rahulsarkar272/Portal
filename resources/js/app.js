import './bootstrap';
import router from "./router.js";
import { createApp } from 'vue'
import SwiperCore, {   } from 'swiper'
import GLightbox from 'glightbox'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import 'aos/dist/aos.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import 'remixicon/fonts/remixicon.css';
import '@fortawesome/fontawesome-free/css/all.css'
// import './assets/vendor/aos/aos.js'
// import './assets/vendor/bootstrap/js/bootstrap.bundle.min.js'
import './assets/vendor/glightbox/js/glightbox.min.js'
import './assets/vendor/isotope-layout/isotope.pkgd.min.js'
import './assets/vendor/swiper/swiper-bundle.min.js'
import './assets/vendor/waypoints/noframework.waypoints.js'
import './assets/vendor/php-email-form/validate.js'
import './assets/js/main.js'
import 'swiper/swiper-bundle.css';
// import 'boxicons'



// import the root component App from a single-file component.
import App from './App.vue'

const app = createApp(App);
app.config.globalProperties.$GLightbox = GLightbox
app.use(router);
SwiperCore.use([]);
app.mount('#app')

