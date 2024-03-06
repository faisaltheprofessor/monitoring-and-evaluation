window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.Vue = require("vue");
import VueApexCharts from "vue-apexcharts";

Vue.use(VueApexCharts);

// import chart from "./components/Chart";
Vue.component("apexchart", VueApexCharts);

// Province Chart
let app = new Vue({
    el: "#chart",
    components: {
        apexchart: VueApexCharts
    },
    data: {
        series: [
            {
                name: "Actual",
                data: [0]
            },
            {
                name: "Planned",
                data: [0]
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
            axios
                .get(`/activityDetails?activity_id=${this.activity_id}`)
                .then(response => {
                    this.series[1].data = this.series[1].data.concat(
                        response.data.planned
                    );
                    this.series[0].data = this.series[0].data.concat(
                        response.data.actual
                    );
                    // this.series[1].data = response.data.monthSeries;
                    this.chartOptions = {
                        xaxis: { categories: [0].concat(response.data.years) },

                        title: {
                            text: response.data.chartName
                        },
                        yaxis: {
                            title: {
                                text: response.data.unit
                            }
                        }
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
