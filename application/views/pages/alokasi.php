<div class="row">
	<div class="box col-md-12 col-sm-12 col-xs-12">
		<div class="box-body">
			
			<?php if(isset($add)):?>
				<?php if($add):?>
					<p class="text-success"><?php echo $msg?></p>
				<?php else:?>
					<p class="text-danger"><?php echo 'Error: '. $msg?></p>
				<?php endif?>		
			<?php endif?>	

			<form action="" method="post">
			<div class="form-group">
              	<label >Lokasi Irigasi</label>
              	<input type="text" id="irigasi" class="form-control">   
              	<input type="hidden" id="iid" name="irigasiid" class="form-control">
            </div>
			<div class="form-group">
              	<label >Petugas</label>
              	<input type="text" id="petugas" class="form-control">
              	<input type="hidden" id="uid" name="uid" class="form-control">                
            </div>
            <div class="form-group">
               	<div class="radio">
                	<label>
                    	<input type="radio" name="type" id="optionsRadios1" value="1">
                    	Pintu irigasi
                    </label>
               	</div>
              	<div class="radio">
                  	<label>
                   		<input type="radio" name="type" id="optionsRadios2" value="2">
                      	Saluran Irigasi
                    </label>
                </div>
           	</div>
           	<div class="form-group">
           		<button type="submit" class="btn btn-primary">Simpan</button>
           	</div>
           	</form>
        </div>
           	
        <div class="box-body">   	
           	<table id="tb-users" class="table table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Nama Petugas</th>
					<th>Irigasi</th>
					<th>Alamat</th>
					<th>Type</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php $no = 1;?>
                <?php foreach ($alokasi as $u):?>
                <tr>
                	<td><?php echo $no++?></td>
                	<td><?php echo $u->username?></td>
                	<td><?php echo $u->nama?></td>
                	<td><?php echo $u->irigasi?></td>
                	<td><?php echo $u->desa.", ".$u->kecamatan?></td>
                	<td><?php echo ($u->type==1)?"Pintu irigasi":"Saluran Irigasi"?></td>
                	<td>
                		<button class="btn btn-xs btn-success">
                			<i class="fa fa-pencil"></i>
                		</button>
                		<button class="btn btn-xs btn-warning">
                			<i class="fa fa-undo"></i>
                		</button>
                	</td>
                </tr>
                <?php endforeach?>	
            	</tbody>
			</table>
		</div>
	</div>
</div>


<?php $ir = json_encode($irigasi)?>
<?php $pg = json_encode($users)?>

<script type="text/javascript">
	
$(function(){

	var ir = <?php echo $ir?>;
	var options = {
		data: ir,
		getValue: "nama",
		list: {
			match: {
				enabled: true
			},
			onSelectItemEvent: function() {
				var value = $("#irigasi").getSelectedItemData().irigasiid;
				$("#iid").val(value).trigger("change");
			}
		}
	};

	$("#irigasi").easyAutocomplete(options);

	var pg = <?php echo $pg?>;
	var opt = {
		data: pg,
		getValue: "nama",
		list: {
			match: {
				enabled: true
			},
			onSelectItemEvent: function() {
				var value = $("#petugas").getSelectedItemData().uid;
				$("#uid").val(value).trigger("change");
			}
		}
	};

	$("#petugas").easyAutocomplete(opt);

});

$('#tb-users').DataTable();

</script>