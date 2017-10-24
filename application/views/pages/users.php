<div class="row">

    <a href=<?php echo base_url()."users/add"?> class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Petugas
    </a><br /><br />

	<div class="box col-md-12 col-sm-12 col-xs-12">

		<div class="box-body">

			<table id="tb-users" class="table table-bordered table-striped">
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
                		<a href=<?php echo base_url()."users/edit/$u->uid"?> class="btn btn-xs btn-success">
                			<i class="fa fa-pencil"></i>
                		</a>
                		<a href="<?php echo base_url()."users/pwd/$u->uid"?>" class="btn btn-xs btn-warning">
                			<i class="fa fa-undo"></i>
                		</a>
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