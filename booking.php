<?php
  if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
  $sql = "select * from `film` where `id` = '$film_id'";
  $query= mysqli_query($link, $sql);
  $r=mysqli_fetch_assoc($query);
  //echo $film_id;
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $homnay=date('d/m/Y');

  if(isset($_SESSION['username']))
      $idkh = $_SESSION['username'];
  else
  {
    ?>
    <script>
       alert("Vui lòng đăng nhập trước khi đặt vé");
       location.href = "index.php";
    </script> 

<?php
}
if(isset($_POST['muave']))
    {
        $ngay=$_POST['datngay'];
        $gio=$_POST['datgio'];
        $_SESSION['ngay'] = $ngay;
        $_SESSION['gio'] = $gio;

    ?> 
    <form action="#" method="POST">
      <div class="dropdown dropdown-dark">
      <center>
       <select  name="ghe" class="dropdown-select">
                    <?php 
              
                    
                      $tv2="select distinct ghe.tenghe, ghe.idghe from ghe where ghe.idghe not in (select bookingticket.idghe from bookingticket,ghe,lichchieu WHERE bookingticket.idphim='$film_id' and lichchieu.thoigianchieu='$gio' and lichchieu.idlichchieu=bookingticket.idlichchieu and ghe.idghe= bookingticket.idghe)";
                      $tv_3=mysqli_query($link,$tv2);
                      while($tv_4=mysqli_fetch_array($tv_3))
                        {
                      ?>
                          <option value="<?php echo $tv_4['idghe']; ?>" > <?php echo $tv_4['tenghe'];?> </option>
                      <?php
                        }
                      ?>
      </select>
      </center>
    </div>
      <div class="groups-btn">
      <a href="?mod=bookchair&film_id=<?php echo $r['id'] ?>">
          <input type="submit" value="Đặt Ghế" class="btn-datve" name="datghe">  
            <span>
              <!-- <span><img src="images/booking.png" style="height: 20px;width: 3px;"></span> -->
              <span></span>
            </span>
          </input>
      </a>
    </div>
    </form> 
    <style type="text/css">
      .display{
        display: none;
      }
    </style>      
<?php    }

if(isset($_POST['datghe']))
    {
        $idghe=$_POST['ghe'];
        //$_SESSION['ghe'] = $ghe;
        $ngay = $_SESSION['ngay'];
        $gio = $_SESSION['gio'];

        //con thieu cai idlichchieu la xong
        $lichchieu="select * from lichchieu where idphim = '$film_id' and thoigianchieu='$gio'";
        $querylc=mysqli_query($link,$lichchieu);
        if($r = mysqli_fetch_array($querylc))
                {
                  $idlich = $r['idlichchieu'];
                }

        $sql2="INSERT INTO bookingticket(idlichchieu,idghe,makh,idphim,ngaydatve) VALUES ('.$idlich.','".$idghe."','".$idkh."','".$film_id."','".$ngay."')";
        $query2=mysqli_query($link,$sql2);
        echo "<center><font color = 'blue'>Đặt vé thành công</font><center>";
    }
