<?php
ob_start();
session_start();
include "includes/config.php";  
include "includes/head.php";
include "function/function.php";
date_default_timezone_set("Asia/Jakarta")
?>

<body>

    <a name="ancre"></a>

    <!-- CACHE -->
    <div class="cache"></div>

    <?php
        include "includes/header.php"; 
        include "includes/navbar.php";
        include "includes/filter.php";
    ?>

	<div id="wrapper-container">
        
        <?php
            if (isset($_GET["home"]) || isset($_GET["page"])) {include "includes/latest-post.php";}
            else if (isset($_GET["detail"])) {include "includes/detail.php";}
            else if (isset($_GET["category"]) || isset($_GET["page-category"])) {include "includes/category.php";}
            else if (isset($_GET["search"]) || isset($_GET["page-search"])) {include "includes/search.php";}
            else {include "includes/latest-post.php";}
        ?>          
    
    <!-- <div id="wrapper-oldnew">
    	<div class="oldnew">
        	<div class="wrapper-oldnew-prev">
            	<div id="oldnew-prev"></div>
        	</div>
            <div class="wrapper-oldnew-next">
            	<div id="oldnew-next"></div>
    		</div>
        </div>
	</div>      -->
            
	<div id="wrapper-thank">
    	<div class="thank">
        	<div class="thank-text">
					Dumet School
				</div>
    	</div>
	</div>
	    
	

    </div>

    <?php include "includes/footer.php"; ?>


    <!-- SCRIPT -->

	<script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
    <script type="text/javascript" src="js/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/fastclick.min.js"></script>
	<script type="text/javascript" src="js/jquery.animate-colors-min.js"></script>
	<script type="text/javascript" src="js/jquery.animate-shadow-min.js"></script>    
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php 
mysqli_close($connect);
ob_end_flush();
?>