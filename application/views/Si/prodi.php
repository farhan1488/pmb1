<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Prodi</h1>
            <!-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>mahasiswa/prodi1">Data Prodi 1</a></div>
                <div class="breadcrumb-item">Data Prodi</div>
            </div> -->
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Prodi</h4>
                        </div>
                        <div class="card-body">

                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Id Prodi</th>
                                            <th>Nama Prodi</th>
                                            <th>Jenjang</th>
                                            <th>Nama Fakultas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($prodi as $row) : ?>
                                            <tr>

                                                <td><?= $row->id_prodi; ?></td>
                                                <td><?= $row->nama_prodi; ?></td>
                                                <td><?= $row->jenjang; ?></td>
                                                <td><?= $row->nama_fakultas; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>