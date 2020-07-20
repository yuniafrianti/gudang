<?php 
      include 'koneksi.php';
      $kd_supplier=$_POST['kd_supplier'];
      $nama_supplier=$_POST['nama_supplier'];

      if(isset($_POST["simpan"])){
      $a="update tbl_supplier set nama_supplier='$nama_supplier' where kd_supplier='$kd_supplier'";
      var_dump($a);
      $query=mysqli_query($kon,$a);
        if($query) {
          echo ("<script LANGUAGE='JavaScript'>
           window.alert('Succesfully Updated');
            window.location.href='index.php?id=11.php';
            </script>");
        }else{
          echo "data gagal tersimpan";

        }
        }
      
 ?>

<?php 
include("koneksi.php");

  $id = $_GET['kd_supplier'];
  // var_dump($id);
  $data = mysqli_query($kon,"select * from tbl_supplier where kd_supplier='$id'");
  while($d = mysqli_fetch_array($data)){
  
  ?> 
    <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="index.php?id=12.php">
                <div class="card-body">
                  <div class="form-group row">
   
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="kd_supplier" value="<?php echo $d['kd_supplier']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama supplier</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_supplier" value="<?php echo $d['nama_supplier']; ?>">
                    </div>
                  </div>

                  
                </div>
                <!-- /.card-body -->
                 <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-info pull-right">Update</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
                <!-- /.card-footer -->

                <?php

                }

                ?>
    
              </form>
            </div>
            </div>