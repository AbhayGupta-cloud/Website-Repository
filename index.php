<?php
session_start();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style type="text/css">
	#btn5{
		border-radius: 30px;
	}
	.container{
		background-color: #ffca28;
	}
	.card{
		background-color: #c6ff00;
	}
</style>
<body>
	<div class="container">
		<div class="card bg-light">
			<div class="card-body mx-auto">
				<h4 class="card-title mt-3 text-center">Checkout Details</h4>
	<form>
      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" required>
      </div>
      <?php
                    require 'config.php';
                    $stmt=$conn->prepare("SELECT * FROM cart");
                    $stmt->execute();
                    $result=$stmt->get_result();
                    $grand_total=0;
                    while($row=$result->fetch_assoc()):

                    ?>
                    <?php $grand_total +=$row['total_price'];?>
                    <?php endwhile;?>
      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        </div>
        <input type="number" class="form-control" value="<?=$grand_total?>" id="amount" placeholder="" readonly name="amount" required>
      </div>
<div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
        </div>
        <input type="text" class="form-control" id="validationCustomPassword" placeholder="Enter Address" required>
        <div class="invalid-feedback">
        	Enter Full Address
        </div>
</div>

    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> I accept the terms and conditions.</label>
      </div>
    </div>
  </div>
  <input type="button" class="btn btn-success btn-block" id="btn5" name="button" value="proceed to checkout" onclick="alert()">
</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function alert(){
		//swal("Info!", "You are being redirected to payment gateway!", "success");
		MakePayment();
	}
	function MakePayment(){
		swal("Info!", "You are being redirected to payment gateway!", "success");
		var name=$("#name").val();
		var amount=$("#amount").val();
		var options = {
    "key": "rzp_test_MCO6sdePn7I5uG", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name,
    "description": "Test Transaction",
    "image": "https://thumbs.dreamstime.com/b/red-ball-large-blue-gradient-circle-rolling-small-red-ball-logo-red-ball-large-blue-gradient-circle-rolling-154870629.jpg",
    //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
      
    	//console.log(response);
    	//window.alert("payment successful");
    	//window.location.href="success.php";
       jQuery.ajax({
        	type:"POST",
        	url:"payment.php",
        	data:"pay_id="+response.razorpay_payment_id+"&amount="+amount+"&name="+name,
        	success:function(result){
        	window.location.href="success.php";
        	}
        });
    }
};
var rzp1 = new Razorpay(options);
rzp1.open();
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
//document.getElementById('rzp-button1').onclick = function(e){
    //rzp1.open();
    //e.preventDefault();
//}
	}
</script>