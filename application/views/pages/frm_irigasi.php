<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah/Edit Irigasi</h3>
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
                  <label>Nama Irigasi</label>
                  <input type="text" name="nama" value="<?php echo $irg['nama']?>" class="form-control" placeholder="Nama Irigasi">
                </div>
                <div class="form-group">
                  <label>Jenis Irigasi</label>
                  <input type="text" name="jenis" value="<?php echo $irg['jenis']?>" class="form-control" placeholder="Jenis Lengkap">
                </div>
                <div class="form-group">
                  <label>Kabupaten</label>
                  <input type="text" name="kabupaten" value="<?php echo $irg['kabupaten']?>" class="form-control" placeholder="Kabupaten">
                </div>
                <div class="form-group">
                  <label>Kecamatan</label>
                  <input type="text" name="kecamatan" value="<?php echo $irg['kecamatan']?>" class="form-control" placeholder="Kecamatan">
                </div>
                <div class="form-group">
                  <label>Desa</label>
                  <input type="text" name="desa" value="<?php echo $irg['desa']?>" class="form-control" placeholder="Desa">
                </div>
                <div class="form-group">
                  <label>Latitude</label>
                  <input type="text" name="latitude" value="<?php echo $irg['latitude']?>" class="form-control" placeholder="Latitude">
                </div>
                <div class="form-group">
                  <label>Longitude</label>
                  <input type="text" name="longitude" value="<?php echo $irg['longitude']?>" class="form-control" placeholder="Longitude">
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