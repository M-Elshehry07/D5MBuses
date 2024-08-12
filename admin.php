<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <img src="images/marakez-logo.png" alt="Logo" width="300">
    <div class="container">
        <form action="phptest.php" method="GET">
            <Label>Name</Label>
            <input type="text" name="name" id="name" required>
            <br>
            <Label>Password</Label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit" class="glyphicon glyphicon-dashboard">Submit</button>
            <br>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>