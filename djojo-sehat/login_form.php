<style>
  /**
 * General variables
 */
  /**
 * General configs
 */
  * {
    box-sizing: border-box;
  }

  button {
    background-color: transparent;
    padding: 0;
    border: 0;
    outline: 0;
    cursor: pointer;
  }

  input {
    background-color: transparent;
    padding: 0;
    border: 0;
    outline: 0;
  }

  input[type="submit"] {
    cursor: pointer;
  }

  input::-webkit-input-placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
  }

  input:-ms-input-placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
  }

  input::-ms-input-placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
  }

  input::placeholder {
    font-size: 0.85rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    letter-spacing: 0.1rem;
    color: #ccc;
  }

  /**
 * Bounce to the left side
 */
  @-webkit-keyframes bounceLeft {
    0% {
      -webkit-transform: translate3d(100%, -50%, 0);
      transform: translate3d(100%, -50%, 0);
    }

    50% {
      -webkit-transform: translate3d(-30px, -50%, 0);
      transform: translate3d(-30px, -50%, 0);
    }

    100% {
      -webkit-transform: translate3d(0, -50%, 0);
      transform: translate3d(0, -50%, 0);
    }
  }

  @keyframes bounceLeft {
    0% {
      -webkit-transform: translate3d(100%, -50%, 0);
      transform: translate3d(100%, -50%, 0);
    }

    50% {
      -webkit-transform: translate3d(-30px, -50%, 0);
      transform: translate3d(-30px, -50%, 0);
    }

    100% {
      -webkit-transform: translate3d(0, -50%, 0);
      transform: translate3d(0, -50%, 0);
    }
  }

  /**
 * Bounce to the left side
 */
  @-webkit-keyframes bounceRight {
    0% {
      -webkit-transform: translate3d(0, -50%, 0);
      transform: translate3d(0, -50%, 0);
    }

    50% {
      -webkit-transform: translate3d(calc(100% + 30px), -50%, 0);
      transform: translate3d(calc(100% + 30px), -50%, 0);
    }

    100% {
      -webkit-transform: translate3d(100%, -50%, 0);
      transform: translate3d(100%, -50%, 0);
    }
  }

  @keyframes bounceRight {
    0% {
      -webkit-transform: translate3d(0, -50%, 0);
      transform: translate3d(0, -50%, 0);
    }

    50% {
      -webkit-transform: translate3d(calc(100% + 30px), -50%, 0);
      transform: translate3d(calc(100% + 30px), -50%, 0);
    }

    100% {
      -webkit-transform: translate3d(100%, -50%, 0);
      transform: translate3d(100%, -50%, 0);
    }
  }

  /**
 * Show Sign Up form
 */
  @-webkit-keyframes showSignUp {
    100% {
      opacity: 1;
      visibility: visible;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
    }
  }

  @keyframes showSignUp {
    100% {
      opacity: 1;
      visibility: visible;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
    }
  }

  /**
 * Page background
 */
  .user {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-color: white ;
    background-size: cover;
  }

  .user_options-container {
    position: relative;
    width: 80%;
  }

  .user_options-text {
    display: flex;
    justify-content: space-between;
    width: 100%;
    background-color: rgba(34, 34, 34, 0.85);
    border-radius: 3px;
  }

  /**
 * Registered and Unregistered user box and text
 */
  .user_options-registered,
  .user_options-unregistered {
    width: 50%;
    padding: 75px 45px;
    color: #fff;
    font-weight: 300;
  }

  .user_registered-title,
  .user_unregistered-title {
    margin-bottom: 15px;
    font-size: 1.66rem;
    line-height: 1em;
  }

  .user_unregistered-text,
  .user_registered-text {
    font-size: 0.83rem;
    line-height: 1.4em;
  }

  .user_registered-login,
  .user_unregistered-signup {
    margin-top: 30px;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 10px 30px;
    color: #fff;
    text-transform: uppercase;
    line-height: 1em;
    letter-spacing: 0.2rem;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  }

  .user_registered-login:hover,
  .user_unregistered-signup:hover {
    color: rgba(34, 34, 34, 0.85);
    background-color: #ccc;
  }

  /**
 * Login and signup forms
 */
  .user_options-forms {
    position: absolute;
    top: 50%;
    left: 30px;
    width: calc(50% - 30px);
    min-height: 420px;
    background-color: #fff;
    border-radius: 3px;
    box-shadow: 2px 0 15px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    -webkit-transform: translate3d(100%, -50%, 0);
    transform: translate3d(100%, -50%, 0);
    transition: -webkit-transform 0.4s ease-in-out;
    transition: transform 0.4s ease-in-out;
    transition: transform 0.4s ease-in-out, -webkit-transform 0.4s ease-in-out;
  }

  .user_options-forms .user_forms-login {
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out;
  }

  .user_options-forms .forms_title {
    margin-bottom: 45px;
    font-size: 1.5rem;
    font-weight: 500;
    line-height: 1em;
    text-transform: uppercase;
    color: #e8716d;
    letter-spacing: 0.1rem;
  }

  .user_options-forms .forms_field:not(:last-of-type) {
    margin-bottom: 20px;
  }

  .user_options-forms .forms_field-input {
    width: 100%;
    border-bottom: 1px solid #ccc;
    padding: 6px 20px 6px 6px;
    font-family: "Montserrat", sans-serif;
    font-size: 1rem;
    font-weight: 300;
    color: gray;
    letter-spacing: 0.1rem;
    transition: border-color 0.2s ease-in-out;
  }

  .user_options-forms .forms_field-input:focus {
    border-color: gray;
  }

  .user_options-forms .forms_buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 35px;
  }

  .user_options-forms .forms_buttons-forgot {
    font-family: "Montserrat", sans-serif;
    letter-spacing: 0.1rem;
    color: #ccc;
    text-decoration: underline;
    transition: color 0.2s ease-in-out;
  }

  .user_options-forms .forms_buttons-forgot:hover {
    color: #b3b3b3;
  }

  .user_options-forms .forms_buttons-action {
    background-color: #e8716d;
    border-radius: 3px;
    padding: 10px 35px;
    font-size: 1rem;
    font-family: "Montserrat", sans-serif;
    font-weight: 300;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    transition: background-color 0.2s ease-in-out;
  }

  .user_options-forms .forms_buttons-action:hover {
    background-color: #e14641;
  }

  .user_options-forms .user_forms-signup,
  .user_options-forms .user_forms-login {
    position: absolute;
    top: 70px;
    left: 40px;
    width: calc(100% - 80px);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, -webkit-transform 0.5s ease-in-out;
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, transform 0.5s ease-in-out;
    transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, transform 0.5s ease-in-out, -webkit-transform 0.5s ease-in-out;
  }

  .user_options-forms .user_forms-signup {
    -webkit-transform: translate3d(120px, 0, 0);
    transform: translate3d(120px, 0, 0);
  }

  .user_options-forms .user_forms-signup .forms_buttons {
    justify-content: flex-end;
  }

  .user_options-forms .user_forms-login {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
    visibility: visible;
  }

  /**
 * Triggers
 */
  .user_options-forms.bounceLeft {
    -webkit-animation: bounceLeft 1s forwards;
    animation: bounceLeft 1s forwards;
  }

  .user_options-forms.bounceLeft .user_forms-signup {
    -webkit-animation: showSignUp 1s forwards;
    animation: showSignUp 1s forwards;
  }

  .user_options-forms.bounceLeft .user_forms-login {
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translate3d(-120px, 0, 0);
    transform: translate3d(-120px, 0, 0);
  }

  .user_options-forms.bounceRight {
    -webkit-animation: bounceRight 1s forwards;
    animation: bounceRight 1s forwards;
  }

  /**
 * Responsive 990px
 */
  @media screen and (max-width: 990px) {
    .user_options-forms {
      min-height: 350px;
    }

    .user_options-forms .forms_buttons {
      flex-direction: column;
    }

    .user_options-forms .user_forms-login .forms_buttons-action {
      margin-top: 30px;
    }

    .user_options-forms .user_forms-signup,
    .user_options-forms .user_forms-login {
      top: 40px;
    }

    .user_options-registered,
    .user_options-unregistered {
      padding: 50px 45px;
    }
  }
