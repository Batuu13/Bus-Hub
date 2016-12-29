<?php
include('layout/header.php');
?>

<div class="panel panel-blue">
  <div class="panel-body"> 
    	<div class="row"> <!-- Row -->
          <div class="col-sm-6"> <!-- Places -->
          
          <form class="form-vertical" style="margin-left:40px; ">
  			<div class="form-group">
          		<div class="row"> <!-- From -->
                    <div class="input-group input-group-lg col-sm-10">
                    <label  class="control-label"><h2>Departure</h2></label>
                      <select class="form-control input-lg" >...</select>
                    </div>
                </div> 
           
                <div class="row"> <!-- To -->
                    <div class="input-group input-group-lg col-sm-10">
                    <label  class="control-label"><h2>Destination</h2></label>
                      <select class="form-control input-lg" >...</select>
                    </div>
                </div> <!-- To -->
              </div>
           </form><!-- From -->
          </div> <!-- Places -->
          <div class="col-sm-6"> <!-- Date -->
                     <div class="panel panel-blue">
					
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
          </div> <!-- Date -->
        </div> <!-- Row -->
  </div>
</div>

 </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
<script src="style/js/bootstrap-datepicker.js"></script>
	
	<script>
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
	</script>	