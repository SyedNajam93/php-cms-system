
<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>



<a class="navbar-brand" href="index.php">Admin Panel</a>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul id="active" class="nav navbar-nav side-nav">
<li class="selected"><a href="index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>


<li>
<a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Posts <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="posts_dropdown" class="collapse">
<li>
<a href="./posts.php"> View All Posts</a>
</li>
<li>
<a href="posts.php?source=add_post">Add Posts</a>
</li>
</ul>
</li>


<li>
<a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
</li>

<li class="">
<a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
</li>

<li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="demo" class="collapse">
<li>
<a href="users.php">View All Users</a>
</li>
<li>
<a href="users.php?source=add_user">Add User</a>
</li>
</ul>
</li>

<li>
<a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
</li>






<li><a href="bootstrap-grid.html"><i class="fa fa-table"></i> Bootstrap Grid</a></li>
</ul>

<ul class="nav navbar-nav navbar-right navbar-user">



<li class="dropdown messages-dropdown">
<a href="../index.php"><i class="fa fa-envelope"></i> HOME SITE <b class="caret"></b></a>





</li>



<li class="dropdown user-dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']?><b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
<li class="divider"></li>
<li><a href="../includes/logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>

</ul>
</li>
<li class="divider-vertical"></li>
<li>
<form class="navbar-search">
<input type="text" placeholder="Search" class="form-control">
</form>
</li>
</ul>
</div>
</nav>


