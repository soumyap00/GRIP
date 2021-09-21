<html>
  <head>
  <link rel="shortcut icon" href="tablogo.png">  

    <style>
      *{
        margin: 0px;
        font-family: 'Josefin Sans', sans-serif;
      }
      body{
        background-image: url("2676105.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .nav{
        width: 100%;
        height: 10%;
        background-color: rgba(245, 245, 245, 0.89);
      }
      #logo{
        float: left;
        margin-top: 5px;
        margin-left: 5px;
      }
      .navbtn{
        cursor: pointer;
        margin-top: 15px;
        border: none;
        width: 12%;
        height: 65%;
        float: left;
        background: none;
      }
      .table{
        height: 22%;
        width: 30%;
        border: black solid 1px;
        border-radius: 5px;
        border-collapse: collapse;
        margin-left: 5% ;
      }
      td{
        text-align: center;
      }
      th{
        border-bottom: black solid 1px;
        background-color: wheat;
      }
      table tr:nth-child(even){background-color: grey;}
      table tr:nth-child(odd){background-color: white;}


      table tr:hover {background-color: #ddd;}
      .transfer{
        margin-left: 6%;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size:1.2em;
        
      }
      .btn{
            width: 30%;
            padding: 20px 20px;
            border-radius: 5px;
            border: none;
            background-color:chartreuse;
        }

      .btn:hover{
        background-color: while;
        cursor: pointer;
      }
      select,input{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size:1em;
        width:30%;
        padding:20px 20px;
        border:none;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>
  <nav id="home">
      <div class="nav">
        <img id="logo" src="tablogo.png" height="72px" width="72px" >
          <a href="index.html"><button class="navbtn"><b>Home</b></button></a>
          <a href="view.php"><button class="navbtn"><b>View All Customer</b></button></a>
      </div>
    </nav>
    <br><br><br>
<?php
    session_start();
    $_SESSION["TC"] = $_POST["view"];
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "Bank";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Customer WHERE C_Id='" . $_POST["view"]. "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
  // output data of each row
      echo '<table class="table">';
      echo "<tr><th colspan=3><u>Customer Details</u> </th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td><b>Customer Id</td><td> : </b></td><td>" . $row["C_Id"]. "</td>";
        echo "<tr><td><b>Name</td><td> : </b></td><td>" . $row["Name"]. "</td>";
        $_SESSION["Sender"] = $row["Name"];
        echo "<tr><td><b>Email Address</td><td> : </b></td><td>" . $row["Email"]. "</td>";
        echo "<tr><td><b>Balance</td><td> : </b></td><td>" . $row["Balance"]. "</td>";
      }
      echo "</table><br><br>";
    } 
    else {
      echo "You are not registered.<br>So, Please Register first.";
    }
    $sql = "SELECT C_Id,Name FROM Customer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
  // output data of each row
      echo '<form class="transfer" action="transfer.php" method="POST"> For Transfering Money Select User:<br>';
      echo '<select name="user" required> <option value="" disabled selected hidden>Select User</option>';
      while($row = $result->fetch_assoc()) {
        if ($row["C_Id"] == $_POST["view"]) {
          continue;
        }
        echo '<option value="'.$row["C_Id"].'">'.$row["Name"].'</option>';
      }
      echo "</select>";
    } 
    else {
      echo "You are not registered.<br>So, Please Register first.";
    }
    $conn->close();
    ?>
    <br><br>
    Tranfer Amount : <input type="text" name="tp" style="width: 19.8%;" placeholder="Amount" required><br><br>
    <input type="submit" class="btn" value="Tranfer Money >">
  </form>
</body>
</html>