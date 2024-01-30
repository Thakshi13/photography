<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <style>
        	

            input[type=text] {
						  width: 100%;
						  padding: 12px 20px;
						  margin: 8px 0;
						  box-sizing: border-box;
						  border: 2px solid red;
  						border-radius: 4px;
                        border: none;
                        border-bottom: 2px solid red;
  							background-color: whitesmoke;
 							 color: black;

						}
    input[type=password] {
						  width: 100%;
						  padding: 12px 20px;
						  margin: 8px 0;
						  box-sizing: border-box;
						  border: 2px solid red;
  						border-radius: 4px;
                        border: none;
                        border-bottom: 2px solid red;
  							background-color: whitesmoke;
 							 color: black;

						}
    input[type=submit] 
                        {
                            width: 100%;
                            background-color: lightblue;
                            color: white;
                            padding: 5px 10px;
                            border: none;
                            border-radius: 8px;
                            cursor: pointer;
                            float:right;
                            text-align: center;
                            text-decoration: none;
                            font-size: larger;
                            

                        }
    input[type=submit]:hover 
                        {
                            background-color: #E64A19;


                        }
	input[type=text]:focus {
							 border: 3px  solid#E64A19;
							}
							
			
    </style>
	<div class="mid" >
		    <a href="index.php" style="float:left;width:80px;"><input type="submit" value="Home" id="mid"></a>
			<a href="Admin.php" style="float:left;width:80px;" ><input type="submit" value="Admin" id="mid"></a>
            <a href="log_in.html" style="float:left;width:80px;"><input type="submit" value="Login" id="mid"></a>
            
			
        </div>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300, 400, 500" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">


</head>
<body>


<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        
        <button class="user_unregistered-signup" id="signup-button"  >Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email" placeholder="Email" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
            <input type="submit"  a href="home.php" value="Log In" class="forms_buttons-action">
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form action="signup.php" method="post" class="forms_form">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Full Name" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="email" placeholder="Email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
