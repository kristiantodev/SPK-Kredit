<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subkriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bagiankredit/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Subkriteria</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
               <?php echo anchor('bagiankredit/subkriteria/input','<button class="btn  btn-primary right"><i class="fa fa-plus"></i> <strong> Tambah</strong></button>') ?>
              <h3 class="card-title"></h3>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Kode Subkriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Nama Subkriteria</th>
                        <th>Bobot</th>
                        <th>AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $start=1; foreach ($subkriteria as $sub) :?>
                  <tr>
                    <td><?php echo $start++; ?></td>
                    <td><?php echo $sub->id_sub ?></td>
                    <td><?php echo $sub->nama_kriteria ?></td>
                    <td><?php echo $sub->nama_sub ?></td>
                    <td><?php echo $sub->bobot_sub ?></td>
                    <td>
                      <?php echo anchor('bagiankredit/subkriteria/update/'.$sub->id_sub,'<div class="btn btn-sm btn-primary mr-2 ml-2 mb-2 mt-2"><i class="fa fa-edit"></i></div>') ?>
                      <?php echo anchor('bagiankredit/subkriteria/delete/'.$sub->id_sub,'<div class="btn btn-sm btn-danger mr-2 ml-2 mb-2 mt-2"><i class="fas fa-trash"></i></div>') ?>
                    </td>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>
          </div>
      </section>
    </div>

