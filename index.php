<?php

session_start();

include("connect.php");
include("functions.php");

//if ($_SERVER["REQUEST_METHOD"] == "POST");

if (isset($_POST["submit"])) {

    $name = htmlspecialchars($_POST['name']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $gender = $_POST['gender'];
    $payments = $_POST['payment'];
    $payment = "";
    foreach ($payments as $row) {
        $payment .= $row . ",";
    }
    $feedback = $_POST['feedback'];

    if (empty($name)) {
        exit();
        header("Location:../index.php");
    }


    $query = "INSERT INTO form_data VALUES ('', '$name', '$email', '$phone', '$address', '$occupation', '$gender', '$payment', '$feedback')";
    mysqli_query($con, $query);

    echo "<script> alert('Data submitted successfully');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="surv.css">

    <title>Spectra Survey form</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 id="title">
                <strong>Spectra Survey form</strong>
            </h1>
            <p id="description">
                Thank you for taking your time to improve this platform
            </p>
        </header>
        <form method="post" id="survey-form">
            <div class="form-group">
                <label for="name">Name:</label><br>
                <input type="text" class="formcontrol" id="name" name="name" placeholder="Enter full name" required><br>
                <label for="email">Email:</label><br>
                <input type="text" class="formcontrol" id="email" name="email" placeholder="Enter your Email" required><br>
                <label for="phone">Phone Number:</label><br>
                <input type="number" class="formcontrol" id="phone" name="phone" placeholder="Enter your phone number" required><br>
                <label for="address">Address:</label><br>
                <input type="text" class="formcontrol" id="address" name="address" placeholder="Enter Address" required><br>
                <label for="occupation">Occupation:</label><br>
                <select name="occupation" id="occupation" class="formcontrol" required>
                    <option value disabled selected>Select occupation</option>
                    <option value="Banker">Banker</option>
                    <option value="Architect">Architect</option>
                    <option value="Counsellor">Counsellor</option>

                </select><br>
                <label for="">Gender:</label><br>

                <input type="radio" class="inputRadio" name="gender" value="Male"><span>Male</span>


                <input type="radio" class="inputRadio" name="gender" value="Female"><span>Female</span>


                <input type="radio" class="inputRadio" name="gender" value="other">Other
                </label>
            </div>

            <div class="form-group">
                <p id="answer">Please select your prefered payment method ?</p>
                <label for="payment">
                    <input type="checkbox" class="checkbox" name="payment[]" value="Cash">Cash
                    <br>

                    <input type="checkbox" class="checkbox" name="payment[]" value="debit/credit card">Debit/Credit Card
                    <br>

                    <input type="checkbox" class="checkbox" name="payment[]" value="Crypto">Crypto
                    <br>
                </label>
            </div>
            <div class="form-group">
                <label for="feedback">
                    <p id="answer">Give us your feedback</p>
                    <textarea name="feedback" rows="6" cols="60" placeholder="Gives us your feedback here..."></textarea>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="Submit" class="btn">Submit</button>
            </div>
        </form>
    </div>

    <footer class="footer">
        <p style="text-align: center;">© 2022 Neptune, Inc.</p>
    </footer>

</body>

</html>