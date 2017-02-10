<?php 
include "todo.php";

$todo = new Todo();	
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