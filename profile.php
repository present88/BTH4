<?php
session_start();
include('header.php');
include('user.php');
include('db/connect.php');
$user = [];
if (isset($_SESSION['username'])) {
    $sql = "select * from user where username='" . $_SESSION['username'] . "'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_row($result);
} else {
    header("location:index.php");
}
?>
<div class="container "align="center">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="profile-header-cover"></div>

            <div class="profile-header-content mb-3">
                <div class="profile-header-img">
                    <img class="rounded-pill" src="<?php echo $user[18]; ?>" alt="" style="width:200px;height:200px;" />
                </div>
            </div>
            <div class="container" align="center">
                <h2>Profile</h2>
                <div class="col-5">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">First Name</th>
                                <td><?php echo $user[2]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td><?php echo $user[3]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Class</th>
                                <td><?php echo $user[9]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Address1</th>
                                <td><?php echo $user[10]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Address2</th>
                                <td><?php echo $user[11]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td><?php echo $user[12]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Country</th>
                                <td><?php echo $user[13]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Zip Code</th>
                                <td><?php echo $user[14]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td><?php echo $user[15]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a name="" id="" class="btn btn-primary" href="update.php" role="button">Set Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>