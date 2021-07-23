<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
            	<h1>Tambah Data Kriteria</h1>
          	  </div>

          	     <form method="post" action="<?php echo base_url('bagiankredit/kriteria/input_aksi') ?>">
                <div class="card-body">

                  <div class="form-group">
                    <label>Kode Kriteria</label>
                    <input type="text" name="id_kriteria" class="form-control" id="id_kriteria" placeholder="Masukan Kode Kriteria">
                  <?php echo form_error('id_kriteria', '<div class="text-danger small" ml-3>') ?>
                  </div>

                  <div class="form-group">
                    <label>Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control" id="nama_kriteria" placeholder="Masukan Nama Kriteria">
                  <?php echo form_error('nama_kriteria', '<div class="text-danger small" ml-3>') ?>
                  </div>

                   <div class="form-group">
                    <label>Atribut</label>
                    <select name="Type" id="Type" class="form-control">
              		<option value="Benefit">Benefit</option>
              		<option value="Cost">Cost</option>
            		</select>
                  </div>

                  <div class="form-group">
                    <label>Bobot Krteria</label>
                     <select id="bobot_kriteria" name="bobot_kriteria" class="form-control">
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