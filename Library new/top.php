 <script type="text/javascript" src="javascript/mootools.js"></script>
<script type="text/javascript" src="javascript/visualslideshow.js"></script>
<link rel="stylesheet" type="text/css" href="slideshow.css" media="screen" />
<style type="text/css">.slideshow a#vlb{display:none}</style>

 <div id="show" class="slideshow">
	<div class="slideshow-images">
<a href=""><img id="slide-0" src="data/images/dsc00108.jpg" alt="ETF Building" title="dsc00108" /></a>
<a href=""><img id="slide-1" src="data/images/017.jpg" alt="School Gate" title="School Gate" /></a>
<a href=""><img id="slide-2" src="data/images/020.jpg" alt="Senate Biulding" title="Senate Biulding" /></a>
<a href=""><img id="slide-3" src="data/images/022.jpg" alt="School Mosque" title="School Mosque" /></a>
<a href=""><img id="slide-4" src="data/images/admin.jpg" alt="Administrative Building" title="Administrative Building" /></a></div>
	</div>
<div class="top">
    <div class="menus">
    <div class="menu"><a href="index.php">HOME</a></div>
    <div class="menu"><a href="about.php">ABOUT</a></div>
    <div class="menu"><a href="index.php">LIBRARY</a></div>    
    <div class="menu"><a href="search_form2.php">SEARCH</a></div>
    <div class="menu"><a href="help.php">HELP</a></div>
    <p align="right" style="padding-right:10px">
		<?php 
        $user_log = $_SESSION['user_log'];
        if (isset($_SESSION['user_log'])){
            echo "<a href='#' style='color:#FFC'>Welcome $_SESSION[username] </a> ||  <a href='logout.php' style='color:#FFC'>Logout</a>";
        }
        else{
            echo "<a href='login.php' style='color:#FFC'>Sign In</a>";
        }
        ?>
    </p>
</div>