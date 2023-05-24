<?php 
include 'core/config.php';
include 'header.php';

$pr_scan=$db->prepare('SELECT * from product where id=:id');
$pr_scan->execute(array(

    'id'=>$_GET['q']
));

$pr_view=$pr_scan->fetch(PDO::FETCH_ASSOC);



?>

        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="assets/<?php echo $pr_view['img']; ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">Məhsul sayı : <?php echo $pr_view['count'] ?> ədəd</div>
                        <h1 class="display-5 fw-bolder"><?php echo $pr_view['name'] ?></h1>
                        <div class="fs-5 mb-5">

                        <?php 
                        if($pr_view['discount']>0){
                            $faiz_hesabla=$pr_view['price']-($pr_view['price']*$pr_view['discount'])/100;  
                            
                            ?>
                            <span class="text-decoration-line-through"><?php echo $pr_view['price']; ?> Azn</span>
                            <span><?php echo $faiz_hesabla; ?> Azn</span>
                        <?php } else{?>
                           
                           
                            <span><?php echo $pr_view['price']; ?> Azn</span>
                       <?php  }
                        
                        
                        
                        ?>
                            
                        </div>
                        <p class="lead"><?php echo $pr_view['detail']; ?></p>
                        <div class="d-flex">
                        <form action="core/funksiya.php" method="POST">
<input name="product_idd" type="hidden" value=" <?php echo $pr_view['id'] ?>">
   <button class="btn btn-outline-dark mt-auto"  type="submit" >     <i class="bi-cart-fill me-1"></i> Səbət əlavə et</button>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
             
<?php

$product_view=$db->prepare('SELECT * from product where id!='.$_GET['q'].'  order by rand()  LIMIT 4');
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
