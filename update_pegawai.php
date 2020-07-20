<?php 
      include 'koneksi.php';
      $kd_pegawai=$_POST['kd_pegawai'];
      $nip=$_POST['nip'];
      $nama_pegawai=$_POST['nama_pegawai'];

      if(isset($_POST["simpan"])){
      $a="update tbl_pegawai set nip='$nip', nama_pegawai='$nama_pegawai' where kd_pegawai='$kd_pegawai'";
      var_dump($a);
      $query=mysqli_query($kon,$a);
        if($query) {
          echo ("<script LANGUAGE='JavaScript'>
           window.alert('Succesfully Updated');
            window.location.href='index.php?id=2.php';
            </script>");
        }else{
          echo "data gagal tersimpan";

        }
        }
      
 ?>
      <?php
        include 'koneksi.php';
        $id = $_GET['kd_pegawai'];
        // var_dump($id);
        $data = mysqli_query($kon,"select * from tbl_pegawai where kd_pegawai='$id'");
        while($d = mysqli_fetch_array($data)){


          ?>

  <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="index.php?id=8.php">

                  <div class="card-body">
                  <div class="form-group row">
                   <!--  <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Pegawai</label> -->
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="kd_pegawai" value="<?php echo $d['kd_pegawai']; ?>">
                    </div>
                  </div>


                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No IC</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nip" value="<?php echo $d['nip']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Pekerja</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $d['nama_pegawai']; ?>">
                    </div>
                  </div>
           
                </div>
                <!-- /.card-body -->
                 <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-info pull-right">Edit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
                <!-- /.card-footer -->


               

              </form>
              <?php 
  }
  ?>
            </div>
            </div>