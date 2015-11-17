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
              <form>
              <span class="span6">
               
                    <fieldset>
                         <h3>Register Here</h3>
                         
                         <input class="input-xxlarge" id="first_name" type="text" placeholder="First Name"> 
                         <input class="input-xxlarge" id ="last_name" type="text" placeholder="Last Name"> 
                         <input class="input-xxlarge" id ="mobile" type="text" placeholder="Mobile Number"> 
                         <input class="input-xxlarge" id ="email_id" type="text" placeholder="Email ID"> 
                         <textarea class="input-xxlarge" id ="address_1" rows="2" placeholder="Address 1"></textarea> 
                         <textarea class="input-xxlarge" id ="address_2" rows="2" placeholder="Address 2"></textarea>
                         <input class="input-xxlarge" id ="street" type="text" placeholder="Street">  
                         <input class="input-xxlarge" id ="province" type="text" placeholder="Province"> 
                         <input class="input-xxlarge" id ="country" type="text" placeholder="Country">
                         <textarea class="input-xxlarge" id ="remarks" rows="2" placeholder="Remarks"></textarea> 
                        
    
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

        <button type="submit" onClick="take_snapshot()" class="btn">Submit</button>
	
    </div>
    
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			
    Webcam.snap(function(data_uri) {
		//var val = '<img id="base64image" src="'+data_uri+'"/>';
		//SaveSnap();
    var data_id = data_uri;
	SaveSnap(data_id);
});
}

function SaveSnap(data_id){
	//alert("reached here");
    var file =  data_id;
	var first_name = $('#first_name').val();
	var last_name = $('#last_name').val();
	var mobile = $('#mobile').val();
	var address_1 = $('#address_1').val();
	var address_2 = $('#address_2').val();
	var street = $('#street').val();
	var province = $('#province').val();
	var country = $('#country').val();
	var remarks = $('#remarks').val();
	
    var formdata = new FormData();
	formdata.append('first_name',first_name);
	formdata.append('last_name',last_name);
	formdata.append('mobile',mobile);
	formdata.append('address_1',address_1);
	formdata.append('address_2',address_2);
	formdata.append('street',street);
	formdata.append('province', province);
	formdata.append('country', country);
	formdata.append('remarks', remarks);
    formdata.append("base64image", file);
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", function(event) { uploadcomplete(event);}, false);
    ajax.open("POST", "upload.php");
    ajax.send(formdata);
}
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
  