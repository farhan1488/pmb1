<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Tambah Mahasiswa</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Mahasiswa</h4>
                        </div>
                        <?= form_open_multipart("mahasiswa/edit_save") ?>

                        <div class="card-body">

                            <input type="hidden" id="id_mhs" name="id_mhs" value="<?= $mahasiswa->id_mhs ?>">

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $mahasiswa->nama; ?>">
                            </div>

                            <div class="form-group">
                                <label>NIM</label>
                                <input type="number" class="form-control" id="nim" name="nim" value="<?= $mahasiswa->nim; ?>">
                            </div>

                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $mahasiswa->no_hp; ?>">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa->email; ?>">
                            </div>

                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $mahasiswa->jurusan; ?>">
                            </div>

                            <div class="form-group">
                                <label>Foto Profile</label>
                                <input type="file" class="form-control" id="foto_profile" name="foto_profile" value="<?= $mahasiswa->foto_profil; ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mahasiswa->alamat; ?>">
                            </div>

                        </div>
                        <div class=" card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>