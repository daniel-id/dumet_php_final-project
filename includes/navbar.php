<?php 
$query  = mysqli_query($connect, "SELECT * FROM category ORDER BY id DESC");
?>

    <!-- NAVBAR -->
    <div id="wrapper-navbar">
		<div class="navbar object">
    		<div id="wrapper-sorting">
                <div id="wrapper-title-1">
                    <a href="index.php?home"><div class="top-rated object">Home</div></a>
                	<div id="fleche-nav-1"></div>
        		</div>            
               <!--  <div id="wrapper-title-2">
                <a href="#"><div class="recent object">Recent</div></a>
                    <div id="fleche-nav-2"></div>
        		</div> -->
               <!--  
                <div id="wrapper-title-3">
                <a href="#"><div class="oldies object">Oldies</div></a>
                    <div id="fleche-nav-3"></div>
        		</div> -->
            </div>
            <div id="wrapper-button-icon">
            <?php if(mysqli_num_rows($query)>0) { ?>
              <?php while($row=mysqli_fetch_array($query)) { ?>
            	<div class="button-category">
                    <a href="index.php?category=<?php echo $row["id"]?>">
                        <img src="img/<?php echo $row['icon']?>" alt="<?php echo $row['category_name']?>" title="<?php echo $row['category_name']?>" height="28" width="28">
                    </a>
                </div>
              <?php } ?>
			<?php } ?>
            </div>
    	</div>
    </div>
