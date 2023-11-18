<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<?php
$textMsg = "";
$link = mysqli_connect("localhost", "root", "", "database_form");

if ($link === false) {
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$sql = "SELECT * FROM databse_table";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
$textMsg = $num;

mysqli_close($link);
?>

<body>
    <div class="main" style="background: url(image9.jpg);">
        <div class="nav-heading">
            <a href="adminHome.php"><h1>Admin Home</h1></a>
        </div>
        <div class="flex-container">
            <?php if ($num > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="flex-items">
                        <p>Name: <?php echo $row['fname'] . " " . $row['lname'] ?> </p>
                        <p>Email: <span class="color-email"><?php echo $row['email'] ?></span> </p>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <div class="flex-items">
                    <p style="margin: 1rem;">Contacts are empty</p>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>