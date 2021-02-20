<!-------------------------------------------------
Modification Logan
Date      Name        Description
---------------------------------------------------
2/5/2021  Aaron     Initial deployment of admin page to list visitor information by emp.
2/12/2021 Aaron     Add function calls & include db definition.
--------------------------------------------------->
<?php
require_once('./model/database.php');
require_once('./model/visitor_db.php');
require_once('./model/employee_db.php');

require_once('./util/secure_conn.php');
require_once('./util/valid_admin.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = 'list_visitors';
}

if ($action == 'list_visitors') {
    // Read employee data
    $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
    //echo 'Employee id: ' . $employee_id;
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id = 1;
    }
    try {
        $employees = getEmployees();
        $visitors = getVisitorByEmp($employee_id);
        //echo 'Visitor 1: ' . $visitors['visitor_id'] [0];
//        foreach ($employees as $employee) {
//            echo $employee[$employee_id];
//        }
    } catch (PDOException $ex) {
        echo 'Error on read: ' . $ex->getMessage();
    }
} else if ($action == 'delete_visitor') {
    // Delete the visit record
    $visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_VALIDATE_INT);
    try {
        delVisitor($visitor_id);

        header("Location: admin.php");
    } catch (PDOException $ex) {
        echo 'Error on delete: ' . $ex->getMessage();
    }
}
?>
<!doctype html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<head>
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

</header>
<section>
    <h2>Admin Page</h2>
  <h3>Select an employee to view messages</h3>
            <ul style="list-style-type: none;">
                <?php foreach ($employees as $employee) : ?>
                    <li>
                        <a href="?employee_id=<?php echo $employee['employee_id'] ?>">    
                            <?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Message</th>
                </tr>

                <?php foreach ($visitors as $visitor) : ?>
                    <tr>
                        <td><?php echo $visitor['visitor_name']; ?></td>
                        <td><?php echo $visitor['visitor_email']; ?></td>
                        <td><?php echo $visitor['visit_date']; ?></td>
                        <td><?php echo $visitor['visitor_msg']; ?></td>
                        <td><form action="admin.php" method="post">
                                <input type="hidden" name="action" value="delete_visitor">
                                <input type="hidden" name="visitor_id" value="<?php echo $visitor['visitor_id']; ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
<p>&nbsp;</p>
<p>&nbsp;</p>
</script>
</body>
</html>
