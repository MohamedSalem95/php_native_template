<?php
    /*if (isset($_GET['id'])) {
        if ($_GET['id'] != $_SESSION['id']) {
            header('Location: index.php');
        }
    } else {
        die('No Id Provided');
    }*/
?>

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

        <h4> Edit Profile </h4>
                
           
            <?php
            if (isset($_GET['id'])) {
                $no_profile = false;
                require('connect_db.php');
                $query = "SELECT * FROM users WHERE id = {$_GET['id']}";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                        $name = $user['name'];
                        $email = $user['email'];
                }
                else {
                    $no_profile = true;
                    echo "<h4> Profile Not Found. </h4>";
                }
           
            }
            
            $name_err = $email_err = '';
            
            $form_valid = true;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $email = '';
                if (empty($_POST['name'])) {
                    $name_err = 'Name can\'t be empty.';
                    $form_valid = false;
                } else {
                    $name = $_POST['name'];
                }

                if (empty($_POST['email'])) {
                    $email_err = 'Email can\'t be empty.';
                    $form_valid = false;
                } else {
                    $email = $_POST['email'];
                }

                if ($form_valid) {
                    $query = "UPDATE users SET name='$name', email='$email' WHERE id = {$_GET['id']}";
                    mysqli_query($conn, $query);
                    header('Location: profile.php?id=' . $_GET['id']);
                    
                }
            }
        

            ?>
<?php if(!$no_profile) { ?>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $_GET['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name ..." value="<?= $name ?>">
                        <p style="color: red;">
                            <?= $name_err ?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email ..." value="<?= $email ?>">
                        <p style="color: red;">
                            <?= $email_err ?>
                        </p>
                    </div>

                    <input type="submit" value="Save" class="tm-btn tm-btn-primary tm-btn-small">
                </form>
                <?php } ?>


           
            </div>
            <?php require(__dir__ . '/layouts/footer.php'); ?>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>