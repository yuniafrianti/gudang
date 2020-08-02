<?php 
include('koneksi.php');
?>
                <h3 align="center">Report Barang Masuk</h3>

               <?php
                 $sqlSelect ="select log.kd_masuk_report, log.kd_barang_report, tbl_barang.nama_barang, log.brand_report, spesifikasi_report, tbl_supplier.nama_supplier, tbl_kategori.nama_kategori,  stok_report, harga_report, tgl_report
                    from log inner join tbl_kategori on tbl_kategori.kd_kategori = log.kd_kategori_report
                    inner join tbl_supplier on tbl_supplier.kd_supplier = log.kd_supplier_report
                    inner join tbl_barang on tbl_barang.kd_barang = log.kd_barang_report";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                      
              ?>
            <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap" border="1px" style="width:100%">
                <tr>
                  <th width="1%">No</th>
                  <th>Nama Barang</th>
                  <th>Brand</th>
                  <th>Spesifikasi</th>
                  <th>Supplier</th>
                  <th>Category</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th width="15%">Date</th>
                   

                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nama_barang'];?></td>
                    <td><?php echo $row['brand_report'];?></td>
                    <td><?php echo $row['spesifikasi_report'];?></td>
                    <td><?php echo $row['nama_supplier'];?></td>
                    <td><?php echo $row['nama_kategori'];?></td>
                    <td><?php echo $row['stok_report'];?></td>
                    <td><?php echo "Rp. ".number_format($row['harga_report'])."";?></td>
               <!--      var_dump($total); -->
                   

                    <td> <?php 
                    $a=$row['stok_report'];
                    $b=$row['harga_report'];
                    $c=$a*$b;
                    echo "Rp. ".number_format($c)."";

                    ?> </td>
                    <td><?php echo $row['tgl_report'];?></td>
                  
                </tr>
                <?php 
                  }
                } 
                  ?>    

                  <script>
                    window.print();
                  </script>      
         </table>
          </div>
        </div>
     

</form>