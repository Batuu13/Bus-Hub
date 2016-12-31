<?php
include('layout/header.php');
?>
<style>                        
   .table-vcenter td {
   vertical-align: middle!important;
}
</style>
<div class="panel panel-white">
  <div class="panel-body"> 
   <form class="form-group-lg">
   <?php
	

		?>
  		<div class="row">
        	<div class="col-sm-3">
             <div class="form-group ">
             
                        <label for="exampleInputName2"><h3>Departure</h3></label>
              
               
                        <select name="dep" class="form-control input-lg"  >
						  <?php
                                $stmt = $db->prepare('SELECT Name FROM city'); //TODO ADD STATION
                                $stmt->execute();
                                $res = $stmt->fetchAll();
                                
                                foreach ($res as $city)
                                {
									if ($_POST['dep'] == $city['Name'])
                                    	echo"<option selected='true'>".$city['Name']."</option>";
									else
										echo"<option>".$city['Name']."</option>";
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
                                        if ($_POST['des'] == $city['Name'])
                                            echo"<option selected='true'>".$city['Name']."</option>";
                                        else
                                            echo"<option>".$city['Name']."</option>";
                                    }
                                    
                              ?>
                            </select>
                 
             </div>
            </div>
            <div class="col-sm-3" >
             <div class="form-group">
              
             <label for="exampleInputName2"><h3>Date</h3></label>
                        <input type="text" class="form-control input-lg " value="<?php echo $_POST['date']; ?>" id="calendar">
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
  
  	<?php
	/*	 $stmt = $db->prepare('SELECT * 
		 FROM tour 
		 INNER JOIN station froms ON (froms.StationID == tour.DepatureStationID)
		 INNER JOIN station tos ON (tos.StationID == tour.ArrivalStationID)
		 INNER JOIN bus ON (bus.BusID == tour.BusID)
		 '); 
                                $stmt->execute();
                                $tours = $stmt->fetchAll();
                                
                                foreach ($tours as $tour)
                                {
									
                                }
								*/
	?>
    <div class="panel panel-default">
      <div class="panel-body">
      <table class="table table-striped table-vcenter" >
        <thead>
   <tr><b>
      <td><b>Time</b></td>
      <td>Bus Type</td>
      <td>Seat Count</td>
      <td>Price</td>
      <td> </td>
      </b>
    </tr>
  </thead>
  <tbody>
    <tr valign="top">
      <td><h4><b>21:30</b></h4></td>
      <td>SÜPER OTOBÜS (2+1)</td>
      <td>37</td>
      <td>85</td>
      <td> <button type="submit" class=" btn btn-success btn-block">Buy</button></td>
     
    </tr>
     <tr>
      <td><h4><b>21:30</b></h4></td>
      <td>SÜPER OTOBÜS (2+1)</td>
      <td>37</td>
      <td>85</td>
      <td> <button type="submit" class=" btn btn-success btn-block">Buy</button></td>
     
    </tr>
    </tbody>
		</table>
      
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