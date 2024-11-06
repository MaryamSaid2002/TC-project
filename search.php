<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<link rel="icon" href="lsogoo.png">
<title>
    <?php
        // Get the current file name without extension
        $current_page = basename($_SERVER['PHP_SELF'], ".php");
        echo ucfirst($current_page) . " - EFIX";
    ?>
</title>
<style>
    body {
        font-family: 'Caveat', cursive;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

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
        width: 100%;
    }

    .custom-search-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: 20em;
    }

    .custom-search-bar input {
        display: inline-block;
        width: 400px;
        border-radius: 5px;
        padding: 10px;
    }

    .custom-search-bar button {
        background-color: #ffffff;
        border: none;
        color: #281580;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-search-bar button:hover {
        background-color: #138496;
    }

    /* Flex container to arrange cards side by side and centered */
    .results-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center; /* Center the cards horizontally */
    }

    .card {
        max-width: 18rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
        flex: 1 1 18rem; /* grow and shrink as needed */
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }

    .card-header {
        background-color: #dc3545;
        color: #fff;
        padding: 10px;
        border-radius: 8px 8px 0 0;
        font-weight: bold;
        text-align: center;
    }

    .card-body {
        padding: 10px;
        text-align: center;
    }

    .card-body p {
        margin-bottom: 10px;
    }

    /* Hover effect: change color from red to green */
    .card-header:hover {
        background-color: #28a745;
    }
</style>

<div class="navbar">
<a href="admin.php"><img src="lsogoo.png" alt="logo" width="100" height="100"></a>
    <form method="GET" action="">
        <div class="custom-search-bar">
            <input class="form-control" type="text" name="search" placeholder="Search ...." />
            <button class="btn btn-outline-primary" type="submit" name="btn-search">Search - بحث</button>
        </div>
    </form>
</div>

<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=msw;", $username, $password);


if (isset($_POST['update_stats'])) {
    $id = $_POST['user_id'];
    $status = $_POST['status'];

    $UPDATE_STATS = $database->prepare("UPDATE users SET Stats = :status WHERE id = :id");
    $UPDATE_STATS->bindParam(':status', $status);
    $UPDATE_STATS->bindParam(':id', $id);
    $UPDATE_STATS->execute();

    echo "<script>alert('تم تحديث الحالة بنجاح!');</script>";
}

if (isset($_GET['btn-search'])) {
    $SEARCH = $database->prepare("SELECT * FROM users WHERE name LIKE :value OR Country LIKE :value OR Password LIKE :value");
    $SEARCH_VALUE = "%" . $_GET['search'] . "%";
    $SEARCH->bindParam("value", $SEARCH_VALUE);
    $SEARCH->execute();

    echo '<div class="results-container">'; // Start of the flex container
    foreach ($SEARCH as $data) {
        echo '
        <div class="card">
            <div class="card-header">' . $data['name'] . ' - ' . $data['Country'] . '</div>
            <div class="card-body">
                <h3>نوع الجهاز</h3>
                <p>' . $data['email'] . '</p>
                <h3>تفاصيل الجهاز</h3>
                <p>' . $data['Age'] . '</p>
                
                <form method="POST" action="">
                    <input type="hidden" name="user_id" value="' . $data['id'] . '">
                    <label for="status">الحالة:</label>
                    <select name="status">
                        <option value="انتهى" ' . ($data['Stats'] == 'انتهى' ? 'selected' : '') . '>انتهى</option>
                        <option value="لم ينتهي" ' . ($data['Stats'] == 'لم ينتهي' ? 'selected' : '') . '>لم ينتهي</option>
                    </select>
                    <button type="submit" name="update_stats" class="myButton">تحديث الحالة</button>
                </form>
            </div>
        </div>';
    }
    echo '</div>'; // End of the flex container
}
?>

<?php 
}else{
     header("Location: search.php");
     exit();
}
?> 
