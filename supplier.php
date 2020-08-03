<?php 
include("koneksi.php");

if(isset($_POST["simpan"])){
    $sql="insert into tbl_supplier values('".$_POST['kd_supplier']."','".$_POST['nama_supplier']."')";
    $query=mysqli_query($kon,$sql);
    if($query){
      echo "data berhasil disimpan";
    }else{
      echo "data gagal tersimpan";
    }
  }
?>

  <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form class="form-horizontal" method="POST" action="index.php?id=11.php">
                <div class="card-body">
                
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama supplier</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_supplier" placeholder="Nama supplier">
                    </div>
                  </div>
                
                  
                </div>
                <!-- /.card-body -->
                 <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-info pull-right">Save</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
                <!-- /.card-footer -->


                 <?php
                 $sqlSelect = "SELECT * FROM tbl_supplier";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
                
               <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <tr>
                  <th>No</th>
                  <th>Nama supplier</th>
                  <th>Action</th>
               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    

                <tr>
                   <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nama_supplier'];?></td>
                    <td><a href="index.php?id=12?&kd_supplier=<?php echo $row['kd_supplier']; ?>">Update</a> | <a href="delete_supplier.php?kd_supplier=<?php echo $row['kd_supplier']; ?>">Delete</a> </td>
                </tr>
                <?php
                  }
                } 
                  ?>
              
          
         </table>
         

          </div>
      

              </form>
            </div>
            </div>