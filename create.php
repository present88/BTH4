<?php
session_start();
if ($_SESSION['user_level'] == 1) {
    include('header.php');
} else {
    header("location:index.php");
}
?>
<div class="container " align="center">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="container" align="center">
                <h2>Profile</h2>
                <div class="col-5">
                    <form action="processcreate.php" method="post">
                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><input type="text" class="form-control" name="mail" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td><input type="text" class="form-control" name="user" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Password</th>
                                    <td><input type="password" class="form-control" name="pass" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">First Name</th>
                                    <td><input type="text" class="form-control" name="fname" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name</th>
                                    <td><input type="text" class="form-control" name="lname" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Class</th>
                                    <td><input type="text" class="form-control" name="class" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address1</th>
                                    <td><input type="text" class="form-control" name="addr1" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address2</th>
                                    <td><input type="text" class="form-control" name="addr2" id="" value=""></td>
                                </tr>                               
                                <tr>
                                    <th scope="row">City</th>
                                    <td><input type="text" class="form-control" name="city" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td><input type="text" class="form-control" name="coun" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Zip Code</th>
                                    <td><input type="number" min="0" class="form-control" name="zcode" id="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td><input type="text" class="form-control" name="phone" id="" value=""></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>