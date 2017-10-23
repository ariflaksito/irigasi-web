<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah/Edit Petugas</h3>
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
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" name="nama" value="<?php echo $user['nama']?>" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No Kontrak</label>
                  <input type="text" name="nokontrak" value="<?php echo $user['nokontrak']?>" class="form-control" placeholder="No Kontrak">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jabatan</label>
                  <input type="text" name="jabatan" value="<?php echo $user['jabatan']?>" class="form-control" placeholder="Jabatan">
                </div>
				<div class="form-group">
                  <label for="exampleInputPassword1">Pendidikan</label>
                  <input type="text" name="pendidikan" value="<?php echo $user['pendidikan']?>" class="form-control" placeholder="No Kontrak">
                </div>              
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $user['alamat']?>" class="form-control" placeholder="Alamat">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">HP</label>
                  <input type="text" name="hp" value="<?php echo $user['hp']?>" class="form-control" placeholder="HP">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
		
	</div>
</div>