<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping project</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css rel=stylesheet>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">E-Texnoloji</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Ana Səhifə</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Haqqımızda</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Məhsullar</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Bütün məhusullar</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Ən çox baxılan</a></li>
                                <li><a class="dropdown-item" href="#!">Ən yenilər</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">

<?php 

if($_COOKIE['adminlogin']){?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="add_product.php">Məhsul əlavə et</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="list_product.php">Məhsul siyahsı</a></li>
                                <li><a class="dropdown-item" href="logout.php">Çıxış</a></li>
                            </ul>
                        </li>
                    </ul>
<?php }else {?>

                        <button class="btn btn-outline-success " data-bs-target="#exampleModal" data-bs-toggle="modal" style="margin-right:10px" type="button">
                            <i class="bi-box-arrow-in-right me-1"></i>
                            Daxil ol
                           
                        </button>
<?php }



?>
  <a href="basket.php"> <button class="btn btn-outline-dark" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Səbət
                            <?php 
                            $basket=$db->prepare('SELECT * from basket where cookie=:cookie');
                            $basket->execute(array(
                                'cookie'=>$_COOKIE['userlogin']
                            ));

                          $basket_count=$basket->rowCount();
                            
                            
                            
                            ?>
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $basket_count; ?></span>
                        </button></a>


                       
                    </form>
                </div>
            </div>
        </nav>