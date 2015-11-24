<div class="container">

  <!--PAGE TITLE-->

	<div class="row">
		<div class="span12">
		<div class="page-header">
				<h2>
				Registrants List
			</h2>
		</div>

		</div>
	</div>

  <!-- /. PAGE TITLE-->
  <?php //echo "<pre>"; print_r($registrants_lists); echo "</pre>";?>
  	<div class="row">
	  <div class="span12">
    <table class="table condensed registrant_list_tbl">
    <thead>
      <tr>
        <th>Sl</th>
        <th>Image</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Mobile</th>
        <th>Address 1</th>
        <th>Address 2</th>
        <th>Province</th>
        <th>Street</th>
        <th>Country</th>
        <th>Remarks</th>
        <th>Created at</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $slno=1; foreach($registrants_lists as $registrant) {
		$date_obj = DateTime::createFromFormat( 'Y-m-d H:i:s', $registrant->created_at);
		$date = $date_obj->format('d M Y, g:i A');
		$status = "Active";
		echo '<tr>
		<td>'.$slno.'</td>
		<td><img class="registrants_img" src="'.$registrant->img_file.'"/></td>
        <td>'.$registrant->first_name.'</td>
        <td>'.$registrant->last_name.'</td>
        <td>'.$registrant->mobile.'</td>
        <td>'.$registrant->address_1.'</td>
        <td>'.$registrant->address_2.'</td>
        <td>'.$registrant->province.'</td>
		<td>'.$registrant->street.'</td>
        <td>'.$registrant->country.'</td>
		<td>'.$registrant->remarks.'</td>
		<td>'.$date.'</td>
		<td>'."<span class='label label-success'>$status</span>".'</td>
		<td>'."<a class='btn btn-danger' href='registrant/delete/$registrant->id'>Delete</a>".'</td>
      </tr>'  ?>
      <?php $slno++; }?>
    </tbody>
  </table>
        
	 
		 </div>
	 	</div>
</div>


<!--Footer
==========================-->