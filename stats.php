<?php
// هنا نبدأ كتابة الـ HTML
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300..700&display=swap" rel="stylesheet">
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
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
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

    .textdive {
        font-size: small;
        margin: 160px;
        font-family: 'Caveat', cursive;
        text-align: center;
        direction: rtl;
    }

    
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding-top: 100px; /* تعويض شريط التنقل الثابت */
    }

    /* تخصيص نموذج البحث */
    .form-container {
        background-color: white;
        padding: 30px;
        box-shadow: 0px 0px 10px 0px #000;
        text-align: center;
        border-radius: 10px;
        width: 300px;
        position: absolute;
        bottom: 50px; /* وضع النموذج في أسفل الصفحة */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input {
        padding: 10px;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .myButton {
        background-color: #4CAF50;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
    }

    .myButton:hover {
        background-color: #45a049;
    }

    .result {
        margin-top: 20px;
        font-size: 18px;
        color: #333;
    }

    .error {
        color: red;
        font-size: 16px;
    }
</style>


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


<div class="form-container">
    <h2>حالة التقرير</h2>
    <form method="POST">
        <div class="form-group">
            <label for="password"> اكتب الرقم الذي تم تسجيلة مع الطلب </label>
            <input type="text" id="password" name="password" placeholder="أدخل الرقم" required>
        </div>
        <button class="myButton" type="submit" name="btn-search">بحث</button>
    </form>

    <?php
    $username = "root";
    $password_db = "";  // كلمة المرور الخاصة بقاعدة البيانات
    try {
        $database = new PDO("mysql:host=localhost;dbname=msw;", $username, $password_db);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo '<div class="error">خطأ في الاتصال بقاعدة البيانات: ' . $e->getMessage() . '</div>';
    }

    // التحقق من طلب البحث
    if (isset($_POST['btn-search'])) {
        $input_password = $_POST['password'];

        // البحث عن كلمة المرور المدخلة في قاعدة البيانات
        $query = $database->prepare("SELECT Stats FROM users WHERE Password = :password");
        $query->bindParam(":password", $input_password);
        $query->execute();

        // التحقق من وجود نتائج
        if ($query->rowCount() > 0) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            echo '<div class="result">حاله الاصلاح: ' . $result['Stats'] . '</div>';
        } else {
            echo '<div class="error">كلمة المرور غير موجودة</div>';
        }
    }
    ?>
</div>

</body>
</html>
