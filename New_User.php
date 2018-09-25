<!DOCTYPE html>
<html>
<head>
  <title>Web Database Programming - New User Registration Confirmation</title>
</head>
<body>
  <h1>Web Database Programming - New User Registration Confirmation</h1>
  <?php

    if (!isset($_POST['First_Name']) || !isset($_POST['Last_Name'])
         || !isset($_POST['Email']) || !isset($_POST['User_Name'])
         || !isset($_POST['Address1']) || !isset($_POST['City'])
         || !isset($_POST['State']) || !isset($_POST['Zip_Code'])
         || !isset($_POST['Password'])) {
       echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
       exit;
    }

    // create short variable names
    $first=$_POST['First_Name'];
    $last=$_POST['Last_Name'];
    $email=$_POST['Email'];
    $user=$_POST['User_Name'];
    $address1=$_POST['Address1'];
    $address2=$_POST['Address2'];
    $city=$_POST['City'];
    $state=$_POST['State'];
    $zip=$_POST['Zip_Code'];
    $password=$_POST['Password'];
    $id = 0;





    @$db = new mysqli('localhost', 'root', 'root', 'classblog');

    if (mysqli_connect_errno()) {
       echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
       exit;
    }

    
    $query = "insert into users values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('issssssssss', $id, $first, $last, $email, $user, $address1, $address2, $city, $state, $zip, $password);
    $stmt->execute();

  if ($stmt->affected_rows > 0) {
      echo  "<p>Book inserted into the database.</p>";
  } else {
      echo "<p>An error has occurred.<br/>
              The item was not added.</p>";
  }
  
    $db->close();
  ?>
</body>
</html>
