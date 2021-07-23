<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bagiankredit/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Kriteria</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
<!--                <?php echo anchor('bagiankredit/kriteria/input','<button class="btn  btn-primary right"><i class="fa fa-plus"></i> <strong> Tambah</strong></button>') ?> -->
              <h3 class="card-title"></h3>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Atribut</th>
                        <th>Bobot</th>
                        <th>AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1;
                foreach ($kriteria as $krt) :?>
                  <tr>
                     <td><?php echo $no++ ?></td>
                    <td><?php echo $krt->id_kriteria ?></td>
                    <td><?php echo $krt->nama_kriteria ?></td>
                    <td><?php echo $krt->Type ?></td>
                    <td><?php echo $krt->bobot_kriteria ?></td>
                    <td>
                      <?php echo anchor('bagiankredit/kriteria/update/'.$krt->id_kriteria,'<div class="btn btn-sm btn-primary mr-2 ml-2 mb-2 mt-2"><i class="fa fa-edit"></i></div>') ?>
                    </td>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>
          </div>
      </section>
    </div>

