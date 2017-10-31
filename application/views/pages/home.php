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
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Jumlah Data</span>
                <span class="info-box-number"><?php echo number_format($cdata)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-commenting"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Jumlah Laporan</span>
                <span class="info-box-number"><?php echo $creport?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Peta Titik Bendung</h3>
            </div>
            <div class="box-body">
              <div class="chart">
                <!-- <canvas id="lineChart" style="height: 298px; width: 568px;" width="1136" height="596"></canvas> -->
                <!-- <img src="uploads/line.png" width="568"> -->
                <div id="map" style="height: 400px"></div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    </div>           
</div>
<script>

  $('document').ready(function(){
    $.get("<?php echo site_url('api/irigasi')?>", 
      function (a) {

        initMaps(a.data);

    });    
  });

  function initMaps(data) {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -7.80, lng: 110.35},
            zoom: 12
        });

        
        var locations = JSON.parse(JSON.stringify(data));

        for(i=0; i<locations.length; i++){
            var iw = new google.maps.InfoWindow({
                content: locations[i]['nama'] + "<br />"
                    + locations[i]['desa'] + ", " +  locations[i]['kecamatan']
            });

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
                map: map,
                animation : google.maps.Animation.DROP,
                infowindow: iw
            });

            google.maps.event.addListener(marker, 'click', function() {
                this.infowindow.open(map, this);

            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs3EvU512rhX2OKMuV2k6hY8VUqVkJWP8" async defer></script>