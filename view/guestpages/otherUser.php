<?php require_once '../model/userModel.php'; ?>
<?php require_once '../model/postModel.php'; ?>
<?php require_once '../controller/user.php'; ?>
<?php 
    $user2 = new User();
    $userDao = new UserDao();
    $postDao = new PostDao();
    
    $user2->setUserId($_GET['user']);
    
    $user2Data = $userDao->userData($user2);
    if ($user2Data == NULL) {
        header("Location:home.php");
    }
    foreach ($user2Data as $user2Data) {
        $user2Id = $user2Data['iduser'];
        $user2Name = $user2Data['userName'];
        $user2Created = $user2Data['created_at'];
        $user2Description = $user2Data['userDescription'];
    }
    
    $post2Count = $postDao->countPost($user2Id);
    foreach ($post2Count as $post2Count){
        $count2Post = $post2Count['count(*)'];
    }
    
    $postSelectAll = $postDao->selectAllPosts($_GET['user']);
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
                        <a href="login.php">
                            <button  class="btn btn-light" type="submit">Log in</button>
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
                                    <p class="h4"><?php echo $user2Name?></p>
                                    <div class="mb-1 text-muted">Usuario registrado em: <?php echo $user2Created ?></div>
                                    <p class="h4"><?php echo $user2Description ?></p>
                                    <p class="h4">Postagens: <?php echo $count2Post ?></p>
                                </div>
                                <div class="col">
                                    <a href="login.php" class="btn">Assinar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="h4">publicações</p>
            <div class="row mb-1">
                <div class="col-md-10">
                    <hr>
                    <?php foreach ($postSelectAll as $postSelectAll) { ?>
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="row row-cols-auto">
                                <div class="col">
                                    <h3 class="mb-0"><?php echo $postSelectAll['postTitle'] ?></h3>
                                    <div class="mb-1 text-muted"><?php echo $postSelectAll['created_at'] ?></div>
                                </div>
                            </div>
                            <div class="row row-cols-auto">
                                <div class="col">
                                    <p class="card-text mb-auto"><?php echo $postSelectAll['postContent'] ?></p>
                                </div>
                            </div>
                            <div class="row row-cols-auto">
                                <div class="col">
                                    <a href="post.php?PostId=<?php echo $postSelectAll['idpost'] ?>">Continue reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </main>
    </body>
</html>

