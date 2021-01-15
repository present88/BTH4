<?php 
include('header.php');
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-light">
    <a class="navbar-brand btn btn-primary rounded-pill" href="index.php">Welcome <?php echo isset($_SESSION['username'])?$_SESSION['username']:""; ?></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="navbar-brand btn btn-primary rounded-pill" href="profile.php">Profile <span class="sr-only">(current)</span></a>
            </li>          
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li><a name="" id="" class="btn btn-success rounded-pill" href="logout.php" role="button">Log Out</a></li>
        </ul>
    </div>
</nav>