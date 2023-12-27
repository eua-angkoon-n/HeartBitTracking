<?PHP
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');

require_once __DIR__ . "/../../config/connectDB.php";
require_once __DIR__ . "/../../config/setting.php";

require_once __DIR__ . "/../../tools/crud.tool.php";
require_once __DIR__ . "/../../tools/function.tool.php";

require_once __DIR__ . "/../../app/Class/datatable_processing.php";

Class DataTable extends TableProcessing {
    public $name;
    
    public function __construct($formData,$TableSET){
        parent::__construct($TableSET); //ส่งค่าไปที่ DataTable Class

        parse_str($formData, $data);

        $this->name = $data['search'];
    }   
    public function getTable(){
        // return $this->start;
        return $this->SqlQuery();
    }

    public function SqlQuery(){
        $sql      = $this->getSQL(true);
        $sqlCount = $this->getSQL(false);
        // return $sql;

        try {
            $con = connect_database();
            $obj = new CRUD($con);

            $fetchRow = $obj->fetchRows($sql);
            $numRow   = $obj->getCount($sqlCount);
            // return $fetchRow;

            $Result   = $this->createArrayDataTable($fetchRow, $numRow);
            
            return $Result;
        } catch (PDOException $e) {
            return "Database connection failed: " . $e->getMessage();
        
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        
        } finally {
            $con = null;
        }
    }

    public function getSQL(bool $OrderBY){

        // $status = $this->chkStatus();
        $name = $this->chkName();

        if($OrderBY){
            $sql = "SELECT * ";
            
        } else {
            $sql  = "SELECT count(tb_lot.id_lot) AS total_row ";
        }
        $sql .= "FROM tb_lot ";
        $sql .= "WHERE 1=1 ";
        $sql .= "$name ";

        $sql .= "$this->query_search ";
        if($OrderBY) {
            $sql .= "ORDER BY ";
            $sql .= "$this->orderBY ";
            $sql .= "$this->dir ";
            $sql .= "$this->limit ";
        }

        return $sql;
    }

    public function chkName(){
        $r = "";
        if(!IsNullOrEmptyString($this->name)) {
            $r = "AND facebook LIKE '%$this->name%' ";
        } else {
            $r = "AND id_lot = 0 ";
        }
        return $r;
    }
    
    public function createArrayDataTable($fetchRow, $numRow){

        $arrData = null;
        $output = array(
            "draw" => intval($this->draw),
            "recordsTotal" => intval(0),
            "recordsFiltered" => intval(0),
            "data" => $arrData,
        );

        if (count($fetchRow) > 0) {
            $No = ($numRow - $this->pStart);
            foreach ($fetchRow as $key => $value) {
              

                $dataRow = array();
                $dataRow[] = "<h6 class='text-center'>".$fetchRow[$key]['item_order']."</h6>";
                $dataRow[] = $fetchRow[$key]['facebook'];
                $dataRow[] = $fetchRow[$key]['item_name'];
                $dataRow[] = $fetchRow[$key]['item_option'];
                $dataRow[] = $fetchRow[$key]['item_amount'];
                $dataRow[] = "<h4 class='text-center'><span class='badge' style='background-color:".Setting::$statusTrack[$fetchRow[$key]['item_status']].";color:white'>".$fetchRow[$key]['item_status']."</span></h4>";
                $dataRow[] = $fetchRow[$key]['balance'];
                $dataRow[] = $fetchRow[$key]['deadline_date'];
                $dataRow[] = $fetchRow[$key]['receive_date'];
                $dataRow[] = $fetchRow[$key]['delivery_date'];
                $dataRow[] = $fetchRow[$key]['remark'];
        
                $arrData[] = $dataRow;
                $No--;
                
            }
        }

        $output = array(
            "draw" => intval($this->draw),
            "recordsTotal" => intval($numRow),
            "recordsFiltered" => intval($numRow),
            "data" => $arrData,
        );

        return $output;
    }

    public function getControl($id, $date, $vehicle){
        $result = "<div class='text-center'><button type='button' style='background-color:#F15C22;color:#EEEEEE' class='btn text-center modalMile' data-id='$id' data-datetext='$date' data-vehicle='$vehicle' data-toggle='modal' data-target='#modal-mile' data-backdrop='static' data-keyboard='false' id='modalMile' title='บันทึกเลขไมล์'>";
        $result .= "<i class='fa fa-save'></i><span> บันทึกเลขไมล์</span> ";
        $result .= "</button></div>";
        return $result;
    }
    
}

//////////////////////////////////////////////////////////////////////////////////
$column = $_POST['order']['0']['column'] + 1;
$search = $_POST["search"]["value"];
$start  = $_POST["start"];
$length = $_POST["length"];
$dir    = $_POST['order']['0']['dir'];
$draw   = $_POST["draw"];

$action = $_POST['action'];

$DataTableSearch = array(
   
);

switch($action){
    default:
        $DataTableCol = array( 
            0 => "tb_lot.id_lot",
            1 => "tb_lot.item_order",
            2 => "tb_lot.facebook",
            3 => "tb_lot.item_name",
            4 => "tb_lot.item_option",
            5 => "tb_lot.item_amount",
            6 => "tb_lot.item_status",
            7 => "tb_lot.balance",
            8 => "tb_lot.deadline_date",
            9 => "tb_lot.receive_date",
            10 => "tb_lot.delivery_date",
            11 => "tb_lot.remark",
        );
    break;
}

$dataGet = array(
    'column'     => $column,
    'search'     => $search,
    'length'     => $length,
    'start'      => $start,
    'dir'        => $dir,
    'draw'       => $draw,
    'dataCol'    => $DataTableCol,
    'dataSearch' => $DataTableSearch
);


switch($action) {
    default:
        $Call   = new DataTable($_POST['formData'],$dataGet);
        $result = $Call->getTable(); 
    break;
}
// print_r($_POST['formData']);
// exit;
///////////////////////////////////////////////////////////////////////////////////

echo json_encode($result);
exit;
?>