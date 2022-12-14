<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 660px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Main Content -->
<div class="main-content">
    
    <section class="section">
        <div class="section-header">
            <h1><?= $fill ?></h1>
            <!-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Pendaftar</a></div>
                <div class="breadcrumb-item">Data Prodi 2</div>
            </div> -->
        </div>
        <figure class="highcharts-figure">
            <div id="jalur"></div>
            <p class="highcharts-description">
            </p>
            
        </figure>
        <script>
            
            // Create the chart
            // Data retrieved from https://netmarketshare.com
            Highcharts.chart('jalur', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ' Grafik Animo Pendaftar Berdasarkan Jalur Masuk, Yakni Jalur SNMPTN, Jalur Mandiri Tes dan Jalur Mandiri Prestasi.'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [
                        <?php 
                            if(is_array($jalur)){
                                foreach($jalur as $j) {
                                    $nama = $j->nama_jalur;
                                    $jml = $j->jumlah;
                                    echo "{name: '$nama', y: $jml},";
                                }
                            }
                        ?>
                        
                    //     {
                    //     name: '$mandiri1',
                    //     y: 70.67,
                    //     sliced: true,
                    //     selected: true
                    // }, {
                    //     name: 'Edge',
                    //     y: 14.77
                    // }, {
                    //     name: 'Firefox',
                    //     y: 4.86
                    // }, {
                    //     name: 'Safari',
                    //     y: 2.63
                    // }, {
                    //     name: 'Internet Explorer',
                    //     y: 1.53
                    // }, {
                    //     name: 'Opera',
                    //     y: 1.40
                    // }, {
                    //     name: 'Sogou Explorer',
                    //     y: 0.84
                    // }, {
                    //     name: 'QQ',
                    //     y: 0.51
                    // }, {
                    //     name: 'Other',
                    //     y: 2.6
                    // }
                    ]
                }]
            });
        </script>
    
    </section>
</div>




<?php $this->load->view('dist/_partials/footer'); ?>