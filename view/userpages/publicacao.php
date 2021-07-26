<?php require_once '../model/userModel.php'; ?>
<?php require_once '../model/postModel.php'; ?>
<?php require_once '../controller/user.php'; ?>
<?php 
    $userDao = new UserDao();
    $postDao = new PostDao();
    $user = new User();
    $user->setUserId($_SESSION['userIs']);
    
    $userData = $userDao->userData($user);
    foreach ($userData as $userData) {
        $iduser = $userData['iduser'];
        $userName = $userData['userName'];
        $userCreated = $userData['created_at'];
        $userDescription = $userData['userDescription'];
    }
    $postCount = $postDao->countPost($iduser);
    foreach ($postCount as $postCount){
        $countPost = $postCount['count(*)'];
    }
    $postSelectAll = $postDao->selectAllPosts($iduser);
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
                            <form action="../controller/postExecute.php" method="POST">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Texto</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                                </div><br>
                                <input type="hidden" name="userid" value="<?php echo $iduser ?>">
                                <button type="submit" class="btn btn-primary" name="tipo" value="create">Publicar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <p class="h4">Suas publicações</p>
            <div class="row mb-1">
                <div class="col-md-10">
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
                                <div class="col">
                                    <form action="../controller/postExecute.php" method="POST">
                                        <input type="hidden" name="idpost" value="<?php echo $postSelectAll['idpost'] ?>">
                                        <button class="btn btn-light" type="submit" name="tipo" value="delete"><img src="open-iconic-master/svg/delete.svg" alt="icon name" width="20" height="20"> Deletar publicação</button>
                                    </form>
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