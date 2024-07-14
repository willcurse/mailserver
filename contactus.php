<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden; /* Ensures border-radius is applied */
        }
        th, td {
            padding: 10px;
            border: 1px solid #CCCCCC;
        }
        th {
            background: #CCCCCC;
            color: #0000FF;
            text-align: center;
        }
        td:first-child {
            font-weight: bold;
            width: 20%;
        }
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
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
		<a href="index.php?chk=about">Home</a>
		<a href="index.php?chk=5"></a>
		<a href="aboutus.php?chk=about">About-Me</a>
        </nav>
    </div>
</header>
    <table>
        <tr>
            <th colspan="2">Contact Me</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>Utkarsh Kumar</td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>7895099154</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>Kuldeep Vihar Colony, Aligarh</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>ukutkarsh8279@gmail.com</td>
        </tr>
        <tr>
            <td>Website</td>
            <td><a href="#">Ahmmm!</a></td>
        </tr>
    </table>
</body>
</html>
