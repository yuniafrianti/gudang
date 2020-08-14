<?php
  error_reporting(0);
  include('koneksi.php');

?>
  
  <!-- cek apakah sudah login -->
  <?php 
  session_start();
  if($_SESSION['level']==""){
    header("location:login.php?pesan=belum_login");
  }
  ?>
  


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MST STORE CONTROL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="temp/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="temp/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="temp/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="temp/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="temp/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <script src="jquery-3.2.1.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

      $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
              $("#response").addClass("error");
              $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->

  
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>STORE</b>CONTROL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>


    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img class="img-circle">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DATA MASTER</li>
        <li><a href="index.php?id=1"><i class="fa fa-book"></i> <span>Data Barang</span></a></li>
        <li><a href="index.php?id=9"><i class="fa fa-book"></i> <span>Data Category</span></a></li>
        <li><a href="index.php?id=11"><i class="fa fa-book"></i> <span>Data Supplier</span></a></li>
        <li><a href="index.php?id=2"><i class="fa fa-book"></i> <span>Data Pekerja</span></a></li>
        <li class="header">DATA TRANSAKSI</li>
        <li><a href="index.php?id=3"><i class="fa fa-book"></i> <span>Barang Masuk</span></a></li>
        <li><a href="index.php?id=4"><i class="fa fa-book"></i> <span>Barang Keluar</span></a></li>       
        <li class="header">REPORT</li>
        <li><a href="index.php?id=16"><i class="fa fa-book"></i> <span>Barang Masuk</span></a></li>
        <li><a href="index.php?id=17"><i class="fa fa-book"></i> <span>Barang Keluar</span></a></li>
        <li><a href="index.php?id=13"><i class="fa fa-book"></i> <span>Stock Barang</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="logout.php"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        STORE CONTROL
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
            <?php
              if($_GET['id']==1)
              {
                echo "Data Barang";
              } 
               elseif($_GET['id']==2)
              {
                echo "Data Pekerja";
              } 
               elseif ($_GET['id']==3)
              {
                echo "Data Barang Masuk";
               }
               elseif ($_GET['id']==4) 
               {
                echo "Data Barang Keluar";
               }
                if($_GET['id']==5)
              {
                echo "Data Barang Keluar";
              } 
               elseif ($_GET['id']==7)
              {
                echo "Update Data Barang";
               }
               elseif ($_GET['id']==8) 
               {
                echo "Update Data Pekerja";
               }
               elseif ($_GET['id']==9) 
               {
                echo "Data Category";
               }
                  elseif ($_GET['id']==10) 
               {
                echo "Update Data Category";
               }
                elseif ($_GET['id']==11) 
               {
                echo "Data Supplier";
               }
                elseif ($_GET['id']==12) 
               {
                echo "Update Data Supplier";
               }
               elseif ($_GET['id']==13) 
               {
                echo "Report Stock Barang";
               }
               elseif($_GET['id']==14)
              {
                echo "Update Data Barang Masuk";
              } 
               elseif($_GET['id']==15)
              {
                echo "Data Barang Masuk";
              } 
               elseif($_GET['id']==16)
              {
                echo "Report Barang Masuk";
              } 
               elseif($_GET['id']==17)
              {
                echo "Report Barang Keluar";
              } 
               
               else
              {
               
              }
            ?>
          </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php
              if($_GET['id']==1)
              {
                include('barang.php');
              } 
              elseif($_GET['id']==2)
              {
                include('pegawai.php');
              } 
              elseif($_GET['id']==3)
              {
                include('barangmasuk.php');
              } 
              elseif($_GET['id']==4)
              {
                include('barangkeluar.php');
              }
                elseif($_GET['id']==5)
              {
                include('update_barangkeluar.php');
              }
                  elseif($_GET['id']==7)
              {
                include('update_barang.php');
              }
                 elseif($_GET['id']==8)
              {
                include('update_pegawai.php');
              }
                elseif($_GET['id']==9)
              {
                include('kategori.php');
              }
              elseif($_GET['id']==10)
              {
                include('update_kategori.php');
              }
               elseif($_GET['id']==11)
              {
                include('supplier.php');
              }
              elseif($_GET['id']==12)
              {
                include('update_supplier.php');
              }
             elseif($_GET['id']==13)
              {
                include('report_stok.php');
              }
              elseif($_GET['id']==14)
              {
                include('update_barangmasuk.php');
              }
              elseif($_GET['id']==15)
              {
                include('data_barangmasuk.php');
              }
               elseif($_GET['id']==16)
              {
                include('report_barangmasuk.php');
              }
              elseif($_GET['id']==17)
              {
                include('report_barangkeluar.php');
              }
            
             else
             {

             }
            ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io"></a>.</strong> All rights
    reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="temp/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="temp/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="temp/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="temp/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="temp/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="temp/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
