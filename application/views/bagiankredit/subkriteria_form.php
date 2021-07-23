<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h1>Tambah Data Subriteria</h1>
              </div>

                 <form method="post" action="<?php echo base_url('bagiankredit/subkriteria/input_aksi') ?>">
                <div class="card-body">

                  <div class="form-group">
                    <label>Kode Subriteria</label>
                    <input type="text" name="id_sub" class="form-control" id="id_sub" placeholder="Masukan Kode Subkriteria">
                  <?php echo form_error('id_sub', '<div class="text-danger small" ml-3>') ?>
                  </div>

                 <div class="form-group">
                 <label for="nama_kriteria">Nama Kriteria</label>
                  <select id="nama_kriteria" name="nama_kriteria" class="form-control">
                  <?php foreach ($kriteria as $krt) :?>
                     <option value="<?php echo $krt->nama_kriteria ?>"><?php echo $krt->nama_kriteria ?></option>
                  <?php endforeach; ?>
                  </select>
                  </div>

                 <div class="form-group">
                    <label>Nama Subkriteria</label>
                    <input type="text" name="nama_sub" class="form-control" id="nama_sub" placeholder="Masukan Nama Subkriteria">
                  <?php echo form_error('nama_sub', '<div class="text-danger small" ml-3>') ?>
                  </div>
                   

                  <div class="form-group">
                    <label>Bobot Subkrteria</label>
                     <select id="bobot_sub" name="bobot_sub" class="form-control">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>

              <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </div>
            </div>
          </div>
      </div>
  </div>
</section>
</div>