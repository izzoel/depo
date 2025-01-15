<script>
    /**
     * Dashboard Analytics
     */

    'use strict';

    (function() {
        let cardColor, headingColor, axisColor, shadeColor, borderColor;

        cardColor = config.colors.white;
        headingColor = config.colors.headingColor;
        axisColor = config.colors.axisColor;
        borderColor = config.colors.borderColor;

        const chartOrderStatistics = document.querySelector('#orderStatisticsChart');
        const chartLogbook = document.querySelector('#chartLogbook');
        const chartGaugeTransaksi = document.querySelector('#gaugeTransaksi');

        // Fetch data from the endpoint
        fetch('/depo/chart')
            .then(response => response.json())
            .then(data => {
                // Configuration for the donut chart
                const orderChartConfig = {
                    chart: {
                        height: 165,
                        width: 130,
                        type: 'donut'
                    },
                    labels: ['Alat', 'Bahan Cair', 'Bahan Padat'],
                    series: [data.total_alat, data.total_cair, data.total_padat],
                    colors: [config.colors.primary, config.colors.info, config.colors.warning],
                    stroke: {
                        width: 5,
                        colors: cardColor
                    },
                    dataLabels: {
                        enabled: false,
                        formatter: function(val, opt) {
                            return parseInt(val);
                        }
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        padding: {
                            top: 0,
                            bottom: 0,
                            right: 15
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '75%',
                                labels: {
                                    show: true,
                                    value: {
                                        fontSize: '1.5rem',
                                        fontFamily: 'Public Sans',
                                        color: headingColor,
                                        offsetY: -15,
                                        formatter: function(val) {
                                            return parseInt(val);
                                        }
                                    },
                                    name: {
                                        offsetY: 20,
                                        fontFamily: 'Public Sans'
                                    },
                                    total: {
                                        show: true,
                                        fontSize: '0.8125rem',
                                        color: axisColor,
                                        label: 'Jenis',
                                        formatter: function(w) {
                                            return parseInt(data.total_persediaan);
                                        }
                                    }
                                }
                            }
                        }
                    }
                };

                // Configuration for the area chart
                const logbookChartConfig = {
                    series: [{
                        name: 'ambil',
                        data: [data.total_riwayat_ambil],
                        color: '#696cff'
                    }, {
                        name: 'kembali',
                        data: [data.total_riwayat_kembali],
                        color: '#ff3e1d'
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: ["2025-01-01T00:00:00.000Z", "2025-02-01T00:00:00.000Z", "2025-03-01T00:00:00.000Z", "2025-04-01T00:00:00.000Z",
                            "2025-05-01T00:00:00.000Z", "2025-06-01T00:00:00.000Z", "2025-07-01T00:00:00.000Z", "2025-08-01T00:00:00.000Z",
                            "2025-09-01T00:00:00.000Z", "2025-10-01T00:00:00.000Z", "2025-11-01T00:00:00.000Z", "2025-12-01T00:00:00.000Z"
                        ],
                        labels: {
                            datetimeFormatter: {
                                month: "MMM"
                            }
                        }
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy'
                        },
                    },
                };

                // Configuration for the gauge chart
                const gaugeTransaksiConfig = {

                    series: [data.total_riwayat_ambil + data.total_riwayat_kembali],
                    chart: {
                        height: 200,
                        type: 'radialBar',
                        offsetY: -10
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {
                                    fontSize: '16px',
                                    color: undefined,
                                    offsetY: 120
                                },
                                value: {
                                    offsetY: 76,
                                    fontSize: '22px',
                                    color: undefined,
                                    formatter: function(val) {
                                        return val + 'x';
                                    }
                                }
                            }
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            shadeIntensity: 0.15,
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        },
                    },
                    stroke: {
                        dashArray: 4
                    },
                    labels: ['Proses pengguna'],

                };

                if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
                    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
                    statisticsChart.render();
                }

                if (typeof chartLogbook !== undefined && chartLogbook !== null) {
                    const logbookChart = new ApexCharts(chartLogbook, logbookChartConfig);
                    logbookChart.render();
                }

                if (typeof chartGaugeTransaksi !== undefined && chartGaugeTransaksi !== null) {
                    const gaugeTransaksi = new ApexCharts(chartGaugeTransaksi, gaugeTransaksiConfig);
                    gaugeTransaksi.render();
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    })();
</script>
