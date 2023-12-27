<?PHP
ob_start();
session_start();
require_once __DIR__ . "/config/connectDB.php";
require_once __DIR__ . "/config/setting.php";

require_once __DIR__ . "/tools/function.tool.php";
require_once __DIR__ . "/tools/crud.tool.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set(Setting::$AppTimeZone);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        HeartBit CosShop เช็คสถานะสินค้า 
    </title>
    <?php 
        include( __DIR__ . "/app/Component/link.php"); 
        include( __DIR__ . "/app/Component/style.php"); 
    ?>
</head>

<!-- Script -->
<?php include( __DIR__ . "/app/Component/script.php"); ?>

<body class="hold-transition layout-top-nav">
    <!--sidebar-collapse sidebar-mini layout-fixed layout-navbar-fixed sidebar-closed sidebar-collapse layout-navbar-fixed-->

    <div class="wrapper">

        <!-- Main Navbar Container -->
        <?php include( __DIR__ . "/app/Frame/navbar.php"); ?>

        <!-- Main content -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color:#5d0101">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6 row">
                            <h1 style="color: #7f2a3c;"><strong>หน้าสำหรับผู้ดูแล</strong></h1>
                        </div>/.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row d-flex justify-content-center">

                    <div class="col-lg-12">
                        <div class="card">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <a href="https://www.facebook.com/HeartBitCosShop" target="_blank">
                                        <img class="d-block w-100" 
                                            src="dist/img/Banner1.jpg" alt="First slide">
                                    </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                        <div class="card" >
                            <div class="card-header text-center " style="background-color:#ffd684">
                                <h3 style="color:#7F2A3C">HeartBit CosShop</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-1">
                                <form id="searchForm" class="addform" name="addform" method="POST" enctype="multipart/form-data" autocomplete="off" novalidate="">
                                    <div class="col-sm-12 text-center">
                                        <label style="color:#7F2A3C">ระบุชื่อผู้ใช้งาน</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="search" name="search" placeholder="ระบุชื่อ..." aria-describedby="inputGroupPrepend" required />
                                        </div>
                                        <input type="button" class="btn btn-search" value="ค้นหา" style="background-color:#ffd684;color:#5d0101" />
                                    </div>      
                                </form>
                            </div>
                      
                                <code>
                                *ชิ้นไหนจัดส่งและแจ้งเลขแทรคกิ้งให้ลูกค้าแล้ว จะลบออก*
                                </code>
                       
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-sm-12 div_table">
                        <div class="card">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="row m-2">
                                        <div class="col-sm-12 p-0 ">

                                            <table id="track_table"
                                                class="table table-hover dataTable nowrap">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>เลขที่ออเดอร์</th>
                                                        <th scope="col" >Facebook</th>
                                                        <th scope="col" >สินค้าที่สั่ง</th>
                                                        <th scope="col" >ตัวเลือกสินค้า</th>
                                                        <th scope="col" >จำนวนสินค้า</th>
                                                        <th scope="col" >สถานะสินค้า</th>
                                                        <th scope="col" >ยอดค้าง</th>
                                                        <th scope="col" >เดดไลน์จ่ายยอดค้าง</th>
                                                        <th scope="col" >เข้าบ้านแอดมิน</th>
                                                        <th scope="col" >จัดส่งสินค้า</th>
                                                        <th scope="col" >หมายเหตุ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->


    </div>

    <a href="#" class="scrollup"><i class="fas fa-angle-double-up"></i> เลื่อนขึ้น</a>
</body>

</html>

<?php include(__DIR__ . "/app/Component/script_dataTable.php"); ?>

<script>    
    $(document).ready(function () {     
        
        // จับการกดปุ่ม Enter ในฟิลด์ค้นหา
        $('#search').keypress(function (e) {
            if (e.which == 13) { // 13 คือรหัสของปุ่ม Enter
                e.preventDefault(); // ป้องกันการรีเฟรชหน้าเว็บ
                $('.btn-search').click(); // เลียนแบบการคลิกปุ่มค้นหา
            }
        });
          
        $(document).off("click", ".btn-search").on("click", ".btn-search", function (e) {
            var input = $('#search').val();
            if(input == ""){
                return;
            }
            $('#track_table').DataTable().ajax.reload();

        });
           
    });
</script>