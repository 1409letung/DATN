$(document).ready(function () {
  //vaccin theo loại bệnh
  $(".phongbenh").change(function () {
    var name = $(".phongbenh").val();
    $.post(
      "views/pageIndex/DichVu/getVaccin.php",
      { name: name },
      function (data) {
        $(".vaccin").html(data);
      }
    );
  });

  //xuất xứ theo từng vaccin
  $(".vaccin").change(function () {
    var idVC = $(".vaccin").val();
    $.post(
      "views/pageIndex/DichVu/getXXVC.php",
      { idVC: idVC },
      function (data) {
        $(".sanxuat").html(data);
      }
    );
  });

  //lấy giá theo từng vaccin
  $(".vaccin").change(function () {
    var idVC = $(".vaccin").val();
    $.post(
      "views/pageIndex/DichVu/getGiaVC.php",
      { idVC: idVC },
      function (data) {
        $(".gia").html(data);
      }
    );
  });
});
