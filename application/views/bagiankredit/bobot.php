<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perhitungan Bobot Kriteria dan Subkriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bagiankredit/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Perhitungan Bobot Kriteria dan Subkriteria</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kriteria</h3>
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
                $no = 1; $total=0;
                foreach ($kriteria as $krt) :?>

                  <?php  
                  $total=$total+$krt->bobot_kriteria

                    ?>
                    
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
                    <tr>
                      <th colspan="4"><p align="right">Total Bobot</p></th>
                      <th><?php echo $total ?></th>
                    </tr>
                  </tbody>
                </table>
              </div>

 <h3 class="card-title">Normalisasi Bobot Kriteria</h3><br>
 <hr>
 <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Atribut</th>
                        <th>Bobot</th>
                        <th>Normalisasi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1; $bobot1=0; $bobot2=0; $bobot3=0; $bobot4=0; $bobot5=0;
                foreach ($kriteria as $krt) :?>
                  <tr>
                     <td><?php echo $no++ ?></td>
                    <td><?php echo $krt->id_kriteria ?></td>
                    <td><?php echo $krt->nama_kriteria ?></td>
                    <td><?php echo $krt->Type ?></td>
                    <td><?php echo $krt->bobot_kriteria ?></td>
                    <td><?php echo number_format($krt->bobot_kriteria/$total,3) ?></td>
                  </tr>

                  <?php

                    if ($krt->nama_kriteria == "Usia") {
                      $bobot1 = $krt->bobot_kriteria/$total;
                    }elseif ($krt->nama_kriteria == "Tanggungan") {
                      $bobot2 = $krt->bobot_kriteria/$total;
                    }elseif ($krt->nama_kriteria == "Besar Gaji") {
                     $bobot3 = $krt->bobot_kriteria/$total;
                    }elseif ($krt->nama_kriteria == "Besar Pinjaman") {
                      $bobot4 = $krt->bobot_kriteria/$total;
                    }elseif ($krt->nama_kriteria == "Riwayat Nasabah") {
                      $bobot5 = $krt->bobot_kriteria/$total;
                    }

                    ?>

                    <?php endforeach; ?>   
                    
                  </tbody>
                </table>
              </div>
<br>
<h3 class="card-title">Normalisasi Bobot Global Sub Kriteria</h3><br>
 <hr>
<div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Kode Subkriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Nama Subkriteria</th>
                        <th>Bobot</th>
                        <th>Bobot Ternomalisasi</th>
                        <th>Bobot Global</th>
                  </tr>
                  </thead>
                  <tbody>
     <form action="<?php echo site_url('bagiankredit/bobot/add'); ?>" method="post">
      <input type="hidden" name="validasi"  value="fix" class="form-control">
                   <?php $start=1; $i=1; $bobotGlobal=0; foreach ($subkriteria as $sub) {?>

                   <?php

                    $bobotSubKriteria=0;

                    if ($sub->nama_kriteria == "Usia") {
                      $bobotSubKriteria = $sub->bobot_sub/$c1->totalBobot;
                      $bobotGlobal = $bobotSubKriteria * $bobot1;
                      if ($sub->Type == "Cost") {
                         $bobotGlobal = ($bobotSubKriteria * $bobot1)*-1;
                      }
                      
                    }elseif ($sub->nama_kriteria == "Tanggungan") {
                      $bobotSubKriteria = $sub->bobot_sub/$c2->totalBobot;
                      $bobotGlobal = $bobotSubKriteria * $bobot2;
                      if ($sub->Type == "Cost") {
                         $bobotGlobal = ($bobotSubKriteria * $bobot2)*-1;
                      }
                    }elseif ($sub->nama_kriteria == "Besar Gaji") {
                      $bobotSubKriteria = $sub->bobot_sub/$c3->totalBobot;
                      $bobotGlobal = $bobotSubKriteria * $bobot3;
                      if ($sub->Type == "Cost") {
                         $bobotGlobal = ($bobotSubKriteria * $bobot3)*-1;
                      }
                    }elseif ($sub->nama_kriteria == "Besar Pinjaman") {
                      $bobotSubKriteria = $sub->bobot_sub/$c4->totalBobot;
                      $bobotGlobal = ($bobotSubKriteria * $bobot4);
                      if ($sub->Type == "Cost") {
                         $bobotGlobal = ($bobotSubKriteria * $bobot4)*-1;
                      }
                    }elseif ($sub->nama_kriteria == "Riwayat Nasabah") {
                      $bobotSubKriteria = $sub->bobot_sub/$c5->totalBobot;
                      $bobotGlobal = $bobotSubKriteria * $bobot5;
                      if ($sub->Type == "Cost") {
                         $bobotGlobal = ($bobotSubKriteria * $bobot5)*-1;
                      }
                    }

                    ?>
                  <tr>
                    <input type="hidden" name="id_sub<?php echo $i; ?>"  value="<?php echo $sub->id_sub ?>" class="form-control">
                    <input type="hidden" name="bobot_global<?php echo $i; ?>"  value="<?php echo number_format($bobotGlobal,3) ?>" class="form-control">
                    <td><?php echo $start++; ?></td>
                    <td><?php echo $sub->id_sub ?></td>
                    <td><?php echo $sub->nama_kriteria ?></td>
                    <td><?php echo $sub->nama_sub ?></td>
                    <td align="center"><?php echo $sub->bobot_sub ?></td>
                    <td align="center">
                      <?php echo number_format($bobotSubKriteria,3) ?>
                    </td>
                    <td align="center"><?php echo number_format($bobotGlobal,3) ?></td>
                  </tr>
                   <?php $i++; } ?>   

                     <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-save"></i> &nbsp; Update Bobot Global
                                </button>
                      </form>

                  </tbody>
                </table>
              </div>

          </div>
      </section>
    </div>

