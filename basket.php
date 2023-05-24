<?php 
include 'core/config.php';
include 'header.php';

$basket_scan=$db->prepare('SELECT * from basket where cookie=:cookie');
$basket_scan->execute(array(

    'cookie'=>$_COOKIE['userlogin']
));

$basket_view=$basket_scan->fetch(PDO::FETCH_ASSOC);

$basket_count=$basket_scan->rowCount();


?>
<style>

#cart {
  max-width: 1440px;
  padding-bottom: 60px;
  margin: auto;
}
.form div {
  margin-bottom: 0.4em;
}
.cartItem {
  --bs-gutter-x: 1.5rem;
}
.cartItemQuantity,
.proceed {
  background: #f4f4f4;
}
.items {
  padding-right: 30px;
}
#btn-checkout {
    border-radius: 7px;
  min-width: 100%;
}

/* stasysiia.com */
@import url("https://fonts.googleapis.com/css2?family=Exo&display=swap");
body {
  background-color: #fff;

  font-size: 22px;
  margin: 0;
  padding: 0;
  color: #111111;
  justify-content: center;
  align-items: center;
}
a {
  color: #0e1111;
  text-decoration: none;
}
.btn-check:focus + .btn-primary,
.btn-primary:focus {
  color: #fff;
  background-color: #111;
  border-color: transparent;
  box-shadow: 0 0 0 0.25rem rgb(49 132 253 / 50%);
}
button:hover,
.btn:hover {
  box-shadow: 5px 5px 7px #c8c8c8, -5px -5px 7px white;
}
button:active {
  box-shadow: 2px 2px 2px #c8c8c8, -2px -2px 2px white;
}

/*PREVENT BROWSER SELECTION*/
a:focus,
button:focus,
input:focus,
textarea:focus {
  outline: none;
}
/*main*/
main:before {
  content: "";
  display: block;
  height: 88px;
}
h1 {
  font-size: 2.4em;
  font-weight: 600;
  letter-spacing: 0.15rem;
  text-align: center;
  margin: 30px 6px;
}
h2 {
  color: rgb(37, 44, 54);
  font-weight: 700;
  font-size: 2.5em;
}
h3 {
  border-bottom: solid 2px #000;
}
h5 {
  padding: 0;
  font-weight: bold;
  color: #92afcc;
}
p {
  color: #333;
  font-family: "Roboto", sans-serif;
  margin: 0.6em 0;
}
h1,
h2,
h4 {
  text-align: center;
  padding-top: 16px;
}
/* yukito bloody */
.back {
  position: relative;
  top: -30px;
  font-size: 16px;
  margin: 10px 10px 3px 15px;
}
.inline {
  display: inline-block;
}

.shopnow,
.contact {
  background-color: #000;
  padding: 10px 20px;
  font-size: 30px;
  color: white;

  letter-spacing: 1px;
  transition: all 0.5s;
  cursor: pointer;
}
.shopnow:hover {
  text-decoration: none;
  color: white;
  background-color: #198754;
}
/* for button animation*/
.shopnow span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: all 0.5s;
}
.shopnow span:after {
  content: url("https://badux.co/smc/codepen/caticon.png");
  position: absolute;
  font-size: 30px;
  opacity: 0;
  top: 2px;
  right: -6px;
  transition: all 0.5s;
}
.shopnow:hover span {
  padding-right: 25px;
}
.shopnow:hover span:after {
  opacity: 1;
  top: 2px;
  right: -6px;
}
.ma {
  margin: auto;
}
.price {
  color: slategrey;
  font-size: 2em;
}
#mycart {
  min-width: 90px;
}
#cartItems {
  font-size: 17px;
}
#product .container .row .pr4 {
  padding-right: 15px;
}
#product .container .row .pl4 {
  padding-left: 15px;
}


</style><header class="bg-success py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Səbətim</h1>
                
                </div>
            </div>
        </header>

<?php if($basket_count==0){
echo " <center><img style='color:red;margin-bottom:80px' width='80px' src='https://cdn-icons-png.flaticon.com/512/2797/2797387.png'><br><h4 style='color:red;margin-bottom:80px'>Sizin səbətinizdə məhsul yoxdur !!!</h4></center>";
}else {?>

      
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<main id="cart" style="max-width:1200px">

  <div class="container-fluid">
    <div class="row align-items-start">
      <div class="col-12 col-sm-8 items">
        <!--1-->

        <?php

$basket_scan_=$db->prepare('SELECT * from basket where cookie=:cookie order by id DESC');
$basket_scan_->execute(array(

    'cookie'=>$_COOKIE['userlogin']
));
while($basket_preview=$basket_scan_->fetch(PDO::FETCH_ASSOC)){

$product_view=$db->prepare('SELECT * from product where id=:id ');
$product_view->execute(array(
    "id"=>$basket_preview['product']
));

$product_pr=$product_view->fetch(PDO::FETCH_ASSOC);
    
    
    
    
    
    ?>
        <div class="cartItem row align-items-start">
          <div class="col-3 mb-2">
            <img  style="width:80px;border-radius:7px;" src="assets/<?php echo $product_pr['img'] ?>" alt="art image">
          </div>
          <div class="col-3 mb-2">
            <h6 class=""><?php echo $product_pr['name'] ?></h6>
           
          </div>
          <div class="col-2">
            <p class="cartItemQuantity p-1 text-center">1</p>
          </div>
          <div class="col-2">
            <p id="cartItem1Price"><?php echo $product_pr['price'] ?> Azn</p>
          </div>
           <div class="col-2">
            <a  href="core/funksiya.php?dbasket=<?php echo $product_pr['id'] ?>" style="color:red;text-decoration:none;" id="cartItem1Price"><i class="far fa-trash-alt"></i> Sil</a>
          </div>
          
        </div>
     
        <hr>

<?php } ?>
      </div>
      <div class="col-12 col-sm-4 p-3 proceed form">
        <div class="row m-0">
          <div class="col-sm-8 p-0">
            <h6>Subtotal</h6>
          </div>
          <div class="col-sm-4 p-0">
            <p id="subtotal">$132.00</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-sm-8 p-0 ">
            <h6>Tax</h6>
          </div>
          <div class="col-sm-4 p-0">
            <p id="tax">$6.40</p>
          </div>
        </div>
        <hr>
        <div class="row mx-0 mb-2">
          <div class="col-sm-8 p-0 d-inline">
            <h5>Total</h5>
          </div>
          <div class="col-sm-4 p-0">
            <p id="total">$138.40</p>
          </div>
        </div>
        <a href="#"><button id="btn-checkout" class="shopnow"><span>Ödəniş et</span></button></a>
      </div>
    </div>
  </div>

<?php } ?>




             
           

</main>
<footer class="container">
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
