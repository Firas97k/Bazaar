<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../layout/css/normalizer.css"/>
    <link rel="stylesheet" href="../layout/css/framework.css"/>
    <link rel="stylesheet" href="../layout/css/footer.css"/>
    <link rel="stylesheet" href="../layout/css/Login_css.css"/>
</head>
<body>
    
    <div class="logo text_center shadow"><h1>Bazaar</h1></div>
    <div class="box shadow">
        <!--left-->
        <div class="left ">

            <div class="choose">
                <h2 id="login" class="login float_left capitalize">log in</h2>
                <h2 id="signup" class="signup float_right capitalize">sign up</h2>
                <div class="clear"></div>
            </div>

            <!--form of login-->
            <form  id="login_form" class="loging_form"method="post" autocomplete="off">

                <label class="capitalize">username:</label>
                <input type="text" name="usernameLogin" pattern="^[\x20-\x7F]+$" title="only English" required/>

                <label class="capitalize">password:</label>
                <input type="password" name="passwordLogin" pattern="^[\x20-\x7F]+$" title="only English" required/>

                <input type="submit" name="Login" value="Log In" />
                <p class="forgot capitalize">i forgot password .. :(</p>

            </form>

            <!--form of sign up-->
            <form id="signup_form" class="signup_form" method="post" autocomplete="off">
            
                <label class="capitalize">username:</label>
                <input type="text" name="username" pattern="^[\x20-\x7F]+$" title="only English" required/>

                <label class="capitalize">email:</label>
                <input type="email" name="email" pattern="^[\x20-\x7F]+$" title="only English" required/>
            
                <label class="capitalize">password:</label>
                <input type="text" name="password" pattern="^[\x20-\x7F]+$" title="only English" required/>
                
                <input type="submit" name="Signup" value="Sign Up" />
                <p class="forgot capitalize">i forgot password .. :(</p>
            
            </form>
        </div>

        <!--right-->
        <div class="right">
            <h2 class="text_center container capitalize">i won't sell, <br /> just want to see</h2>
            <a href="http://localhost/PhpProject%D9%A1/Bazaar/Home/Home%20Page.php?setCounter=true" id="go" class="capitalize text_center">so, click here .. :)</a>
        </div>
    </div>
    
    <?php 
        // add footer which has coopyright
        include '../includes/templates/footer.php';
    ?>

    <script src="../layout/javascript/Login_js.js"></script>

</body>
</html>
<?php

// if he click profile and he didn't log in
if(isset($_GET['notLogin'])){
    echo "<script>"
    . "
    const notLogin = document.createElement('div');
    notLogin.className = 'warning';
    notLogin.textContent = 'Sorry, You Must Log In FIRST...';

    document.body.insertBefore(notLogin, document.body.children[1]);
    
    </script>";
    
}

// when page refreshed, remove this warning
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
if( $pageRefreshed == 1){
    echo "<script>"
    . "
    if(document.body.children[1].textContent == 'Sorry, You Must Log In FIRST...'){
        document.body.removeChild(document.body.children[1]);
    }
    </script>";
}


// set default value for status
session_start();
$_SESSION['status'] = 0;
?>
<!-- sign up ----------------------------------------------------------------  -->
<?php
if(isset($_POST["Signup"])){
    
    // connact to database
    include '../includes/classes/Database.php';
    $pdo = new Database('localhost', 'root', '', 'bazaar');
    $db = $pdo->startConnact();
    $pdo->setDeafultFetchAsObject($db);
    
    // Define variables and initialize with empty values
    $email = $username = $password = "";
    
    // set the variables, from sign up form
    $parameterEmail = trim($_POST['email']);
    $parameterUsername = trim($_POST['username']);
    $parameterPassword = trim($_POST['password']);
    
    // search if there are same username or email before insert

    // search in seller table 
    $searchInSellerSQLCode = 'SELECT seller_ID FROM seller WHERE username = ? OR email = ?';
    
    $stmtSearchInSeller = $db->prepare($searchInSellerSQLCode);
    $stmtSearchInSeller->execute([$parameterUsername, $parameterEmail]);
    $searchInSellerResult = $stmtSearchInSeller->fetch();
    
    // search in admin table
    $searchInAdminSQLCode = 'SELECT admin_ID FROM admin WHERE username = ? OR email = ?';
    
    $stmtSearchInAdmin = $db->prepare($searchInAdminSQLCode);
    $stmtSearchInAdmin->execute([$parameterUsername, $parameterEmail]);
    $searchInAdminResult = $stmtSearchInAdmin->fetch();
    
    // if really there are same username or email, show this message
    if($searchInSellerResult || $searchInAdminResult){
        
        echo "<script>"
        . "
            const notAcceptSign = document.createElement('div');
            notAcceptSign.className = 'notAccept';
            notAcceptSign.textContent = 'Sorry, Email Or Username Used, Write Other...';

            document.body.insertBefore(notAcceptSign, document.body.children[1]);
            </script>";
        
    } else { // if not, add new seller 
        $email = $parameterEmail;
        $username = $parameterUsername;
        $password = $parameterPassword;
        
        $addNewSellerSQLCode = 'INSERT INTO seller (email, username, password) VALUES (?, ?, ?)';
        
        $stmtAddNewSeller = $db->prepare($addNewSellerSQLCode);
        $stmtAddNewSeller->execute([$email, $username, $password]);
        
        if($stmtAddNewSeller){ // show this message if he sign up
            echo "<script>"
                . "
                const accept = document.createElement('div');
                accept.className = 'accept';
                accept.textContent = 'Welcome, Now You Can Log In...';

                document.body.insertBefore(accept, document.body.children[1]);
                </script>";
        } else { // show this message if there is error
            echo "<script>"
                . "
                const signup_error = document.createElement('div');
                signup_error.className = 'notAccept';
                signup_error.textContent = 'Sorry, Try Agian...';

                document.body.insertBefore(signup_error, document.body.children[1]);
                </script>";
        }
    } 
}
?>


<!-- log in ----------------------------------------------------------------  -->
<?php
if(isset($_POST["Login"])){
    
    // connact to database
    include '../includes/classes/Database.php';
    $pdo = new Database('localhost', 'root', '', 'bazaar');
    $db = $pdo->startConnact();
    $pdo->setDeafultFetchAsObject($db);
    
    // Define variables and initialize with empty values
    $username = $password = "";
    
    // set the variables, from login form
    $parameterUsername = trim($_POST['usernameLogin']);
    $parameterPassword = trim($_POST['passwordLogin']);
    
    // first, check if he sign up or not 

    // in seller table
    $checkSellerSignUpSQLCode = 'SELECT seller_ID FROM seller WHERE username = ?';
    
    $stmtCheckSellerSignUp = $db->prepare($checkSellerSignUpSQLCode);
    $stmtCheckSellerSignUp->execute([$parameterUsername]);
    $checkSellerSignUpResult = $stmtCheckSellerSignUp->fetch();
    
    // in sdmin table
    $checkAdminSignUpSQLCode = 'SELECT admin_ID FROM admin WHERE username = ?';
    
    $stmtCheckAdminSignUp = $db->prepare($checkAdminSignUpSQLCode);
    $stmtCheckAdminSignUp->execute([$parameterUsername]);
    $checkAdminSignUpResult = $stmtCheckAdminSignUp->fetch();
    
    if($checkSellerSignUpResult || $checkAdminSignUpResult){ // if he sign up, go next step, check password
        
        // second, check username and password in seller table
        $checkSellerPasswordSQLCode = 'SELECT seller_ID FROM seller WHERE username = ? AND password = ?';

        $stmtCheckSellerPassword = $db->prepare($checkSellerPasswordSQLCode);
        $stmtCheckSellerPassword->execute([$parameterUsername, $parameterPassword]);
        $checkSellerPasswordResult = $stmtCheckSellerPassword->fetch();
        
        // second, check username and password in admin table
        $checkAdminPasswordSQLCode = 'SELECT admin_ID FROM admin WHERE username = ? AND password = ?';

        $stmtCheckAdminPassword = $db->prepare($checkAdminPasswordSQLCode);
        $stmtCheckAdminPassword->execute([$parameterUsername, $parameterPassword]);
        $checkAdminPasswordResult = $stmtCheckAdminPassword->fetch();
        
        if($checkSellerPasswordResult || $checkAdminPasswordResult){ // if password currect, go to Homr Page

            // and store seller id in session
            $sellerID = $checkSellerPasswordResult->seller_ID;
            $_SESSION["sellerID"] = $sellerID;
            
            // set status of log in
            $setStatusSQLCode = 'UPDATE seller SET status = 1 WHERE seller_ID = ?';
            $stmtSetStatus = $db->prepare($setStatusSQLCode);
            $stmtSetStatus->execute([$sellerID]);
            
            $_SESSION['status'] = 1;
            
            // then, go to Home Page
            header("location: ../Home/Home Page.php?setCounter=true");
            
        } else {// if password wrong, show this message
            echo "<script>"
            . "
            const notAcceptLog = document.createElement('div');
            notAcceptLog.className = 'notAccept';
            notAcceptLog.textContent = 'Sorry, You Used Wrong Password...';

            document.body.insertBefore(notAcceptLog, document.body.children[1]);
            </script>";
        }
        
    } else { // if he didn't sign up, show this message
        echo "<script>"
            . "
            const notAcceptLog = document.createElement('div');
            notAcceptLog.className = 'notAccept';
            notAcceptLog.textContent = 'Sorry, You Must Sign Up FIRST...';

            document.body.insertBefore(notAcceptLog, document.body.children[1]);
            </script>";    
    }
    
}
?>