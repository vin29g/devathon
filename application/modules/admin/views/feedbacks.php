 
 <form method="post" action="<?php echo base_url('/admin/show_feedback');?>">
	<div class="row">
				<div class="col s12 m12 l12">
					<label for="company_id">Company</label>
					<select id="company_id" name="company_id" onchange="selected(this)"class="browser-default" required>
						<option selected="selected" disabled="disabled">Select a company</option>
						<?php foreach($companies as $company): ?>
					 
							<option value="<?php echo $company['id'].'|'.$company['visit_id'];?>" ><?php echo $company['name'].'-'.$company['visit_id'];?></option>
							 
						<?php endforeach ?>
					</select>
				</div>
			</div>

			<input type="submit" class="btn"/>
			</form>


			<!-- <div class="visit_id"></div> -->


   <script>
   // $("#company_id").change(function()
   // {
   // 	 alert("hello");
   // 	 var company_id=this.val();
   // 	 alert(company_id);
   // });

   function selected(y)
   {
   	var id=y.value;
   	//alert(id);
   	$.ajax(
		{
			url:"<?php echo base_url('admin/show_feedback')?>",
			dataType:'json',
			cache:false,
			data:
			{
				id:id
			},
			type:"POST",
			success:function(data)
			{
                   alert(data.m1);  
				 //$(.visit_id).html(data);
			}
		});
   }
   </script>

