<?php 
include('koneksi.php');
?>
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
             <a href="cetak_stok.php"  target="_blank" class="btn btn-default pull-right">Print Pdf</a>
            <input id="myInput" type="text" placeholder="Search..">
            <br><br>
  
            <?php
                 $sqlSelect = "select kd_barang, sum(tbl_barangmasuk.stok) as stok
                  from tbl_barangmasuk group by kd_barang;";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>

          <table>
            <thead>
            <tr>
                 <th>No</th>
                  <th>Nama Barang</th>
                  <th>Stock</th>
            </tr>
            </thead>
            <tbody id="myTable">
               <?php
                        $no=1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

            <tr>
                <td><?php  echo $no++; ?></td>
            
                <td>
                    <?php 
                  include('koneksi.php');
                  $a="select * from tbl_barang where kd_barang='".$row['kd_barang']."'";
                  $query=mysqli_query($kon,$a);
                  $data=mysqli_fetch_object($query);
                  echo $data->nama_barang;

                 ?>

                </td>
                <td><?php echo $row['stok'];?></td>          
                </tr>
                 <?php
                  }
                } 
                  ?>
            </tbody>
          </table>

          </body>
          </html>
