<?php
include '../../controllers/cTK.php';
$p = new ControllerGiamDoc();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- HTML code -->
<h3 style="text-align:center;color:green">Xem Báo Cáo Thống Kê Đơn Đăng Ký Khám Bệnh</h3>
<div class="col-lg-12">
<form class="form-control" action="" method="post">
<div class="form-group">
    <label>Chọn Ngày Bắt Đầu Thống Kê:</label>
    <input type="date" class="form-control" name="ngaybatdau" />
</div>
<div class="form-group">
    <label>Chọn Ngày Kết Thúc Thống Kê:</label>
   <input type="date" class="form-control" name="ngayketthuc" />
</div>
<div class="form-group">
    <button type="submit" name="xtk" class="btn btn-primary">Xem thống kê</button>
</div>
</form>

</div>
<?php 
if(isset($_POST['xtk']))
{
  $ngaybd = $_POST['ngaybatdau'];
  $ngaykt = $_POST['ngayketthuc'];
  if($ngaybd!=='' || $ngaykt!=='')
  {
      $t = $p->thongkeDKKBon($ngaybd,$ngaykt);
      $td = mysqli_fetch_assoc($t);
      $t2 = $p->thongkeDKKBoff($ngaybd,$ngaykt);
      $td2 = mysqli_fetch_assoc($t2);
      // $a = $td['ThongkeOn'];
      // $b = $td2['ThongkeOff'];
      $a = $td['ThongkeOn'];
      $b = $td2['ThongkeOff'];
 // Dữ liệu cho biểu đồ
 $data = array(
  array('Đơn Đăng Ký Khám Bệnh', 'Số Lượng'),
  array('Đơn Đăng Ký Online', $a*10),
  array('Đơn Đăng Ký Offline', $b*5)
);
// Chuyển đổi dữ liệu thành JSON
 $json_data = json_encode($data);

 $t1 = $p->thongkeDKKBondatt($ngaybd,$ngaykt);
 $td1 = mysqli_fetch_assoc($t1);
 $t21 = $p->thongkeDKKBonctt($ngaybd,$ngaykt);
 $td21 = mysqli_fetch_assoc($t21);
 // $a = $td['ThongkeOn'];
 // $b = $td2['ThongkeOff'];
 $a1 = $td1['ThongkeOntt'];
 $b1 = $td21['ThongkeOnctt'];
// Dữ liệu cho biểu đồ
$data1 = array(
array('Đơn Đăng Ký Khám Bệnh', 'Số Lượng'),
array('Đơn Đăng Ký Online Đã Thanh Toán', $a1*10),
array('Đơn Đăng Ký Online Chưa Thanh Toán', $b1*5)
);
// Chuyển đổi dữ liệu thành JSON
$json_data1 = json_encode($data1);
  }
  else
  {   
    echo '0';
  }
} 
?>
<div class="col-lg-12">
<?php
if(isset($_POST['xtk']))
{

    echo '<div id="pie_chart" style="margin:auto;padding:auto;"></div>';
    echo '<div id="pie_chart1" style="margin:auto;padding:auto;"></div>';
}
?>
</div>

<!-- JavaScript code -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  // Load dữ liệu và vẽ biểu đồ tròn
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(drawChart1);
  function drawChart() {
    var data = google.visualization.arrayToDataTable(<?php echo $json_data; ?>);

    var options = {
      title: 'Đơn Đăng Ký Khám Bệnh',
      is3D: false,
    };

    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, {
  title: 'Đơn Đăng Ký Khám Bệnh',
  is3D: false,
  width: 750,
  height: 500,
});
  }
  function drawChart1() {
    var data = google.visualization.arrayToDataTable(<?php echo $json_data1; ?>);

    var options = {
      title: 'Đơn Đăng Ký Khám Bệnh Online',
      is3D: false,
    };

    var chart = new google.visualization.BarChart(document.getElementById('pie_chart1'));
    chart.draw(data, {
  title: 'Đơn Đăng Ký Khám Bệnh Online',
  is3D: false,
  width: 750,
  height: 500,
});
  }
</script>
