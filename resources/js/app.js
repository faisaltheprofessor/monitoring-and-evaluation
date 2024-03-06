/**
Author: Faisal Khan
Date: 5/9/2020
Time: 10:34PM
*/

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import * as VueGoogleMaps from "vue2-google-maps";
// import { axios } from "../../public/js/axios.min";

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
// require("./bootstrap");
import VueApexCharts from "vue-apexcharts";

// import chart from "./components/Chart";
window.Vue = require("vue");
Vue.component("apexchart", VueApexCharts);
Vue.use(VueGoogleMaps, {
    load: {
        // region: "AF",
        // language: "fa",
        key: "AIzaSyDJy7-UzmmAi1uHTMdlZrizgi0jZkZPkNc"
        // libraries: "places"
        // libraries: "places,drawing,visualization"
        // autobindAllEvents: true
    }
});

Vue.use(VueApexCharts);                                     

const app = new Vue({
    el: "#app",
    data: {
        zoom: 6,
        showProvinces: true,
        showDistricts: true,
        provinces: [],
        districts: [],
        name: "Google Maps",
        activeProvince: {},
        activeDistrict: {},
        infoWindowOptions: {
            pixelOffset: 0,
            height: -35
        },
        districtInfoWindowOptions: {
            pixelOffset: 0,
            height: -35
        },
        infoWindowOpened: false,
        districtInfoWindowOpened: false
    },
    computed: {
        infoWindowPosition() {
            return {
                lat: parseFloat(this.activeProvince.lat),
                lng: parseFloat(this.activeProvince.long)
            };
        },
        districtInfoWindowPosition() {
            return {
                lat: parseFloat(this.activeDistrict.lat),
                lng: parseFloat(this.activeDistrict.long)
            };
        }
    },
    methods: {
        getPosition(province) {
            return {
                lat: parseFloat(province.lat),
                lng: parseFloat(province.long)
            };
        },
        handleMarkerClicked(province) {
            this.activeProvince = province;
            this.infoWindowOpened = true;
            this.districtInfoWindowOpened = false;
        },
        handleInfoWindowClosed() {
            this.activeProvince = {};
            this.infoWindowOpened = false;
            this.districtInfoWindowOpened = false;
        },
        handleDistrictMarkerClicked(district) {
            this.activeDistrict = district;
            this.districtInfoWindowOpened = true;
            this.infoWindowOpened = false;
        },

        handleZoomChange(e) {
            // console.log(e);
            this.zoom = e;
        }
    },

    created() {
        axios
            .get("/getMapInfo")
            .then(response => (this.provinces = response.data))
            .then(() => {
                axios
                    .get("/getDistrictsCoordinates")
                    .then(district => (this.districts = district.data))
                    // .then(district => console.log(district.data))
                    .catch(error => console.log(error));
            })
            .catch(error => console.log(error));
    }
});
let entryProgressChart = new Vue({
    el: "#entryProgressChart",
    components: {
        apexchart: VueApexCharts
    },
    data: {
        series: [
            {
                name: "Entries",
                data: []
            }
        ],
        chartOptions: {
            chart: {
                height: 350,
                type: "line"
            },
            stroke: {
                width: 7,
                curve: "smooth"
            },
            xaxis: {
                type: "datetime",
                categories: [],
                tickAmount: 10,
                labels: {
                    formatter: function(value, timestamp, opts) {
                        return opts.dateFormatter(
                            new Date(timestamp),
                            "dd MMM"
                        );
                    }
                }
            },
            title: {},
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    gradientToColors: ["#FDD835"],
                    shadeIntensity: 1,
                    type: "horizontal",
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                }
            },
            markers: {
                size: 4,
                colors: ["#FFA41B"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            yaxis: {
                // min: -10,
                // max: 40,
                title: {
                    text: "No. of Records"
                }
            }
        }
    },
    computed: {},
    methods: {
        updateChart() {
            axios.get("/getEntryProgressDetails").then(response => {
                this.chartOptions = {
                    xaxis: { categories: response.data.dates }
                };

                this.series[0].data = response.data.series;
                // this.series[1].data = response.data.monthSeries;
            });
        },

        changeChartType() {
            alert("chart is being changed");
        }
    },

    created() {
        this.updateChart();
    }
});

// Actual Vs. Budget
let actualVsPlanned = new Vue({
    el: "#actualVsPlanned",
    components: {
        apexchart: VueApexCharts
    },
    data: {
        series: [
            {
                name: "Actual",
                data: [3, 6, 4]
            },
            {
                name: "Planned",
                data: [1, 2, 3]
            }
        ],
        chartOptions: {
            chart: {
                height: 350,
                type: "line",
                dropShadow: {
                    enabled: true,
                    color: "#000",
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: true
                }
            },
            colors: ["#77B6EA", "#545454"],
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: "smooth"
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                borderColor: "#e7e7e7",
                row: {
                    colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                    opacity: 0.5
                }
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: [],
                title: {
                    text: "Years"
                }
            },
            yaxis: {
                title: {
                    text: "Quantity"
                }
                // min: 5,
                // max: 40
            },
            legend: {
                position: "top",
                horizontalAlign: "center",
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        }
    },
    computed: {
        activity_id() {
            let params = window.location.href.split("/");
            const myParam = params.pop() || parts.pop(); // handle potential trailing slashes
            return myParam;
        }
    },
    methods: {
        getChartName() {
            axios
                .get(`/getChartName?plan_id=${this.plan_id}`)
                .then(response => {
                    let chartName = response.data;
                    if (chartName.length > 63)
                        chartName = chartName.substring(0, 62) + "...";

                    this.chartOptions = {
                        title: {
                            text: chartName
                        }
                    };
                });
        },
        updateChart() {
            axios.get("/getActualVsPlannedDetails").then(response => {              
                this.series[1].data = response.data.planned;
                this.series[0].data = response.data.actual;
                // this.series[1].data = response.data.monthSeries;
                this.chartOptions = {
                    xaxis: { categories: response.data.years }
                };
                   });
        },

        changeChartType() {
            alert("chart is being changed");
        }
    },

    created() {
        // this.getChartName();
        this.updateChart();
    }
});

