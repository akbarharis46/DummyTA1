<?php if($this->session->userdata('level')!='admin'){redirect('login');};?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class="cc" style="width:1300px">
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
      <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="nav-icon fas fa-tablet"></i> Penduduk&nbsp; > <i class="nav-icon fas fa-pen"></i>Update Penduduk
        </div>
            <form action="<?php echo site_url(); ?>pendudukclient/put_process"  class="needs-validation" method="POST" enctype="multipart/form-data" onload="setSelectBoxByText()" >
                 <?php foreach ($kartupenduduk as $rows) : ?>
                    <div class="form-group">
                                <label for="id_penduduk">ID :</label>
                                <input type="text" class="form-control" id="id_penduduk" value="<?php echo $rows->id_penduduk; ?>" name="id_penduduk" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_kk">No KK :</label>
                                <input type="text" class="form-control" id="no_kk" value="<?php echo $rows->no_kk; ?>" name="no_kk" required readonly >
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK :</label>
                                <input type="text" class="form-control" id="nik" value="<?php echo $rows->nik; ?>" name="nik" required readonly>
                            </div>
                           
                        <!-- <div class="form-group">
                            <label for="image">Foto</label>
                                <div style="background : black; width: 100px; height: 130px;"> </div>
                                <input type="file" class="form-control-file" placeholder="Choice Foto" name="image" >
                                <div class="invalid-feedback">
                                <?php echo form_error('image') ?>
                                </div>
                        </div> -->
                        <div class="form-group">
                                <label for="nama">Nama :</label>
                                <input type="text" class="form-control" id="nama" value="<?php echo $rows->nama;?>" placeholder="nama"  name="nama"  readonly>
                            </div>
                        <div class="form-group">
                                <label for="ttl">TTL :</label>
                                <input type="date" class="form-control" id="ttl" value="<?php echo $rows->ttl;?>"placeholder="ttl"  name="ttl"  readonly>
                            </div>
                        <div class="form-group">
                            <label for="sel1" >Jenis Kelamin :</label>
                                <input type="text" class="form-control" name="jenis_kelamin" id="selected"value="<?php echo $rows->jenis_kelamin;?>" readonly>
                                <!-- <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" >
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                </select> -->
                        </div>
                        <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <input type="text" class="form-control" id="alamat" value="<?php echo $rows->alamat;?>"placeholder="alamat"  name="alamat"  >
                        </div>
                        <div class="form-group">
                                <label for="agama">Agama :</label>
                                <input type="text" class="form-control" id="agama" value="<?php echo $rows->agama;?>"placeholder="agama"  name="agama"  >
                        </div>
                        <div class="box-body">
                            <div class="form-group1">
                            <label for="sel1" >Status Perkawinan :</label>
                                 <select class="form-control" id="status_perkawinan" name="status_perkawinan" value="<?php echo $rows->status_perkawinan;?>">
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Sudah Kawin">Sudah Kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan </label>
                            <input type="text" class="form-control" id="pekerjaan"value="<?php echo $rows->pekerjaan;?>"placeholder="Enter Pekerjaan" name="pekerjaan" required>
                            
                        </div>
                    
                        <div class="form-group">
                            <label for="kewarganegaraan">Kewarganegaraan </label>
                            <input type="text" class="form-control" id="kewarganegaraan" value="<?php echo $rows->kewarganegaraan;?>"placeholder="Enter Pekerjaan" name="kewarganegaraan" required readonly>
                        </div>
                    
                        <div class="form-group">
                            <label for="berlaku">Berlaku </label>
                            <input type="text" class="form-control" id="berlaku" value="<?php echo $rows->berlaku;?>"placeholder="Enter Berlaku" name="berlaku" required readonly>
                           
                            <div class="form-group">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                                    Update
                                </button>
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <p>Apa anda yakin ingin mengupdate data ini ?</p>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning">Update</button>
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>