<div class="row">
	<div class="box col-md-12 col-sm-12 col-xs-12">
		<div class="box-body">

			<table id="tb-users" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>#</th>
					<th>Waktu</th>
					<th>Nama Pelapor</th>
					<th>Irigasi</th>
					<th>Ket</th>			
                    <th>Image</th>	
				</tr>
				</thead>
				<tbody>
				<?php $no = 1;?>
                <?php foreach ($report as $i):?>
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo date_format(date_create($i->postdate), 'd M Y ~ H:i')?></td>
					<td><?php echo $i->petugas?></td>
					<td><?php echo $i->nama?><br />
						<small class="text-muted">
							<?php echo $i->desa.', '.$i->kecamatan.', '.$i->kabupaten?>
						</small>
					</td>
					<td><?php echo $i->report?></td>
					<td>
						<?php 
	                    if(!empty($i->image)){
	                        echo "<a href='".base_url().$i->image."' target='_blank'>
	                        <i class='fa fa-photo'></i></a>";
	                    }
	                    ?>
					</td>
				</tr>
				<?php endforeach;?>	
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