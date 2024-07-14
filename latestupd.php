<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Latest News</title>
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
        input[type="text"],
        textarea,
        input[type="file"] {
            width: calc(100% - 20px);
            height: 35px;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"] {
            width: auto;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <table width="100%" border="0">
                <tr>
                    <th scope="row">Title</th>
                    <td><input type="text" name="title" required/></td>
                </tr>
                <tr>
                    <th scope="row">Contents</th>
                    <td><textarea rows="10" name="cont" required></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Upload your file</th>
                    <td><input type="file" name="file" id="file"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="reset" value="RESET"/>
                        <input type="submit" name="upd" value="UPDATE"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="error-message"><?php if(isset($err)) { echo $err; } ?></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
