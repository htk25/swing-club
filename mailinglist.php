<?php 
ini_set('session.save_path', '../sessions/');
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggestion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Lato" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" sizes="144x144" href="images/apple-icon-144x144.png">
</head>

<body id="myPage">
    <?php include_once("php/analyticstracking.php"); ?>
    <?php 
    include 'php/nav.php';
    require_once 'php/config.php'; 
    $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    ?>
    <div class="container-fluid">
        <h1>Mailing List</h1>
        
        <?php
        
        if(isset($_SESSION['user'])){
         
            echo "<a href='getemails.php'><p>Click to download to spreadsheet</p></a>";
            $sql = 'SELECT * from Mailinglist;';
                   
            
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
				    
                    print("<div class = item>");
                    
                    
                    $name = $row['name'];
                    $date = $row['date_created'];
                    $email = $row['email'];
                    
                    print("<h3 class='headerDate'>Name: $name</h3><span class = 'delete'>$date</span>");
                    
                    
                    print("<p>Email: $email</p>");
   
  		
				    print("</div>"); 
            }
            
       
        
        }
        
        else{
        ?>
 
        
        <p>You must be logged in as an admin to use this feature!</p>
        
        
        
        
        <?php } ?>
        
        
        
        
    </div>
    <footer id="footer" class="container-fluid text-center">
        <?php include 'php/footer.php'; ?>
    </footer>

</body>

</html>