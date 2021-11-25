// modal of all files
$(document).ready(function(){
    $('#login_modal').modal('show');
    $(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
});

// for show password
function show() {
    var x =document.getElementById("login_password");
    if(x.type=== "password"){
        x.type = "text";
    }else{
        x.type = "password";
    }
}
$(document).ready(function(){
    $('#Confirm').modal('show');
    $(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
});



// for validation of email and password in login page
$("#mylogin").click(function(event) {
    
    var form = $("#loginform");
    
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.addClass('was-validated');
});






// for new password 
var myInput = document.getElementById("login_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }

myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }
  
    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }



// for password match
var cnfpass =  document.getElementById("password_2");
cnfpass.onfocus = function() {
    document.getElementById("message1").style.display = "block";
  }

cnfpass.onblur = function() {
    document.getElementById("message1").style.display = "none";
}


// signup reenter password matching
$('#login_password, #password_2').on('keyup', function () {
  if ($('#login_password').val() == $('#password_2').val()) {
    $('#message1').html('Matching').css('color', 'green');
  } else 
    $('#message1').html('Not Matching').css('color', 'red');
});