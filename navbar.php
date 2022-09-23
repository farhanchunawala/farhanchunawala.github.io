<nav class="navbar bg-dark navbar-dark fixed-top">
	
	<a href="<?php echo "$navlink"; ?>"><h2 class="navbar-brand mb-1"><b><?php echo "$navtitle"; ?></b></h2></a>
	
	<?php if ($navtitle=='Customer List' || $navtitle=='New') { ?>
	<form class="form-inline" method="post"  action="customerlist.php?svr_mode=<?php echo $svr_mode; ?>&srh=1">
		<input id="srh" class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
		<button class="btn btn-success" type="submit">Search</button>
	</form>
	<?php } ?>
	
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	<ul class="navbar-nav">
		<li class="nav-item"><a class="nav-link" href="customerlist.php?svr_mode=<?php echo $svr_mode; ?>&srh=0"><b>Customer List</b></a></li>
	</ul>
	</div>
	
</nav>