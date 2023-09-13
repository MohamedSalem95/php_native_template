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
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            
            <div class="row tm-row">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <!-- Video player 1422x800 -->
                    <video width="954" height="535" controls class="tm-mb-40">
                        <source src="video/wheat-field.mp4" type="video/mp4">							  
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            

            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">

                        <?php
                        require('connect_db.php');

                        $id = $_GET['id'];

                        $query = "SELECT * FROM posts WHERE id = {$id}";

                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $post = mysqli_fetch_assoc($result);
                            echo "
                            <h2 class='pt-2 tm-color-primary tm-post-title'>{$post['title']}</h2>
                            <p class='tm-mb-40'>June 16, 2020 posted by Admin Nat</p>
                            <p> {$post['body']} </p>
                                
                                <span class='d-block text-right tm-color-primary'>Creative . Design . Business</span>
                            </div>
                            ";
                        } else {
                            echo '<p> Product Not Found. </p>';
                        }
                        // mysqli_close($conn);
                        ?>
                            
                        
                        <!-- Comments -->
                        <div>
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            <hr class="tm-hr-primary tm-mb-45"><?php
    $query = "SELECT * FROM comments WHERE post_id = {$id}";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
    
        while($comment = mysqli_fetch_assoc($result)) {
            ?>
            <div class='tm-comment tm-mb-45'>
                <figure class='tm-comment-figure'>
                    <img src='img/comment-1.jpg' alt='Image' class='mb-2 rounded-circle img-thumbnail'>
                    <figcaption class='tm-color-primary text-center'>Mark Sonny</figcaption>
                </figure>
            
                <div>
                    <p>
                        <?= $comment['body'] ?>
                    </p>                                               
                </div>                                
            </div>
            

        <?php
        }
    } else {
        echo '<p> No comments here yet consider adding one! </p>';
    }

    $comment = '';
    $comment_err = '';
    $form_vaild = true;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty($_POST['body'])) {
            $comment_err = 'Comment Body Required.';
            $form_vaild = false;
        } else {
            $comment = $_POST['body'];
            // $form_vaild = true;
        }

        if ($form_vaild) {
            // $stmt = mysqli_prepare('INSERT INTO products VALUES(?, ?, ?)');
            $query = "INSERT INTO comments (body, post_id)  VALUES( '{$comment}' , {$id})";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            // header("Location: post.php?id={$id}", true);
        }
    }


    
?><form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . "?id={$id}") ?>" class="mb-5 tm-comment-form" method="POST">
                                <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                                
                                <div class="mb-4">
                                    <textarea class="form-control" name="body" rows="6" placeholder="Comment Here.."></textarea>
                                    <p style="color: red;">
                                        <?= $comment_err ?>
                                    </p>
                                </div>
                                <div class="text-right">
                                    <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                                </div>                                
                            </form>                          
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            <li><a href="#" class="tm-color-primary">Visual Designs</a></li>
                            <li><a href="#" class="tm-color-primary">Travel Events</a></li>
                            <li><a href="#" class="tm-color-primary">Web Development</a></li>
                            <li><a href="#" class="tm-color-primary">Video and Audio</a></li>
                            <li><a href="#" class="tm-color-primary">Etiam auctor ac arcu</a></li>
                            <li><a href="#" class="tm-color-primary">Sed im justo diam</a></li>
                        </ul>
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                        <a href="#" class="d-block tm-mb-40">
                            <figure>
                                <img src="img/img-02.jpg" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">Duis mollis diam nec ex viverra scelerisque a sit</figcaption>
                            </figure>
                        </a>
                        <a href="#" class="d-block tm-mb-40">
                            <figure>
                                <img src="img/img-05.jpg" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">Integer quis lectus eget justo ullamcorper ullamcorper</figcaption>
                            </figure>
                        </a>
                        <a href="#" class="d-block tm-mb-40">
                            <figure>
                                <img src="img/img-06.jpg" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">Nam lobortis nunc sed faucibus commodo</figcaption>
                            </figure>
                        </a>
                    </div>                    
                </aside>
            </div>
            <?php require(__DIR__ . '/layouts/footer.php'); ?>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>