<?PHP
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');	

require_once __DIR__ . "/../../config/connectDB.php";
require_once __DIR__ . "/../../config/setting.php";

require_once __DIR__ . "/../../tools/crud.tool.php";
require_once __DIR__ . "/../../tools/function.tool.php";

$action = $_REQUEST['action'];

switch ($action) {
    case 'modal':
        $Call = new modalDetail($_POST['order'], $_POST['facebook']);
        $Result = $Call->getData();
        break;
}

echo $Result;

Class modalDetail{
    private $order;
    private $facebook;
    private $balance = false;
    private $deadline = false;
    private $adminH = false;
    private $trucking = false;
    private $remark = false;
    public function __construct($order, $facebook){
        $this->order = $order;
        $this->facebook = $facebook;
    }

    public function getData(){
        return $this->Do();
    }

    public function Do(){
        $row = $this->getRowOfOrder();
        $data = $this->createdDiv($row);
        return $data;
    }

    public function getRowOfOrder(){
        $sql  = "SELECT * ";
        $sql .= "FROM tb_lot ";
        $sql .= "WHERE item_order = '$this->order' ";
        $sql .= "AND facebook = '$this->facebook' ";
        $sql .= "ORDER BY id_lot ASC ";
        
        try {
            $con = connect_database();
            $obj = new CRUD($con);

            $row = $obj->fetchRows($sql);
            return $row;
            
        } catch (PDOException $e) {
            return "Database connection failed: " . $e->getMessage();
        
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        
        } finally {
            $con = null;
        }
    }

    public function createdDiv($row){
        $r  = "<div class='time-label'>
                <span class='bg-info'>รายการสินค้า</span>
            </div>";
        $r .= $this->getItem($row);
        if($this->balance || $this->deadline || $this->adminH || $this->trucking || $this->remark){
            $r.= $this->getDetailItem($row);
        }
        return $r;
    }

    public function getItem($row){
        $r = "";
        foreach ($row as $key => $value) {
            $bg = Setting::$statusTrack[$value['item_status']];
            $name = $value['item_name']." ".$value['item_option'];
            $img = IsNullOrEmptyString($value['img']) ? "dist/img/HeartbitLogo.jpg" : $value['img'];
            // $img = "dist/img/HeartbitLogo.jpg";
            $status = $value['item_status'];
            $amount = $value['item_amount'];
            $r .="
            <div>
                <i class='fas fa-shopping-cart' style='background-color:$bg;color:white'></i>
                <div class='timeline-item'>
                    <h3 class='timeline-header'>
                        <a id='item_name'>$name</a>
                    $amount</h3>";

            $r .= "<div class='timeline-body'>
                        <img src='$img'
                            alt='img' data-id='$img' data-toggle='modal' data-target='#modal-img'
                            class='product-image-thumb modal-img'>
                    </div>";
            
            $r .= "<div class='timeline-footer'>
                        <a class='btn btn-sm'
                            style='background-color:$bg;color:white'>$status</a>
                    </div>
                </div>
            </div>";
            if($value['balance'] != "-" && $value['balance'] != ""){
                $this->balance = true;
            }
            if($value['deadline_date'] != "-" && $value['deadline_date'] != ""){
                $this->deadline = true;
            }
            if($value['receive_date'] != "-" && $value['receive_date'] != ""){
                $this->adminH = true;
            }
            if($value['delivery_date'] != "-" && $value['delivery_date'] != ""){
                $this->trucking = true;
            }
            if($value['remark'] != "-" && $value['remark'] != ""){
                $this->remark = true;
            }
        }
        return $r;
    }

    public function getDetailItem($row){
        $r = "<div class='time-label'>
                <span class='bg-green'>รายละเอียด</span>
            </div>";
        $balance = "";
        $deadline = "";
        $adminH = "";
        $trucking = "";
        $remark = "";

        foreach ($row as $key => $value) {
            if($value['balance'] != "-" && $value['balance'] != ""){
                $balance = $value['balance'];
            }
            if($value['deadline_date'] != "-" && $value['deadline_date'] != ""){
                $deadline = $value['deadline_date'];
            }
            if($value['receive_date'] != "-" && $value['receive_date'] != ""){
                $adminH = $value['receive_date'];
            }
            if($value['delivery_date'] != "-" && $value['delivery_date'] != ""){
                $trucking = $value['delivery_date'];
            }
            if($value['remark'] != "-" && $value['remark'] != ""){
                $remark = $value['remark'];
            }
        }

        if($balance != ""){
            $r .= "<div>
                <i class='fa fa-money-bill-wave-alt bg-red'></i>
                <div class='timeline-item'>
                    <h3 class='timeline-header'>
                        <a>ยอดค้าง</a> $balance </h3>";
            if($deadline != ""){
                $r .= "<div class='timeline-footer'>
                        <b>เดดไลน์จ่ายยอดค้าง</b> $deadline </h3>
                       </div>";
            }
            $r .= "</div>
            </div>"; 
        }
        if($adminH != ""){
            $r .= "<div>
                    <i class='fa fa-home bg-info'></i>
                    <div class='timeline-item'>
                        <h3 class='timeline-header'>
                            <a>เข้าบ้านแอดมิน</a> $adminH </h3>
                    </div>
                </div>";
        }
        if($trucking != ""){
            $r .= "<div>
                    <i class='fa fa-truck bg-success'></i>
                    <div class='timeline-item'>
                        <h3 class='timeline-header'>
                            <a>จัดส่งสินค้า</a> $trucking </h3>
                    </div>
                </div>";
        }
        if($remark != ""){
            $r .= "<div>
                    <i class='fa fa-marker bg-secondary'></i>
                    <div class='timeline-item'>
                        <h3 class='timeline-header'>
                            <a>หมายเหตุ</a></h3>
                        <div class='timeline-body'>
                        $remark
                        </div>
                    </div>
                </div>";
        }
        return $r;
    }
}