<?php
class Setting
{
    public static $AppTimeZone = 'Asia/Bangkok';
    public static $DefaultProvinceTH = 'สมุทรสาคร';
    public static $DefaultProvince = 'Samut Sakhon';

    public static $classArr = array(0=> "ไม่พบข้อมูล", 1 => "ผู้ใช้ระบบ", 2 => "ช่างซ่อม", 3 => "หัวหน้าช่าง", 4=>"ผู้บริหาร", 5=>"ผู้จัดการระบบ");	
    public static $keygen = 'Pcs@'; //sha1+password
    public static $noreply_mail = "no-reply@cc.pcs-plp.com";
    public static $arr_day_of_week = array('','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์','อาทิตย์');
    public static $arr_day_of_weekEN = array('','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');	
    public static $arr_mouth = array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');	
    public static $arr_mouthEN = array('January','February','March','April','May','June','July','August','September','October','November','December');	

    public static $arr_newMonths = array(
        '01' => 'มกราคม',
        '02' => 'กุมภาพันธ์',
        '03' => 'มีนาคม',
        '04' => 'เมษายน',
        '05' => 'พฤษภาคม',
        '06' => 'มิถุนายน',
        '07' => 'กรกฎาคม',
        '08' => 'สิงหาคม',
        '09' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤศจิกายน',
        '12' => 'ธันวาคม'
    );
    public static $arr_newMonthsEN = array(
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    );
    public static $ColumnBarColor = array(
        "#3459B8", // Dark Blue
        "#5077C6",
        "#6D94D4",
        "#89B2E2",
        "#A6CFF0", // Pale Blue
        "#C4ECFF", // Lighter Blue
        "#7BA3CC", // Medium Blue
        "#5389B4",
        "#306FA0",
        "#0D559C", // Deep Blue
        "#003C87",  // Navy Blue
        "#022a5c"
    );
    public static $SQLSET = "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));";
    public static $DataTableCol = array( 
        0 => "new_car_car_reservation.id",
        1 => "new_car_car_reservation.id",
        2 => "new_car_car_reservation.begin",
        3 => "new_car_car_reservation.vehicle_id",
        4 => "new_car_car_reservation.member_id",
        5 => "new_car_car_reservation.detail",
        6 => "new_car_car_reservation.status",
        7 => "new_car_car_reservation.travelers",

    );
    public static $DataTableSearch = array(
        "begin",
    );

    public static $Warehouse = array(
        "b8" => "PCS B8",
        "b9" => "PCS B9",
        "paca" => "PACA",
        "pacm" => "PACM",
        "pacs" => "PACS",
        "pact" => "PACT"
    );

    public static $ErrorFilePath = '/temp/bot/jaibot/gr/เก็บข้อมูล Error ASRS';

    public static $HundredColor = array (
        '#0054FF', '#FF0000', '#00FF00', '#0000FF', '#FF00FF', '#FFFF00', '#00FFFF', '#FFA500', '#800080', '#008000',
        '#008080', '#800000', '#808000', '#8000FF', '#0080FF', '#00FF80', '#FF8000', '#C0C0C0', '#808080', '#FFC0CB',
        '#FF69B4', '#FF1493', '#FF00FF', '#FF4500', '#2E8B57', '#B22222', '#4B0082', '#D2691E', '#ADFF2F', '#FFD700',
        '#DC143C', '#BDB76B', '#A0522D', '#2E8B57', '#F0E68C', '#DDA0DD', '#ADFF2F', '#FF69B4', '#8A2BE2', '#A52A2A',
        '#FFFFE0', '#FA8072', '#FFE4B5', '#F5DEB3', '#D3D3D3', '#FF6347', '#DA70D6', '#20B2AA', '#87CEFA', '#00FA9A',
        '#98FB98', '#F0FFF0', '#7FFF00', '#DB7093', '#F5F5F5', '#FFFAF0', '#D8BFD8', '#DEB887', '#40E0D0', '#6A5ACD',
        '#00CED1', '#FF00FF', '#FF6A6A', '#00FFFF', '#20B2AA', '#E9967A', '#FF1493', '#FFFACD', '#ADD8E6', '#90EE90',
        '#FFD700', '#F5DEB3', '#F0E68C', '#FFA07A', '#CD853F', '#FFB6C1', '#FFC0CB', '#FFE4E1', '#8B4513', '#0000CD',
        '#FF4500', '#00FF7F', '#48D1CC', '#87CEEB', '#00FA9A', '#98FB98', '#FF00FF', '#FF69B4', '#7B68EE', '#0000CD',
        '#8A2BE2', '#D2691E', '#FFD700', '#FF4500', '#DB7093', '#20B2AA', '#7FFF00', '#00FFFF', '#F5F5F5', '#FFFAF0',
        '#D8BFD8', '#DEB887', '#40E0D0', '#6A5ACD', '#00CED1', '#FF00FF', '#FF6A6A', '#00FFFF', '#20B2AA', '#E9967A'
    );

