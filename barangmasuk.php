<?php 
include("koneksi.php");


  if(isset($_POST["simpan"])){
    $sql="insert into tbl_barangmasuk values('".$_POST['kd_masuk']."','".$_POST['kd_barang']."','".$_POST['brand']."','".$_POST['spesifikasi']."','".$_POST['kd_supplier']."','".$_POST['kd_kategori']."','".$_POST['stok']."','".$_POST['harga']."','".$_POST['tgl']."')";
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
              <form class="form-horizontal" method="POST" action="index.php?id=3.php">
                <div class="card-body">
                  

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Nama Barang </label>
                    <div class="col-sm-10">
                   <select class="form-control" name="kd_barang">
                    <option value=''>----Pilih Nama Barang----</option>
                    <?php include('koneksi.php'); 
                   $a="select * from tbl_barang";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_barang;?>" placehorder="Select"> <?php echo $data->nama_barang; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>

                     <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="brand" placeholder="Brand">
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Spesifikasi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="spesifikasi" placeholder="Spesifikasi">
                    </div>
                  </div>
                 

            

                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Supplier </label>
                    <div class="col-sm-10">
                   <select class="form-control" name="kd_supplier">
                    <option value=''>----Pilih Nama Supplier----</option>
                    <?php include('koneksi.php'); 
                   $a="select * from tbl_supplier";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_supplier;?>" placehorder="Select"> <?php echo $data->nama_supplier; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>



                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                   <select class="form-control" name="kd_kategori">
                    <option value=''>----Pilih Category----</option>
                    <?php include('koneksi.php'); 
                   $a="select * from tbl_kategori";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_kategori;?>" placehorder="Select"> <?php echo $data->nama_kategori; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>



                        <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" placeholder="Jumlah Barang Masuk">
                    </div>
                  </div>
                 

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Harga</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" placeholder="Harga Barang">
                    </div>
                  </div>
                         <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Tanggal</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tgl" value="<?php echo date("Y-m-d") ?>" placeholder="Jumlah Barang Masuk">
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


               <html>
  <head>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script>
              $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
                });
              });
              </script>
              <style>
              table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }

            td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }

            tr:nth-child(even) {
              background-color: #FFFFFF;
            }
              </style>
              </head>
              <body>

              <h2></h2>
         
              <input id="myInput" type="text" placeholder="Search..">
              <br><br>
                <?php
                 $sqlSelect ="select tbl_barangmasuk.kd_masuk, tbl_barangmasuk.kd_barang, tbl_barang.nama_barang, tbl_barangmasuk.brand, spesifikasi, tbl_supplier.nama_supplier, tbl_kategori.nama_kategori,  stok, harga, tgl
                    from tbl_barangmasuk inner join tbl_kategori on tbl_kategori.kd_kategori = tbl_barangmasuk.kd_kategori
                    inner join tbl_supplier on tbl_supplier.kd_supplier = tbl_barangmasuk.kd_supplier
                    inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                      
              ?>
              <table>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Brand</th>
                  <th>Spesifikasi</th>
                  <th>Supplier</th>
                  <th>Category</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Date</th>
                  <th>Action</th> 
                </tr>
                </thead>
                <tbody id="myTable">
                  <?php
                    $no=1;
                      while ($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                  <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nama_barang'];?></td>
                    <td><?php echo $row['brand'];?></td>
                    <td><?php echo $row['spesifikasi'];?></td>
                    <td><?php echo $row['nama_supplier'];?></td>
                    <td><?php echo $row['nama_kategori'];?></td>
                    <td><?php echo $row['stok'];?></td>
                    <td><?php echo "Rp. ".number_format($row['harga'])."";?></td>
               <!--      var_dump($total); -->
                   

                    <td> <?php 
                    $a=$row['stok'];
                    $b=$row['harga'];
                    $c=$a*$b;
                    echo "Rp. ".number_format($c)."";

                    ?> </td>
                    <td><?php echo $row['tgl'];?></td>
                    <td><a href="index.php?id=14?&kd_masuk=<?php echo $row['kd_masuk']; ?>">Update</a> | <a href="delete_barangmasuk.php?kd_masuk=<?php echo $row['kd_masuk']; ?>">Delete</a></td>
                </tr>
                  <?php 
                  }
                } 
                  ?> 
                </tbody>
              </table>
              

              </body>
              </html>






           
</form>
             

   </form>
 </div>
 
 </div>


         