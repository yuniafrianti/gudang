<?php 
include('koneksi.php');
?>
                <h3 align="center">Report Barang Masuk</h3>

               <?php
                 $sqlSelect ="select tbl_barangmasuk.kd_masuk, tbl_barangmasuk.kd_barang, tbl_barang.nama_barang, tbl_barangmasuk.brand, tbl_supplier.nama_supplier, tbl_kategori.nama_kategori,  stok, harga, tgl
                    from tbl_barangmasuk inner join tbl_kategori on tbl_kategori.kd_kategori = tbl_barangmasuk.kd_kategori
                    inner join tbl_supplier on tbl_supplier.kd_supplier = tbl_barangmasuk.kd_supplier
                    inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang";
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
                    <td><?php echo $row['brand'];?></td>
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