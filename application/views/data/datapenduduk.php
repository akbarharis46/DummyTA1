<?php if($this->session->userdata('level')!='admin'){redirect('login');};?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class="cc" style="width:2000px">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-primary" ><i class="nav-icon fas fa-tablet" ></i> Data Penduduk</h2>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="alert alert-secondary" role="alert">
      <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="nav-icon fas fa-tablet"></i> Penduduk
        </div>
        <div class="row">
          <div class="col-xl"> 
              <!-- Tabel -->
              <div class="card">
            <!-- /.card-header -->
            <div class="card-body" >
                <div class='card-header' style="margin-left:-20px;">
                <a class='btn btn-primary'href="<?php echo site_url(); ?>pendudukclient/post/">
                    <i class="fa fa-plus"></i>
                    <span >
                        Tambah
                    </span>
                    </a>
                   
                    <br><br>
              <!-- <form method="post" action="search.php" class="form-inline">
                <div class="form-group">
                  <label for="Date_From">Insert Date &ensp;&ensp;</label>
                  <input type="date" name="date_from" value="<?php echo date('Y-m-d'); ?>" class="form-control" />
                </div>&ensp;
                <button type="submit" name="search" class="btn btn-primary">Search</button>
              </form> -->
<!-- 
              <form method="get" class="form-inline mt-3" action="<?= site_url()?>laporanclient/date">
                  <label for="date1">Tanggal mulai &ensp;</label>
                    <input type="date" name="tanggal_awal" class="form-control mr-2">
                  <label for="date2">to &ensp;</label>
                    <input type="date" name="tanggal_akhir" class="form-control mr-2">
                  <button type="submit" name="submit" class="btn btn-primary">Cari</button>&nbsp;
                  <a href="<?php echo site_url(); ?>laporanclient" class="btn btn-danger"> Reset </a>
              </form> -->
              <br>
            
            </div>   
            <br>
            
              <table id="tabel" class="table table-bordered"  style="width:400px">
                <thead>
              
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>No KK</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Agama</th>
                  <th>Status Perkawinan</th>
                  <th>Pekerjaan</th>
                  <th>Kewarganegaraan</th>
                  <th>Berlaku</th>
                  <th>Aksi</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php $i= 1;
                 foreach ($penduduk as $rows) : ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><img src="<?php echo base_url('img/foto/' . $rows->image) ?>" width="90" hight="120" /></td>
                        <td><?php echo $rows->no_kk; ?></td>
                        <td><?php echo $rows->nik; ?></td>
                        <td><?php echo $rows->nama ; ?></td>
                        <td><?php echo $rows->ttl; ?></td>
                        <td><?php echo $rows->jenis_kelamin; ?></td>
                        <td><?php echo $rows->alamat; ?></td>
                        <td><?php echo $rows->agama; ?></td>
                        <td><?php echo $rows->status_perkawinan; ?></td>
                        <td><?php echo $rows->pekerjaan; ?></td>
                        <td><?php echo $rows->kewarganegaraan; ?></td>
                        <td><?php echo $rows->berlaku; ?></td>
                        <td>
                            <a href="<?php echo site_url(); ?>pendudukclient/put/<?php echo $rows->id_penduduk; ?>" class="btn btn-warning">
                            <i class="fa fa-pen" aria-hidden="true"></i></a>
                            <a href="<?= base_url(); ?>pendudukclient/delete/<?= $rows->id_penduduk ;?>" class="btn btn-danger"
                            onClick="return confirm('yakin mau hapus');">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                        
                    </tr>
                    <?php endforeach ; ?>
                </tbody>
              </table>             
            <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
   <!-- /.content-wrapper -->

