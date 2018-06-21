{{ csrf_field() }}


<script type="text/javascript" language="javascript" src="js/ckeditor/ckeditor.js" ></script>
<form class="form-horizontal addpro" method="POST"> 
	<div class="col-md-12">
		<i class="fa fa-save"></i>
		<button class="btn-info" type="submit">
			Thêm khuyến mãi
		</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel-body clearfix">
			<fieldset>
				<div class="form-group">
					<label>Tên khuyến mãi</label>
					

						<input class="form-control" placeholder="" required="" value="" name="title" type="text">

					<?php
		        if($_POST){echo '<span style="color:red">'.$validate['Discount']."<br/> </span>";}   
		    ?>
				</div>
				<div class="form-group">
					<label>Mô tả về khuyến mãi</label>
					<textarea class="form-control ckeditor" placeholder="Nội dung khuyến mại" name="content" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label>Ngày bắt đầu</label>		
				<input type="date" name="start"  class="form-control" value="" required="required" min="1970-01-01" max="2018-12-31" />
				<?php
			        if($_POST){
			        	if($start<$time_now) echo '<span style="color:red">'.$validate['Start']."<br/> </span>";
			    }?>


				</div>
				<div class="form-group">
					<label>Ngày kết thúc</label>
	


					<input type="date" class="form-control" name="end"  value="<?php if($_POST){ echo $end; } ?>" required="required" min="1970-01-01" max="2018-12-31" />
				<?php
			        if($_POST){
			        	if($end<=$start) echo '<span style="color:red">'.$validate['end']."<br/> </span>";
			    }?>
				</div>
			
			</fieldset>
			

		</div>
	</div>


