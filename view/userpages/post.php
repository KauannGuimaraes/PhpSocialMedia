<?php require_once '../model/postModel.php' ?>
<?php require_once '../model/userModel.php' ?>
<?php require_once '../controller/user.php' ?>
<?php require_once '../controller/post.php' ?>
<?php 
    $user = new User();
    $userDao = new UserDao();
    $post = new Post();
    $postDao = new PostDao();
    
    $user->setUserId($_SESSION['userIs']);
    $userData = $userDao->userData($user);
    foreach ($userData as $userData) {
        $myuserName = $userData['userName'];
        $myuserid = $userData['iduser'];
    }
    
    $post->setPostid($_GET['PostId']);
    $postData = $postDao->selectPost($post);
    foreach ($postData as $postData) {
        $title = $postData['postTitle'];
        $content = $postData['postContent'];
        $created = $postData['created_at'];
        $userName = $postData['userName'];
        $iduser = $postData['iduser'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.css">
        <style>
            .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    user-select: none;
            }
            @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                    }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">logo</a></li>
                            <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="explore.php" class="nav-link">Explorar</a></li>
                        </ul>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-light" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a href="user.php">
                            <button  class="btn btn-light" type="submit"><?php echo $myuserName?></button>
                        </a>
                    </div>
                </div>
            </header>
        </div>
        <main class="container">
            <div class="row mb-1">
                <div class="col-md-10">
                <hr>
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="row row-cols-auto">
                                <div class="col">
                                    <p class="mb-0 h3"><?php echo $title ?></p>
                                    <div class="mb-1 text-muted"><?php echo $created ?> | Por: <a href="otherUser.php?user=<?php echo $iduser ?>"><?php echo $userName ?></a></div>
                                </div>
                            </div>
                            <p class="card-text mb-auto"><?php echo $content ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>