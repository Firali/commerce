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
                    <h1 class="display-4 fw-bolder">Məhsulun siyahsı</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        
        <!-- Section-->
        <section class="pb-5">
            
            <div class="container px-4 px-lg-5 mt-5">
<?php 
if($_GET['delete']=='ok'){?>
    <div class="alert alert-success" role="alert">
  Uğurla silindi
</div>

<?php }


?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-12 row-cols-xl-12 justify-content-center">
                <table class="table table-striped" style="cursor:pointer">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ad</th>
      <th scope="col">Şəkil</th>
      <th scope="col">Qiymət</th>
      <th scope="col">Fəaliyyət</th>
    </tr>
  </thead>
  <tbody>

  <?php
$say=0;
$product_view=$db->prepare('SELECT * from product');
$product_view->execute();

while($product_pr=$product_view->fetch(PDO::FETCH_ASSOC)){
    $say++;
    ?>

   <tr>
      <th scope="row"><?php echo $say; ?></th>
      <td><?php echo $product_pr['name'] ?></td>
      <td><img style="width:30px" src='commerce/<?php echo $product_pr['img'] ?>'></td>
      <td><?php echo $product_pr['price'] ?> Azn</td>
      <td><a style="text-decoration:none; color:red;" href="core/funksiya.php?p_delete=<?php echo $product_pr['id'] ?>"><i class="fas fa-trash-alt"></i> Sil</a> | <a  style="text-decoration:none; color:blue;" href="add_product.php?id=<?php echo $product_pr['id'] ?>"><i class="fas fa-edit"></i> Redaktə et</a></td>
    </tr>
<?php }?>
 
    
  </tbody>
</table>
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


