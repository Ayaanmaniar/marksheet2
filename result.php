<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connect";

// Connect to MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected<br>";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate fields
    if (
        empty($_POST['name']) || empty($_POST['email']) || empty($_POST['class']) ||
        empty($_POST['s1']) || empty($_POST['s2']) || empty($_POST['s3']) ||
        empty($_POST['s4']) || empty($_POST['s5']) || empty($_POST['s6']) || empty($_POST['s7'])
    ) {
        echo "<div style='text-align:center; padding:20px; font-family:Arial;'>";
        echo "<h3 style='color:red;'>Fill all required fields</h3>";
        echo "<a href='index.php' style='text-decoration:none; color:#007bff;'>Go Back</a>";
        echo "</div>";
        exit();
    }

    // Assign variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];
    $s5 = $_POST['s5'];
    $s6 = $_POST['s6'];
    $s7 = $_POST['s7'];

    // Calculations
    $obtained = $s1 + $s2 + $s3 + $s4 + $s5 + $s6 + $s7;
    $totalMarks = 700;
    $percentage = ($obtained / $totalMarks) * 100;

    if ($percentage >= 90) $grade = "A+";
    elseif ($percentage >= 80) $grade = "A";
    elseif ($percentage >= 70) $grade = "B";
    elseif ($percentage >= 60) $grade = "C";
    elseif ($percentage >= 50) $grade = "D";
    else $grade = "Fail";

    // Insert into database
    $sql = "INSERT INTO connect (name, email, class, s1, s2, s3, s4, s5, s6, s7, obtained, percentage) 
            VALUES ('$name', '$email', '$class', $s1, $s2, $s3, $s4, $s5, $s6, $s7, $obtained, $percentage)";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully<br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        body {
            font-family: Arial;
            background-color: #eef2f3;
            padding: 20px;
        }
        .result-box {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            text-align: center;
        }
        p {
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="result-box">
    <h2>Marksheet Result</h2>
    <p><strong>Name:</strong> <?= $name ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Class:</strong> <?= $class ?></p>
    <br>
    <?php
    for ($i = 1; $i <= 7; $i++) {
        echo "<p>Subject $i Marks: " . $_POST["s$i"] . "</p>";
    }
    ?>
    <br>
    <p><strong>Total Marks:</strong> <?= $totalMarks ?></p>
    <p><strong>Obtained Marks:</strong> <?= $obtained ?></p>
    <p><strong>Percentage:</strong> <?= round($percentage, 2) ?>%</p>
    <p><strong>Grade:</strong> <?= $grade ?></p>
</div>
</body>
</html>
