<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Reset Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" action="" method="post">         	
              <div class="box-body">
              	<?php if(!empty($out)):?>
	            	<?php $class = ($out['sts'])?"alert-info":"alert-warning"?>
	            	<div class="alert <?php echo $class?>">
	            		<?php echo $out['msg']?>
	            	</div>
            	<?php endif?>

                <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru</label>
                  <input type="password" name="pwd" class="form-control" placeholder="Password Baru">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Password</label>
                  <input type="password" name="cpwd" class="form-control" placeholder="Konfirmasi Password">
                </div>              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
		
	</div>
</div>