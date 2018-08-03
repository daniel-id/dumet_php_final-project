<?php

// DISPLAY POST DETAIL
$post_id     = $_GET["detail"];
$category_id = $_GET["category"];

$query_post  = mysqli_query($connect, "SELECT post.*, category.icon FROM post, category
                                       WHERE category.id = post.category_id AND post.id = '$post_id'");

$row_post    = mysqli_fetch_array($query_post);

// INPUT COMMENT
if(isset($_POST["submit"])) {
    $post_id     = $_POST["post_id"];
    $name        = $_POST["name"];
    $comment     = $_POST["comment"];
    $date        = date("Y-m-d H:i:s");

    mysqli_query($connect, "INSERT INTO comment VALUES (null, '$post_id', '$name', '$comment', 'avatar.png', '0', '$date')");
    header("location:index.php?detail=$post_id&category=$category_id&success-comment#success");
}

// DISPLAY COMMENT
$query_comment = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$post_id'
                                        AND STATUS = '1' ORDER BY id DESC");
$comment_data  = mysqli_num_rows($query_comment);


// DISPLAY MORE
$query_more    = mysqli_query($connect, "SELECT * FROM post
                                         WHERE category_id = '$category_id'
                                         ORDER BY id DESC LIMIT 4");

?>


        <div class="container object">

			<div id="main-container-image">

                <!-- DISPLAY POST DETAIL -->

                <div class="title-item">
                	<div class="title-icon"><img src="img/<?php echo $row_post["icon"]?>" width="68"></div>
                    <div class="title-text"><?php echo $row_post["title"]?></div>
                    <div class="title-text-2"><?php echo $row_post["date"]?></div>
                </div>

     			<div class="work">
					<figure class="white">
						<img src="img/<?php echo $row_post["image"]?>" alt="" />
                        <div id="wrapper-part-info">
                            <p class="text-desc pcolor"><?php echo $row_post["description"]?></p>
						</div>
                    </figure>
                </div>

                <div class="wrapper-text-description">

                	<!-- <div class="wrapper-view">
                    	<div class="icon-view"><img src="img/icon-eye.svg" alt="" width="24" height="16"/></div>
                        <div class="text-view">2,451 views</div>
                    </div> -->

                	<!-- <div class="wrapper-file">
                    	<div class="icon-file"><img src="img/icon-psdfile.svg" alt="" width="21" height="21"/></div>
                        <div class="text-file">Photoshop</div>
                    </div> -->

                    <!-- <div class="wrapper-weight">
                    	<div class="icon-weight"><img src="img/icon-weight.svg" alt="" width="20" height="23"/></div>
                        <div class="text-weight">23 Mo</div>
                    </div> -->

                    <!-- <div class="wrapper-desc">
                    	<div class="icon-desc"><img src="img/icon-desc.svg" alt="" width="24" height="24"/></div>
                        <div class="text-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. </div>
                    </div> -->

                   <!--  <div class="wrapper-download">
                    	<div class="icon-download"><img src="img/icon-download.svg" alt="" width="19" height="26"/></div>
                        <div class="text-download"><a href="#"><b>Download</b></a></div>
                    </div> -->

                    <div class="wrapper-morefrom">
                       	<div class="text-morefrom">More from .psd</div>
                            <div class="image-morefrom">
                            <?php if(mysqli_num_rows($query_more)>0) { ?>
                                <?php $no = 1; ?>
                                <?php while($row_more=mysqli_fetch_array($query_more)) { ?>
                            	    <a href="index.php?detail=<?php echo $row_more["id"] ?>&category=<?php echo $row_more["category_id"] ?>">
                                    <div class="image-morefrom-<?php echo $no; ?>">
                                        <img src="img/<?php echo $row_more["image"] ?>" alt="" width="430" height="330"/>
                                    </div></a>
                                <?php $no++; } ?>
                            <?php $no = 0; } ?>
                            </div>
                        </div>
                    </div>

                <!-- DISPLAY COMMENT -->

                <?php if(mysqli_num_rows($query_comment)>0) { ?>
				    <?php while($row_comment=mysqli_fetch_array($query_comment)) { ?>
                        <div class="post-reply">
                            <div class="image-reply-post"><img src="img/<?php echo $row_comment["image"]?>"></div>
                            <div class="name-reply-post"><?php echo $row_comment["name"]?></div>
                            <div class="text-reply-post"><?php echo $row_comment["comment"]?></div>
                        </div>
                    <?php } ?>
                <?php } ?>

                <!-- POST COMMENT -->

                <div class="post-send">
                    <div id="main-post-send">
                        <div id="title-post-send">Add your comment</div>
                            <form id="contact" action="" method="post">
                                <p><input type="text" id="name" name="name" placeholder="Enter your name"></p>
                                <fieldset>
                                    <p><textarea id="message" name="comment" maxlength="500" placeholder="Input Message" tabindex="5" cols="30" rows="4"></textarea></p>
                                </fieldset>
                                <div style="text-align:center;"><input type="submit" name="submit" value="Comment" /></div>
                                <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                                <input type="hidden" name="category_id" value="<?php echo $category_id ?>">
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>
