<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('connection.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/form-style.css">
    <title>Add Bus</title>

<body>
    <div class="container forget-password">
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="images/marakez-logo.png" alt="marakez-logo">
                            <h2 class="text-center">Edit Admin</h2>
                            <?php
                            if (isset($_SESSION['msg'])) {
                                ?>
                                <div class="error my-4">
                                    <div class="error__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24"
                                            fill="none">
                                            <path fill="#393a37"
                                                d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="error__title"> <?= $_SESSION['msg'] ?> </div>
                                    <div class="error__close"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            viewBox="0 0 20 20" height="20">
                                            <path fill="#393a37"
                                                d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z">
                                            </path>
                                        </svg></div>
                                </div>
                                <?php

                                unset($_SESSION['msg']);
                            }
                            ?>
                            <form id="busForm" action="phpedit_admin.php" class="form" method="POST">
                                <?php
                                require_once('connection.php');
                                $id = $_GET['id'];
                                $stmt = $conn->prepare("SELECT * FROM admin WHERE ID = ?");
                                $stmt->bind_param("i", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $row = $result->fetch_assoc();
                                ?>
                                <input type="hidden" name="id" value="<?= $id; ?>">

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="busID" name="username" value="<?= $row['username'] ?>"
                                            placeholder="Username" class="form-control" type="text" disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="forgetAnswer" name="oldPass" placeholder="Enter Old Password"
                                            class="form-control" type="password" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="forgetAnswer" name="newPass" placeholder="Enter New Password"
                                            class="form-control" type="password" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="forgetAnswer" name="confPass" placeholder="Confirm New Password"
                                            class="form-control" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-lg btn-block btnForget" value="Edit" type="submit">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>