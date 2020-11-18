
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../layout/css/normalizer.css" />
    <link rel="stylesheet" href="../layout/css/framework.css"/>
    <link rel="stylesheet" href="../layout/css/navegation_css.css"/>
    <link rel="stylesheet" href="../layout/css/footer.css"/>
    <link rel="stylesheet" href="../layout/css/go up_css.css"/>
    <link rel="stylesheet" href="../layout/css/Contact Us_css.css"/>
</head>
<body>

    <?php 
        // navegation
        include '../includes/templates/navegation.php';
    ?> 

    <!-- start thanks-->
    <div class="thanks">
        <h1 class="text_center">thank you to use our website <br/> we hope you enjoy</h1>

        <h2 class="text_center">for Any question,<br/> inquiry or complaint</h2>
    </div>

    <!-- end thanks -->
    <!-- start cuntact us -->
    
    <div class="contact">
        <form method="post">
    
            <label class="name">Name:</label>
            <input type="text" name="name">
    
    
            <label class="email">E-mail:</label>
            <input type="email" name="email">
    
    
            <label class="message">Message:</label>
            <textarea rows="4" name="message"></textarea>
    
    
            <input type="submit" value="Send" name="sent"/>
    
        </form>
    </div>
    
    <!-- end contact us-->
    
    <?php 
        // add footer which has coopyright
        include '../includes/templates/footer.php';
        // add button to go up
        include '../includes/templates/go up.php';
    ?>
        
    
    <script src="../layout/javascript/Contact Us_js.js"></script>
    <script src="../layout/javascript/navegation.js"></script>
    <script src="../layout/javascript/go up_js.js"></script>
</body>
</html>

<?php

if(isset($_POST['sent'])){
    
        $name = '';
        $emailX= '';
        $message= '';

            // connact to database
            include '../includes/classes/Database.php';
            $pdo = new Database('localhost', 'root', '', 'test');
            $db = $pdo->startConnact();
            $pdo->setDeafultFetchAsObject($db);

            // Define variables and initialize with empty values

            $name = $_POST['name'];
            $emailX = $_POST['email'];
            $message = $_POST['message'];

            $sql = 'INSERT INTO contact (name , email , message) VALUES (?,?,?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([$name, $emailX, $message]);
}
        
        ?>