    public static $statusTrack = array(
      'รอกดสั่ง'      => '#563d2d',
      'จองแล้ว'      => '#1E90FF',
      'กดสั่งแล้ว'     => '#4169E1',
      'ร้านจีนส่งแล้ว'  => '#7F2A3C',
      'กำลังเข้าไทย'   => '#32612D',
      'โกดังไทย'     => '#AEF359',
      'บ้านแอดมิน'    => '#4682B4',
      'แพ็คแล้วรอส่ง'  => '#3CB043',
      'มีปัญหารอแจ้ง'  => '#990000',
      'ร้านจีนยกเลิก'  => '#371F76',
      'รอร้านจีนส่ง'   => '#0000FF',
      'รอยืนยันออเดอร์' => '#3E2F84'
    );

}

class PageSetting 
{
    public static $prefixController = 'app'; // Prefix ไว้กำหนด ค่า REQUEST เช่น ?app=demo, ?module=demo

    //************ ตั้งค่า SideBar (อย่าลืมไปตั้ง Controller ที่ app/Controller/Controllers.php)********************
    public static $AppPage = array (
        // Main Page ห้ามตั้งชื่อ key------------------------
        "" => array( 
            "isTreeView" => false, // เป็นTree view หรือไม่
            "title" => "หน้าหลัก", // ชื่อ Title 
            "action" => "Dashboard", // action ไว้สำหรับส่งค่าเผื่อให้รู้ว่าหน้าไหน (ยังไม่ได้ทดสอบ)
            "view" => "../dashboard/view.php", // ลิงก์ให้ include หน้าไหน
            "href" => "", // กำหนด href สำหรับใช้กับ button และส่งค่า REQUEST เช่น ?app=Main , ?app=Dashboard
            "SideIcon" => "fa-chalkboard" //font awesome Icon
        ),
        // ---------------------------------------------
        "DemoTree" => array(
            "isTreeView" => true,
            "menu-open" => true, // ถ้าเป็น Treeview กำหนดต่อว่าจะให้เมนูเปิดค้างไว้ไหม
            "TreeIcon" => "fa-tree", // ไอคอน Treeview
            "TreeTitle" => "Demo-Tree", // ชื่อแสดงของ TreeView
            "Tree1"=> array( // Treeview อันแรก
                "isTreeView" => false,
                "title" => "หน้า 1",
                "action" => "page1",
                "view" => "../demo_Tree1/view.php",
                "href" => "Tree1",
                "SideIcon" => "fa-caret-right"
            ),
            "Tree2"=> array(
                "isTreeView" => false,
                "title" => "หน้า 2",
                "action" => "page2",
                "view" => "../demo_Tree2/view.php",
                "href" => "Tree2",
                "SideIcon" => "fa-caret-right"
            ),
        ),

    );

}