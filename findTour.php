<?php
include('layout/header.php');


$d = new DateTime($_POST['date']);
$date = $d->format('Y-m-d');

?>
<style>                        
   .table-vcenter td {
   vertical-align: middle!important;
}
</style>
<div class="panel panel-white">
  <div class="panel-body"> 
   <form class="form-group-lg" method="post">
   <?php
	

		?>
  		<div class="row">
        	<div class="col-sm-3">
             <div class="form-group ">
             
                        <label for="exampleInputName2"><h3>Departure</h3></label>
              
               
                        <select name="dep" class="form-control input-lg"  >
						  <?php
                                $stmt = $db->prepare('SELECT Name,CityID FROM city'); //TODO ADD STATION
                                $stmt->execute();
                                $res = $stmt->fetchAll();
                                
                                foreach ($res as $city)
                                {
									if ($_POST['dep'] == $city['CityID'])
                                    	echo"<option value=".$city['CityID']." selected='true'>".$city['Name']."</option>";
									else
										echo"<option value=".$city['CityID'].">".$city['Name']."</option>";
                                }
                                
                          ?>
                      
                      
                      </select>
                       
             </div>
            </div>
            <div class="col-sm-3">
             <div class="form-group">
                  
                            <label for="exampleInputName2"><h3>Destination</h3></label>
           
                 
                             <select name="des" class="form-control input-lg ">
                            <?php
                                    foreach ($res as $city)
                                    {
                                        if ($_POST['des'] == $city['CityID'])
                                         	echo"<option value=".$city['CityID']." selected='true'>".$city['Name']."</option>";
										else
											echo"<option value=".$city['CityID'].">".$city['Name']."</option>";
                                    }
                                    
                              ?>
                            </select>
                 
             </div>
            </div>
            <div class="col-sm-3" >
             <div class="form-group">
              
             <label for="exampleInputName2"><h3>Date</h3></label>
                        <input type="text" class="form-control input-lg " name="date" value="<?php echo $_POST['date']; ?>" id="calendar">
             </div>
            </div>
            <div class="col-sm-3" >
            <div class="form-group" align="left">
			    <br><br><br>
            <button type="submit" class="form-control btn btn-primary btn-block">Search!</button>
            </div>
            </div>
        </div>
   </form>            
  </div>
</div>

<div class="panel panel-white">
  <div class="panel-body"> 
  
  	
    <div class="panel panel-default">
      <div class="panel-body">
      
      <?php

		 $stmt = $db->prepare("SELECT *, model.Name as modelName, bustype.Name as busName
		 FROM tour t
		 INNER JOIN bus ON (bus.BusID = t.BusID)
		 INNER JOIN bustype ON bus.BusType = bustype.TypeID 
		 INNER JOIN model ON bus.Model = model.TypeID
		 WHERE t.DepartureStationID = " . $_POST['dep'] ." AND t.ArrivalStationID = ".$_POST['des']."
		 AND t.TourDate = '".$date."' ORDER BY t.DepartureTime ASC"
		 );  //todo add view for busses
                                $stmt->execute();
                                $tours = $stmt->fetchAll();
           $count = count($tours);                     
                               
				if($count == 0)
				echo"<h2><center> No Busses Found. </center></h2>	";
				else
				{	
				
	?>
      <table class="table table-striped table-vcenter" >
        <thead>
   <tr><b>
      <td><b>Time</b></td>
      <td>Bus Type</td>
      <td>Seat Count</td>
      <td>Price</td>
      <td>  </td>
      </b>
    </tr>
  </thead>
  <tbody>
<?php  
 foreach ($tours as $tour)
                                {
									$count++;
									echo"
									<tr>
									  <td><h4><b>".$tour['DepartureTime']."</b></h4></td>
									  <td>".$tour['modelName']." - ".$tour['busName']."</td>
									  <td>".$tour['Capacity']."</td>
									  <td>85</td>
									  <td> <a href='selectSeat.php?tourID=".$tour['TourID']."' class='btn btn-success btn-block'>Buy</a></td>
									</tr>";
                                }
?>
    </tbody>
		</table>
      <?php } ?>
      </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="style/js/bootstrap-datepicker.js"></script>
	
	<script>
	
	
	function checkDate()
	{
		
		if(!$('#date').val())
		{
			// TODO ADD ALERT ADD PLACES CHECK
			return false;
		}
		return true;
	}
		$('#calendar').datepicker({
		});
 
		!function ($) {
			
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");  
				
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
		$('#calendar').datepicker().on('click', function () {
			$('#date').val($('#calendar').datepicker('getDate'));
		});
	</script>	
 </div> <!-- container -->