<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            background: #99FF33;
            padding: 5px;
            text-align: left;
            margin-top: 0;
            border-radius: 5px 5px 0 0;
        }
        p {
            padding: 10px 0;
        }
        img {
            display: block;
            max-width: 100%;
            height: auto;
            border-radius: 50%; /* Apply rounded corners */
            margin-bottom: 20px;
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
		<a href="contactus.php?chk=contact">CONTACT US</a>
        </nav>
    </div>
</header>
    <div class="container">
        <h2>About Me</h2>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0BTJdz5vBa8uYzvXPWnC4CV5Zf6XQ2lVIcSBe0gq59Q&s" alt="Utkarsh Kumar" />
        <p>Hello</p>
        <p>Utkarsh-Kumar this side.</p>
        <p>
            I am currently pursuing my BCA degree from Ignou.
            This is my last semester project, Mailserver,
            in which I have demonstrated how a mail system actually works.
        </p>
        <p>Have a look.</p>
        <p>Thank you.</p>
    </div>
</body>
</html>
