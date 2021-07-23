<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
            	<h1>Form Update Kriteria</h1>
          	  </div>
              <?php foreach ($kriteria as $krt) : ?>

                 <form method="post" action="<?php echo base_url('bagiankredit/kriteria/update_aksi') ?>">
                  <div class="card-body">

                  <div class="form-group">
                    <label>Kode Kriteria</label>
                    <input type="text" readonly name="id_kriteria" class="form-control" value="<?php echo $krt->id_kriteria ?>">
                  </div>

                   <div class="form-group">
                    <label>Nama Kriteria</label>
                    <input type="text" readonly name="nama_kriteria" class="form-control" value="<?php echo $krt->nama_kriteria ?>">
                  </div>

                  <div class="form-group">
                   <label>Atribut</label>
                   <select type="text" name="Type" id="Type" class="form-control" value="<?php echo $krt->Type ?>">
                  <option value="Benefit" <?php if($krt->Type=="Benefit"){echo "selected";} ?>>Benefit</option>
                  <option value="Cost" <?php if($krt->Type=="Cost"){echo "selected";} ?>>Cost</option>
                   </select>
                 </div>

                 <div class="form-group">
                   <label>Bobot</label>
                   <select type="text" name="bobot_kriteria" id="Type" class="form-control" value="<?php echo $krt->bobot_kriteria ?>">
                    <option value="1"  <?php if($krt->bobot_kriteria=="1"){echo "selected";} ?>>1</option>
                  <option value="2"  <?php if($krt->bobot_kriteria=="2"){echo "selected";} ?>>2</option>
                  <option value="3"  <?php if($krt->bobot_kriteria=="3"){echo "selected";} ?>>3</option>
                  <option value="4"  <?php if($krt->bobot_kriteria=="4"){echo "selected";} ?>>4</option>
                  <option value="5"  <?php if($krt->bobot_kriteria=="5"){echo "selected";} ?>>5</option>
                   </select>
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