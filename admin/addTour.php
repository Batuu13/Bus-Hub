
<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }
if(isset($_POST['submit']))
{
	$output = "";
	$error = 0;
	$date = $_POST['datex'];
	$time = $_POST['time'];
		// db insert
		try{
		$stmt = $db->prepare('INSERT INTO tour (TourDate,DepartureTime,DepartureStationID,ArrivalStationID,BusID,Price) VALUES (:tDate,:dtime,:dstatID,:astatID,:bID,:price)');
		$stmt->execute(array('tDate' => $date,   'dtime' => $time, 'dstatID' => $_POST['dstatID'], 'astatID' => $_POST['astatID'], 'bID' => $_POST['bID'], 'price' => $_POST['Price'] ));
		$output = "Tour added successfully!";
		
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
					<div class="panel-heading">Add Tour</div>
					<div class="panel-body">
						
                        <form method="post">
                         
                   <div class='input-group date' id='datetimepicker'>
                    <input type='text'   class="form-control" />
                   
                    <span class="input-group-addon">
                        <span  class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                 <input type='hidden' name="datex" id="datex" class="form-control" />
                    <input type='hidden' name="time" id="time" class="form-control" />
					
						  
						  <div class="form-group">
                            <label>DepartureStationID</label>
                            <select class="form-control" name="dstatID">
                            <?php
									$stmt = $db->prepare("SELECT c.Name as 'cityName', s.Name as 'stationName',  s.StationID as id  FROM station s ,city c WHERE c.CityID = s.CityID"); //TODO ADD STATION
									$stmt->execute();
									$res = $stmt->fetchAll();
									
									foreach ($res as $city)
									{
										echo"<option  value='".$city['id']."'>".$city['cityName']." (".$city['stationName'].")</option>";
									}
							?>
                            </select>
                           
                          </div>
						  <div class="form-group">
                            <label>ArrivalStationID</label>
                            <select class="form-control" id="astatID" name="astatID" onChange="">
                            <?php
									$stmt = $db->prepare("SELECT c.Name as 'cityName', s.Name as 'stationName', s.StationID as id FROM station s ,city c WHERE c.CityID = s.CityID"); //TODO ADD STATION
									$stmt->execute();
									$res = $stmt->fetchAll();
									
									foreach ($res as $city)
									{
										echo"<option  value='".$city['id']."'>".$city['cityName']." (".$city['stationName'].")</option>";
									}
							?>
                            </select>
                           
                          </div>
                       <!--   Route Removed due to insufficient time to complete fully.
						  <div class="form-group">
                            <label>RouteID </label>
                            <select class="form-control" name="rID">
                            <?php
							/*
									$stmt = $db->prepare("SELECT * FROM route r INNER JOIN station s ON s.StationID = r.StationID INNER JOIN city c ON c.CityID = s.CityID ORDER BY r.StationOrder");
									$stmt->execute();
									$res = $stmt->fetchAll();
									$routes = array();
									
									
									
									foreach ($res as $row)
									{
										if(!array_key_exists($row['RouteID'],$routes))
											{
												$routes[$row['RouteID']] = array();
											}
												$station = array();
												$station['StationID'] = $row['StationID'];
												$station['CityName'] = $row['Name'];
												$station['RouteID'] = $row['RouteID'];
												$station['StationOrder'] = $row['StationOrder'];
												array_push($routes[$row['RouteID']],$station);
											

									}
									foreach ($routes as $route)
									{
										$routeString = "";
										//array_multisort($routes['StationOrder'],$routes);
										//TODO SORT BY STATİON ORDER
										foreach($route as $stat)
											{
												
												$routeString = $routeString . " " . $stat['CityName'] ;
												
											}
										echo"<option value='". $route[0]['RouteID']."'>".$routeString."</option>";	
									}
								*/	
							?>
                            </select>
                          </div>
                          -->
						  <div class="form-group">
                            <label>BusID</label>
                            <select class="form-control" name="bID">
                            <?php
									$stmt = $db->prepare("SELECT * FROM bus "); //TODO ADD STATION
									$stmt->execute();
									$res = $stmt->fetchAll();
									
									foreach ($res as $bus)
									{
										echo"<option value='".$bus['BusID']."'>".$bus['Plate']." (".$bus['Capacity'].")</option>";
									}
							?>
                            </select>
                          </div>
                          <div class='form-group' >
                          <label>Price</label>
                        <input type='text' name="Price"   class="form-control" />
                       
                        
                    </div>
                          <button type="submit" onClick="parseDate()" class="btn btn-default" name="submit">Submit</button>
                        </form>
                        
					</div>
				</div>
			</div>
		</div><!--/.row-->
	
        <script type="text/javascript">
		function parseDate()
			{
				var rawDate = $('#datetimepicker').datetimepicker().data("DateTimePicker").date();
				
				var date = rawDate.year() + "-" + rawDate.month() +1 + "-" + rawDate.date() ;
				var time = rawDate.hour() + ":" + rawDate.minute();
				document.getElementById("datex").value = date;
				document.getElementById("time").value = time;
			}
				
            $(function () {
                $('#datetimepicker').datetimepicker({
       format:'DD/MM/YYYY - HH:mm'
});
            });
			
        </script>
       
            
			</div><!--/.col-->
		</div><!--/.row-->
        
	</div>	<!--/.main-->

	<script src="../style/js/bootstrap.min.js"></script>	
    	
</body>

</html>