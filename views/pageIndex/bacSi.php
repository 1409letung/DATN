<?php 

$p = new modelTTBacSi();
$ttbs = $p->loadBs();
?>
<section class="doctors" id="doctors" style="padding-top: 130px;">

    <h1 class="heading"><span>Bác sĩ</span> của chúng tôi </h1>

    <div class="box-container">
<?php 
foreach($ttbs as $row)
{
    $a = $p->loadCK($row['maCk']);
    $b = mysqli_fetch_assoc($a);
    $ck = $b['chuyenkhoa'];
    echo '<div class="box">
    <img src="views/image/'.$row['img'].'" alt="">
    <h3>'.$row['hoten'].'</h3>
    <span>Bác Sĩ Chuyên '.$ck.'</span>
    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
    </div>
</div>';
}
?>
       

    </div>

</section>