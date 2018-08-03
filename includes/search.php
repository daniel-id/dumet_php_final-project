<?php
if(isset($_POST["search"])) {
    $_SESSION['session_search'] = $_POST['keyword'];
    $keyword                    = $_SESSION['session_search'];
} else {
    $keyword                    = $_SESSION['session_search'];
}

$query                          = mysqli_query($connect, "SELECT post.*, category.* 
                                                          FROM post, category
                                                          WHERE post.category_id = category.id
                                                          AND post.description LIKE '%$keyword%'
                                                          ORDER BY post.id DESC");
?>

	<!-- SEARCHED PORTFOLIO -->

	<div class="container object">
		<div id="main-container-image">
			<section class="work">
			<?php if(mysqli_num_rows($query)>0) { ?>
				<?php while($row=mysqli_fetch_array($query)) { ?>
				<figure class="white">
					<a href="index.php?detail=<?php echo $row["id"] ?>&category=<?php echo $row["category_id"] ?>">
						<img src="img/<?php echo $row["image"] ?>" alt="" />
						<dl>
							<dt><?php echo $row["title"] ?></dt>
							<dd><?php echo $row["description"] ?></dd>	
						</dl>
					</a>
					<div id="wrapper-part-info">
						<div class="part-info-image"><img src="img/<?php echo $row["icon"] ?>" alt="" width="28" height="28"/></div>
						<div id="part-info"><?php echo $row["title"] ?></div>
					</div>
				</figure>
				<?php } ?>
			<?php } ?>
			</section>
		</div>  
	</div>