<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xtra Blog</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
<!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>
<body>
	<?php require(__DIR__ . '/layouts/header.php'); ?>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
                
            <div class="row tm-row tm-mb-45">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <img src="img/about-01.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
            <?php
            $email = $password = '';
            $email_err = $password_err = '';
            $form_valid = true;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($_POST['email'])) {
                    $email_err = 'Email can\'t be empty.';
                    $form_valid = false;
                } else {
                    $email = $_POST['email'];
                }

                if (empty($_POST['password'])) {
                    $password_err = 'Password can\'t be empty.';
                    $form_valid = false;
                } else {
                    $password = $_POST['password'];
                }

                if ($form_valid) {
                    // register user here
                    require('connect_db.php');
                    $query = "SELECT * FROM users WHERE email = '$email' limit 1";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                        if (password_verify($password, $user['password'])){
                            require('login.php');
                            login_user($user['name'], $user['id']);
                            header('Location: http://127.0.0.1/extra_blog');
                        } else {
                            header('Location: http://127.0.0.1/extra_blog/login.php?msg="Invalid username or password"');
                        }
                    } else {
                        header('Location: http://127.0.0.1/extra_blog/login.php?msg="Invalid username or password"');
                    }
                    
                }
            }

            ?>
            <div class="form">
                <h4> Login </h4>
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email ..." value="<?= $email ?>">
                        <p style="color: red;">
                            <?= $email_err ?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password ..." value="<?= $password ?>">
                        <p style="color: red;">
                            <?= $password_err ?>
                        </p>
                    </div>

                    

                    <input type="submit" value="Login" class="tm-btn tm-btn-primary tm-btn-small">
                </form>
            </div>
            <?php require(__dir__ . '/layouts/footer.php'); ?>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>