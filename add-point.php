<!DOCTYPE html>
<html lang="en">
<?php
require_once('connection.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Document</title>
    <style>
        body {
            background: linear-gradient(90deg, #3F2B96 0%, #A8C0FF 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .forget-pwd>a {
            color: #dc3545;
            font-weight: 500;
        }

        .forget-password .panel-default {
            padding: 31%;
            margin-top: -27%;
        }

        .forget-password .panel-body {
            padding: 15%;
            margin-bottom: -50%;
            background: #fff;
            border-radius: 5px;
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        img {
            width: 40%;
            margin-bottom: 10%;
        }

        .btnForget {
            background: #5500cb;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btnForget:hover {
            background-color: #3f0097;
        }

        .forget-password .dropdown {
            width: 100%;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        .forget-password .dropdown button {
            width: 100%;
        }

        .forget-password .dropdown ul {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container forget-password">
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="images/marakez-logo.png" alt="marakez-logo">
                            <h2 class="text-center">Add Point</h2>
                            <form id="busForm" action="phpPoints.php" class="form" method="get">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="forgetAnswer" name="Name" placeholder="Enter Point"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-lg btn-block btnForget" value="Submit" type="submit">
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