<div class="row">
	<div class="box col-md-12 col-sm-12 col-xs-12">
		<div class="box-body">

			<table id="tb-users" class="table table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Waktu</th>
					<th>Nama</th>
					<th>Irigasi</th>
					<th>Type Irigasi</th>
					<th>Tinggi(meter)</th>
					<th>Ket</th>				
				</tr>
				</thead>
				<tbody>
				<?php $no = 1;?>
                <?php foreach ($data as $u):?>
                <tr>
                	<td><?php echo $no++?></td>
                	<td><?php echo date_format(date_create($u->datetime), 'd M Y ~ H:i')?></td>
                	<td><?php echo $u->nama?></td>
                	<td>
                		<?php echo $u->irigasi?><br />
                		<small class="text-muted">
                			<?php echo $u->desa.', '.$u->kecamatan.', '.$u->kabupaten?></small>
                	</td>
                	<td><?php echo ($u->type==1)?"Pintu Irigasi":"Saluran Irigasi"?></td>
                	<td><?php echo $u->tinggi?></td>
                	<td><?php echo $u->ket?></td>
                </tr>
                <?php endforeach?>	
            	</tbody>
			</table>

		</div>
	</div>
</div>