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

            $SET      = $obj->fetchRows(Setting::$SQLSET);
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
        $sql .= "GROUP BY item_order, facebook ";
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

                $Control = $this->getControl($fetchRow[$key]['item_order'], $fetchRow[$key]['facebook']);
              

                $dataRow = array();
                $dataRow[] = $Control;
                $dataRow[] = "<h6 class='text-center'>".$fetchRow[$key]['item_order']."</h6>";
                $dataRow[] = $fetchRow[$key]['facebook'];
      
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

    public function getControl($item_order, $facebook){
        $result = "<div class='text-center'><button type='button' class='btn btn-xs btn-info text-center modal-detail' data-order='$item_order' data-facebook='$facebook' data-toggle='modal' data-target='#modal-detail' id='modal-detail' title='รายละเอียด'>";
        $result .= "<i class='fa fa-plus'></i>";
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
            1 => "tb_lot.id_lot",
            2 => "tb_lot.item_order",
            3 => "tb_lot.facebook",
            4 => "tb_lot.item_status",
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

