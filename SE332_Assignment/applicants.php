<?php
session_start();
include_once "assets/php/connection.php";

if (!isset($_SESSION ['username'])){
    header("location: Login.html");
    exit();
}



$sql = "SELECT * FROM `form`; ";
$result = $conn->query($sql);

?>

<html>

<head>
    <link rel="stylesheet" href="assets/css/Applicants.css">
    <title>Admin Login</title>
    <style>
        /* Add some basic styling for better presentation */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        .user-container {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            display: inline-block;
        }

        img {
            height: 100px;
            width: 100px;
            border-radius: 50%; /* Make the image round */
        }
    </style>
</head>

<body>
    <header>
        <span>BRTA Website Admin Dashboard</span>
        <form action="Logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </header>
    
<!-- User information div -->
<?php 
    while($row = $result->fetch_assoc()){
?>
<div class="user-container">
    <img src="assets/php/<?php echo $row["profile_pic"]?>" alt="User Image">
    <h2>Name: <?php echo $row["name"]?></h2>
    <p>ID: <?php echo $row["id"]?></p>
    <p> PresentAddress: <?php echo $row["presentAddress"]?></p>
</div>
<?php
    }
?>
    
</body>

</html>