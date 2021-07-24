<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Hasil Keputusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">Laporan Hasil Keputusan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
               <a data-toggle="modal" data-target="#bb2">
                                            <button type="button" class="btn btn-info waves-effect waves-light">
                                    <i class="fa fa-print"></i> &nbsp;&nbsp;Cetak Laporan</button>
                                </a>
            </div>
            <div class="card-body" >

              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <th>No</th>
                        <th>Alternatif</th>
                        <th>Tanggal Kredit</th>
                        <th>Usia (C1)</th>
                        <th>Tanggungan (C2)</th>
                        <th>Gaji (C3)</th>
                        <th>Jumlah Pinjaman (C4)</th>
                        <th>Riwayat (C5)</th>
                        <th>Nilai Vektor</th>
                        <th>Keputusan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1;
                foreach ($kredit as $krt) :?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $krt->nama_nasabah ?></td>
                    <td><?php echo $krt->tgl_kredit ?></td>
                    <td><?php echo $krt->nama_sub1 ?></td>
                    <td><?php echo $krt->nama_sub2 ?></td>
                    <td><?php echo $krt->nama_sub3 ?></td>
                    <td><?php echo $krt->nama_sub4 ?></td>
                    <td><?php echo $krt->nama_sub5 ?></td>
                    <td><?php echo $krt->vektor ?></td>
                    <th>
                      <?php if ($krt->aproved == "no"){ ?>  
                 <button type="button" class="btn btn-warning waves-effect waves-light"><font color="white">
                                    <i class="fas fa-times "></i> &nbsp;&nbsp;Ditolak&nbsp;&nbsp;</font></button>
                 <?php }else{ ?>
                 <button type="button" class="btn btn-success waves-effect waves-light"><font color="white">
                                    <i class="fas fa-check "></i> &nbsp;Disetujui</font></button>
                 <?php } ?>
                    </th>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>


          </div>
      </section>
    </div>


                        <!-- Modal -->
                  <div class="modal fade text-left" id="bb2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-lg">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Cetak Laporan</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      
                      <div class="modal-body">
                        <div id="box">
                           <center><img src="<?php echo base_url() ?>assets/image/nasari.png" alt="" height="135"></center>
<center><h5><b>Laporan <br>Hasil Keputusan Permohonan Kredit</b></h5></center>
 <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                      <th>No</th>
                        <th>Alternatif</th>
                        <th>Tanggal Kredit</th>
                        <th>Usia (C1)</th>
                        <th>Tanggungan (C2)</th>
                        <th>Gaji (C3)</th>
                        <th>Jumlah Pinjaman (C4)</th>
                        <th>Riwayat (C5)</th>
                        <th>Nilai Vektor</th>
                        <th>Keputusan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                $no = 1;
                foreach ($kredit as $krt) :?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $krt->nama_nasabah ?></td>
                    <td><?php echo $krt->tgl_kredit ?></td>
                    <td><?php echo $krt->nama_sub1 ?></td>
                    <td><?php echo $krt->nama_sub2 ?></td>
                    <td><?php echo $krt->nama_sub3 ?></td>
                    <td><?php echo $krt->nama_sub4 ?></td>
                    <td><?php echo $krt->nama_sub5 ?></td>
                    <td><?php echo $krt->vektor ?></td>
                    <th>
                      <?php if ($krt->aproved == "no"){ ?>  
                 <button type="button" class="btn btn-warning waves-effect waves-light"><font color="white">
                                    <i class="fas fa-times "></i> &nbsp;&nbsp;Ditolak&nbsp;&nbsp;</font></button>
                 <?php }else{ ?>
                 <button type="button" class="btn btn-success waves-effect waves-light"><font color="white">
                                    <i class="fas fa-check "></i> &nbsp;Disetujui</font></button>
                 <?php } ?>
                    </th>
                  </tr>
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>
                              </div>
                      </div>
                      <div class="modal-footer">
                 
                        <center>
        <a href="javascript:printDiv('box');">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-print"></i> &nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button>
                                </a></center>
                      </div>
                      
                 
                    </div>
                    </div>
                  </div>