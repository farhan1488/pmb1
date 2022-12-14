<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<style>
    #container {
        height: 400px;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #datatable {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    #datatable caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    #datatable th {
        font-weight: 600;
        padding: 0.5em;
    }

    #datatable td,
    #datatable th,
    #datatable caption {
        padding: 0.5em;
    }

    #datatable thead tr,
    #datatable tr:nth-child(even) {
        background: #f8f8f8;
    }

    #datatable tr:hover {
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
            <h1><?= $title ?></h1>

            <!-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Pendaftar</a></div>
                <div class="breadcrumb-item">Data Prodi 2</div>
            </div> -->
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <figure class="highcharts-figure">
            <div id="container"></div>
            <p>Tabel : </p>
            <table id="datatable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Sudah Bayar</th>
                        <th>Belum Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>BCA</th>
                        <td>251</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <th>MANDIRI</th>
                        <td>270</td>
                        <td>29</td>
                    </tr>
                    <tr>
                        <th>BNI</th>
                        <td>30</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>BRI</th>
                        <td>45</td>
                        <td>9</td>
                    </tr>
        
                </tbody>
            </table>
        </figure>



        <script>
            Highcharts.chart('container', {
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Total pendaftar yang sudah membayar dan belum membayar berdasarkan bank pembayaran'
                },
                subtitle: {
                    text: 'Jumlah <br>Sudah Bayar: 596 <br>Belum Bayar: 68</a>'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Pendaftar'
                    }
                },
                tooltip: {
                    formatter: function() {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' Data';
                    }
                }
            });
        </script>

    </section>
</div>




<?php $this->load->view('dist/_partials/footer'); ?>