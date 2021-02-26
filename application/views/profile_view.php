
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Profile</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="/img/Users/<?echo($_SESSION['avatar']);?>.jpg" width="100" height="100" class="avatar img-circle" alt="avatar">
                <form class = "uploadPhoto" name="upload" action="" method="POST" ENCTYPE="multipart/form-data">
                    <p style="color:red"><?php echo("$data[0]") ?></p>
                    <input type="file" name="userfile">
                    <input class="btn btn-outline-success" type="submit" name="upload" value="Save">
                </form>
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">

            <h3>Personal info</h3>

            <form class="form-horizontal" role="form" action="" method="post">
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input name="First_Name" class="form-control" type="text" value="<? echo ($_SESSION['First_Name']);?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input name="Last_Name" class="form-control" type="text" value="<? echo ($_SESSION['Last_Name']);?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Company:</label>
                    <div class="col-lg-8">
                        <input name="Company" class="form-control" type="text" value="<? echo ($_SESSION['Company']);?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input name="email" class="form-control" type="text" value="<? echo ($_SESSION['email']);?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password:</label>
                    <div class="col-lg-8">
                        <input name="password" class="form-control" type="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Repeat password:</label>
                    <div class="col-lg-8">
                        <input name="second_password" class="form-control" type="password" value="">
                    </div>
                </div>
                <p style="color:red"><?php echo("$data[1]") ?></p>
                <input class="btn btn-outline-success" type="submit" name="submit" value ="Save">
            </form>
        </div>
    </div>
</div>
<hr>
