<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
            	<h1>Tambah Data Alternatif</h1>
          	  </div>

          	     <form method="post" action="<?php echo base_url('bagiankredit/nasabah/input_aksi') ?>">
                <div class="card-body">

                  <div class="form-group">
                    <label>Nama Nasabah</label>
                    <input type="text" name="nama_nasabah" class="form-control" id="nama_nasabah" placeholder="Masukan Nama Nasabah">
                  <?php echo form_error('nama_nasabah', '<div class="text-danger small" ml-3>') ?>
                  </div>

                  <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukan NIK">
                  <?php echo form_error('nik', '<div class="text-danger small" ml-3>') ?>
                  </div>

                  <div class="form-group">
                    <label>Tempat Tanggal Lahir</label>
                    <input type="date" name="ttl" class="form-control" id="ttl">
                  <?php echo form_error('ttl', '<div class="text-danger small" ml-3>') ?>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text-area" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat">
                  <?php echo form_error('alamat', '<div class="text-danger small" ml-3>') ?>
                  </div>

                   <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="no_tlp" class="form-control" id="no_tlp" placeholder="Masukan Nomor Telepon">
                  <?php echo form_error('no_tlp', '<div class="text-danger small" ml-3>') ?>
                  </div>


           		<button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </div>
          	</div>

            

          </div>
      </div>
  </div>
</section>
</div>