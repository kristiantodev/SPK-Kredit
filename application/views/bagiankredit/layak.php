<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hasil Kelayakan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bagiankredit/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Hasil Kelayakan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Penilaian</h3>
            </div>
            <div class="card-body" >

              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <th>NIK</th>
                        <th>Alternatif</th>
                        <th>Tanggal Kredit</th>
                        <th>Usia (C1)</th>
                        <th>Tanggungan (C2)</th>
                        <th>Gaji (C3)</th>
                        <th>Jumlah Pinjaman (C4)</th>
                        <th>Riwayat (C5)</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1;
                foreach ($kredit as $krt) :?>
                  <tr>
                    <td><?php echo $krt->nik ?></td>
                    <td><?php echo $krt->nama_nasabah ?></td>
                    <td><?php echo $krt->tgl_kredit ?></td>
                    <td><?php echo $krt->nama_sub1 ?></td>
                    <td><?php echo $krt->nama_sub2 ?></td>
                    <td><?php echo $krt->nama_sub3 ?></td>
                    <td><?php echo $krt->nama_sub4 ?></td>
                    <td><?php echo $krt->nama_sub5 ?></td>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>

<br>
<h3 class="card-title">Konversi Ke Bobot</h3><br><hr>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <th>NIK</th>
                        <th>Alternatif</th>
                        <th>Tanggal Kredit</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1;
                foreach ($kredit as $krt) :?>
                  <tr>
                    <td><?php echo $krt->nik ?></td>
                    <td><?php echo $krt->nama_nasabah ?></td>
                    <td><?php echo $krt->tgl_kredit ?></td>
                    <td><?php echo $krt->bobot1 ?></td>
                    <td><?php echo $krt->bobot2 ?></td>
                    <td><?php echo $krt->bobot3 ?></td>
                    <td><?php echo $krt->bobot4 ?></td>
                    <td><?php echo $krt->bobot5 ?></td>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>


              <br>
<h3 class="card-title">Rating Kecocokan</h3><br><hr>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <th>NIK</th>
                        <th>Alternatif</th>
                        <th>Tanggal Kredit</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1;
                foreach ($kredit as $krt) :?>
                  <tr>
                    <td><?php echo $krt->nik ?></td>
                    <td><?php echo $krt->nama_nasabah ?></td>
                    <td><?php echo $krt->tgl_kredit ?></td>
                    <td><?php echo $krt->bobot_global1 ?></td>
                    <td><?php echo $krt->bobot_global2 ?></td>
                    <td><?php echo $krt->bobot_global3 ?></td>
                    <td><?php echo $krt->bobot_global4 ?></td>
                    <td><?php echo $krt->bobot_global5 ?></td>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>


              <br>
<h3 class="card-title">Hasil Kelayakan</h3><br><hr>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <th>NIK</th>
                        <th>Alternatif</th>
                        <th>Tanggal Kredit</th>
                        <th>S</th>
                        <th>Vektor</th>
                        <th>Kelayakan</th>
                        <th>Ranking</th>
                        <th>Aproved</th>
                  </tr>
                  </thead>
                  <tbody>
                     <form action="<?php echo site_url('bagiankredit/kelayakan/add'); ?>" method="post">
      <input type="hidden" name="validasi"  value="fix" class="form-control">

                    <?php 
                $no = 1; $avgVektor=0; $total=0; $totalVektor=0; $vektor=0;
                foreach ($hasil as $krt) :?>

                      <?php
                            $total=$total+1;
                            $totalVektor=$totalVektor+$krt->nilai_s;

                       ?>

                  <?php endforeach; ?>

                   <?php 
                $no = 1; $vektor=0; $totalV=0;
                foreach ($hasil as $krt) :?>

                  <?php
                       $vektor = number_format($krt->nilai_s/$totalVektor,3);
                       $totalV = $totalV+$vektor;
                   ?>

                   <?php endforeach; ?>

                  <?php
                       $avgVektor = number_format($totalV/$total, 3);
                   ?>

                    <?php 
                $no = 1; $i=1; $vektor=0; $kelayakan="";
                foreach ($hasil as $krt) {?>

                  <?php
                       $vektor = number_format($krt->nilai_s/$totalVektor,3);
                       if ($vektor >= $avgVektor) {
                         $kelayakan = "Layak";
                       }else{
                        $kelayakan = "Tidak Layak";
                       }
                   ?>
<input type="hidden" name="id_kredit<?php echo $i; ?>"  value="<?php echo $krt->id_kredit ?>" class="form-control">
                    <input type="hidden" name="vektor<?php echo $i; ?>"  value="<?php echo $vektor ?>" class="form-control">
                    <input type="hidden" name="keputusan<?php echo $i; ?>"  value="<?php echo $kelayakan ?>" class="form-control">
                  <tr>
                    <td><?php echo $krt->nik ?></td>
                    <td><?php echo $krt->nama_nasabah ?></td>
                    <td><?php echo $krt->tgl_kredit ?></td>
                    <td><?php echo $krt->nilai_s ?></td>
                    <td><?php echo $vektor ?></td>
                    <td>
                      <?php if ($kelayakan == "Tidak Layak"){ ?>  
                 <button type="button" class="btn btn-danger waves-effect waves-light"><font color="white">
                                    <i class="fas fa-times "></i> &nbsp;Tidak Layak</font></button>
                 <?php }else{ ?>
                 <button type="button" class="btn btn-success waves-effect waves-light"><font color="white">
                                    <i class="fas fa-check "></i> &nbsp;Layak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></button>
                 <?php } ?>
                    </td>
                    <td><?php echo $no++ ?></td>
                    <td>
                      <?php if ($krt->aproved == "no"){ ?>  
                 <button type="button" class="btn btn-warning waves-effect waves-light"><font color="white">
                                    <i class="fas fa-times "></i> &nbsp;Not Aproved</font></button>
                 <?php }else{ ?>
                 <button type="button" class="btn btn-success waves-effect waves-light"><font color="white">
                                    <i class="fas fa-check "></i> &nbsp;Aproved</font></button>
                 <?php } ?>
                    </td>
                  </tr>
                   <?php $i++; } ?> 
                    <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-save"></i> &nbsp; Simpan Hasil Kelayakan
                                </button>
                      </form>  
                    <tr>
                       <th colspan="2"><p align="right">Total<p></th>
                        <th><?php echo $totalVektor?></th>
                        <th><?php echo $avgVektor?> <br>(Rata-rata)</th>
                    </tr> 
                  </tbody>
                </table>
              </div>


          </div>
      </section>
    </div>