<?php
include '../../controllers/cTK.php';
$p = new ControllerGiamDoc();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- HTML code -->
<h3 style="text-align:center;color:green">Xem Báo Cáo Nhân Viên</h3>
<!-- <form class="form-control" action="" method="post">
  <div class="form-group">
  <select class="form-control">
    <option value="0">Chọn Vai Trò</option>
    <option value="1">Bác sĩ</option>
    <option value="2">Y tá</option>
    <option value="3">Nhân viên tiếp nhận</option>
    <option value="4">Nhân viên xét nghiệm</option>
    <option value="5">Nhân viên quản lý</option>
    <option value="6">Nhân viên quầy thuốc</option>
  </select>
  </div>
<div class="form-group">
  <button class="btn btn-primary" type="submit" name="xtknv">Xem Thống Kê</button>
</div>
</form> -->
<?php 
if(isset($_POST['xtk']))
{

}
else
{
  $t = $p->dembs();
  $t1 = $p->demyta();
  $t2 = $p->demnvtn();
  $t3 = $p->demnvxn();
  $t4 = $p->demnvql();
  $t5 = $p->demnvqt();
  $a = mysqli_fetch_assoc($t);
  $a1 = mysqli_fetch_assoc($t1);
  $a2 = mysqli_fetch_assoc($t2);
  $a3 = mysqli_fetch_assoc($t3);
  $a4 = mysqli_fetch_assoc($t4);
  $a5 = mysqli_fetch_assoc($t5);
  $b = $a['TKBS'];
  $b1 = $a1['TKYT'];
  $b2 = $a2['TKNVTN'];
  $b3 = $a3['TKNVXN'];
  $b4 = $a4['TKNVQL'];
  $b5 = $a5['TKNVQT'];
  $data = array(
    array('Nhân viên', 'Số Lượng'),
    array('Bác sĩ', $b),
    array('Y tá', $b1),
    array('Nhân viên tiếp nhận', $b2),
    array('Nhân viên xét nghiệm', $b3),
    array('Nhân viên quản lý', $b4),
    array('Nhân viên quầy thuốc', $b5)
  );
  $data1 = [];
  // Chuyển đổi dữ liệu thành JSON
   $json_data = json_encode($data);
}
?>
<div id="barchart_values" style="width: 900px; height: 300px;"></div>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Nhân viên", "Số lượng", { role: "style" } ],
        ["Bác Sĩ", <?php echo $b ?>, "blue"],
        ["Y tá", <?php echo $b1 ?>, "red"],
        ["Nhân viên tiếp nhận", <?php echo $b2 ?>, "green"],
        ["Nhân viên xét nghiệm", <?php echo $b3 ?>, "yellow"],
        ["Nhân viên quản lý", <?php echo $b4 ?>, "aqua"],
        ["Nhân viên quầy thuốc", <?php echo $b5 ?>, "violet"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Bảng Thống Kê Nhân Viên",
        width: 1200,
        height: 750,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>
