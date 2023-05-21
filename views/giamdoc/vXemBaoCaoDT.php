<?php
include '../../controllers/cTK.php';
$p = new ControllerGiamDoc();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- HTML code -->
<h3 style="text-align:center;color:green">Xem Báo Cáo Thống Kê Doanh Thu</h3>
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
      $t = $p->thongkedoanhthu($ngaybd,$ngaykt);
      $td = mysqli_fetch_assoc($t);
      $t2 = $p->thongkedoanhthutc($ngaybd,$ngaykt);
      $td2 = mysqli_fetch_assoc($t2);
      // $a = $td['ThongkeOn'];
      // $b = $td2['ThongkeOff'];
      $a = $td['ThongkeDTDKKB'];
      $b = $td2['ThongkeTC'];
      
 // Dữ liệu cho biểu đồ
 $data = [
  ["Danh Mục", "Tổng Tiền", '.{ role: "style" }.' ],
  ["Đăng ký khám bệnh", $a, "blue"],
  ["Đăng ký tiêm chủng", $b, "red"]
 ];
//  $data = array(
//   array('Đơn Đăng Ký Khám Bệnh', 'Số Lượng'),
//   array('Đơn Đăng Ký Online', $a),
//   array('Đơn Đăng Ký Offline', $b)
// );
// Chuyển đổi dữ liệu thành JSON
 $json_data = json_encode($data);
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

    echo '<div id="columnchart_values" style="width: 900px; height: 300px;"></div>';
}
?>
</div>

<!-- JavaScript code -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Danh Mục", "Tổng Tiền(VNĐ)", { role: "style" } ],
        ["Doanh thu đăng ký khám bệnh", <?php echo $a; ?>, "red"],
        ["Doanh thu đăng ký tiêm chủng", <?php echo $b; ?>, "blue"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Thống Kê Doanh Thu",
        width: 1200,
        height: 750,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
