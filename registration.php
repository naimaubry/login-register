<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container"> 
        <?php
        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $errors = array();
            if (empty($fullName) OR empty($email) OR empty($password) OR empty($password_Repeat)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password)<8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Password does not match");
            }
            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }else {
                //we will insert the data into the database
            }
        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class = "form-control" name ="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="email" class = "form-control" name ="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class = "form-control" name ="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class = "form-control" name ="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class = "btn btn-primary" value="Register" name = "submit">
            </div>
        </form>
    </div>
</body>
</html>