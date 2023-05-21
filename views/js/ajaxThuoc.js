$(document).ready(function () {
  $(".loaithuoc").change(function () {
    var maLoaiThuoc = $(".loaithuoc").val();
    $.post("getThuoc.php", { maLoaiThuoc: maLoaiThuoc }, function (data) {
      $(".thuoc").html(data);
    });
  });
});
