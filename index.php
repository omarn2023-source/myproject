<?php 
include './inc/db.php';
include './inc/form.php';
include './inc/select.php';
include './inc/db_close.php';


?>

<?php  include_once './parts/haeder.php' ?>


   <style>
        #countdown {
color: #0d6efd;
padding: 10px;
        }
  /* 
   #cards{
display: none;

   }*/


#loader{
  position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);

}

.loader-con{
display: none;
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color:   #000000eb ;


}

.list-group-item{
background: transparent;
}
  
  img{
max-width: 100%;

  }
  
  </style>




<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto ">
  <img src="images/images.jpg" alt=""> 
  <h1 class="display-4 fw-normal">اربح مع عمر</h1>
    <p class="lead fw-normal">باقي على فتح التسجيل</p>
    <h3 id="countdown"></h3>    
    <p class="lead fw-normal">للسحب على ربح نسخة مجانية من برنامج</p>
 
 </div>

<div class="container">
<h3>للدخول في السحب اتبع مايلي:</h3>  
<ul class="list-group list-group-flush">
  <li class="list-group-item">تابع البث المباشر على صفحتنا على فيسبوك بالتاريخ المذكور أعلاه</li>
  <li class="list-group-item">سأقوم ببث مباشر لمدة ساعة عن أسئلة وأجوبة حرة للجميع</li>
  <li class="list-group-item">خلال فترة الساعة سيتم فتح صفحة التسجيل هنا حيث ستقوم بتسجيل اسمك وإيميلك</li>
  <li class="list-group-item">بنهاية البث سيتم اختيار اسم واحد من قاعدة البيانات بشكل عشوائي</li>
  <li class="list-group-item">الربح سيحصل على نسخ مجانية من برامج كامتازيا</li>
</ul>


</div>
</div>
      


<div class ="container">
<div class="position-relative  text-center ">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
<form  action="<?php $_SERVER['PHP_SELF']?>" method="POST" >
<h3>الرجاء أدخل معلوماتك</h3>  

<div class="mb-3">
    <label for="firstName" class="form-label">الاسم الأول</label>
    <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $firstName; ?>" aria-describedby="emailHelp">
    <div class="form-text text-danger">
        <?php echo $errors['firstNameError'] ?? ''; ?>
    </div>
</div>

<div class="mb-3">
    <label for="lastName" class="form-label">الاسم الأخير</label>
    <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $lastName; ?>"aria-describedby="emailHelp">
    <div class="form-text text-danger">
        <?php echo $errors['lastNameError'] ?? ''; ?>
    </div>
</div>

<div class="mb-3">
    <label for="email" class="form-label">البريد الإلكتروني</label>
    <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>"aria-describedby="emailHelp">
    <div class="form-text text-danger">
        <?php echo $errors['emailError'] ?? ''; ?>
    </div>
</div>
  <button type="submit" name="submit" >ارسال المعلومات</button>
</form>
  </div>
</div>


<div class="loader-con">
<div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>


<!-- Button trigger modal -->
<div class="d-grid gap-2 col-12 mx-auto my-5 "  >
<button type="button" id="winner" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mo">
اختيار الرابح
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="modal"> الرابح في المسابقة</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <?php foreach ($users as $user): ?> 
      <h1 class=" display-3 text-center  modal-title" id="modalLabel"><?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?></h1> 
          <?php endforeach; ?>
      </div>
      </div>
    </div>
  </div>
</div>




<?php  include_once './parts/footer.php' ?>
