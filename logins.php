<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <title>Hymetocean Peers Co. | Login & Registration Form</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=recaptchaReady&render=explicit" async defer></script>
  <style>
    #recaptcha, #recaptcha-register {
      display: flex;
      justify-content: center;
      margin-bottom: .5em;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <nav class="nav">
      <div class="nav-logo"><img src="img/logo.png" class="logo" alt="Logo"></div>
      <div class="nav-menu" id="navMenu">
        <ul>
          <li><a href="front.php" class="link"></a></li>
          <li><a href="about.html" class="link"></a></li>
          <li><a href="project.php" class="link"></a></li>
          <li><a href="contact.php" class="link"></a></li>
          <li><a href="logins.php" class="link"></a></li>
        </ul>
      </div>
      <div class="nav-button">
        <button id="loginBtn" class="btn white-btn" onclick="showLogin()">Sign In</button>
        <button id="registerBtn" class="btn" onclick="showRegister()">Sign Up</button>
      </div>
      <div class="nav-menu-btn"><i class="bx bx-menu" onclick="toggleNav()"></i></div>
    </nav>

    <div class="form-box">
      <!-- LOGIN FORM -->
      <form id="loginForm" action="LoginConnection.php" method="post" onsubmit="return false;">
        <div class="login-container" id="login">
          <div class="top"><span>Don't have an account? <a href="#" onclick="showRegister()">Sign Up</a></span><header>Login</header></div>
          <div class="input-box"><input name="Email" type="text" class="input-field" placeholder="Email" required><i class="bx bx-user"></i></div>
          <div class="input-box"><input name="Password" type="password" class="input-field" placeholder="Password" required><i class="bx bx-lock-alt"></i></div>
          <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
          <div class="input-box"><button type="button" class="submit" onclick="verifyBeforeLogin()">Sign In</button></div>
          <div class="two-col">
            <div class="one"><input id="login-check" type="checkbox"><label for="login-check"> Remember Me</label></div>
            <div class="two"><label><a href="forgotPassword.php">Forgot password?</a></label></div>
          </div>
        </div>
      </form>

      <!-- REGISTER FORM -->
      <form id="registerForm" action="register.php" method="post" enctype="multipart/form-data">
        <div class="register-container" id="register">
          <div class="top">
            <span>Have an account? <a href="#" onclick="showLogin()">Login</a></span>
            <header>Sign Up</header>
          </div>

          <div class="two-forms">
            <div class="input-box">
              <input name="Firstname" type="text" class="input-field" placeholder="Firstname" required>
              <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
              <input name="Lastname" type="text" class="input-field" placeholder="Lastname" required>
              <i class="bx bx-user"></i>
            </div>
          </div>

          <div class="input-box">
            <input name="Email" type="email" class="input-field" placeholder="Email" required>
            <i class="bx bx-envelope"></i>
          </div>

          <div class="input-box">
            <input name="Password" type="password" class="input-field" placeholder="Password" required>
            <i class="bx bx-lock-alt"></i>
          </div>

          <div class="file-upload-box input-box">
            <label class="upload-label" for="id-upload">
              <i class="bx bx-id-card"></i> Upload Valid ID
            </label>
            <input id="id-upload" name="IDFile" type="file" class="file-input" accept=".jpg,.jpeg,.png,.pdf" required>
            <small class="upload-note">Accepted formats: JPG, PNG, PDF (Max 2MB)</small>
          </div>

          <input type="hidden" id="register-recaptcha-response" name="g-recaptcha-response">

          <div class="input-box" style="margin-top:10px;">
            <button type="submit" class="submit">Register</button>
          </div>

          <div class="two-col">
            <div class="one">
              <input id="register-check" type="checkbox">
              <label for="register-check"> Remember Me</label>
            </div>
            <div class="two">
              <label><a href="terms.html">Terms & conditions</a></label>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    function toggleNav() {
      const m = document.getElementById("navMenu");
      m.className = m.className.includes("responsive") ? "nav-menu" : "nav-menu responsive";
    }

    function showLogin() {
      document.getElementById("login").style.left = "4px";
      document.getElementById("register").style.right = "-520px";
      document.getElementById("loginBtn").className = "btn white-btn";
      document.getElementById("registerBtn").className = "btn";
      document.getElementById("login").style.opacity = "1";
      document.getElementById("register").style.opacity = "0";
      document.querySelector(".form-box").style.height = "420px";
    }
    function showRegister() {
      document.getElementById("login").style.left = "-510px";
      document.getElementById("register").style.right = "5px";
      document.getElementById("loginBtn").className = "btn";
      document.getElementById("registerBtn").className = "btn white-btn";
      document.getElementById("login").style.opacity = "0";
      document.getElementById("register").style.opacity = "1";
      document.querySelector(".form-box").style.height = "600px";
    }

    let widgetId;
    function recaptchaReady() {}

    function verifyBeforeLogin() {
      Swal.fire({
        title: 'Are you a robot?',
        html: '<div id="recaptcha"></div>',
        showCancelButton: false,
        confirmButtonText: 'Continue',
        didOpen: () => {
          widgetId = grecaptcha.render('recaptcha', { sitekey: '6LdLRl4rAAAAAD1IPAxllTrY5j0l1d3AZ4gzlrDU' });
        },
        preConfirm: () => {
          const resp = grecaptcha.getResponse(widgetId);
          if (!resp) {
            Swal.showValidationMessage(`Please verify you're not a robot`);
            return false;
          }
          document.getElementById('g-recaptcha-response').value = resp;
          return true;
        }
      }).then(r => r.isConfirmed && document.getElementById('loginForm').submit());
    }

    function verifyBeforeRegister() {
      Swal.fire({
        title: 'Are you a robot?',
        html: '<div id="recaptcha-register"></div>',
        showCancelButton: false,
        confirmButtonText: 'Continue',
        didOpen: () => {
          widgetId = grecaptcha.render('recaptcha-register', { sitekey: '6LdLRl4rAAAAAD1IPAxllTrY5j0l1d3AZ4gzlrDU' });
        },
        preConfirm: () => {
          const resp = grecaptcha.getResponse(widgetId);
          if (!resp) {
            Swal.showValidationMessage(`Please verify you're not a robot`);
            return false;
          }
          document.getElementById('register-recaptcha-response').value = resp;
          return true;
        }
      }).then(r => r.isConfirmed && document.getElementById('registerForm').submit());
    }

    // URL-status alerts
    const s = new URLSearchParams(window.location.search).get('status');
    if (s === 'wrongpassword') {
      Swal.fire({ icon: 'error', title: 'Incorrect Password!', text: 'The password you entered is incorrect.' });
    } else if (s === 'emailnotfound') {
      Swal.fire({ icon: 'error', title: 'Email Not Found!', text: 'We couldn’t find an account with that email.' });
    } else if (s === 'reset-success') {
      Swal.fire({ icon: 'success', title: 'Password Reset Successful!', text: 'You can now log in with your new password.' });
    } else if (s === 'recaptchafail') {
      Swal.fire({ icon: 'error', title: 'Verification Failed', text: 'Please complete the CAPTCHA to continue.' });
    }
  </script>
</body>
</html>
