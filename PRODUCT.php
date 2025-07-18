<?php

session_start();
if(!isset($_SESSION["user_name"])){
    header("location:login.php");
}else if(!$_SESSION["pre_number"] == 0){
   
  
}

// include "heder.php"
require "sqlprod.php"; 
"product.css";
// استعلام للحصول على جميع المنتجات
$sql = "SELECT * FROM products";
 $result = $conn->query($sql);
 include "heder.php"
?>


      <hr>
      <!-- -------------------------------------------------------------- -->
  
      <section id="Home">

                
        <div class="main">

            <div class="men_text">
                <h1>  اطلب هاتفك المفضل من<span>  سامسونج</span><br> احصل عليه الان</h1>
            </div>
           
            

            <div class="main_image">
                <?php $row = $result->fetch_assoc()?>
            <img src="<?php echo $row['product_imag']; ?>" width="100" alt="صورة المنتج">
            </div>

        </div>



        <div class="main_btn">
            <a href="#">Order Now</a>
            <i class="fa-solid fa-angle-right"></i>
        </div>

    </section>

  
     <!--Gallary-->
    <div class="gallary" id="Gallary">
        <h1>Category<span>SAMSUNG</span></h1>
        <div class="gallary_image_box">
            <div class="gallary_image">
                <img src="img/9.jpg"  >
                <style>
                    img {
                        border-top-left-radius: brown;
                        height: 470px;
                       

                    }
                </style>
                <form action="updet.php" method="POST">
                <h3>SAMSUNG</h3>
                <p>
               قائمة عروض سامسونج
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>

            <div class="gallary_image" >
                <img src="img/6.jpg" >
                <h3>SAMSUNG</h3>
                <p>
                   هل ترغب فيه ........ اطلبه الان 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>
            <div class="gallary_image">
                <img src="img/2.jpg">
                <h3>SAMSUNG</h3>
                <p>
                   هل ترغب فيه ........ اطلبه الان 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>
            <div class="gallary_image">
                <img src="img/3.jpg">
                <h3>SAMSUNG</h3>
                <p>
                   هل ترغب فيه ........ اطلبه الان 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>
            <div class="gallary_image">
                <img src="img/4.jpg">
                <h3>SAMSUNG</h3>
                <p>
                   هل ترغب فيه ........ اطلبه الان 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>
            <div class="gallary_image">
                <img src="img/1.jpg" name="photo">
                <h3>SAMSUNG</h3>
                <p>
                 هل ترغب فيه ........ اطلبه الان 
                </p>
                <a href="#" class="gallary_btn">Order Now</a>
            </div>
        </div>
    </div>
    <section id="Home">
                
        <div class="main">
            <div class="men_text">
                <h1>  احصل على هاتفك المفضل من  <span> ايفون</span><br>احصل عليه الان</h1>
            </div>
           
            
            <div class="main_image">
            <?php $row = $result->fetch_assoc()?>
            <img src="<?php echo $row['product_imag']; ?>" width="100" alt="صورة المنتج">
            
            </div>
        </div>
        
        <p dir="rtl">
        
        <p><?php echo $row['product_descrip']; ?></p>
            
         
        </p>
        <div class="main_btn">
            <a href="#">Order Now</a>
            <i class="fa-solid fa-angle-right"></i>
        </div>
    </section>
    <div class="gallary" id="Gallary">
        <h1>Category<span>iphone</span></h1>
        <div class="gallary_image_box">
            
        <link rel="stylesheet" href="product.css">
            <?php
            // اضافة بيانات
//---------------------------------------------------------------------------------------------
// اتصال بقاعدة البيانات
//require "sqlprod.php";

 
// استعلام للحصول على جميع المنتجات
//$sql = "SELECT * FROM products";
//$result = $conn->query($sql);
?>
         <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()):
                    
                         ?>
                    <div class="gallary" id="Gallary">
                        <div class="gallary_image">
                        <h3><?php echo $row['product_name']; ?></h3>
                            <img src="<?php echo $row['product_imag']; ?>" alt="<?php echo $row['name']; ?>">
                            
                            <p><?php echo $row['product_descrip']; ?></p>
                            <a href="#" class="gallary_btn">اطلب الآن</a>
                            <!-- <a href="product_details.php?id=<?php echo $row['id']; ?>" class="gallary_btn">order</a> -->
                            <a href="product_details.php?id=<?= $row['product_id'] ?>" class="gallary_btn">order</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>لا توجد منتجات متاحة.</p>
            <?php endif; ?>
        </div>
    </div>

<?php
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
        </div>
    </div>
    <?php if(!$_SESSION["pre_number"] == 0){?>
        <a href="read_product.php" class="btn btn-danger">رجوع الى صفحة التحكم</a>
   <?php } 
   else{
   ?>
  
    <h2> <a href="loginut.php" class="btn btn-danger">تسجيل خروج </a></h2>
    
   <?php } ?>
      <!-- -------------------------------------------------------------- -->
      <?php
      include "footer.php";
      ?>