<?php 
include 'core/config.php';
include 'header.php';
?>



        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Məhsullar</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
             
<?php

$product_view=$db->prepare('SELECT * from product');
$product_view->execute();

while($product_pr=$product_view->fetch(PDO::FETCH_ASSOC)){?>


<div class="col mb-5">
                        <div class="card h-100">

                            <?php 
                            if($product_pr['sale']=="on"){
echo '<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Endirimdə </div>';
                            }
                            
                            
                            ?>

                            <a href="http://localhost/commerce/detail.php?q=<?php echo  $product_pr['id'] ?>"><img  class="card-img-top" src="commerce/<?php echo $product_pr['img'] ?>" alt="..." /></a>

                            <div class="card-body p-4">
                                <div class="text-center">

                                    <h5 class="fw-bolder"><?php echo  $product_pr['name'] ?></h5>

                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>

<?php 

if($product_pr['discount']>0){
    $faiz_hesabla=$product_pr['price']-($product_pr['price']*$product_pr['discount'])/100;
echo ' <span class="text-muted text-decoration-line-through">'.$product_pr['price'].' Azn</span>   '.$faiz_hesabla.' Azn';
}else {?>
    <?php echo $product_pr['price'] ?> Azn
<?php }

?>
                                    
                                </div>
                            </div>

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    
                                
                                <form action="core/funksiya.php" method="POST">
<input name="product_id" type="hidden" value=" <?php echo $product_pr['id'] ?>">
   <button class="btn btn-outline-dark mt-auto"  type="submit" >Səbət əlavə et</button>
                                </form>
                                
                                
                             
                            
                            
                            
                            
                            
                            </div>
                            </div>
                        </div>
                    </div>


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

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy;  2023</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


