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
                  <tr>
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
                 <a onclick="deleteConfirm('<?php echo site_url('pimpinan/kelayakan/aproved/'.$krt->id_kredit); ?>')" href="#!" data-toggle="tooltip" class="btn btn-primary waves-effect waves-light tombol-hapus" data-original-title="Aproved"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-check"></i> </span><span class="btn-text"></span></a>
                 <a onclick="deleteConfirm('<?php echo site_url('pimpinan/kelayakan/aproved/'.$krt->id_kredit); ?>')" href="#!" data-toggle="tooltip" class="btn btn-primary waves-effect waves-light tombol-hapus" data-original-title="Aproved"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-check"></i> </span><span class="btn-text"></span></a>
                 <?php }else{ ?>
                 <button type="button" class="btn btn-success waves-effect waves-light"><font color="white">
                                    <i class="fas fa-check "></i> &nbsp;Aproved</font></button>
                 <?php } ?>
                    </td>
                  </tr>
                   <?php $i++; } ?> 
                    
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


    <!-- modal -->
<div class="modal modal-primary fade" id="modal-danger">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
      <h5 class="modal-title"><font color='white'>Aprove Kredit</font></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin akan mengaprove data ini ?</p>
      </div>
      <div class="modal-footer">
      <a type="button" class="btn btn-secondary" data-dismiss="modal"><font color='white'><i class="fas fa-times"></i>&nbsp;Batal</font></a>
      <a href="#" id="btn-delete" type="button" class="btn btn-primary mr-1"><i class="fas fa-check"></i>&nbsp;Aprove</a>
      </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  

  <script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>