
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="<?= base_url().'/assets/js/responsivetable.js' ?>"></script>
<script src="<?= base_url().'/assets/js/datatables.js' ?>"></script>
</body>

              <style>
#chart{
 z-index: -10;
 } 
</style>
<body>
 <div id="chart">
 </div>
      <script src="<?=base_url('assets');?>/highcharts/jquery.min.js" type="text/javascript"></script>
      <script src="<?=base_url('assets');?>/highcharts/highcharts.js" type="text/javascript"></script>
      <script src="<?=base_url('assets');?>/highcharts/modules/offline-exporting.js" type="text/javascript"></script>
      <script type="text/javascript">
  jQuery(function(){
    new Highcharts.Chart({
        chart: {
        renderTo: 'chart',
        type: 'column',
        margin: 75,
        },
        title: {
        text: 'Grafik Statistik Antrian',
        x: -20
        },
        subtitle: {
        text: 'Count Antrian',
        x: -20
        },
        xAxis: {
          
        categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des ',]
        
      },
        yAxis: {
        title: {
          text: 'Total pengunjung'
        }
      },
        series: [{
        name: 'Data dalam Bulan',
        data: <?php echo json_encode($antrian); ?>
        }]
      });
    }); 
</script> 
<body>

<div id="chart1">
</div>
    <script src="<?=base_url('assets');?>/highcharts/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url('assets');?>/highcharts/highcharts.js" type="text/javascript"></script>
    <script src="<?=base_url('assets');?>/highcharts/modules/offline-exporting.js" type="text/javascript"></script>
    <script type="text/javascript">
jQuery(function(){
  new Highcharts.Chart({
      chart: {
      renderTo: 'chart1',
      type: 'line',
      },
      title: {
        text: 'Grafik Statistik Antrian',
      x: -20
      },
      subtitle: {
      text: 'Count Antrian',
      x: -20
      },
      xAxis: {
        categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des ',],

                crosshair: true
      },
      yAxis: {
      title: {
        text: 'Total pengunjung'
      }
      },
      series: [{
      name: 'Data dalam Bulan',
      data: <?php echo json_encode($antrian); ?>
      }]
    });
  }); 
</script>
</body>
</html>
