<?php
require_once 'API.php';
require_once "NotORM.php";
class ToDoAPI extends API
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
        $this->connection = new PDO("mysql:host=".ToDoAPI::dbHost.";"."dbname=".ToDoAPI::dbName, ToDoAPI::dbUsername, ToDoAPI::dbUserPassword); 
        $this->db = new NotORM($this->connection);
    }
    public function __construct($action) {
        parent::__construct($action);
        $this->setup();
    }

     protected function addItem(){
        // if ($this->method == 'POST') {
        
            $array = array(
                "Parent_ID" => $this->request["Parent_ID"],
                "Subject" => $this->request["Subject"],
                "Description" => $this->request["Description"],
                "Category" => $this->request["Category"],
                "Priority" => $this->request["Priority"],
                "Owner" => $this->request["Owner"],
                "StartTime" => $this->request["StartTime"],
                "DueTime" => $this->request["DueTime"],
                "Status" => $this->request["Status"],
                "IsPublic" => $this->request["IsPublic"],
                "CreateTime" => date('Y-m-d H:m:s'),
            );
            return $this->db->ToDo()->insert($array);
        // } else {
        //     return "Only accepts post request for additem";
        // }
     }
      protected function updateItem(){
        // if ($this->method == 'POST') {
            $array = array(
                "ID" => $this->request["ID"],
                "Parent_ID" => $this->request["Parent_ID"],
                "Subject" => $this->request["Subject"],
                "Description" => $this->request["Description"],
                "Category" => $this->request["Category"],
                "Priority" => $this->request["Priority"],
                "Owner" => $this->request["Owner"],
                "StartTime" => $this->request["StartTime"],
                "DueTime" => $this->request["DueTime"],
                "Status" => $this->request["Status"],
                "IsPublic" => $this->request["IsPublic"],
                "ModTime" => date('Y-m-d H:m:s'),
            );
            return $this->db->ToDo()->update($array);
        // } else {
        //     return "Only accepts post request for additem";
        // }
     }
     protected function deleteItem(){
        $row = getByID();
        if(!is_null($row)){
            return $row->delete();
        }
        else{
            return -1;
        }
     }
     protected function getByID(){
         return $row = $this->db->ToDo[$this->request['ID']];
     }
     protected function getAll(){
         return $this->db->ToDo()->order(ToDoAPI::orderby);
     }
     protected function getByCategory(){
         return $this->db->ToDo()->where("Category",$this->request['Category'])->order(ToDoAPI::orderby);
     }
     protected function getByPriority(){
         return $this->db->ToDo()->where("Priority",$this->request['Priority'])->order(ToDoAPI::orderby);
     }
 }
// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    $API = new ToDoAPI($_REQUEST['action']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}