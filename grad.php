<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="typhoon.css">
        <title>Typhoon</title>
    </head>
    <body>

        <div id="logo">
            <h1><a href="index.php" style="text-decoration: none;">Typhoon</a></h1>
            
        </div>

        <div class="navbar">
            <a href="index.html">Home</a>
            <a href="requirements.html">Requirements</a>
            <div class="dropdown">
              <button class="dropbtn">Sites 
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="undergrad.html">Undergraduate</a>
                <a href="grad.html">Graduate</a>
              </div>
            </div>
            <a href="admin.html">Admin</a> 
          </div>

    <?php
    
          //connect to db schema
          $servername = 'localhost';
          $username = 'root';
          $password = "";
          $dbname = "typhoon";
      
          $conn = new mysqli($servername, $username, $password, $dbname);

          //execute the sql query
          $sql = "select name, level, myce, 2steptb, drugscreen, 90daytb, uniquereq
          from SITE
          where level = 'g' or
          level = 'b'"

          //display the sql result set in an html table
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            //output each result row
            
                echo "<table>";
                echo "<tr>";
                    echo "<th>Site Name</th>";
                    echo "<th>MyCE</th>";
                    echo "<th>2-Step TB</th>";
                    echo "<th>DrugScreen</th>";
                    echo "<th>90 Day TB</th>";
                echo "</tr>";
    
                while($row = $result->fetch_assoc()){
                        echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['myce'] . "</td>";
                            echo "<td>" . $row['2steptb'] . "</td>";
                            echo "<td>" . $row['drugscreen'] . "</td>";
                            echo "<td>" . $row['90daytb'] . "</td>";
                            echo "<td>" . $row['uniquereq'] . "</td>";
                        echo "</tr>";   
                } //end of while
            
                echo"</table>";
            } // end of if
        else{
            
            echo "<p>No results found.</p>";
        }
    
        $conn->close();
    ?>      
    </body>
</html>