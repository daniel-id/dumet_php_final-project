<?php 
ob_start();
session_start();
if(!isset($_SESSION['admin_id'])) header("location:login.php");
include '../includes/config.php';
include '../function/function.php';
?>
<!DOCTYPE html>
<html>
<?php include("include/head.php") ?>
<body>
    <div id="wrapper">
        <?php echo $_SESSION['admin_id'];
         ?>
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["category"])) include("page/blog/category.php");
            else if (isset($_GET["category-delete"])) include("page/blog/category-delete.php");
            else if (isset($_GET["category-update"])) include("page/blog/category-update.php");
            else if (isset($_GET["post"])) include("page/blog/post.php");
            else if (isset($_GET["post-delete"])) include("page/blog/post-delete.php");
            else if (isset($_GET["post-update"])) include("page/blog/post-update.php");
            else if (isset($_GET["comment"])) include("page/blog/comment.php");
            else if (isset($_GET["comment-delete"])) include("page/blog/comment-delete.php");
            else if (isset($_GET["comment-update"])) include("page/blog/comment-update.php");
            else if (isset($_GET["comment-approve"])) include("page/blog/comment-approve.php");
            else if (isset($_GET["user"])) include("page/user/index.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else if (isset($_GET["administrator-delete"])) include("page/administrator/delete.php");
            else if (isset($_GET["administrator-update"])) include("page/administrator/update.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>
</html>
<?php 
mysqli_close($connect);
ob_end_flush();
?>