</style>
<?php
include 'fungsi/base_url.php';
?>
<?php
   include 'navbar.php';
   ?>
<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title" style="color:white;">Don't have an account?</h2>
        <p class="user_unregistered-text" style="color:white;" >Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever
          street art fap.</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title" style="color:white;">Have an account?</h2>
        <p class="user_registered-text" style="color:white;">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever
          street art fap.</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>

    <form action="login.php" method="post">
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
                <input type="email" placeholder="Email" name="email" id="email" class="forms_field-input" required
                  autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" name="password" id="password" class="forms_field-input"
                required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
            <input type="submit" name="submit" id="submit" value="Log In" class="forms_buttons-action">

          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" action="send.php" method="post">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" name="nama" id="nama" placeholder="Nama Lengkap.." class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="email" name="email" id="email"placeholder="Email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="password" name="password" id="password"placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" name="register" value="Sign up" class="forms_buttons-action">
          </div>
         </form> 
      </div>
    </div>
  </div>
</section>

<!-- Memanggil file JS -->
<script src="<?php echo $base_url ?>template/js/jquery.js"></script>
<script src="<?php echo $base_url ?>template/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url ?>template/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo $base_url ?>template/Design/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url ?>template/Design/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo $base_url ?>template/Design/js/jquery.slicknav.js"></script>
<script src="<?php echo $base_url ?>template/Design/js/owl.carousel.min.js"></script>
<script src="<?php echo $base_url ?>template/Design/js/jquery.nice-select.min.js"></script>
<script src="<?php echo $base_url ?>template/Design/js/mixitup.min.js"></script>
<script src="<?php echo $base_url ?>template/Design/js/main.js"></script>
<script>
  //validasi email
  var email;
  $('#email').on('keyup', function () {
    var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (valid.test(this.value) !== true) {
      $('.email').text('Isi Email Dengan Benar !');
      email = false;
    } else if (valid.test(this.value) == true) {
      $('.email').text('');
      email = true;
    }
    if ($(this).val().length == 0) {
      $('.email').text('');
    }
  });
</script>
<script>
  $('#password').on('keypress', function () {
    if (this.value.length < 5) {
      $('.pass').text('Password Harus terdiri dari Minimal 6 karakter !');
    } else {
      $('.pass').text('');
    }
  });
  $('#password').on('keyup', function () {
    if ($(this).val().length == 0) {
      $('.pass').text('');
    }
  });
</script>
<script>
  /**
   * Variables
   */
  const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

  /**
   * Add event listener to the "Sign Up" button
   */
  signupButton.addEventListener('click', () => {
    userForms.classList.remove('bounceRight')
    userForms.classList.add('bounceLeft')
  }, false)

  /**
   * Add event listener to the "Login" button
   */
  loginButton.addEventListener('click', () => {
    userForms.classList.remove('bounceLeft')
    userForms.classList.add('bounceRight')
  }, false)
</script>