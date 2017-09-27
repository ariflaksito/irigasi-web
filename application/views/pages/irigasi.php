<div class="row">
	<div class="box col-md-12 col-sm-12 col-xs-12">
		<div class="box-body">

			<table id="tb-users" class="table table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Koordinat</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php $no = 1;?>
                <?php foreach ($irigasi as $i):?>
                <tr>
                	<td><?php echo $no++?></td>
                	<td><?php echo $i->nama?></td>
                	<td><?php echo $i->desa.', '.$i->kecamatan.', '.$i->kabupaten?></td>
                	<td><?php echo $i->latitude.', '.$i->longitude?></td>
                	<td>
                		<button class="btn btn-xs btn-success">
                			<i class="fa fa-pencil"></i>
                		</button>
                	</td>
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