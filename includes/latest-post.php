<?php
$query  	= mysqli_query($connect, "SELECT post.*, category.icon FROM post, category
								  WHERE category.id = post.category_id ORDER BY id DESC");
?>

	<!-- PORTFOLIO -->

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