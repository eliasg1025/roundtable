require("./bootstrap");

window.Vue = require("vue");

// Suport Vuex

import store from "./store/index";
import StarRating from 'vue-star-rating'

// UI Components
Vue.component("PageBanner", require("./components/PageBanner.vue").default);
Vue.component("PageFooter", require("./components/PageFooter.vue").default);
Vue.component(
	"ModalLoginRegister",
	require("./components/ModalLoginRegister").default
);
Vue.component("Spinner", require("./components/Spinner.vue").default);
Vue.component("CardBusiness", require("./components/CardBusiness.vue").default);
Vue.component("RatingStars", require("./components/RatingStars.vue").default);
Vue.component("Ratings",require("./components/Ratings").default);
Vue.component("star-rating", StarRating);
Vue.component(
	"notification_bell",
	require("./components/NotificationBell").default
);
Vue.component(
	"notification_dropdown",
	require("./components/NotificationDropdown").default
);

// Home page
Vue.component("Home", require("./components/Home.vue").default);
Vue.component("HomeBanner", require("./components/HomeBanner.vue").default);
Vue.component(
	"HomeCompradoresDestacados",
	require("./components/HomeCompradoresDetacados.vue").default
);
Vue.component(
	"HomeVendedoresDestacados",
	require("./components/HomeVendedoresDestacados.vue").default
);
Vue.component(
	"HomeMasVisitados",
	require("./components/HomeMasVisitados.vue").default
);
Vue.component(
	"HomeCategorias",
	require("./components/HomeCategorias.vue").default
);
Vue.component(
	"HomeCarouselEmpresa",
	require("./components/HomeCarouselEmpresa.vue").default
);

// Reset password page
Vue.component(
	"ResetPassword",
	require("./components/ResetPassword.vue").default
);

// Profile page
Vue.component("Profile", require("./components/Profile.vue").default);

// Business Profile page
Vue.component("Business", require("./components/Business.vue").default);
Vue.component(
	"BusinessBanner",
	require("./components/BusinessBanner.vue").default
);
Vue.component(
	"BusinessVideos",
	require("./components/BusinessVideos.vue").default
);
Vue.component(
	"BusinessImages",
	require("./components/BusinessImages.vue").default
);
Vue.component(
	"BusinessProducts",
	require("./components/BusinessProducts.vue").default
);

//planes
// estos son nombres de tus componentes
Vue.component("planes", require("./components/Planes.vue").default);
Vue.component("puntos", require("./components/puntos.vue").default);
Vue.component("Add-Bag", require("./components/AddBag.vue").default);
Vue.component("pago", require("./components/Pagos.vue").default);
//contacto
Vue.component("contacto", require("./components/Contact.vue").default);

// Search business page
Vue.component("Search", require("./components/Search.vue").default);
Vue.component("SearchBar", require("./components/SearchBar.vue").default);

// Schedule page
Vue.component("new-schedule", require("./components/NewSchedule").default);

// Conference page
Vue.component("Conference", require("./components/Conference.vue").default);

const app = new Vue({
	el: "#app",
	store
});

require("./carousel");
require("./helpers");
require("./navbar");
require("./culqi");
require("./pusher-action.js");
require("./zepto");
