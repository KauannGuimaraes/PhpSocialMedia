<?php require_once '../model/postModel.php'; ?>
<?php require_once 'post.php'?>
<?php
    $post = new Post();
    $postDao = new PostDao();
    switch ($_REQUEST['tipo']) {
    case 'delete' : 
        $post->setPostid($_POST['idpost']);
        $postDao->deletePost($post);
        header("Location:../view/publicacao.php");
        break;
    case 'create' :
            $post->setTitle($_POST['title']);
            $post->setContent($_POST['content']);
            $post->setUserid($_POST['userid']);
            $postDao->insertPost($post);
            header("Location:../view/publicacao.php");
        break;
    }
    
    ?>
    
    

