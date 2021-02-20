<!-------------------------------------------------
Modification Logan
Date      Name        Description
---------------------------------------------------
2/11/2021  Aaron     This page was created.
--------------------------------------------------->
<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=kidco';
    private static $username = 'ac_user';
    private static $password = 'MSPress#1';
    private static $db;

    private function __construct() {
        
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                        self::$username,
                        self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }

}

class Employee {
    private $first_name, $last_name;

    public function __construct($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }
}

class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT first_name, last_name FROM employee
                  ORDER BY last_name';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['first_name'],
                                     $row['last_name']);
            $employees[] = $employee;                          // array of objects
        }
        return $employees;
    }
}

// Instantiate employee object
$employees = EmployeeDB::getEmployees();

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
          <h1>KidCo</h1>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>KidCo</h1>
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
  <h1>Employee List</h1>
</header>
<section>
<h2>Employee List.</h2>
            <p>
            <ul>
                <?php foreach ($employees as $employee) : ?>
                <li>
                    <?php echo $employee->getLastName() . ", " . $employee->getFirstName() ?>
                </li>
                <?php endforeach; ?>
    </ul>
  </p>
  <p>&nbsp;</p>
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
