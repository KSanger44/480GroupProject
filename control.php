<!DOCTYPE html>
<html>
    <?php
      echo readfile("webdict.txt");
      
    ?>
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
            <form>
              <label for="UGname">Site Name:</label><br>
              <input type="text" id="UGname" name="UGname"><br>
              <label for="UGreq">Unique Requirements:</label><br>
              <textarea id="UGreq" name="UGreq" rows="4" cols="50"></textarea><br>
              <label for="UGstreet">Address:</label><br>
              <input type="text" id="UGstreet" name="UGstreet">
              <label for="UGcity">City:</label><br>
              <input type="text" id="UGcity" name="UGcity">
              <label for="UGstate">State:</label><br>
              <input type="text" id="UGstate" name="UGstate">
              <br>
              <input type="submit" id="submit" name="submit">
            </form>
          </div>
          <br><br>
          <div id="addGrad">
            <h3>Add Graduate Site</h3>
            <form>
              <label for="Gradname">Site Name:</label><br>
              <input type="text" id="GradName" name="GradName">
              <label for="GradReq">Unique Requirements:</label><br>
              <textarea id="GradReq" name="GradReq" rows="4" cols="50"></textarea><br>
              <label for="GradStreet">Address:</label><br>
              <input type="text" id="GradStreet" name="GradStreet">
              <label for="GradCity">City:</label><br>
              <input type="text" id="GradCity" name="GradCity">
              <label for="GradState">State:</label><br>
              <input type="text" id="GradState" name="GradState">
              <br>
              <input type="submit" id="submit" name="submit">
            </form>
          </div>
          <br><br>
          <div id="addAnnouncement">
            <h3>Add Announcement</h3>
            <form>
                <label for="Announcement">Announcement Title:</label><br>
                <input type="text" id="Announcement" name="Announcement">
                <label for="AnnounceDesc">Description:</label><br>
                <textarea id="announceDesc" name="AnnonceDesc" rows="4" cols="50"></textarea><br>
            </form>
          </div>
    </body>
</html>