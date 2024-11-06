<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<link rel="stylesheet" href="styles.css">
<link rel="icon" href="lsogoo.png">
<title>
    <?php
        // Get the current file name without extension
        $current_page = basename($_SERVER['PHP_SELF'], ".php");
        
        // Capitalize the first letter and set the title
        echo ucfirst($current_page) . " - EFIX";
    ?>
</title>
<style>
      @import url('https://fonts.googleapis.com/css2?family=Caveat&display=swap');

.navbar {
    background-color: #a8ad8d;
    padding: 10px;
    border-radius: 0 0 35px 35px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 4em;
    font-family: 'Caveat', cursive;
}

.navbar h3 {
    margin: 0;
    color: #281580;
    font-size: 24px;
    font-family: 'Caveat', cursive;
}

.custom-buttons {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-left: 20em;
    font-family: 'Caveat', cursive;
}

.custom-buttons button {
    background-color: #ffffff;
    border: none;
    color: #281580;
    padding: 20px 30px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: larger;
    font-family: 'Caveat', cursive;
}

.custom-buttons button:hover {
    background-color: #138496;
}

.image-container {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.image-container img {
    margin: 20px;
}
.textdive{
   font-size: small;
    margin: 160px;
    font-family: 'Caveat', cursive;
}
</style>
<div class="navbar">
    <img src="lsogoo.png" alt="logo" width="100" height="100">
    <div class="custom-buttons">
        <button onclick="window.location.href='home.php'">Home</button>
        <button onclick="window.location.href='stats.php'">Stats</button>
        <button onclick="window.location.href='search.php'">Search</button>
        <button onclick="window.location.href='logout.php'">LogOut</button>

    </div>
</div>
<div class="image-container">
    
    <div class="textdive">
    <h1 class="text">
    Hello, <?php echo $_SESSION['name']; ?>
        </h1>
    </div>
    <div>
        <img src="lsogoo.png" alt="Image" width="500" height="500">
    </div>
</div>

<?php 
}else{
     header("Location: admin.php");
     exit();
}
 ?>