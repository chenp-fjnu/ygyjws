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
				   include 'database.php';
				   $pdo = Database::connect();
				   $sql = $_SERVER["QUERY_STRING"]; //'SELECT * FROM wp_posts ORDER BY post_date DESC';
 				   foreach ($pdo->query($sql) as $row) {
					   		echo '<tr>';
						   	echo '<td>'. $row['post_title'] . '</td>';
						   	echo '<td>'. $row['post_content'] . '</td>';
						   	echo '<td>'. $row['post_date'] . '</td>';
						   	echo '</tr>';
				   }
				   Database::disconnect();
				  ?>
			      </tbody>
            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>