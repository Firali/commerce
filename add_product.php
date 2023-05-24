<?php 
include 'core/config.php';

if(!isset($_COOKIE['adminlogin'])){
header('location:index.php');
}

include 'header.php';
?>




        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
              
                    <h1 class="display-4 fw-bolder">    <?php
                  
                  if(isset($_GET['id'])){
                    echo "Məhsulun redaktə edilməsi";
                  }else {
                    echo "Məhsulun əlavə edilməsi";
                  }
                  
                  ?></h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        
        <!-- Section-->
        <section class="pb-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-12 row-cols-xl-12 justify-content-center">
      

<?php
if(isset($_GET['id'])){
  
  $p_scan=$db->prepare('SELECT * from product where id=:id');
  $p_scan->execute(array(
    "id"=>$_GET['id']
  ));

  $p_view=$p_scan->fetch(PDO::FETCH_ASSOC);
  
  
  
  
  ?>


<form action="core/funksiya.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="edit_id" value="<?php echo $p_view['id'] ?>">
  <div class="col-12 mb-4">
    <label for="exampleInputEmail1" class="form-label">Məhsulun adı</label>
    <input type="text" class="form-control" name="product_name_edit" value="<?php echo $p_view['name'] ?>" >
  
  </div>
  <div class="row mb-4">
  <div class="col-4">
    <label for="exampleInputPassword1" class="form-label">Qiyməti</label>
    <input type="text" class="form-control" name="product_price_edit" value="<?php echo $p_view['price'] ?>">
  </div>
  <div class="col-8 select_col">
  <label for="exampleInputPassword1" class="form-label">Şəkil seçimi</label>
   <select class="form-select" name="img_type" id="img_type">

<option value="0">Şəkil qalsın</option>
<option value="1">Şəkil dəyiş</option>
   </select>
   </div>
   <div class="col-4 img_upload">
   <label for="exampleInputPassword1" class="form-label">Şəkil</label>
    <input type="file" class="form-control" name="product_img_edit">
  </div>
  </div>
  <div class="row mb-4">
  <div class="col-4">
    <label for="exampleInputPassword1" class="form-label">Say</label>
    <input type="text" class="form-control" name="product_price_count" value="<?php echo $p_view['count'] ?>">
  </div>
  <div class="col-8 ">
  <label for="exampleInputPassword1" class="form-label">Endirim</label>
  <input type="text" class="form-control" name="product_price_discount" value="<?php echo $p_view['discount'] ?>">
   </div>

  </div>
  <div class="col-12 mb-3">
    <label for="exampleInputEmail1" class="form-label">Məhsulun haqqında</label>
    <textarea type="email" rows="10" class="form-control" name="product_detail_edit" ><?php echo $p_view['detail'] ?></textarea>
  
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input"
    
    name="product_sale_edit"
    
    <?php 
    
    if($p_view['sale']=='on')
    echo "checked";
    ?>>
    <label class="form-check-label" for="exampleCheck1">Endirim</label>
  </div>
  <button type="submit" class="btn btn-primary">Yadda saxla</button>
</form>




















  
<?php }else {?>
          <form action="core/funksiya.php" method="POST" enctype="multipart/form-data">
  <div class="col-12 mb-4">
    <label for="exampleInputEmail1" class="form-label">Məhsulun adı</label>
    <input type="text" class="form-control" name="product_name" >
  
  </div>
  <div class="row mb-4">
  <div class="col-4">
    <label for="exampleInputPassword1" class="form-label">Qiyməti</label>
    <input type="text" class="form-control" name="product_price">
  </div>
  <div class="col-8">
    <label for="exampleInputPassword1" class="form-label">Şəkil</label>
    <input type="file" class="form-control" name="product_img">
  </div>
  </div>
  <div class="row mb-4">
  <div class="col-4">
    <label for="exampleInputPassword1" class="form-label">Say</label>
    <input type="text" class="form-control" name="product_count">
  </div>
  <div class="col-8 discount_col">
    <label for="exampleInputPassword1" class="form-label">Endirim faizi</label>
    <input type="text" class="form-control" name="product_discount">
  </div>
  </div>
  <div class="col-12 mb-3">
    <label for="exampleInputEmail1" class="form-label">Məhsulun haqqında</label>
    <textarea type="email" rows="10" class="form-control" name="product_detail" ></textarea>
  
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="product_sale" name="product_sale">
    <label class="form-check-label" for="exampleCheck1">Endirim</label>
  </div>
  <button type="submit" class="btn btn-primary">Yadda saxla</button>
</form>
<?php }



?>









                </div>
            </div>
        </section>


<!-- LOGIN MODAL -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin panel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <form action="core/funksiya.php" method="POST">
<div class="row">

<div class="col-12 mb-3">
 <input class="form-control" name="mail" placeholder="E-poçt" >

</div>

<div class="col-12">
<input class="form-control" name="pass"  type="password" placeholder="Parol" ></div>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
        <button type="submit" class="btn btn-primary">Daxil</button>
</form>
      </div>
    </div>
  </div>
</div>


<!-- LOGIN MODAL -->








        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy;  2023</p></div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

<script>

$(document).ready(function(){

$('.img_upload').hide();




$('#img_type').change(function (){
 var a=$('#img_type').val();

if(a==0){
  $('.img_upload').hide();
  $('.select_col').removeClass('col-4');
  $('.select_col').addClass('col-8');
}else {
  $('.select_col').removeClass('col-8');
  $('.select_col').addClass('col-4');
  $('.img_upload').fadeIn();
}

});
$('.discount_col').hide();



$('#product_sale').change(function(){
  

  if($('#product_sale').is(':checked')) {
    $('.discount_col').fadeIn();
  }else {
    $('.discount_col').fadeOut();
  }
})

})




</script>


