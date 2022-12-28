require("./bootstrap");

window.Vue = require("vue").default;

import {
    Button,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess,
} from "vform/src/components/bootstrap5";
// 'vform/src/components/bootstrap4'
// 'vform/src/components/tailwind'

Vue.component(Button.name, Button);
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertErrors.name, AlertErrors);
Vue.component(AlertSuccess.name, AlertSuccess);

let Fire = new Vue();
window.Fire = Fire;
//Import Alert
import Swal from "sweetalert2";
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
});
window.Toast = Toast;

// Progress Bar
import VueProgressBar from "vue-progressbar";
Vue.use(VueProgressBar, {
    color: "rgb(143, 255, 199)",
    failedColor: "red",
    height: "20px",
});

import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

let routes = [
    {
        path: "/data-anggota",
        component: require("./components/admin/Data-anggota.vue").default,
    },
    {
        path: "/data-wilayah",
        component: require("./components/admin/Data-wilayah.vue").default,
    },
];

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("aside-admin", require("./components/admin/aside.vue").default);
const router = new VueRouter({
    mode: "history",
    routes,
});

const app = new Vue({
    el: "#app",
    router,
});
