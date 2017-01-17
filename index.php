<?php
include('layout/header.php');
?>

<div class="panel panel-gray">
  <div class="panel-body"> 
    	<div class="row"> <!-- Row -->
          <div class="col-sm-6"> <!-- Places -->
          
          <form class="form-vertical"  method="post" onSubmit="return  checkDate();" action="findTour.php" style="margin-left:40px;">
  			<div class="form-group">
          		<div class="row"> <!-- From -->
                    <div class="input-group input-group-lg col-sm-10">
                    <label  class="control-label"><h3>Departure</h3></label>
                      <select name="dep" class="form-control input-lg" >
                      <?php
					  		$stmt = $db->prepare('SELECT Name,CityID FROM city'); //TODO ADD STATION
							$stmt->execute();
							$res = $stmt->fetchAll();
							
							foreach ($res as $city)
							{
								echo"<option value=".$city['CityID'].">".$city['Name']."</option>";
							}
							
					  ?>
                      
                      
                      </select>
                    </div>
                </div> 
           
                <div class="row"> <!-- To -->
                    <div class="input-group input-group-lg col-sm-10">
                    <label  class="control-label"><h3>Destination</h3></label>
                      <select name="des"  class="form-control input-lg" >
                       <?php
							
							foreach ($res as $city)
							{
								echo"<option value=".$city['CityID'].">".$city['Name']."</option>";
							}
							
					  ?>
                      
                      </select>
                    </div>
                </div> <!-- To -->
               
                
              </div>
              <div class="row"> <!-- Submit -->
                    <div class="input-group input-group-lg col-sm-10">
                    <button type="submit" class="btn btn-danger btn-lg btn-block">Find Tickets!</button>
                    </div>
                </div> 
           
          </div> <!-- Places -->
          <div class="col-sm-6"> <!-- Date -->
                     <div class="panel panel-gray">
					
					<div class="panel-body">
                    <input   type="hidden" id="date" name="date" required> </input>
						<div id="calendar"> </div>
					</div>
				</div>
          </div> <!-- Date -->
          </form><!-- From -->
        </div> <!-- Row -->
  </div>
</div>

 </div>

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
			var dateTypeVar = $('#calendar').datepicker('getFormattedDate');
			
			$('#date').val(dateTypeVar);
		});
	</script>	