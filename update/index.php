<?PHP
ob_start();
session_start();
require_once __DIR__ . "/../config/connectDB.php";
require_once __DIR__ . "/../config/setting.php";

require_once __DIR__ . "/../tools/function.tool.php";
require_once __DIR__ . "/../tools/crud.tool.php";

require_once __DIR__ . "/../app/Controllers/SidebarController.php";

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
        Heart Bit Update
    </title>
    <?php 
        include( __DIR__ . "/component/link.php"); 
        include( __DIR__ . "/component/style.php"); 
    ?>
</head>

<!-- Script -->
<?php include( __DIR__ . "/component/script.php"); ?>

<body class="hold-transition layout-top-nav">
    <!--sidebar-collapse sidebar-mini layout-fixed layout-navbar-fixed sidebar-closed sidebar-collapse layout-navbar-fixed-->

    <div class="wrapper">

        <!-- Main Navbar Container -->
        <?php include( __DIR__ . "/frame/navbar.php"); ?>

        <!-- Main content -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper content-gradient">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6 row">
                            <h1 style="color: #7f2a3c;"><strong>หน้าสำหรับผู้ดูแล</strong></h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body p-0 card-danger card-outline" style="background-color: #957DAD;">
                                    <a type="button" class="btn btn-default btn-block btn-lg p-5 update"
                                        style="border-radius:0;">
                                        <div class="row d-flex align-items-center ">
                                            <div class="col-md-12 col-lg-2 ">
                                                <i class="fa fa-hand-middle-finger fa-3x " style="color: #7f2a3c;"></i>
                                            </div>
                                            <div class="col-md-12 col-lg-8 ">
                                                <h2 class="responsive-font " style="color: #7f2a3c;"> คลิกเพื่อ
                                                    <strong>อัพเดต</strong> ข้อมูลสถานะสินค้า</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>


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

<script>    
    $(document).ready(function () {      
           
        $(document).off("click", ".update").on("click", ".update", function (e) {
            save_mile();
        });
           
        function save_mile(){

            $.ajax({
                url: "functions/f-ajax.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: 'update',
                beforeSend: function () {
                    swal({
                        title: "ขอยาดโหลดแปป...",
                        text: "กรุณารอสักครู่นะฮ๊าฟฟู่วว",
                        icon: "info",
                        buttons: false, // ปิดใช้งานปุ่ม
                        closeOnClickOutside: false, // ไม่อนุญาตให้ปิดโดยการคลิกภายนอก
                        closeOnEsc: false, // ไม่อนุญาตให้ปิดด้วยปุ่ม Esc
                        showCancelButton: false, // There won't be any cancel button
                        showConfirmButton: false,
                    });
                },
                success: function (data) {
                    // console.log(data);
                    // return false;
                
                    swal({
                            title: "บันทึกสำเร็จ!",
                            text: "หรือเปล่าวะ ลองเช็คดูดิ๊",
                            type: "success",
                            button: {
                                text: "OK",
                                className: "my-ok-button"
                            }
                        },
                        function () {
                            event.preventDefault();
                            event.stopPropagation(); 
                        })
                   
                }
            });
        }

        function get_OutData(id){

            $.ajax({
                url: "app/Views/milein/functions/f-ajax.php",
                type: "POST",
                data: {
                    'id': id,
                    'action': 'view'
                },
                beforeSend: function () {},
                success: function (data) {
                    var js = JSON.parse(data);
                    // console.log(js);
                    $('#modal_date_out').text(js.date);
                    $('#modal_mile_out').text(js.mile);
                    $('#modal_save_out').text(js.save);
                    return false;
                }
            });
        }

    });
</script>