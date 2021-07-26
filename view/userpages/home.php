<?php require_once '../model/postModel.php' ?>
<?php require_once '../model/userModel.php' ?>
<?php require_once '../controller/user.php' ?>
<?php 
    $user = new User();
    $userDao = new UserDao();
    $postDao = new PostDao();
    $user->setUserId($_SESSION['userIs']);
    $userData = $userDao->userData($user);
    $userFollows = $userDao->searchFollower($user);
    $userFollowsContent = $userDao->searchFollowedContent($user);
    foreach ($userData as $userData) {
        $userName = $userData['userName'];
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
                            <button  class="btn btn-light" type="submit"><?php echo $userName?></button>
                        </a>
                    </div>
                </div>
            </header>
        </div>
        <main class="container">
            <div class="row mb-0">
                <div class="col col-md-10">
                    <hr>
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-2 d-flex flex-column position-static">
                            <div class="row row-cols-auto">
                                <div class="col- col-md-10">
                                    <fieldset>
                                        <a href="publicacao.php">
                                            <input type="text" class="form-control" placeholder="Crie uma publicação">
                                        </a>
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <a href="publicacao.html"><button class="btn btn-primary">criar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="h4">Assinaturas: <?php foreach ($userFollows as $userFollows){ echo $userFollows['userName'].",";} ?></p>
            <div class="row mb-1">
                <div class="col-md-10">
                    <?php foreach ($userFollowsContent as $userFollowsContent) { ?>
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="row row-cols-auto">
                                <div class="col">
                                    <div class="col">
                                        <p class="mb-0 h3"><?php echo $userFollowsContent['postTitle'] ?></p>
                                        <div class="mb-1 text-muted"><?php echo $userFollowsContent['created_at'] ?> | Por: <a href="otherUser.php?user=<?php echo $userFollowsContent['iduser'] ?>"><?php echo $userFollowsContent['userName'] ?></a></div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-auto"><?php echo $userFollowsContent['postContent'] ?></p>
                            <a href="post.php?PostId=<?php echo $userFollowsContent['idpost'] ?>">Continue reading</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </main>
    </body>
</html>