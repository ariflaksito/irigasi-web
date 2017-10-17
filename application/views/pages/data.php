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
                    <th>Image</th>	
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
                	<td><?php echo ($u->type==1)?"Pintu Air":"Bendung"?></td>
                	<td>
                		<?php echo $u->tinggi?><br />
                		<?php if($u->is_banjir==1):?><span class="label label-danger">Banjir</span>
                		<?php else:?><span class="label label-success">Tidak Banjir</span><?php endif?>	
                	</td>
                	<td><?php echo $u->ket?></td>
                    <td>
                    <?php 
                    if(!empty($u->image)){
                        echo "<a href='".base_url()."uploads/".$u->image."' target='_blank'>
                        <i class='fa fa-photo'></i></a>";
                    }
                    ?></td>
                </tr>
                <?php endforeach?>	
            	</tbody>
			</table>

		</div>
	</div>
</div>
<script type="text/javascript">
  $(function(){
    $('#tb-users').DataTable();
  })
</script>