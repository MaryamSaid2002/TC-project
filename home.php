
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
    text-align: center;
    direction: rtl;


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
<div class="image-container">
    <div class="textdive">
    <h1 class="text">
            مرحباً بكم في الموقع الرسمي لخدمات صيانة أجهزة المؤسسات التعليمية الحكومية<br>
            نقدم حلول صيانة متطورة للأجهزة الإلكترونية والتقنية في القطاع الحكومي<br>
            فريقنا المتخصص يتمتع بخبرة طويلة في صيانة أجهزة التعليم الحكومية<br>
            نلتزم بالحفاظ على كفاءة تشغيل الأجهزة لضمان استمرارية التعليم<br>
            تواصلوا معنا بسهولة لتلبية احتياجات الصيانة والدعم الفني بكفاءة<br>
            نهدف إلى تقديم خدمات حكومية موثوقة تضمن أداء الأجهزة بأعلى جودة
        .</h1>
    </div>
    <div>
        <img src="img.png" alt="Image" width="500" height="500">
    </div>
</div>

<?php 
