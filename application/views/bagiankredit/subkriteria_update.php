<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h1>Form Update Subkriteria</h1>
              </div>
              <?php foreach ($subkriteria as $sub) : ?>

                 <form method="post" action="<?php echo base_url('bagiankredit/subkriteria/update_aksi') ?>">
                  <div class="card-body">

                  <div class="form-group">
                    <label>Kode Subkriteria</label>
                    <input type="text" name="id_sub" class="form-control" value="<?php echo $sub->id_sub ?>">
                  </div>

                   <div class="form-group">
                    <label>Nama Kriteria</label>
                    <select name="nama_kriteria" class="form-control">
                      <option value="<?php echo $sub->nama_kriteria ?>"><?php echo $sub->nama_kriteria; ?></option>
                      <?php foreach ($kriteria as $krt) :  ?>
                         <option value="<?php echo $krt->nama_kriteria ?>"><?php echo $krt->nama_kriteria; ?></option>
                       <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                   <label>Nama Subkriteria</label>
                  <input type="text" name="nama_sub" class="form-control" value="<?php echo $sub->nama_sub ?>">
                 </div>

                 <div class="form-group">
                   <label>Bobot</label>
                   <select type="text" name="bobot_sub" id="Type" class="form-control" value="<?php echo $sub->bobot_sub ?>">
                    <option value="1"  <?php if($sub->bobot_kriteria=="1"){echo "selected";} ?>>1</option>
                  <option value="2"  <?php if($sub->bobot_kriteria=="2"){echo "selected";} ?>>2</option>
                  <option value="3"  <?php if($sub->bobot_kriteria=="3"){echo "selected";} ?>>3</option>
                  <option value="4"  <?php if($sub->bobot_kriteria=="4"){echo "selected";} ?>>4</option>
                  <option value="5"  <?php if($sub->bobot_kriteria=="5"){echo "selected";} ?>>5</option>
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