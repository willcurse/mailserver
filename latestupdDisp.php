<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Update</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .update-info {
            margin-bottom: 20px;
        }
        .update-info strong {
            font-weight: bold;
        }
        .update-info img {
            display: block;
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 4px;
        }
        .header-nav a:hover { color: #00FF66; }
    .header-nav a { font-size: 18px; margin: 0 10px; color: black; }
    .header-nav a img { vertical-align: middle; width: 30px; height: 30px; margin-right: 5px; }
    .jumbotron { position: relative; }
    .jumbotron video { object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
    .content { padding: 20px; }
    footer { text-align: center; padding: 10px 0; }
    .marquee { padding: 10px; background-color: #f8f9fa; border-radius: 5px; }
    .disp {color:black}
    </style>
</head>
<body>

<header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">My Mail Server</h1>
        <nav class="header-nav">
		<a href="index.php?chk=about">ABOUT US</a>
		<a href="index.php?chk=5"></a>
		<a href="index.php?chk=contact">CONTACT US</a>
        </nav>
    </div>
</header>

    <div class="container">
        <?php
        include_once('connection.php');

        $ret = mysqli_query($conn, "SELECT * FROM latestupd ORDER BY upd_id DESC LIMIT 1");
        $row = mysqli_fetch_object($ret);

        echo "<div class='update-info'>";
        echo "<strong>Title :</strong> " . $row->title . "<br/><br/>";
        echo "<strong>Contents :</strong> " . $row->content . "<br/><br/>";
        echo "<strong>Publish Date :</strong> " . $row->date . "<br/><br/>";
        echo "<strong>Picture:</strong><img src='latestUpdates/" . $row->image . "' alt='Latest Update Image'>";
        echo "</div>";
        ?>
    </div>

    <script 
src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
 crossorigin="anonymous"></script>
</body>
</html>
