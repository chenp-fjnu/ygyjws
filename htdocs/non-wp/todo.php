<?php 
include "NotORM.php";
class Todo {
    const dbName = 'bdm247336490_db';
    const dbHost = 'bdm247336490.my3w.com';
    const dbUsername = 'bdm247336490';
    const dbUserPassword = 'sql05247299';
    const ENCODING = 'UTF-8';
    private $connection;
    private $software;
    public $Data;
    public function __construct() {
        mb_internal_encoding(Todo::ENCODING);
        mb_regex_encoding(Todo::ENCODING);
        ini_set('default_charset', Todo::ENCODING); 
        ini_set('mbstring.strict_detection', true);
        mb_substitute_character(0x005f);  
    }
	public function setup(){
        $this->connection = new PDO( "mysql:host=".Todo::dbHost.";"."dbname=".Todo::dbName, Todo::dbUsername, Todo::dbUserPassword); 
        $this->db = new NotORM($this->connection);
// <th>ID</th>
//                       <th>Priority</th>
// 	                  <th>Subject</th>
//                       <th>Desc</th>
//                       <th>StartTime</th>
// 	                  <th>DueTime</th>
// 	                  <th>Status</th>
        if( $_POST["Subject"])
        {
            echo $_POST["Subject"].' Added<br />';
            echo $_POST["Desc"].' Added<br />';
            $array = array(
                "Priority" => $_POST["Priority"],
                "Subject" => $_POST["Subject"],
                // "Desc" => $_POST["Desc"],
                // "StartTime" => $_POST["StartTime"],
                // "DueTime" => $_POST["DueTime"],
                "Status" => $_POST["Status"]
                // "Category" => $_POST["Category"],
                // "Parent_ID" => $_POST["Parent_ID"],
                // "Owner" => $_POST["Owner"],
                // "IsPublic" => 1
            );
            $this->db->ToDo()->insert($array);
        }
        if($_GET["ID"] || $_GET['action']=='delete'){
            $row = $this->db->ToDo[intval($_GET["ID"])];
            echo $row;
            $row->delete();
            
            echo $_GET["ID"].' Deleted<br />';
        }
        $this->Data = $this->db->ToDo()->order('Status, StartTime DESC');
    }
    private function _deleteRow($id){
       $row=$this->db->ToDo()[$id];
       if($row!=null){
           $row->delete();
       }
    }
}
$todo = new Todo();		
$todo->setup();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>TO DO List</h3>
    		</div>
			<div class="row">
				<table border="1">
	              <thead>
	                <tr>
                      <th>Priority</th>
	                  <th>Subject</th>
                      <th>Desc</th>
                      <th>StartTime</th>
	                  <th>DueTime</th>
	                  <th>Status</th>
                      <th>Action</th>
	                </tr>
	              </thead>
	              <tbody>
	              <?php 
                        foreach ($todo->Data as $row) { 
                            echo '<tr>';
                            echo '<td>'. $row['Priority'] . '</td>';
                            echo '<td>'. $row['Subject'] . '</td>';
                            echo '<td>'. $row['Desc'] . '</td>';
                            echo '<td>'. $row['StartTime'] . '</td>';
                            echo '<td>'. $row['DueTime'] . '</td>';
                            echo '<td>'. $row['Status'] . '</td>';
                            echo '<td>'.'<a href="todo.php?ID='.$row['ID'].'&action=delete'.'">Delete</a>'. '</td>';
                            echo '</tr>';
                        }
				  ?>
			      </tbody>
            </table>
            <form action="#" method="post">
                <input type="text" name="Priority" placeholder="Priority"></input><br/>
                <input type="text" name="Subject" placeholder="Subject"></input><br/>
                <input type="text" name="Desc" placeholder="Desc"></input><br/>
                <input type="text" name="Status" placeholder="Status"></input><br/>
                <input type="submit" name="submit" value="Submit"></input>
            </form>
    	</div>
    </div> <!-- /container -->
  </body>
</html>