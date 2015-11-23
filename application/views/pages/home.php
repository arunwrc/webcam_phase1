  <div class="container">

  <!--Carousel
  ==================================================-->

  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">

      <div class="active item">
        <div class="container">
          <div class="row">
              <form class="form-signin" method="post" id="form-signin">
              <span class="span6">
               
                    <fieldset>
                    <div class="success_message_holder"></div>
                         <h2>New Registration</h2>
                        <div class="form_elements_holder"> 
                         <input class="input-xxlarge touchinput" id="first_name" type="text" name="first_name" placeholder="First Name" autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="last_name" type="text" name="last_name" placeholder="Last Name" autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="mobile" type="text" name="mobile" placeholder="Mobile Number"  autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="email_id" type="text" name="email_id" placeholder="Email ID"  autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="address_1"  type="text" name="address_1" placeholder="Address 1"  autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="address_2"  type="text" name="address_2" placeholder="Address 2"  autocomplete="off">
                         <input class="input-xxlarge touchinput" id ="street" type="text" name="street" placeholder="Street"  autocomplete="off">  
                         <input class="input-xxlarge touchinput" id ="province" type="text" name="province" placeholder="Province"  autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="country" type="text" name="country" placeholder="Country"  autocomplete="off">
                         <input class="input-xxlarge touchinput" id ="remarks"  type="text" name="remarks" placeholder="Remarks"  autocomplete="off">
                         </div>
    
                            <br>
                         
                    </fieldset>
                
                </span>

                <div class="span6">
                <div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="<?php echo base_url();?>js/webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 580,
			height: 442,
			image_format: 'jpeg',
			jpeg_quality: 100
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<!-- A button for taking snaps -->

        <button type="submit" class="btn btn-success btn-override">Save Data</button>
	
    </div>
    
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
	$(function(){
		
		/*$("input").focus(function() {
            var parent = $(this).parent();

            // Check if the bottom of the item container is below the viewport
            if ($(parent).position().top + $(parent).height() > $(window).scrollTop() + $(window).height())
            {
                // Adjust the scroll position according to the height of the item container
                $(window).scrollTop($(window).scrollTop() + $(parent).height());
            }
        });*/
		
	   $("#form-signin").submit(function(){
		 
		 
		 
		 Webcam.snap(function(data_uri) {
			var data_id = data_uri;
			
			dataString = $("#form-signin").serialize() + '&base64image=' + data_id //sending image data to controller for posting the value
	
		 });
	
	
		 $.ajax({
		   type: "POST",
		   url: "http://webcam-phase1.local/index.php/register/newregistration",
		   data: dataString,
	
		   success: function(data){
			   $('.success_message_holder').html('<div class="alert alert-success"><strong>Success!</strong> Data saved.</div>');
			   $('#first_name').val('');
			   $('#last_name').val('');
			   $('#mobile').val('');
			   $('#email_id').val('');
			   $('#address_1').val('');
			   $('#address_2').val('');
			   $('#street').val('');
			   $('#province').val('');
			   $('#country').val('');
			   $('#remarks').val('');
			   
			   setTimeout(function(){ 
			    $('.success_message_holder').hide()
			   }, 3000);
			   $('.success_message_holder').show();
		   }
	
		 });
	
		 return false;  //stop the actual form post !important!
	
	  });
	});
	</script>
                </div>
				</form>
          </div>
        </div>
       



      </div>

      





    </div>
      

  </div>
    <!-- /Carousel -->
  <!-- Feature 
  ==============================================-->



<!-- /.Row View -->
  