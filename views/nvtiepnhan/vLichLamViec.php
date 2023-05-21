<style>
.card {
    width: auto;

}
</style>
<?php 
   include '../../controllers/cTK.php';
   $p = new controlNVTN();
   $maNVTN = $_SESSION['login'];
?>
<div class="container">
    <table class="table table-light" style="text-align:center;">
        <thead class="table-primary">
            <th scope="col">CA</th>
            <th scope="col">THỨ HAI</th>
            <th scope="col">THỨ BA</th>
            <th scope="col">THỨ TƯ</th>
            <th scope="col">THỨ NĂM</th>
            <th scope="col">THỨ SÁU</th>
            <th scope="col">THỨ BẢY</th>
            <th scope="col">CHỦ NHẬT</th>
        </thead>
        <tbody>
            <tr>
                <th scope="row" rowspan="">Sáng</th>
                <td>
                    <?php
            $t2s = $p->thu2sang($maNVTN);
            if($t2s !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t2s['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t3s = $p->thu3sang($maNVTN);
            if($t3s !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t3s['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t4s = $p->thu4sang($maNVTN);
            if($t4s !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t4s['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td><?php
            $t5s = $p->thu5sang($maNVTN);
            if($t5s !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t5s['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?></td>
                <td>
                    <?php
            $t6s = $p->thu6sang($maNVTN);
            if($t6s !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t6s['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t7s = $p->thu7sang($maNVTN);
            if($t7s !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t7s['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t8s = $p->thu8sang($maNVTN);
            if($t8s !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t8s['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
           </td>
        </tr>
        
        
            <tr>
                <th scope="row" rowspan="">Chiều</th>
                <td>
                    <?php
            $t2c = $p->thu2chieu($maNVTN);
            if($t2c !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t2c['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t3c = $p->thu3chieu($maNVTN);
            if($t3c !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t3c['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t4c = $p->thu4chieu($maNVTN);
            if($t4c !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t4c['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t5c = $p->thu5chieu($maNVTN);
            if($t5c !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t5c['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t6c = $p->thu6chieu($maNVTN);
            if($t6c !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t6c['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t7c = $p->thu7chieu($maNVTN);
            if($t7c !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t7c['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
                </td>
                <td>
                    <?php
            $t8c = $p->thu8chieu($maNVTN);
            if($t8c !=Null)
            {
               echo '<div class="card">
               <div class="card-body">
                 <h5 class="card-title">'.$t8c['CaLamViec'].'</h5>
                 <p class="card-text">Đây là thời gian làm việc của bạn hôm nay!!</p>
                 <button class="card-button btn btn-primary">Điểm Danh</button>
               </div>
             </div>';
            }
            else
            {
                echo '';
            } 
            ?>
           </td>
        </tr>
        
    </tbody>
</table>
</div>

