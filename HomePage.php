


<?php
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['sid'])) {
    header('Location: index.php');
    exit;
}

// Include necessary files and establish database connection
include_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Mail Server</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <style>
        /* Custom Styles */
        .jumbotron {
            background-color: #4AD295;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>


<div class="container py-4">
    <div class="jumbotron">
        <h1 class="display-4">Welcome!!! -: <?php echo $_SESSION['sid']?></h1>
    </div>

    <nav>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="HomePage.php?chk=compose">Compose</a></li>
            <li class="list-inline-item"><a href="HomePage.php?chk=inbox">Inbox</a></li>
            <li class="list-inline-item"><a href="HomePage.php?chk=sent">Sent</a></li>
            <li class="list-inline-item"><a href="HomePage.php?chk=draft">Drafts</a></li>
            <li class="list-inline-item"><a href="gmail.php?chk=gmail">Gmail</a></li>
            <li class="list-inline-item"><a href="HomePage.php?chk=chngPass">Change Password</a></li>
            <li class="list-inline-item"><a href="HomePage.php?chk=updnews">Latest Updates</a></li>
            <li class="list-inline-item"><a href="HomePage.php?chk=vprofile">Edit Profile</a></li>
            <li class="list-inline-item"><a href="HomePage.php?chk=logout">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <?php
        // Check which section to display based on the 'chk' parameter in the URL
        $chk = $_REQUEST['chk'] ?? '';

        switch ($chk) {
            case 'compose':
                include_once('compose.php');
                break;
            case 'inbox':
                include_once('inbox.php');
                break;
            case 'sent':
                include_once('sent.php');
                break;
            case 'trash':
                include_once('trash.php');
                break;
            case 'draft':
                include_once('draft.php');
                break;
            case 'chngPass':
                include_once('chngPass.php');
                break;
            case 'vprofile':
                include_once('editProfile.php');
                break;
            case 'updnews':
                include_once('latestupd.php');
                break;
            case 'gmail':
                include_once('gmail.php');
                break;
            case 'logout':
                include_once('logout.php');
                break;
            default:
                break;
        }
        ?>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3">
    <!-- Your footer content goes here -->
    <p>&copy; 2024 My Mail Server</p>
</footer>

<script 
src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
 crossorigin="anonymous"></script>
</body>
</html>
