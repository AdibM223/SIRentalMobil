<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style> 
@use postcss-preset-env {
    stage: 0;
  }
  
  /* config.css */
  
  
  :root {
    --baseColor: #ffffff;
  }
  
  /* helpers/align.css */
  
  .align {
    display: grid;
    place-items: center;
  }
  
  .grid {
    inline-size: 90%;
    margin-inline: auto;
    max-inline-size: 20rem;
  }
  
  /* helpers/hidden.css */
  
  .hidden {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  /* helpers/icon.css */
  
  :root {
    --iconFill: var(--baseColor);
  }
  
  .icons {
    display: none;
  }
  
  .icon {
    block-size: 1em;
    display: inline-block;
    fill: var(--iconFill);
    inline-size: 1em;
    vertical-align: middle;
  }
  
  /* layout/base.css */
  
  :root {
    --htmlFontSize: 100%;
  
    --bodyBackgroundColor: #ececec;
    --bodyColor: var(--baseColor);
    --bodyFontFamily: "Open Sans";
    --bodyFontFamilyFallback: sans-serif;
    --bodyFontSize: 0.875rem;
    --bodyFontWeight: 400;
    --bodyLineHeight: 1.5;
  }
  
  * {
    box-sizing: inherit;
  }
  
  html {
    box-sizing: border-box;
    font-size: var(--htmlFontSize);
  }
  
  body {
    background-color: var(--bodyBackgroundColor);
    color: var(--bodyColor);
    font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
    font-size: var(--bodyFontSize);
    font-weight: var(--bodyFontWeight);
    line-height: var(--bodyLineHeight);
    margin: 0;
    min-block-size: 100vh;
    width: auto;
  padding: 8% 0 0;
  margin: auto;

  }
  
  /* modules/anchor.css */
  
  :root {
    --anchorColor: #eee;
  }
  
  a {
    color: var(--anchorColor);
    outline: 0;
    text-decoration: none;
  }
  
  a:focus,
  a:hover {
    text-decoration: underline;
  }
  
  /* modules/form.css */
  
  :root {
    --formGap: 0.875rem;
  }
  
  input {
    background-image: none;
    border: 0;
    color: inherit;
    font: inherit;
    margin: 0;
    outline: 0;
    padding: 0;
    transition: background-color 0.3s;
  }
  
  input[type="submit"] {
    cursor: pointer;
  }
  
  .form {
    display: grid;
    gap: var(--formGap);
  background: #FFFFFF;
  width: 500px;
  margin-left: -30%;
  margin-bottom:40%;
  margin-right:10%;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

  }
  
  .form input[type="password"],
  .form input[type="email"],
  .form input[type="text"],
  .form input[type="submit"] {
    inline-size: 100%;

  }
  
  .form__field {
    display: flex;
  }
  
  .form__input {
    flex: 1;
  }
  
  /* modules/login.css */
  
  :root {
    --loginBorderRadus: 0.25rem;
    --loginColor: #eee;
  
    --loginInputBackgroundColor: #3b4148;
    --loginInputHoverBackgroundColor: #434a52;
  
    --loginLabelBackgroundColor: #363b41;
  
    --loginSubmitBackgroundColor: #3b3b3b;
    --loginSubmitColor: #eee;
    --loginSubmitHoverBackgroundColor: #d44179;
  }
  
  .login {
    color: var(--loginColor);
  }
  
  .login label,
  .login input[type="text"],
  .login input[type="password"],
  .login input[type="email"],
  .login input[type="submit"] {
    border-radius: var(--loginBorderRadus);
    padding: 1rem;
  }
  
  .login label {
    background-color: var(--loginLabelBackgroundColor);
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    padding-inline: 1.25rem;
  }
  
  .login input[type="password"],
  .form input[type="email"],
  .login input[type="text"] {
    background-color: var(--loginInputBackgroundColor);
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
  }
  
  .login input[type="password"]:focus,
  .login input[type="password"]:hover,
  .login input[type="text"]:focus,
  .login input[type="text"]:hover {
    background-color: var(--loginInputHoverBackgroundColor);
  }
  
  .login input[type="submit"] {
    background-color: var(--loginSubmitBackgroundColor);
    color: var(--loginSubmitColor);
    font-weight: 700;
    text-transform: uppercase;
  }
  
  .login input[type="submit"]:focus,
  .login input[type="submit"]:hover {
    background-color: var(--loginSubmitHoverBackgroundColor);
  }
  
  /* modules/text.css */
  
  p {
    margin-block: 1.5rem;
  }
  
  .text--center {
    text-align: center;
  }
  
</style>
<body class="align">

  <div class="grid">
  @if(session('error'))
            <div class="alert alert-danger">
            <h1> <b>Opps!</b> {{session('error')}}
                <br></h1>
                
            </div>
            @endif
            <form action="{{ route('actionloginAdmin') }}" method="POST" class="form login">
    @csrf
    <div>
        <img src="https://indorentalmobil.com/wp-content/uploads/2021/08/INDO-RENTAL-LOGO-1.jpeg" height="150" width="300" alt="usp">
    </div>
    <div class="form__field">
        <label for="login_username"><svg class="icon">
            <use xlink:href="#icon-user"></use>
        </svg><span class="hidden">Email</span></label>
        <input autocomplete="username" id="login_username" type="email" name="email" class="form_input" placeholder="Email" required>
    </div>

    <div class="form__field">
        <label for="login_password"><svg class="icon">
            <use xlink:href="#icon-lock"></use>
        </svg><span class="hidden">Password</span></label>
        <input id="login_password" type="password" name="password" class="form_input" placeholder="Password" required>
    </div>
    
    <div class="form__field">
        <input type="submit" value="Sign In">
    </div>
    <a href='Master/Pelanggan/tambahpelanggan'><button type="button" class="btn btn-info">Registrasi</button></a>
    
    

</form>


  </div>


  <svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
      <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
      <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
      <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
  </svg>

</body>
</html>
