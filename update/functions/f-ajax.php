<?PHP
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');	

require_once __DIR__ . "/../../config/connectDB.php";
require_once __DIR__ . "/../../config/setting.php";

require_once __DIR__ . "/../../tools/crud.tool.php";
require_once __DIR__ . "/../../tools/function.tool.php";

require __DIR__ . '/../../vendor/autoload.php';


$Call   = new ReadSheets();
$Result = $Call->DoUpdate();

echo '<pre>';
print_r($Result);
echo '</pre>';
exit;


Class ReadSheets{
    public function __construct(){

    }

    public function DoUpdate(){
        $data = $this->getDataFromSheet();
        $r    = $this->DoInsertData($data);
        return $r;
    }

    public function getDataFromSheet(){
        // configure the Google Client
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        // credentials.json is the key file we downloaded while setting up our Google Sheets API
        $path = __DIR__ . '/../../config/credentials.json';
        $client->setAuthConfig($path);

        // configure the Sheets Service
        $service = new \Google_Service_Sheets($client);

        // the spreadsheet id can be found in the url https://docs.google.com/spreadsheets/d/143xVs9lPopFSF4eJQWloDYAndMor/edit
        $spreadsheetId = MySecret::$spreadsheetId;
        $spreadsheet = $service->spreadsheets->get($spreadsheetId);
        // var_dump($spreadsheet);

        // we define here the expected range, columns from A to F and lines from 1 to 10
        $range = MySecret::$spreadsheetRange;
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
        return $values;
    }

    public function DoInsertData($s){

        $tun = "TRUNCATE TABLE tb_lot;";

        try {
            $con = connect_database();
            $obj = new CRUD($con);
            $obj->fetchRows($tun);

            $order = '';
            $face  = '';
            $date  = DATE('Y-m-d H:i:s');
            foreach ($s as $key => $value){
                if(!IsNullOrEmptyString($value['0'])){
                    $order = $value['0'];
                }
                if(!IsNullOrEmptyString($value['1'])){
                    $face  = $value['1'];
                }
                $v = [
                    'item_order'    => $order ,
                    'facebook'      => $face ,
                    'img'           => !IsNullOrEmptyString($value['2']) ? $value['2'] : '' ,
                    'item_name'     => !IsNullOrEmptyString($value['3']) ? $value['3'] : '' , 
                    'item_option'   => !IsNullOrEmptyString($value['4']) ? $value['4'] : '' ,
                    'item_amount'   => !IsNullOrEmptyString($value['5']) ? $value['5'] : '' ,
                    'item_status'   => !IsNullOrEmptyString($value['6']) ? $value['6'] : '' ,
                    'balance'       => !IsNullOrEmptyString($value['7']) ? $value['7'] : '' ,
                    'deadline_date' => !IsNullOrEmptyString($value['8']) ? $value['8'] : '' ,
                    'receive_date'  => !IsNullOrEmptyString($value['9']) ? $value['9'] : '' ,
                    'delivery_date' => !IsNullOrEmptyString($value['10']) ? $value['10'] : '' ,
                    'remark'        => !IsNullOrEmptyString($value['11']) ? $value['11'] : '' ,
                    'date_updated'  => $date
                ];

                $row = $obj->addRow($v, 'tb_lot');
            }
            return $row;
            
        } catch (PDOException $e) {
            return "Database connection failed: " . $e->getMessage();
        
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        
        } finally {
            $con = null;
        }

        
    }
}