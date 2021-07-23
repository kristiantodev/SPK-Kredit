<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alternatif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bagiankredit/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Alternatif</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
               <?php echo anchor('bagiankredit/nasabah/input','<button class="btn  btn-primary right"><i class="fa fa-plus"></i> <strong> Tambah</strong></button>') ?>
              <h3 class="card-title"></h3>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Nasabah</th>
                        <th>NIK</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Nomot Telepon</th>
                        <th>AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1;
                foreach ($alternatif as $alt) :?>
                  <tr>
                     <td><?php echo $no++ ?></td>
                    <td><?php echo $alt->nama_nasabah ?></td>
                    <td><?php echo $alt->nik ?></td>
                    <td><?php echo $alt->ttl ?></td>
                    <td><?php echo $alt->alamat ?></td>
                    <td><?php echo $alt->no_tlp ?></td>
                    <td>
                      <?php echo anchor('bagiankredit/nasabah/update/'.$alt->id_alternatif,'<div class="btn btn-sm btn-primary mr-2 ml-2 mb-2 mt-2"><i class="fa fa-edit"></i></div>') ?>
                      <?php echo anchor('bagiankredit/nasabah/delete/'.$alt->id_alternatif,'<div class="btn btn-sm btn-danger mr-2 ml-2 mb-2 mt-2"><i class="fas fa-trash"></i></div>') ?>
                    </td>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>
          </div>
      </section>
    </div>

