<html>
  <head>
    <link rel="shortcut icon" href="tablogo.png">  
    <title>Welcome</title>
    <style>
      *{
        margin: 0px 0px;
        font-family: 'Josefin Sans', sans-serif;
      } 
      body{
        background-image: url("2676105.jpg");
        background-size: 100% 100%;
      }  
      .nav{
        width: 100%;
        height: 10%;
        position: fixed;
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
      h1{
        background-color:gold;
        width: 45%;
        padding: 20px;
        opacity: 0.8;
        margin-left: 7%;
        text-align: center;
        border-radius: 7px;
        border: solid black 1px;
      }
      #info{
        background-color: rgba(0, 255, 0, 0.6);
        width: 45%;
        font-size: 20px;
        margin-left: 8%;
        padding: 15px;
        text-align:center;
        border-radius: 7px;
        border: solid black 1px;
      }
      .table{
        width: 50.9%;
        border: black solid 1px;
        border-radius: 5px;
        border-collapse: collapse;
        margin-left: 26.5% ;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size:1em;
      }
      td{
        text-align: center;
        height:30px;
        padding: 5px 5px;
      }
      th{
        border-bottom: black solid 1px;
        background-color: #04AA6D;
        height:40px;
      }
      table tr:nth-child(even){background-color: wheat;}
      table tr:nth-child(odd){background-color: grey;}
      table tr:hover {background-color: white;}
    </style>
  </head>
  <body>
    <nav id="home">
      <div class="nav">
        <img id="logo" src="tablogo.png" height="72px" width="72px" >
        <a href="index.html"><button class="navbtn"><b>Home</b></button></a>
        <a href="history.php"><button class="navbtn"><b>Tranfer History</b></button></a>
      </div>
    </nav>
    <br><br><br><br><br><br><br><br>
    <?php
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
      $sql = "SELECT C_Id,Name FROM Customer";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
  // output data of each row
        $i = 1;
        echo '<table class="table"><tr><th colspan=3>Customer Records</th></tr>';
        echo "<tr><th>Sl. No.</th><th>Customer Name</th><th>Select and Click for Details<a></th></tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" .$i. "</td><td>" . $row["Name"]. "</td>";
          echo '<td><form method="POST" action="detail.php"><input type="radio" name="view" value='.$row["C_Id"].' required>';
          echo '&nbsp;&nbsp;<input type="submit" value="View details"></td></tr>';
          $i = $i + 1;
        }
        echo "<tr><td colspan=3>Total No. of Records : ".$result->num_rows."</td></tr></table>";
      } 
      else {
        echo "You are not registered.<br>So, Please Register first.";
      }
      $conn->close();
    ?>
  </body>
</html>