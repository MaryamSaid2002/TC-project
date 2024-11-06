<link rel="stylesheet" href="styles.css">
<link rel="icon" href="logoo.png">
<title>
    <?php
        // Get the current file name without extension
        $current_page = basename($_SERVER['PHP_SELF'], ".php");
        
        // Capitalize the first letter and set the title
        echo ucfirst($current_page) . " - EFIX";
    ?>
</title><div class="navbar">
    <img src="lsogoo.png" alt="logo" width="100" height="100">
    <div class="custom-buttons">
    <button onclick="window.location.href='home.php'">الصفحة الرئيسية</button>
        <button onclick="window.location.href='apply.php'">اضافة تقرير</button>
        <button onclick="window.location.href='Stats.php'">الحالة</button>
        <button onclick="window.location.href='connect.php'">تواصل معنى</button>
        <button onclick="window.location.href='index.php'">تسجيل دخول</button>


    </div>
</div>

<div class="centered-form">
    <div class="form-container">
        <img src="lsogoo.png" alt="Logo">
        <form method="POST">
            <div class="form-group">
                <label for="name">اسم المؤسسة او المدرسة</label>
                <input class="form-control" style="width: 100%;" type="text" id="name" name="name" placeholder="اسم المؤسسة" />
            </div>

            <div class="form-group">
                <label for="email">نوع الجهاز</label>
                <input class="form-control" style="width: 100%;" type="text" id="email" name="email" placeholder="نوع الجهاز" />
            </div>

            <div class="form-group">
                <label for="age">تفاصيل الجهاز</label>
                <input class="form-control" style="width: 100%;" type="text" id="age" name="age" placeholder="اكتب تفاصيل الجهاز" />
            </div>

            <div class="form-group">
                <label for="country">موعد التسليم</label>
                <select class="form-control" style="width: 100%;" id="country" name="country">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="password">رقم التواصل</label>
                <input class="form-control" style="width: 100%;" type="password" id="password" name="password" placeholder="Enter your password" />
            </div>

            <button class="myButton" type="submit" name="btn-add">Add - إضافة</button>

        </form>
    </div>
</div>

<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=msw;", $username, $password);

if (isset($_POST['btn-add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $ADD_DATA = $database->prepare("INSERT INTO users (name, Email, Country, Age, Password) VALUES (:name, :email, :country, :age, :password)");
    $ADD_DATA->bindParam(":name", $name);
    $ADD_DATA->bindParam(":email", $email);
    $ADD_DATA->bindParam(":country", $country);
    $ADD_DATA->bindParam(":age", $age);
    $ADD_DATA->bindParam(":password", $password);
    $ADD_DATA->execute();

    echo '<script>
        document.body.innerHTML = \'<div class="green-bg">Done - تم الإرسال</div>\';
        setTimeout(function() {
            window.location.href = "home.php";
        }, 3000);
    </script>';
}
?>
