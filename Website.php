
<!DOCTYPE html>
<html lang="en">
<head>
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
        <a href="/AWT_project_login_Page/login_modal.php">login</a>
        <a href="/AWT_project_login_Page/signup.php">SignUp</a>
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



<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special products</span>
                    <h3>Men's Fashion</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="web1.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special products</span>
                    <h3>Accesseries</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="web1.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special products</span>
                    <h3>Child Wear</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="web1.jpg" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>


<section class="products" id="products">

    <h3 class="sub-heading"> our products </h3>
    <h1 class="heading"> popular men's product </h1>

    <div class="box-container">

        <div class="box">
        <?php
        include 'config.php';
        $stmt=$conn->prepare("SELECT * FROM product WHERE product_code='p1000'");
        $stmt->execute();
        $result=$stmt->get_result();
        while($row=$result->fetch_assoc()):

        ?>
            <a href="#" class="fas fa-heart"></a>
            <img src="<?=$row['product_image']?>" alt="">
            <h3><?=$row['product_name']?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>₹ <?=number_format($row['product_price'])?></span>
            <form action="" class="form-submit">
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button type="submit" class="btn addItemBtn">Add To Cart</button>
                <?php endwhile; ?>
            </form>
        </div>

        <div class="box">
        <?php
        include 'config.php';
        $stmt=$conn->prepare("SELECT * FROM product WHERE product_code='p1001'");
        $stmt->execute();
        $result=$stmt->get_result();
        while($row=$result->fetch_assoc()):

        ?>
            <a href="#" class="fas fa-heart"></a>
            <img src="<?=$row['product_image']?>" alt="">
            <h3><?=$row['product_name']?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>₹ <?=number_format($row['product_price'])?></span>
            <form action="" class="form-submit">
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button type="submit" class="btn addItemBtn">Add To Cart</button>
                <?php endwhile; ?>
            </form>
        </div>

        <div class="box">
        <?php
        include 'config.php';
        $stmt=$conn->prepare("SELECT * FROM product WHERE product_code='p1003'");
        $stmt->execute();
        $result=$stmt->get_result();
        while($row=$result->fetch_assoc()):

        ?>
            <a href="#" class="fas fa-heart"></a>
            <img src="<?=$row['product_image']?>" alt="">
            <h3><?=$row['product_name']?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>₹ <?=number_format($row['product_price'])?></span>
            <form action="" class="form-submit">
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button type="submit" class="btn addItemBtn">Add To Cart</button>
                <?php endwhile; ?>
            </form>
        </div>

        <div class="box">
        <?php
        include 'config.php';
        $stmt=$conn->prepare("SELECT * FROM product WHERE product_code='p1004'");
        $stmt->execute();
        $result=$stmt->get_result();
        while($row=$result->fetch_assoc()):

        ?>
            <a href="#" class="fas fa-heart"></a>
            <img src="<?=$row['product_image']?>" alt="">
            <h3><?=$row['product_name']?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>₹ <?=number_format($row['product_price'])?></span>
            <form action="" class="form-submit">
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button type="submit" class="btn addItemBtn">Add To Cart</button>
                <?php endwhile; ?>
            </form>
        </div>

        <div class="box">
        <?php
        include 'config.php';
        $stmt=$conn->prepare("SELECT * FROM product WHERE product_code='p1005'");
        $stmt->execute();
        $result=$stmt->get_result();
        while($row=$result->fetch_assoc()):

        ?>
            <a href="#" class="fas fa-heart"></a>
            <img src="<?=$row['product_image']?>" alt="">
            <h3><?=$row['product_name']?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>₹ <?=number_format($row['product_price'])?></span>
            <form action="" class="form-submit">
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button type="submit" class="btn addItemBtn">Add To Cart</button>
                <?php endwhile; ?>
            </form>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img src="web1.jpg" alt="">
            <h3>Name</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$15.99</span>
            <a href="#" class="btn">add to cart</a>
        </div>
    </div>

</section>



<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="web1.jpg" alt="">
        </div>

        <div class="content">
            <h3>best products worldwide</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>


<section class="products" id="newarrivals">

    <h3 class="sub-heading"> new-arrivals </h3>
    <h1 class="heading"> popular brands </h1>

    <div class="box-container">
        <div id="message"></div>
        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img src="web1.jpg" alt="">
            <h3>Name</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$15.99</span>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img src="web1.jpg" alt="">
            <h3>Name</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$15.99</span>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img src="web1.jpg" alt="">
            <h3>Name</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$15.99</span>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img src="web1.jpg" alt="">
            <h3>Name</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$15.99</span>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img src="web1.jpg" alt="">
            <h3>Name</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$15.99</span>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img src="web1.jpg" alt="">
            <h3>Name</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>$15.99</span>
            <a href="#" class="btn">add to cart</a>
        </div>

    </div>

</section>

<div class="loader-container">
    <img src="cute.gif" alt="">
</div>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script src="website.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".addItemBtn").click(function(e){
            e.preventDefault();
            var $form=$(this).closest(".form-submit");
            var pid=$form.find(".pid").val();
            var pname=$form.find(".pname").val();
            var pprice=$form.find(".pprice").val();
            var pimage=$form.find(".pimage").val();
            var pcode=$form.find(".pcode").val();
            $.ajax({
                url:'action.php',
                method:'post',
                data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
                success:function(response){
                    $("#message").html(response);
                    load_cart_item_number();
                }
            });
        });
        load_cart_item_number();
        function load_cart_item_number(){
            $.ajax({
                url:'action.php',
                method:'get',
                data:{cartItem:"cart_item"},
                success:function(response){
                    $("#cart-item").html(response);
                }
            })
        }
    });
</script>
</body>
</html>