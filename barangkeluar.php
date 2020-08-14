<?php 
include("koneksi.php");


if(isset($_POST["simpan"])){
    $sql="insert into tbl_barangkeluar values('".$_POST['kd_brgkeluar']."','".$_POST['issued']."','".$_POST['received']."','".$_POST['kd_masuk']."','".$_POST['stok']."','".$_POST['tgl']."')";
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
              <form class="form-horizontal" method="POST" action="index.php?id=4.php">
                <div class="card-body">

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Issued By</label>
                    <div class="col-sm-10">
                     <select class="form-control" name="issued" > 
                      <option value=''>----Pilih Nama Pekerja----</option>
                      <?php include('koneksi.php'); 
                    $a="select * from tbl_pegawai";
                    $b=mysqli_query($kon,$a);
                    while ($data=mysqli_fetch_object($b)) {
                       ?>
                      
                    <option value="<?php echo $data->nama_pegawai;?>"> <?php echo $data->nama_pegawai; ?> </option> 
                      <?php
                      }
                     ?>
                   </select>
                    </div>
                     </div>


                       <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Received By</label>
                    <div class="col-sm-10">
                     <select class="form-control" name="received" > 
                      <option value=''>----Pilih Nama Pekerja----</option>
                      <?php include('koneksi.php'); 
                    $a="select * from tbl_pegawai";
                    $b=mysqli_query($kon,$a);
                    while ($data=mysqli_fetch_object($b)) {
                       ?>
                      
                    <option value="<?php echo $data->nama_pegawai;?>"> <?php echo $data->nama_pegawai; ?> </option> 
                      <?php
                      }
                     ?>
                   </select>
                    </div>
                     </div>



                     
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Nama Barang </label>
                    <div class="col-sm-10">

                   <select class="form-control" name="kd_masuk"> 
                    <option value=''>----Pilih Nama Barang----</option>
                    <?php include('koneksi.php'); 
                   $a="select tbl_barangmasuk.kd_barang, tbl_barangmasuk.kd_masuk , tbl_barang.nama_barang, tbl_barangmasuk.stok as stokk from tbl_barangmasuk inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang group by kd_barang";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_masuk;?>"> <?php echo $data->nama_barang; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>


                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" placeholder="Jumlah Barang">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tgl" value="<?php echo date("Y-m-d") ?>">
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
              $sqlSelect = "select tbl_barangkeluar.kd_brgkeluar, tbl_barangmasuk.kd_masuk, tbl_barang.nama_barang, issued, received, tbl_barangkeluar.stok, tbl_barangkeluar.tgl from tbl_barangkeluar inner join tbl_barangmasuk on tbl_barangmasuk.kd_masuk = tbl_barangkeluar.kd_masuk inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang";
                  $result = mysqli_query($kon, $sqlSelect);
            
                if (mysqli_num_rows($result) > 0) {
             ?>
        <table>
          <thead>
          <tr>
                  <th>No</th>
                  <th>Issued By</th>
                  <th>Received By</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Tanggal</th>
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
                <td><?php echo $row['issued'];?></td>
                <td><?php echo $row['received'];?></td>
                <td><?php echo $row['nama_barang'];?></td>
                <td><?php echo $row['stok'];?></td>
                <td><?php echo $row['tgl'];?></td>
                 <td><a href="index.php?id=5?&kd_brgkeluar=<?php echo $row['kd_brgkeluar']; ?>">Update</a> | <a href="delete_barangkeluar.php?kd_brgkeluar=<?php echo $row['kd_brgkeluar']; ?>">Delete</a></td>
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
 



			 

              