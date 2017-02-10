<?php
require_once 'API.php';
require_once "NotORM.php";
class ToDo extends API
{
    const dbName = 'bdm247336490_db';
    const dbHost = 'bdm247336490.my3w.com';
    const dbUsername = 'bdm247336490';
    const dbUserPassword = 'sql05247299';
    const ENCODING = 'UTF-8';
    const orderby= 'Status, StartTime DESC';
    private $connection;
    private $db;
    public $Data;

	public function setup(){
        $this->connection = new PDO( "mysql:host=".Todo::dbHost.";"."dbname=".Todo::dbName, Todo::dbUsername, Todo::dbUserPassword); 
        $this->db = new NotORM($this->connection);
    }
    public function __construct($request) {
        parent::__construct($request);
        $this->setup();
    }

// <form action="#" method="post">
//                 <input type="text" name="Priority" placeholder="Priority"></input><br/>
//                 <input type="text" name="Subject" placeholder="Subject"></input><br/>
//                 <input type="text" name="Desc" placeholder="Desc"></input><br/>
//                 <input type="text" name="Status" placeholder="Status"></input><br/>
//                 <input type="submit" name="submit" value="Submit"></input>
//             </form>
     protected function addItem(){
        // if ($this->method == 'POST') {
            $array = array(
                "Priority" => $this->request["Priority"],
                "Subject" => $this->request["Subject"],
                // "Desc" => $_POST["Desc"],
                // "StartTime" => $_POST["StartTime"],
                // "DueTime" => $_POST["DueTime"],
                "Status" => $this->request["Status"]
                // "Category" => $_POST["Category"],
                // "Parent_ID" => $_POST["Parent_ID"],
                // "Owner" => $_POST["Owner"],
                // "IsPublic" => 1
            );
            $this->db->ToDo()->insert($array);
        // } else {
        //     return "Only accepts post request for additem";
        // }
     }
     protected function deleteItem(){
            echo intval($this->request['ID']);
            $row = $this->db->ToDo[array('ID' => intval($this->request['ID']))];
            //delete? primary key?
            return $row->delete();
     }
     protected function getAll(){
         return $this->db->ToDo()->order(Todo::orderby);
     }
     protected function getByCategory(){
         return $this->db->ToDo()->where("Category",$this->request['Category'])->order(Todo::orderby);
     }
     protected function getByPriority(){
         return $this->db->ToDo()->where("Priority",$this->request['Priority'])->order(Todo::orderby);
     }
 }
// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    $API = new ToDo($_REQUEST['request']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}