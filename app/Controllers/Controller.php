<?php 
// ฟังก์ชั่นใช้ เช็ค Login (ยังไม่เสร็จ)
// if(empty($_SESSION['sess_id_user'])){ 
//     $_SESSION = []; //empty array. 
//     session_destroy(); 
//     die(include('login.php')); 
// }

$prefixController = PageSetting::$prefixController; // รับค่า prefix
isset($_REQUEST[$prefixController]) ? $prefix = $_REQUEST[$prefixController] : $prefix = ''; //รับ REQUEST
$AppPage = PageSetting::$AppPage;

//Switch Page SideBar
//******* กำหนด case โดยถ้าเป็นหน้าที่แยกเป็น Tree ใช้ฟังก์ชัน setViewTree($prefix, ชื่อหัวข้อของTree, $action, $title) */
switch ($prefix) {
    case "Tree1":
      setViewTree($prefix, 'DemoTree', $include_view, $action, $title);
    break;
    case "Tree2":
      setViewTree($prefix, 'DemoTree', $include_view, $action, $title);
    break;
    default:
        setView($prefix, $include_view, $action, $title);
      break;
}

function setView($prefix, &$include_view, &$action, &$title) {
    $AppPage = PageSetting::$AppPage;
    $include_view = $AppPage[$prefix]['view'];
    $action = $AppPage[$prefix]['action'];
    $title = $AppPage[$prefix]['title'];
}

//ชื่อหน้า , ชื่อหัวข้อของ Tree
function setViewTree($prefix, $treeName, &$include_view, &$action, &$title) {
    $AppPage = PageSetting::$AppPage;
    $include_view = $AppPage[$treeName][$prefix]['view'];
    $action = $AppPage[$treeName][$prefix]['action'];
    $title = $AppPage[$treeName][$prefix]['title'];
}