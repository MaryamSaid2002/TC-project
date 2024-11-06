<!DOCTYPE html>
<html>
<head>
    <title>
    <?php
        // Get the current file name without extension
        $current_page = basename($_SERVER['PHP_SELF'], ".php");
        
        // Capitalize the first letter and set the title
        echo ucfirst($current_page) . " - EFIX";
    ?>
</title>    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="lsogoo.png">
</head>
<body>
    <div class="navbar">
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
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">message:</label>
                    <input class="form-control" style="width: 100%;" type="text" id="name" name="name" placeholder="Enter your name" />
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" style="width: 100%;" type="email" id="email" name="email" placeholder="Enter your email" />
                </div>

                <div class="form-group">
                    <label for="photo">Upload a photo:</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                </div>

                <button class="myButton" type="submit" name="btn-add">Send - ارسال</button>

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

        // تفاصيل الصورة المرفوعة
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_size = $_FILES['photo']['size'];
        $photo_error = $_FILES['photo']['error'];

        // التأكد من عدم وجود أي خطأ في رفع الصورة
        if ($photo_error === 0) {
            // الحصول على المسار النهائي للصورة
            $photo_path = "uploads/" . $photo_name;

            // نقل الصورة المرفوعة إلى المسار المحدد
            move_uploaded_file($photo_tmp, $photo_path);

            // قم بإضافة بيانات المستخدم ومسار الصورة إلى قاعدة البيانات
            $ADD_DATA = $database->prepare("INSERT INTO users (name, Email, Country, Age, Password, Photo) VALUES (:name, :email, :country, :age, :password, :photo)");
            $ADD_DATA->bindParam(":name", $name);
            $ADD_DATA->bindParam(":email", $email);
            $ADD_DATA->bindParam(":photo", $photo_path);
            $ADD_DATA->execute();

            echo '<div class="green-bg">Done - تم الإرسال</div>';
            echo '<meta http-equiv="refresh" content="3">';
        } else {
            echo '<div class="red-bg">حدث خطأ أثناء رفع الصورة</div>';
        }
    }
    ?>
</body>
</html>