?>
<div id="content">
  <form action="#" method="POST">
  <div class="block" id="page-info">
    <div class="blocktitle breadcrumbs">
        <div class="item">
            <a href="?mod=home" title="Đặt Phim Nhanh, Xem trailer Online chất lượng cao miễn phí">
                <span>Phim</span>
            </a>
        </div>
        <div class="item">
            <?php
              $type_movie = $r['type_movie'];
              $sql = "select * from `type-movie` where `id` = '$type_movie'";
              $query= mysqli_query($link, $sql);
              $r1=mysqli_fetch_assoc($query);
            ?>
            <a href="?mod=list&type=<?php echo $r1['handle'] ?>&year=2018"><span><?php echo $r1['name'] ?></span></a>
        </div>
        <div class="item last-child">
            <span itemprop="title"><?php echo $r['name'] ?></span>
        </div>
    </div>

    <div class="info">
        <h2 class="title fr"><?php echo $r['name'] ?></h2>
        <div class="poster"><a href="#" title="Phim <?php echo $r['name'] ?>"><img src="<?php echo $r['image'] ?>" alt="<?php echo $r['name'] ?>"></a></div>
        <div class="name2 fr">
            <h3>Đặt vé xem phim <?php echo $r['name2'] ?></h3>
        </div>

        <div class="dinfo">
            <div class="col1 fr">
                <ul>
                    <li>Status: <span class="status1"><?php echo "Đang chiếu"; ?></span></li>
                    <li>Ngày xem: 
                    	<select id="ngay" name="datngay" style="width: 120px;margin-left: 20px;">
	                        <optgroup label="chọn ngày">
		                        <option value="<?php echo $homnay; ?>" selected="selected">
                              <?php echo $homnay; ?>
                            </option>
                            <?php $dateint =  mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")); ?>
		                        <option value="<?php echo date('d/m/Y',$dateint); ?>"><?php 
		                        	echo date('d/m/Y', $dateint); ?>
		                        </option>

                            <?php $ngaykia =  mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")); ?>
								            <option value="<?php echo date('d/m/Y', $ngaykia); ?>"><?php 
		                        	echo date('d/m/Y', $ngaykia); ?>
		                        </option>
                            <?php $date3 = mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")); ?>
		                        <option value="<?php echo date('d/m/Y', $date3); ?>"><?php 
		                        	echo date('d/m/Y', $date3); ?>
		                        </option>
                            <?php $date4 = mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")); ?>
		                        <option value="<?php echo date('d/m/Y', $date4); ?>"><?php 
		                        	echo date('d/m/Y', $date4); ?>
		                        </option>
                            <?php $date5 = mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")); ?>
		                        <option value="<?php echo date('d/m/Y', $date5); ?>"><?php 
		                        	echo date('d/m/Y', $date5); ?>
		                        </option>
                            <?php $date6 = mktime(0, 0, 0, date("m")  , date("d")+6, date("Y")); ?>
		                        <option value="<?php echo date('d/m/Y', $date6); ?>"><?php
		                        	echo date('d/m/Y', $date6); ?>
		                        </option>
	                    	</optgroup>
                    	</select>
                    </li>
                    <li>Thời gian:  
                    	<select id="gio" name="datgio" style="width: 120px;margin-left: 23px;">
		                    <optgroup label="Chọn giờ xem">
		                        <?php 
                            $tv="select * from lichchieu  where idphim = '$film_id'";
                                $tv_1=mysqli_query($link,$tv);
                                while($tv_2=mysqli_fetch_array($tv_1))
                              {
                            ?>
                                <option value="<?php echo $tv_2['thoigianchieu']; ?>" > <?php echo $tv_2['thoigianchieu']; ?> </option>
                            <?php
                              }
                            ?>
	                        </optgroup>
                    	</select>
                    </li>
                    <li>Thể loại: <a href="the-loai/phim-hanh-dong/" title="Phim Hành Động"> Phim Hành Động</a></li>
                </ul>
            </div>
            <div class="col2">
                <ul>
                    <?php
                      $nation_id = $r['nation_id'];
                      $sql = "select * from `nation` where `id` = '$nation_id'";
                      $query=mysqli_query($link,$sql);
                      $r2=mysqli_fetch_assoc($query);
                    ?>
                    <li>Quốc gia: <a href="?mod=list&type=nation&id=<?php echo $r2['id'] ?>" title="Phim <?php echo $r2['name'] ?>"><?php echo $r2['name'] ?></a></li>
                    <li>Thời lượng: <?php echo $r['duration'] ?> Phút</li>
                    <li>Lượt xem: <?php echo $r['num_view'] ?></li>
                    <li>Đăng bởi: <?php echo $r['author'] ?></li>
                </ul>
            </div>
        </div>
        
    </div>
    
    <div class="groups-btn">
    	<a href="?mod=booking&film_id=<?php echo $r['id'] ?>">
        <div class="display"> 
          <input type="submit" value="Mua Vé" class="btn-datve" name="muave">  
            <span>
              <!-- <span><img src="images/booking.png" style="height: 20px;width: 3px;"></span> -->
              <span></span>
            </span>
          </input>
          </div>
    	</a>
    </div>

   </div>
   </form>
</div>
