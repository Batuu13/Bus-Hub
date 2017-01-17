<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }

if(isset($_GET['id']))
{
	$output = "";

		// db insert
		try{

		$stmt = $db->prepare('DELETE FROM bus WHERE BusID = :name');
		$stmt->execute(array('name' => $_GET['id']));
		$output = "Bus Deleted";
		}catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;

	}
}


?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<?php
		if(isset($_POST['submit']))
		{
			if($error == 1)
			{
				echo '<div class="alert alert-danger" role="alert">'.$output.'</div>';
			}
			else
			{
				echo '<div class="alert alert-success" role="alert">'.$output.'</div>';
			}
		}
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Busses</div>
					<div class="panel-body">
						<!-- sadece buranin ici degisecek -->
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>Plate</td>
                            <td>Capacity</td>
                            <td>Bus Name</td>
                            <td>Model</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT *,bustype.Name AS busName, model.Name AS modelName FROM bus INNER 
						 JOIN model ON bus.Model = model.TypeID 
						 INNER JOIN bustype ON bustype.TypeID = bus.BusType');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['BusID']."</b></td>".
								 "<td>".$row['Plate']."</td>" .
								  "<td>".$row['Capacity']."</td>" .
								   "<td>".$row['busName']."</td>" .
								   "<td>".$row['modelName']."</td>" .
								 "<td><a class='btn btn-danger pull-right' href='busList.php?id=".$row['BusID']."' >Delete</a></td>".
								 "</tr>";
						}
						 ?>
                         </form>
                         </tbody>
                        </table>
                       <!-- / sadece buranin ici degisecek --> 
                      
					</div>
				</div>
			</div>
		</div><!--/.row-->
			
            
            
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script src="../style/js/jquery-1.11.1.min.js"></script>
	<script src="../style/js/bootstrap.min.js"></script>	
</body>

</html>
