<?php
/************************************/
/* Date         Name            Description*/
/* 2/12/2021    Aaron           Added db definition and function calls. */  
/************************************/
$visitor_name = filter_input(INPUT_POST, 'name');
$visitor_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$visitor_msg = filter_input(INPUT_POST, 'message');

//Validate inputs
if ($visitor_name == NULL || $visitor_email == NULL || $visitor_msg == NULL) {
    $error = "Invalid input data. Check all fields and try again.";
    echo "Form Data Error: " . $error;
    exit();
} else {
    
    require_once('./model/database.php');
    require_once('./model/visitor_db.php');
    
    addVisitor($visitor_name, $visitor_email, $visitor_msg);
   

}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>Thank you Page</title>
<style type="text/css">
@import url("CSS/stylesheet.css");
body {
	color: lightblue;
}
</style>
<!-- Mobile -->
<link href="CSS/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width:800px)">
<!-- Custom Style Sheet -->
<link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
  <!-- Header -->
  <header id="home" class="header">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>Kid Co</h1>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Kid Co</h1>
            </div>
            <div class="close">
              <i class="bx bx-x"></i>
            </div>
          </div>

          <ul class="nav-list">
            <li class="nav-item">
              <a href="index.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="Boys.html" class="nav-link">Boys</a>
            </li>
            <li class="nav-item">
              <a href="Girls.html" class="nav-link ">Girls</a>
            </li>
            <li class="nav-item">
              <a href="Unisex.html" class="nav-link">Unisex</a>
            </li>
            <li class="nav-item">
              <a href="contact.html" class="nav-link">Contact Us</a>
            </li>
            <li class="nav-item">
              <a href="cart.html" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
        <a href="cart.html" class="cart-icon">
          <i class="bx bx-shopping-bag"></i>
        </a>
        <div class="hamburger">
          <i class="bx bx-menu"></i>
        </div>
      </div>
    </nav>

<header>
  <h1>contact Kid Co</span></h1>
</header>
<section>
  <h2>Thank you, <?php echo $visitor_name; ?> for contacting me! I will get back to you shortly.</h2>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="">
  </form>
  <p>&nbsp;</p>
</section>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h1>&nbsp;</h1>
<h2>&nbsp;</h2>
</body>
</html>
