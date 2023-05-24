<?php
include 'config.php';


if(isset($_GET['dbasket'])){
   
    $p_delete=$db->prepare('DELETE from basket where product='.$_GET['dbasket'].'');
    $p_delete->execute();
  
    
    header('location:../basket.php'); 
     }
// ADMİN GİRSİNİN YOXLANMASİ
if(isset($_POST['mail'])){

   $pass_check=$db->prepare('SELECT * from admin where  mail=:mail and pass=:pass');
   $pass_check->execute(array(
   "mail"=>$_POST['mail'],
  "pass"=>md5($_POST['pass'])
   ));

   $pass_scan=$pass_check->rowCount();


if($pass_scan==1){
    header('location:../index.php');
    setcookie('adminlogin',md5($_POST['pass']),strtotime('+1 day'),"/");
}else {
    header('location:../index.php?login=no');
}



}



// MEHSULUN ELAVE EDİLMESİ


if(isset($_FILES['product_img'])){

 // TİPİN YOXLANMASİ
 if($_FILES['product_img']['type']=="image/png" || $_FILES['product_img']['type']=="image/jpg"  || $_FILES['product_img']['type']=="image/jpeg" || $_FILES['product_img']['type']=="image/webp"){
 
 // Olcunun yoxlanmasi 1 Mbit
 
 if($_FILES['product_img']['size'] < 1048576){
 
 $yuklenecek_adres='../assets/'.md5(uniqid(rand())).".".substr($_FILES['product_img']['type'],6,20);
 
 
 
 
 
 if(move_uploaded_file($_FILES['product_img']['tmp_name'],$yuklenecek_adres)){
 
     
     $add_user = $db->prepare('INSERT into product set
 name=:name,
 sale=:sale,
 price=:price,
 count=:count,
 discount=:discount,
 img=:img,
 detail=:detail
 ');
     $add_user->execute(
         array(
             'name' => strip_tags($_POST['product_name']),
             'sale' => strip_tags($_POST['product_sale']),
             'count' => strip_tags($_POST['product_count']),
             'discount' => strip_tags($_POST['product_discount']),
             'price' => strip_tags($_POST['product_price']),
             'detail'=>strip_tags($_POST['product_detail']),
             'img' => $yuklenecek_adres
         ));
     
 header("location:../index.php");
 
 }else {
     echo "Yuklenme zamani xeta bas verdi";
 }
 
 
 
 
 
 
 
 
 
 
 }else {
     echo "Fayl hecmi maksimum 1mbit olmaldir !";
 }
 
 
 }else {
     echo "Fayl tipi duzgu deyil";
 }
 
 
 
 }


 // MEHSULUN SİLİNMESİ

 if(isset($_GET['p_delete'])){

$p_delete=$db->prepare('DELETE from product where id=:id');
$p_delete->execute(array(

'id'=>$_GET['p_delete']

));

header('location:../list_product.php?delete=ok');


 }
 

 // MEHSUL EDİT 



 if(isset($_POST['product_name_edit'])){

if($_POST['img_type']==0){


$p_edit=$db->prepare("UPDATE  product set 
name=:name,
price=:price,
count=:count,
discount=:discount,
sale=:sale,
detail=:detail
where id=:id
");

$p_edit->execute(array(

'name'=>$_POST['product_name_edit'],
'price'=>$_POST['product_price_edit'],
'count'=>$_POST['product_price_count'],
'discount'=>$_POST['product_price_discount'],
'sale'=>$_POST['product_sale_edit'],
'detail'=>$_POST['product_detail_edit'],
'id'=>$_POST['edit_id']

));

header('location:../add_product.php?id='.$_POST['edit_id']);

















}else {







// TİPİN YOXLANMASİ
if($_FILES['product_img_edit']['type']=="image/png" || $_FILES['product_img_edit']['type']=="image/jpg"  || $_FILES['product_img_edit']['type']=="image/jpeg"  || $_FILES['product_img_edit']['type']=="image/webp"){
 
    // Olcunun yoxlanmasi 1 Mbit
    
    if($_FILES['product_img_edit']['size'] < 1048576){
    
    $yuklenecek_adres='../assets/'.md5(uniqid(rand())).".".substr($_FILES['product_img_edit']['type'],6,20);
    
    
    
    
    
    if(move_uploaded_file($_FILES['product_img_edit']['tmp_name'],$yuklenecek_adres)){
    
        
        $p_edit=$db->prepare("UPDATE  product set 
        name=:name,
        price=:price,
        sale=:sale,
        count=:count,
discount=:discount,
        img=:img,
        detail=:detail
        where id=:id
        ");
        $p_edit->execute(
            array(
                'name'=>$_POST['product_name_edit'],
                'price'=>$_POST['product_price_edit'],
                'sale'=>$_POST['product_sale_edit'],
                'count'=>$_POST['product_price_count'],
                 'discount'=>$_POST['product_price_discount'],
                'detail'=>$_POST['product_detail_edit'],
                'id' => $_POST['edit_id'],
                'img' => $yuklenecek_adres
            ));
        
            header('location:../add_product.php?id='.$_POST['edit_id']);

    
    }else {
        echo "Yuklenme zamani xeta bas verdi";
    }
    
    
    
    
    
    
    
    
    
    
    }else {
        echo "Fayl hecmi maksimum 1mbit olmaldir !";
    }
    
    
    }else {
        echo "Fayl tipi duzgu deyil";
    }













}

 }


 if(isset($_POST['product_id'])){


    
    $add_basket = $db->prepare('INSERT into basket set
cookie=:cookie,
product=:product
    ');
        $add_basket->execute(
            array(
"cookie"=>$_COOKIE['userlogin'],
'product'=>$_POST['product_id']
            
            ));

            header('location:../index.php');


 }

 if(isset($_POST['product_idd'])){


    
    $add_basket = $db->prepare('INSERT into basket set
cookie=:cookie,
product=:product
    ');
        $add_basket->execute(
            array(
"cookie"=>$_COOKIE['userlogin'],
'product'=>$_POST['product_idd']
            
            ));

            header('location:../detail.php?q='.$_POST['product_idd']);


 }



?>