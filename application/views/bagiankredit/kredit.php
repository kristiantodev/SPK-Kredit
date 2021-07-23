<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penilaian Alternatif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('bagiankredit/dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Penilaian Alternatif</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
<a data-toggle="modal" data-target="#bb">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-plus"></i> Tambah Data</button>
                                </a>

              <h3 class="card-title"></h3>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Nasabah</th>
                        <th>Tanggal Kredit</th>
                        <th>Usia</th>
                        <th>Tanggungan</th>
                        <th>Gaji</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Riwayat</th>
                        <th>Persetujuan</th>
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
                    <?php endforeach; ?>   
                  </tbody>
                </table>
              </div>
          </div>
      </section>
    </div>



     <!-- Modal -->
                  <div class="modal fade text-left" id="bb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Penilaian Alternatif</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('bagiankredit/kredit/add'); ?>" method="post">
                      <div class="modal-body">

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nasabah</label>
                          <select name="id_alternatif" id="select" required class="custom-select">
                  <option value="">-- Pilih Nasabah --</option>
                  <?php foreach ($nasabah as $n): ?>
                  <option value="<?php echo $n->id_alternatif ?>"><?php echo $n->nama_nasabah ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Tanggal Pengajuan Kredit</label>
                          <input type="date" name="tgl_kredit" class="form-control  round" id="email"  required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_indikator') ?></font>
                        </fieldset>
                        
                         <fieldset class="form-group floating-label-form-group">
                          <label for="email">Usia</label>
                          <select name="c1" id="select" required class="custom-select">
                  <option value="">-- Pilih Usia --</option>
                  <?php foreach ($criteria1 as $c1): ?>
                  <option value="<?php echo $c1->id_sub ?>"><?php echo $c1->nama_sub ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Jumlah Tanggungan</label>
                          <select name="c2" id="select" required class="custom-select">
                <option value="">-- Pilih Tanggungan --</option>
                  <?php foreach ($criteria2 as $c2): ?>
                  <option value="<?php echo $c2->id_sub ?>"><?php echo $c2->nama_sub ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Besar Gaji</label>
                          <select name="c3" id="select" required class="custom-select">
                <option value="">-- Pilih Besar Gaji --</option>
                  <?php foreach ($criteria3 as $c3): ?>
                  <option value="<?php echo $c3->id_sub ?>"><?php echo $c3->nama_sub ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Besar Pinjaman</label>
                          <select name="c4" id="select" required class="custom-select">
                <option value="">-- Pilih Besar Pinjaman --</option>
                  <?php foreach ($criteria4 as $c4): ?>
                  <option value="<?php echo $c4->id_sub ?>"><?php echo $c4->nama_sub ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>


                         <fieldset class="form-group floating-label-form-group">
                          <label for="email">Riwayat Nasabah</label>
                          <select name="c5" id="select" required class="custom-select">
                <option value="">-- Pilih Riwayat --</option>
                  <?php foreach ($criteria5 as $c5): ?>
                  <option value="<?php echo $c5->id_sub ?>"><?php echo $c5->nama_sub ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary">
                                    <i class="fa fa-save"></i>&nbsp;Simpan
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>

