<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<center><img src="Image.png" alt="Avatar" class="avatar" width = "50" height = "400"></center>
<center><h2>Electronic VOting System</h2></center>

<center>
<button onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Propose Candidacy</button>
<button onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Vote</button>
<button onclick="document.getElementById('id05').style.display='block'" style="width:auto;">View Results</button>
</center>

<div id="id03" class="modal">
  
  <form class="modal-content animate" action="candidacy.php" method="post" enctype ="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Image.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        
        <label for="candidateId"><b>CandidateID</b></label>
        <input type="text" placeholder="Enter Username" name="candidateId" required>
        <!-- 
        <br/>
        <label for="image">Select image:</label>
        <input type="file" placeholder="Upload Image" name="image" id="image" />  -->
      <button type="submit" name ="insert">Submit</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<div id="id05" class="modal">
  
    <form class="modal-content animate" action="/action_page.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="Image.png" alt="Avatar" class="avatar">
      </div>
  
      <div class="container">
        
        <button type="submit">OK</button>
      </div>
  
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>

  <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>
  
  <div id="id04" class="modal">

    <?php
      $host = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "evm";

        // Create connection
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

      $sql = "SELECT id,candidateId FROM candidates";
      $result = mysqli_query($conn, $sql);
    ?>
    
      <form class="modal-content animate" action="voting.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="Image.png" alt="Avatar" class="avatar">
        </div>
    
        <div class="container">
          <label for="vote"><b>Please click on the radio button next to the candidate you want to vote</b></label><br>
          <?php
            if (mysqli_num_rows($result) != 0) { 
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                $field1name = $row["id"];
                $field2name = $row["candidateId"];
                  
                  echo '<tr>
                          <td>'.$field1name.'</td>
                          <td>'.$field2name.'</td>
                          <input type="radio" name="vote" value='.$field2name.'>
                          <br/>
                        </tr>' ;
              }
            } else {
                echo "0 results";
            }

          ?>
          <button type="submit">Vote</button>
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
      </form>
    </div>
  

    <script>
        // Get the modal
        var ProposeCandidacy = document.getElementById('id03');
        var Vote = document.getElementById('id04');
        var ViewResults = document.getElementById('id04');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == ProposeCandidacy) {
                ProposeCandidacy.style.display = "none";
            }
            else if(event.target == Vote){
                Vote.style.display = "none";
            }
            else if(event.target == ViewResults){
                ViewResults.style.display = "none" ;
            }
        }
      </script>

</body>
</html>
