window.Vue = require("vue");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
import vSelect from "vue-select";
Vue.component("v-select", vSelect);
import "vue-select/dist/vue-select.css";

let app = new Vue({
    el: "#root",
    data: {
        manualScheme: false,
        manualVillage: false,
        manualIA: false
    },
    computed: {
        scheme() {
            return !this.manualScheme;
        },
        village() {
            return !this.manualVillage;
        },
        IA() {
            return !this.manualIA;
        }
    },
    mounted() {}
});
