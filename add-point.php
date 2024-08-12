<!DOCTYPE html>
<html lang="en">
    <?php 
    include('connection.php');
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 8px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <h1>Add New Point</h1>
    <form id="busForm" action="phpPoints.php" method="get">
        <!-- <label for="Route id">Route ID:</label>
        <input type="text" id="busID" name="busID" required><br><br> -->

        <label for="start">Point:</label>
        <input type="text" id="start" name="Name" required><br><br>

        <input type="submit" value="Submit">
    </form>
    
</body>
</html>