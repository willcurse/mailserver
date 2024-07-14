<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compose Email</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
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

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      margin-top: 20px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: none;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      display: block;
      margin: 20px auto;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }
    .h3{color:black;}
    .header-nav a:hover { color: #00FF66; }
    .header-nav a { font-size: 18px; margin: 0 10px; color: black; }
    .header-nav a img { vertical-align: middle; width: 30px; height: 30px; margin-right: 5px; }
    .jumbotron { position: relative; }
    .jumbotron video { object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
    .content { padding: 20px; }
    footer { text-align: center; padding: 10px 0; }
    .marquee { padding: 10px; background-color: #f8f9fa; border-radius: 5px; }
    .disp{color:black}
  </style>
</head>
<body>
<header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">yumail</h1>
        <nav class="header-nav">
            <a href="index.php"><img src='./images/home.png'>Home</a>
            <a href="index.php?chk=about">About Us</a>
            <a href="index.php?chk=contact">Contact Us</a>
        </nav>
    </div>
</header>
  <div class="container">
    <h1>Compose Email</h1>
    <form action="mails.php" method="post">
      <label for="email">To:</label>
      <input type="text" id="email" name="email" placeholder="Enter recipient's email"><br>
      <label for="subject">Subject:</label>
      <input type="text" id="subject" name="subject" placeholder="Enter subject"><br>
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="6" placeholder="Enter your message"></textarea><br>
      <button type="submit" name="send">Send</button>
    </form>
  </div>
</body>
</html>
