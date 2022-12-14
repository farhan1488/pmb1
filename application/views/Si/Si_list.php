<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pendaftar</h1>
            
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Pendaftar SELMA</h4>
                        </div>
                        <div class="card-body">

                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>No Pendaftar</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>NISN</th>
                                            <th>NIK</th>
                                            <th>No Hp</th>                                         
                                            <th>Id Prodi 1</th>
                                            <th>Id Prodi 2</th>
                                            <th>Id Jalur</th>
                                            <th>Id Bank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($pendaftar as $row) : ?>
                                            <tr>

                                                <td><?= $row->id_pendaftar; ?></td>
                                                <td><?= $row->no_pendaftar; ?></td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->jenis_kelamin; ?></td>
                                                <td><?= $row->agama; ?></td>
                                                <td><?= $row->alamat; ?></td>
                                                <td><?= $row->nisn; ?></td>
                                                <td><?= $row->nik; ?></td>
                                                <td><?= $row->no_hp; ?></td>
                                                <td><?= $row->id_prodi1; ?></td>
                                                <td><?= $row->id_prodi2; ?></td>
                                                <td><?= $row->id_jalur; ?></td>
                                                <td><?= $row->id_bank; ?></td>
                                
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>