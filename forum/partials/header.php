<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '
<header class="header menu_2">
<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
<div id="logo">
  <a href="../html_menu/index.html"><img src="../assets/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
</div>
<!-- /top_menu -->
<a href="#menu" class="btn_mobile">
  <div class="hamburger hamburger--spin" id="hamburger">
    <div class="hamburger-box">
      <div class="hamburger-inner"></div>
    </div>
  </div>
</a>
<nav id="menu" class="main-menu">
  <ul>
    <li><span><a href="../html_menu/index.html">Home</a></span></li>
    <li><span class="mx-2">Welcome '. $_SESSION['user_name'].'</span></li>
    <li class="hidden_tablet"><a href="../forum/index.php" class="btn btn-primary rounded mx-2">Forum</a></li>
    <li class="hidden_tablet"><a href="../forum/partials/logout.php" class="btn btn-warning rounded mx-2">Logout</a></li>
  </ul>	
</nav>
</header>
';
} else{
  echo '
<header class="header menu_2">
<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
<div id="logo">
  <a href="../html_menu/index.html"><img src="../assets/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
</div>
<!-- /top_menu -->
<a href="#menu" class="btn_mobile">
  <div class="hamburger hamburger--spin" id="hamburger">
    <div class="hamburger-box">
      <div class="hamburger-inner"></div>
    </div>
  </div>
</a>
<nav id="menu" class="main-menu">
  <ul>
    <li><span><a href="../html_menu/index.html">Home</a></span></li>
    <li><span><a href="../forum/partials/login.php">Login</a></span>
    <li><span><a href="#0">Registration</a></span>
      <ul>
        <li><a href="../login_signin/stu_signup.php">Student</a></li>
        <li><a href="../login_signin/tr_signup.php">Teacher</a></li>
      </ul>
    </li>
    <li class="hidden_tablet"><a href="../forum/index.php" class="btn_1 rounded">Forum</a></li>
  </ul>	
</nav>
</header>
';
}


?>