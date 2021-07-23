<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h1>Form Update Nasabah</h1>
              </div>
              <?php foreach ($alternatif as $alt) : ?>

                 <form method="post" action="<?php echo base_url('bagiankredit/nasabah/update_aksi') ?>">
                  <div class="card-body">

                  <div class="form-group">
                    <label>Nama Nasabah</label>
                    <input type="text" name="nama_nasabah" class="form-control" value="<?php echo $alt->nama_nasabah ?>">
                  </div>


                  <div class="form-group">
                   <label>NIK</label>
                   <input type="text" name="nik" class="form-control" value="<?php echo $alt->nik ?>">
                  </div>

                  <div class="form-group">
                   <label>Tempat, Tanggal Lahir</label>
                   <input type="date" name="ttl" class="form-control" value="<?php echo $alt->ttl ?>">
                  </div>

                  <div class="form-group">
                   <label>Alamat</label>
                   <input type="text" name="alamat" class="form-control" value="<?php echo $alt->alamat ?>">
                  </div>

                  <div class="form-group">
                   <label>Nomor Telepon</label>
                   <input type="text" name="no_tlp" class="form-control" value="<?php echo $alt->no_tlp ?>">
                  </div>


                 </form>

              <?php endforeach; ?>

              <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </div>
            </div>
          </div>
      </div>
  </div>
</section>
</div>