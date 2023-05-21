$(document).ready(function () {
  //bác sĩ theo chuyên khoa
  $(".chuyenkhoa").change(function () {
    var ck = $(".chuyenkhoa").val();
    $.post("getBacSi.php", { ck: ck }, function (data) {
      $(".bacsi").html(data);
    });
  });

  $(".bacsi").change(function () {
    var nameBs = $(".bacsi").val();
    $.post("getcakham.php", { nameBs: nameBs }, function (data) {
      $(".cakham").html(data);
    });
  });
});
