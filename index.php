<!DOCTYPE html>
<html>
<head>
    <title>Marksheet</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
            padding: 20px;
        }
        form {
            background-color: #fff;
            width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            margin-top: 10px;
            cursor: pointer;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Student Marksheet Form</h2>
    <form action="result.php" method="POST">
        Name: <input type="text" name="name">
        Email: <input type="text" name="email">
        Class: <input type="text" name="class">

        english 1: <input type="number" name="s1">
        math 2: <input type="number" name="s2">
        urdu 3: <input type="number" name="s3">
        computer 4: <input type="number" name="s4">
        science 5: <input type="number" name="s5">
        history 6: <input type="number" name="s6">
        geography 7: <input type="number" name="s7">

        <input type="submit" value="Generate Marksheet">
    </form>
</body>
</html>

