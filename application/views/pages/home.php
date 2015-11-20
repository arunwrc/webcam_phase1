  <style type="text/css">
	    #my_camera{
			margin: 0 auto;
		}
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		/*#results { float:right; margin:20px; padding:20px; border:1px solid; background:green; }*/
	</style>
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
                         <h3>Register Here</h3>
                         
                         <input class="input-xxlarge touchinput" id="first_name" type="text" name="first_name" placeholder="First Name" autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="last_name" type="text" name="last_name" placeholder="Last Name" autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="mobile" type="text" name="mobile" placeholder="Mobile Number"  autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="email_id" type="text" name="email_id" placeholder="Email ID"  autocomplete="off"> 
                         <textarea class="input-xxlarge touchinput" id ="address_1" rows="2" name="address_1" placeholder="Address 1"></textarea> 
                         <textarea class="input-xxlarge touchinput" id ="address_2" rows="2" name="address_2" placeholder="Address 2"></textarea>
                         <input class="input-xxlarge touchinput" id ="street" type="text" name="street" placeholder="Street"  autocomplete="off">  
                         <input class="input-xxlarge touchinput" id ="province" type="text" name="province" placeholder="Province"  autocomplete="off"> 
                         <input class="input-xxlarge touchinput" id ="country" type="text" name="country" placeholder="Country"  autocomplete="off">
                         <textarea class="input-xxlarge touchinput" id ="remarks" rows="2" name="remarks" placeholder="Remarks"></textarea> 
                        
    
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
			height: 440,
			image_format: 'jpeg',
			jpeg_quality: 100
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<!-- A button for taking snaps -->

        <button type="submit" class="btn btn-success">Save Data</button>
	
    </div>
    
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
	$(function(){
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
			   $('#remark').val('');
			   
			   setTimeout(function(){ 
			    $('.success_message_holder').hide();
			   }, 3000);
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


  <div class="row feature-box">
      <div class="span12 cnt-title">
       <h1>At vero eos et accusamus et iusto odio dignissimos</h1> 
        <span>Contrary to popular belief, Lorem Ipsum is not simply random text.</span>        
      </div>

      <div class="span4">
        <img src="img/icon3.png">
        <h2>Feature A</h2>
        <p>
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
        </p>

        <a href="#">Read More &rarr;</a>

      </div>

      <div class="span4">
        <img src="img/icon2.png">
        <h2>Feature B</h2>
        <p>
            Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
            aliqua. 
        </p>   
          <a href="#">Read More &rarr;</a>    
      </div>

      <div class="span4">
        <img src="img/icon1.png">
        <h2>Feature C</h2>
        <p>
            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. 
        </p>
          <a href="#">Read More &rarr;</a>
      </div>
  </div>


<!-- /.Feature -->

<div class="hr-divider"></div>

<!-- Row View -->


    <div class="row">
        <div class="span6"><img src="img/responsive.png"></div>

        <div class="span6">
          <img class="hidden-phone" src="img/icon4.png" alt="">
          <h1>Fully Responsive</h1>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
             <a href="#">Read More &rarr;</a>
        </div>
    </div>

    
</div>


<!-- /.Row View -->
  