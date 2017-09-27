<div class="row">
	<div class="box col-md-12 col-sm-12 col-xs-12">
		<div class="box-body">

			<table id="tb-users" class="table table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Nama Lengkap</th>
					<th>Jabatan</th>
					<th>HP</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php $no = 1;?>
                <?php foreach ($users as $u):?>
                <tr>
                	<td><?php echo $no++?></td>
                	<td><?php echo $u->username?></td>
                	<td><?php echo $u->nama?></td>
                	<td><?php echo $u->jabatan?></td>
                	<td><?php echo $u->hp?></td>
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
<script type="text/javascript">
  $(function(){
    $('#tb-users').DataTable();
  })
</script>