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

          <div id="addSite">
            <h3>Add Site</h3>
            <form action="" method="post">
              <label for="name">Site Name:</label><br>
              <input type="text" id="name" name="name"><br>

              <input type="checkbox" id="myce" name="myce" value="1">
              <label for="myce">MyClinicalExchange</label><br>
              <input type="checkbox" id="drugscreen" name="drugscreen" value="1">
              <label for="drugscreen">Drug Screen</label><br>
              <input type="checkbox" id="90daytb" name="90daytb" value="1">
              <label for="90daytb">90 Day TB</label><br>
              <input type="checkbox" id="2stepTB" name="2stepTB" value="1">
              <label for="2stepTB">2-Step TB</label><br>
              
              <label for="level">Level:</label>
              <select id="level" name="level">
                <option value="u">Undergraduate</option>
                <option value="g">Graduate</option>
                <option value="b">Both</option>
              </select><br>

              <label for="reqs">Unique Requirements:</label><br>
              <textarea id="reqs" name="reqs" rows="4" cols="50"></textarea><br>
              <label for="street">Address:</label>
              <input type="text" id="street" name="street"><br>
              <label for="city">City:</label>
              <input type="text" id="city" name="city"><br>
              <label for="state">State:</label>
              <input type="text" id="state" name="state"><br>
              <label for="zip">ZIP:</label>
              <input type="text" id="zip" name="zip"><br>
              <br>
              <input type="submit" id="submit" name="submit">
            </form>
          </div>
          <br><br>
          

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
        include("typhoonconfig.php");
        session_start();
    
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
    
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $myce = isset($_POST['myce']) ? $_POST['myce'] : "";
        $drugscreen = isset($_POST['drugscreen']) ? $_POST['drugscreen'] : "";
        $tb90day = isset($_POST['90daytb']) ? $_POST['90daytb'] : "";
        $tb2step = isset($_POST['2stepTB']) ? $_POST['2stepTB'] : "";
        $reqs = isset($_POST['reqs']) ? $_POST['reqs'] : "";
        $street = isset($_POST['street']) ? $_POST['street'] : "";
        $city = isset($_POST['city']) ? $_POST['city'] : "";
        $state = isset($_POST['state']) ? $_POST['state'] : "";
        $zip = isset($_POST['zip']) ? $_POST['zip'] : "";
        $level = isset($_POST['level']) ? $_POST['level'] : "";


    
        if(isset($_POST['site']) && $name != ""){
            
            //insert into site table
            
            $sql = "INSERT INTO `site` (`sID`, `name`, `level`, `street`, `city`, `state`, `zip`, `myce`, `90daytb`, `2steptb`, `uniquereq`) 
                                VALUES (NULL, '$name', '$level', '$street', '$city', '$state', '$zip', '$myce', '$tb90day', '$tb2step', '$reqs')";

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