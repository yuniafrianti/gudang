<?php 

include("koneksi.php");

if(isset($_POST["simpan"])){
    $sql="insert into tbl_kategori values('".$_POST['kd_kategori']."','".$_POST['nama_kategori']."')";
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
              <form class="form-horizontal" method="POST" action="index.php?id=9.php">
                <div class="card-body">
                 <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_kategori" placeholder="Category">
                    </div>
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
                 $sqlSelect = "SELECT * FROM tbl_kategori";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
                
               <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <tr>
                   <th>No</th>
                  <th>Category</th>
                  <th>Action</th>
               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    

                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nama_kategori'];?></td>
                    <td><a href="index.php?id=10?&kd_kategori=<?php echo $row['kd_kategori']; ?>">Update</a> | <a href="delete_kategori.php?kd_kategori=<?php echo $row['kd_kategori']; ?>">Delete</a>
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