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
                name: "Quantity",
                data: []
            }
        ],
        chartOptions: {
            title: {
                text: "",
                style: {
                    fontSize: 10
                }
            },

            chart: {
                type: "bar",
                // height: 350
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0,
                    tools: {
                        download: true,
                        selection: true,
                        zoom: true,
                        zoomin: true,
                        zoomout: true,
                        pan: true,
                        reset:
                            true |
                            '<img src="/static/icons/reset.png" width="20">',
                        customIcons: []
                    }
                }
            },

            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: []
            },
            plotOptions: {
                bar: {
                    barHeight: "95%",
                    distributed: true,
                    horizontal: false,
                    dataLabels: {
                        position: "bottom"
                    }
                }
            }
        }
    },
    computed: {
        plan_id() {
            let params = new URLSearchParams(window.location.search);
            const myParam = params.get("plan_id");
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
                .get(`/chartProvinces?plan_id=${this.plan_id}`)
                .then(response => {
                    this.chartOptions = {
                        xaxis: { categories: response.data.provinces }
                    };

                    this.series[0].data = response.data.provinceSeries;
                    // this.series[1].data = response.data.monthSeries;
                });
        },

        changeChartType() {
            alert("chart is being changed");
        }
    },

    created() {
        this.getChartName();
        this.updateChart();
    }
});

// District Chart
let districtApp = new Vue({
    el: "#districtChart",
    components: {
        apexchart: VueApexCharts
    },
    data: {
        series: [
            {
                name: "Quantity",
                data: []
            }
        ],
        chartOptions: {
            title: {
                text: "",
                style: {
                    fontSize: 10
                }
            },

            chart: {
                type: "bar",
                height: 1000,
                toolbar: {
                    show: true,
                    offsetX: 0,
                    offsetY: 0,
                    tools: {
                        download: true
                    }
                }
            },

            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: []
            },
            plotOptions: {
                bar: {
                    // barHeight: "95%",
                    distributed: true,
                    horizontal: true
                    // dataLabels: {
                    //     position: "bottom"
                    // }
                }
            }
        }
    },
    computed: {
        plan_id() {
            let params = new URLSearchParams(window.location.search);
            const myParam = params.get("plan_id");
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
                .get(`/chartDistricts?plan_id=${this.plan_id}`)
                .then(response => {
                    this.chartOptions = {
                        xaxis: { categories: response.data.districts }
                    };

                    this.series[0].data = response.data.districtSeries;
                    // this.series[1].data = response.data.monthSeries;
                });
        },

        changeChartType() {
            alert("chart is being changed");
        }
    },

    created() {
        this.getChartName();
        this.updateChart();
    }
});

// Month Chart

let monthApp = new Vue({
    el: "#monthChart",
    components: {
        apexchart: VueApexCharts
    },
    data: {
        series: [
            {
                name: "Quantity",
                data: []
            }
        ],
        chartOptions: {
            title: {
                text: "",
                style: {
                    fontSize: 10
                }
            },

            chart: {
                type: "line",
                dropShadow: {
                    enabled: true,
                    color: "#000",
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                }

                // height: 350
            },

            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec"
                ]
            },
            plotOptions: {
                bar: {
                    barHeight: "95%",
                    distributed: true,
                    horizontal: false,
                    dataLabels: {
                        position: "bottom"
                    }
                }
            }
        }
    },
    computed: {
        plan_id() {
            let params = new URLSearchParams(window.location.search);
            const myParam = params.get("plan_id");
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
            axios.get(`/chartMonths?plan_id=${this.plan_id}`).then(response => {
                this.series[0].data = response.data.monthSeries;
                // this.series[1].data = response.data.monthSeries;
            });
        },

        changeChartType() {
            alert("chart is being changed");
        }
    },

    created() {
        this.getChartName();
        this.updateChart();
    }
});
