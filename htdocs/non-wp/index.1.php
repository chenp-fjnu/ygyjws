<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>PHP CRUD Grid</h3>
    		</div>
			<div class="row">
				<table class="table table-striped table-bordered">
	              <thead>
	                <tr>
	                  <th>Name</th>
	                  <th>Email Address</th>
	                  <th>Mobile Number</th>
	                </tr>
	              </thead>
	              <tbody>
	              <?php 
				  			  include "NotORM.php";
									$dbName = 'bdm247336490_db';
									$dbHost = 'bdm247336490.my3w.com' ;
									$dbUsername = 'bdm247336490';
									$dbUserPassword = 'sql05247299';
									$connection = new PDO( "mysql:host=".$dbHost.";"."dbname=".$dbName, $dbUsername, $dbUserPassword); 
									$software = new NotORM($connection);

									foreach ($software->ToDo()->order('post_date_gmt DESC') as $row) { 
										echo '<tr>';
										echo '<td>'. $row['post_title'] . '</td>';
										echo '<td>'. $row['post_content'] . '</td>';
										echo '<td>'. $row['post_date'] . '</td>';
										echo '</tr>';
				   				}
				  ?>
			      </tbody>
            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>