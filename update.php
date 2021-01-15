<?php
session_start();
if (isset($_SESSION['username'])) {
    include('header.php');
    include('user.php');
    include('db/connect.php');
    $user = [];
    if ($_SESSION['user_level'] == 1 && isset($_GET['user'])) {
        $username = $_GET['user'];
        $action = "?user=$username";
    } else {
        $username = $_SESSION['username'];
        $action = "";
    }
    $sql = "select * from user where username='" . $username . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $user = mysqli_fetch_row($result);
    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>
<div class="container " align="center">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="form-group g-a">
                <div id="avata" class="div-avt mx-auto">
                    <img class="rounded-pill img-avt" src="<?php echo $user[18]; ?>" style="width:200px;height:200px;" onClick="triggerClick()" id="profileDisplay">
                </div>

                <form action="updateavatar.php<?php echo $action ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="avt" value="" onChange="displayImage(this)" id="profileImage" style="display: none;">
                    <div class="til-avt mx-auto">
                        <button type="submit" name="up" class="btn btn-primary">
                            Set Avatar
                        </button>
                    </div>
                </form>
            </div>


            <div class="container" align="center">
                <h2>Profile</h2>
                <div class="col-5">
                    <form action="processupdate.php<?php echo $action ?>" method="post">
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td><input type="text" class="form-control" readonly="true" name="user" id="" value="<?php echo $username; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">First Name</th>
                                    <td><input type="text" class="form-control" name="fname" id="" value="<?php echo $user[2]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name</th>
                                    <td><input type="text" class="form-control" name="lname" id="" value="<?php echo $user[3]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Class</th>
                                    <td><input type="text" class="form-control" name="class" id="" value="<?php echo $user[9]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address1</th>
                                    <td><input type="text" class="form-control" name="addr1" id="" value="<?php echo $user[10]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address2</th>
                                    <td><input type="text" class="form-control" name="addr2" id="" value="<?php echo $user[11]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">City</th>
                                    <td><input type="text" class="form-control" name="city" id="" value="<?php echo $user[12]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td><input type="text" class="form-control" name="coun" id="" value="<?php echo $user[13]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Zip Code</th>
                                    <td><input type="number" min="0" class="form-control" name="zcode" id="" value="<?php echo $user[14]; ?>"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td><input type="text" class="form-control" name="phone" id="" value="<?php echo $user[15]; ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#avata').click(function() {
            document.querySelector('#up-img').click();
        });
    });

    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>