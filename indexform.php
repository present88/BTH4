<?php include('header.php'); ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-light">
    <a class="navbar-brand btn btn-primary rounded-pill" href="index.php">Home</a>
    <button class="navbar-toggler d-lg-none btn-primary" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li><button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#login">Login</button></li>
            <li><button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#signup">Sign Up</button></li>
        </ul>
    </div>
</nav>
<?php
// $_SERVER['REQUEST_METHOD'] == 'POST'
$errorlg = array();
$errorsu = array();
if (isset($_POST['mailuser'])) {
    require('processlogin.php');
    if (count($errorlg) > 0) {
        echo "<script type=\"text/javascript\">
                $(document).ready(function(){
                  $('#login').modal('show');
                });
              </script>";
    }
}
if (isset($_POST['email'])) {
    require('processsignup.php');
    if (count($errorsu) > 0) {
        echo "<script type=\"text/javascript\">
                $(document).ready(function(){
                  $('#signup').modal('show');
                });
              </script>";
    }
}
?>
<!-- Modal login-->
<div class="modal" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="mailuser">Email/Username</label>
                        <input type="text" name="mailuser" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo isset($_POST['mailuser']) ? $_POST['mailuser'] : ""; ?>">
                        <?php if (isset($errorlg['mailuser'])) echo "<label class=\"text-danger\">Enter Email/Username</label></br>"; ?>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""; ?>">
                        <?php if (isset($errorlg['password'])) echo "<label class=\"text-danger\">Enter Password</label></br>"; ?>
                        <input class="btn btn-primary mt-4" type="submit" value="Login">
                        <?php if (isset($errorlg['user'])) echo '</br><label class="text-danger">' . $errorlg['user'] . '</label>'; ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal signup-->
<div class="modal" id="signup" tabindex="0" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>">
                        <?php if (isset($errorsu['email'])) echo "<label class=\"text-danger\">Enter Email</label></br>"; ?>
                        <label for="">UserName</label>
                        <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ""; ?>">
                        <?php if (isset($errorsu['username'])) echo "<label class=\"text-danger\">Enter Username</label></br>"; ?>
                        <label for="">Password</label>
                        <input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ""; ?>">
                        <?php if (isset($errorsu['pass'])) echo "<label class=\"text-danger\">Enter Password</label></br>"; ?>
                        <input class="btn btn-primary mt-4" type="submit" value="Sign Up">
                        <?php if (isset($errorsu['user'])) echo '</br><label class="mt-4 text-danger">' . $errorsu['user'] . '</label>'; ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>