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

          <div id="addUG">
            <h3>Add Undergrad Site</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <label for="UGname">Site Name:</label><br>
              <input type="text" id="UGname" name="UGname"><br>

              <input type="checkbox" id="myce" name="myce" value="1">
              <label for="myce">MyClinicalExchange</label><br>
              <input type="checkbox" id="drugscreen" name="drugscreen" value="1">
              <label for="drugscreen">Drug Screen</label><br>
              <input type="checkbox" id="90daytb" name="90daytb" value="1">
              <label for="90daytb">90 Day TB</label><br>
              <input type="checkbox" id="2stepTB" name="2stepTB" value="1">
              <label for="2stepTB">2-Step TB</label><br>

              <label for="UGreq">Unique Requirements:</label><br>
              <textarea id="UGreq" name="UGreq" rows="4" cols="50"></textarea><br>
              <label for="UGstreet">Address:</label>
              <input type="text" id="UGstreet" name="UGstreet"><br>
              <label for="UGcity">City:</label>
              <input type="text" id="UGcity" name="UGcity"><br>
              <label for="UGstate">State:</label>
              <input type="text" id="UGstate" name="UGstate"><br>
              <label for="UGzip">ZIP:</label>
              <input type="text" id="UGzip" name="UGzip"><br>
              <br>
              <input type="submit" id="submit" name="submit">
            </form>
          </div>
          <br><br>
          
          <div id="addGrad">
            <h3>Add Graduate Site</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <label for="Gradname">Site Name:</label><br>
              <input type="text" id="GradName" name="GradName"><br>
              
              <input type="checkbox" id="gradmyce" name="gradmyce" value="1">
              <label for="gradmyce">MyClinicalExchange</label><br>
              <input type="checkbox" id="graddrugscreen" name="graddrugscreen" value="1">
              <label for="graddrugscreen">Drug Screen</label><br>
              <input type="checkbox" id="grad90daytb" name="grad90daytb" value="1">
              <label for="grad90daytb">90 Day TB</label><br>
              <input type="checkbox" id="grad2stepTB" name="grad2stepTB" value="1">
              <label for="grad2stepTB">2-Step TB</label><br>

              <label for="gradReq">Unique Requirements:</label><br>
              <textarea id="gradReq" name="gradReq" rows="4" cols="50"></textarea><br>
              <label for="gradStreet">Address:</label>
              <input type="text" id="gradStreet" name="gradStreet"><br>
              <label for="gradCity">City:</label>
              <input type="text" id="gradCity" name="gradCity"><br>
              <label for="gradState">State:</label>
              <input type="text" id="gradState" name="gradState"><br>
              <label for="gradzip">ZIP:</label>
              <input type="text" id="gradzip" name="gradzip"><br>
              <br>
              <input type="submit" id="submit" name="submit">
            </form>
          </div>
          <br><br>
          <div id="addAnnouncement">
            <h3>Add Announcement</h3>
            <form>
                <label for="Announcement">Announcement Title:</label><br>
                <input type="text" id="Announcement" name="Announcement"><br>
                <label for="AnnounceDesc">Description:</label><br>
                <textarea id="announceDesc" name="AnnonceDesc" rows="4" cols="50"></textarea><br>
            </form>
          </div>




          <?php
        //connect to the db schema
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "typhoon";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
    
        $ugName = isset($_POST['UGname']) ? $_POST['UGname'] : "";
        $ugmyce = isset($_POST['myce']) ? $_POST['myce'] : "";
        $ugdrugscreen = isset($_POST['drugscreen']) ? $_POST['drugscreen'] : "";
        $ug90daytb = isset($_POST['90daytb']) ? $_POST['90daytb'] : "";
        $ug2steptb = isset($_POST['2stepTB']) ? $_POST['2stepTB'] : "";
        $ugUniqueReqs = isset($_POST['UGreq']) ? $_POST['UGreq'] : "";
        $ugstreet = isset($_POST['UGstreet']) ? $_POST['UGstreet'] : "";
        $ugcity = isset($_POST['UGcity']) ? $_POST['UGcity'] : "";
        $ugstate = isset($_POST['UGstate']) ? $_POST['UGstate'] : "";
        $ugzip = isset($_POST['UGzip']) ? $_POST['UGzip'] : "";
        $uglevel = 'u';

        $gradName = isset($_POST['gradname']) ? $_POST['gradname'] : "";
        $gradmyce = isset($_POST['gradmyce']) ? $_POST['myce'] : "";
        $graddrugscreen = isset($_POST['graddrugscreen']) ? $_POST['drugscreen'] : "";
        $grad90daytb = isset($_POST['grad90daytb']) ? $_POST['90daytb'] : "";
        $grad2steptb = isset($_POST['grad2stepTB']) ? $_POST['2stepTB'] : "";
        $gradUniqueReqs = isset($_POST['gradreq']) ? $_POST['gradreq'] : "";
        $gradstreet = isset($_POST['gradstreet']) ? $_POST['gradstreet'] : "";
        $gradcity = isset($_POST['gradcity']) ? $_POST['gradcity'] : "";
        $gradstate = isset($_POST['gradstate']) ? $_POST['gradstate'] : "";
        $gradzip = isset($_POST['gradzip']) ? $_POST['gradzip'] : "";
    
        if(isset($_POST['site']) && $seriesName != ""){
            
            //insert into site table
            
            $sql = "INSERT INTO `site` (`sID`, `name`, `level`, `street`, `city`, `state`, `zip`, `myce`, `90daytb`, `2steptb`, `uniquereq`) VALUES (NULL, '$ugName', '$uglevel', '$ugstreet', '$ugcity', '$ugstate', '$ugzip', '$ugmyce', '$ug90daytb', '$ug2steptb', '$ugUniqueReqs')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>New record created successfully</p>";
            } 
            else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }


        }//end of isset if stmt
        
  $conn->close();      
    ?>
    </body>
</html>