<?php

$comment        = mysqli_query($connect, "SELECT comment.*, post.title
                                          FROM comment, post
                                          WHERE comment.post_id = post.id
                                          AND comment.status = '0'
                                          ORDER BY comment.id DESC");

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- <div class="panel panel-default">
            <div class="panel-heading">
                Notifications
            </div>
            <div class="panel-body">
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Approve Comment Berhasil.
                </div>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    Approve Comment Gagal.
                </div>
            </div>
        </div> -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Approve Comments
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Datetime</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(mysqli_num_rows($comment)>0) { ?>
                            <?php while($row_comment = mysqli_fetch_array($comment)) { ?>
                            <tr>
                                <td><?php echo $row_comment["title"]?></td>
                                <td><?php echo $row_comment["name"]?></td>
                                <td><?php echo $row_comment["comment"]?></td>
                                <td class="center"><?php echo $row_comment["date"]?></td>
                                <td class="center"><a href="index.php?comment-approve=<?php echo $row_comment["id"]?>" class="btn btn-primary btn-xs" type="button">Approve</a></td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
