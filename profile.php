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
                
            <!-- <div class="row tm-row tm-mb-45">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <img src="img/about-01.jpg" alt="Image" class="img-fluid">
                </div>
            </div> -->

            <?php
                if (isset($_GET['id'])) {
                    require('connect_db.php');
                    $query = "SELECT * FROM users WHERE id = {$_GET['id']}";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                        ?>
                        <div>
                            <h4>
                                <?= $user['name'] ?>
                            </h4>

                            <h5>
                                <?= $user['email'] ?>
                            </h5>
                            <?php 
                                if ($_GET['id'] == $_SESSION['id']) {
                                    echo "<a href='edit_profile.php?id={$_GET['id']}'> Edit Profile </a>";
                                }
                            ?>
                        </div>

                        <?php
                    } else {
                        echo "<h3> Profile Not Found. </h3>";
                    }
                }
            ?>

            

            <?php require(__dir__ . '/layouts/footer.php'); ?>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>