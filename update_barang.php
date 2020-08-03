<?php 
       include 'koneksi.php';
      $kd_barang=$_POST['kd_barang'];
      $nama_barang=$_POST['nama_barang'];

      if(isset($_POST["simpan"])){
      $a="update tbl_barang set nama_barang='$nama_barang' where kd_barang='$kd_barang'";
      var_dump($a);
      $query=mysqli_query($kon,$a);
        if($query) {
          echo ("<script LANGUAGE='JavaScript'>
           window.alert('Succesfully Updated');
            window.location.href='index.php?id=1.php';
            </script>");
        }else{
          echo "data gagal tersimpan";

        }
        }  
 ?>

 <?php 
include("koneksi.php");

  $id = $_GET['kd_barang'];
  // var_dump($id);
  $data = mysqli_query($kon,"select * from tbl_barang where kd_barang='$id'");
  while($d = mysqli_fetch_array($data)){
  
?>
  <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="index.php?id=7.php">
                 <div class="card-body">
                   <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="kd_barang" value="<?php echo $d['kd_barang']; ?>">
                    </div>
                    </div>
                  
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_barang" value="<?php echo $d['nama_barang']; ?>">
                    </div>
                  </div>
                </div>
                <!-- /.card-footer -->

               <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-info pull-right">Update</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
              <?php

                }
                ?>            
             </form>
            </div>
            </div>