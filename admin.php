<?php
if (!$_SESSION['user_level'] == 1) {
    header("location:index.php");
}
include('header.php');
include('db/connect.php');
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = "";
}
$start = ($page - 1) * 20;
$sql = "select username,email,Status,user_level from user where username like '%$search%' limit $start,20";
$res = mysqli_query($conn, $sql);
if ($res) {
    $users = mysqli_fetch_all($res);
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-light">
    <a class="navbar-brand btn btn-primary rounded-pill" href="index.php">Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="navbar-brand btn btn-primary rounded-pill" href="profile.php">Profile <span class="sr-only">(current)</span></a>
            </li>
            <form class="form-inline my-2 my-lg-0" action="" method="get">
                <input name="search" class="form-control mr-sm-2" type="text" placeholder="username">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li><a class="btn btn-success rounded-pill" href="logout.php" role="button">Log Out</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <a class="navbar-brand btn btn-primary rounded-pill mt-2 ml-5" href="create.php">Add</a>
    <table class="table table-bordered col-11 mx-auto">
        <thead class="bg-dark text-white">
            <tr class="border-dark">
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Level</th>
                <th style="width: 23%;">Edit|Delete|Activate|Set Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                $status = ($user[2] == 1) ? "Activated" : "Not Activated";
                $level = ($user[3] == 1) ? "Admin" : "User";
                echo "<tr>";
                echo "<td class=\"border-dark\" scope=\"row\">$user[0]</td>";
                echo "<td class=\"border-dark\">" . $user[1] . "</td>";
                echo "<td class=\"border-dark\">$status</td>";
                echo "<td class=\"border-dark\">$level</td>";
                echo '<td class="border-dark">';
                echo '<a href="update.php?user=' . $user[0] . '" role="button"><i class="fas fa-pen ml-4"></i></a>';
                echo '<a onclick="return confirm(\'Do you want to delete this account?\')" href="processdelete.php?user=' . $user[0] . '" role="button"><i class="fas fa-trash-alt ml-4"></i></a>';
                echo '<a onclick="return confirm(\'Do you want to activate this account?\')" href="active.php?user=' . $user[0] . '"><i class="fas fa-check ml-4"></i></a>';
                echo '<a onclick="return confirm(\'Do you want to set admin this account?\')"  href="setadmin.php?user=' . $user[0] . '"><i class="fas fa-user-cog ml-4"></i></a></td>';
                echo "</tr>";
            }
            ?>
    </table>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        $sh = ($search != "") ? "&search=$search" : "";
        $disable = ($page == 1) ? 'disabled' : '';
        echo '<li class="page-item ' . $disable . '"><a class="page-link" href="index.php?page=' . ($page - 1) . $sh . '" tabindex="-1" aria-disabled="true">Previous</a></li>';
        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page + 1) . $sh . '">' . ($page + 1) . '</a></li>';
        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page + 2) . $sh . '">' . ($page + 2) . '</a></li>';
        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page + 3) . $sh  . '">' . ($page + 3) . '</a></li>';
        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $page . $sh . '">Next</a></li>';
        ?>
    </ul>
</nav>