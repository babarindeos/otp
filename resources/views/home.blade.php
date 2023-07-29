<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP Verification</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Js only -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="container text-center">
            <p>Phone Number Authentication using Firebase In Laravel 8</p>
            </div>
        </div>

        <div class="alert alert-danger" id="error" style="display: none;"></div>
         <div class="card">
            <div class="card-header">
               Enter Phone Number
            </div>
            <div class="card-body">
               <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
               <form>
                  <label>Phone Number:</label>
                  <input type="text" id="number" class="form-control" placeholder="+234********">

                  <div id="recaptcha-container"></div>
                  <button type="button" class="btn btn-success" style="margin-top:3px;" onclick="phoneSendAuth();">SendCode</button>
               </form>
            </div>
         </div>


         <div class="card" style="margin-top: 20px">
            <div class="card-header">
               Enter Verification code
            </div>
            <div class="card-body">
               <div class="alert alert-success" id="successRegister" style="display: none;"></div>
               <form>
                  <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">
                  <button type="button" class="btn btn-success" style="margin-top:3px" onclick="codeverify();">Verify code</button>
               </form>
            </div>
         </div>
      </div>
      <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

      <script>            
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            var firebaseConfig = {
                apiKey: "AIzaSyBxyEABztr1WuzWQCqL-Eoy2O7xT7oIzqg",
                authDomain: "otpapp-7de16.firebaseapp.com",
                projectId: "otpapp-7de16",
                storageBucket: "otpapp-7de16.appspot.com",
                messagingSenderId: "162077174757",
                appId: "1:162077174757:web:e6078d9074a1a987bc1d0c",
                measurementId: "G-E8FGMR3S79"
            };

            firebase.initializeApp(firebaseConfig);            

      </script>

      <script>
            window.onload = function(){                
                render();
            };

            function render(){
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
                recaptchaVerifier.render();
                
            }

            function phoneSendAuth(){
                var number = $("#number").val();

                firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult){

                    window.confirmationResult = confirmationResult;
                    codeResult = confirmationResult;
                    console.log(codeResult);

                    $("#sentSuccess").text("Message Sent Successfully");
                    $("#sentSuccess").show();

                }).catch(function(error){
                    $("#error").text(error.message);
                    $("#error").show();
                });
            }


            function codeverify(){
                var code = $("#verificationCode").val();

                codeResult.confirm(code).then(function(result){
                    var user = result.user
                    console.log(user);
                    $("#successRegister").text("you are register successfully");
                    $("#successRegister").show();

                }).catch(function (error){
                    $("#error").text(error.message);
                    $("#error").show();
                });
            }
            
      </script>






    </div><!-- end of container //-->
</body>
</html>