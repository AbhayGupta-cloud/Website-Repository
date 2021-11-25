<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4da9fadaea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="Website.css">

</head>
<body>
    


<header>

    <a href="#" class="logo">LOGO</a>

    <nav class="navbar">
        <a class="active" href="#home">home</a>
        <a href="#products">products</a>
        <a href="#about">about</a>
        <a href="#newarrivals">new-arrivals</a>
        <a href="#contactus">contact us</a>
        <a href="#login">login</a>
    </nav>
    <div class="icons">
        <i class="fas fa-bars" id="products-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="cart.php" id="cart-item" class="fas fa-shopping-cart"></a>
    </div>

</header>


<form action="" id="search-form">
    <input type="search" placeholder="search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <td colspan="7">
                        <h4 class="text-center text-info m-0">Products in your cart!</h4>
                    </td>
                </tr>
                
                <tr>
                    <th>Id </th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th><a href="action.php?clear=all" class="badge-danger badge p-2" onclick="return confirm('Are You Sure you want to clear your cart!');">Clear Cart</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    require 'config.php';
                    $stmt=$conn->prepare("SELECT * FROM cart");
                    $stmt->execute();
                    $result=$stmt->get_result();
                    $grand_total=0;
                    while($row=$result->fetch_assoc()):

                    ?>
                    <tr>
                        <td><?=$row['id'] ?></td>
                        <td><img src="<?=$row['product_image'] ?>" width="50"></td>
                        <td><?= $row['product_name']?></td>
                        <td>₹<?=$row['product_price']?></td>
                        <td><input type="number" class="form-control itemQty" value="<?=$row['qty'] ?>"></td>
                        <td>₹<?=$row['total_price']?></td>
                        <td>
                            <a href="action.php?remove=<?=$row['id']?>" class="text-danger lead" onclick="return confirm('Are You sure that you want to remove this item?');"><i class="fas fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php $grand_total +=$row['total_price'];?>
                    <?php endwhile;?>
                    <tr>
                        <td colspan="3">
                        <a href="Website.php" class="btn btn-success">Continue Shopping</a>
                        </td>
                        <td colspan="2"><b>Grand Total</b></td>
                        <td><b>₹<?=$grand_total?></b></td>
                        <td>
                            <a href="index.php" class="btn btn-info <?=($grand_total>1)?"":"disabled";?>">
                                Checkout
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</body>
</html>