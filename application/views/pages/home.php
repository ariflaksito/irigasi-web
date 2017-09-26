<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Selamat datang <?php echo $sess['fullname']?></h3>
                <p>Terakhir kali anda login di dashboard ini adalah <strong><?php echo timeago($sess['lastlog'])?></strong> atau pada tanggal <?php echo date_format(date_create($sess['lastlog']), 'd M Y H:i')?></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Jumlah Users</span>
                <span class="info-box-number"><?php echo $cusers?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-map-marker"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Jumlah Irigasi</span>
                <span class="info-box-number"><?php echo $cirigasi?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

</div>