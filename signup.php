<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .mean {
        width: 50%;
        margin: auto;
        padding: 30px;
        border: 4px solid #161313;
        margin-top: 20px;
    }
</style>

<body>
    <div class="mean">
        <?php

        $name_error = $email_error = $phone_error = $password_err =   "";
        $phone = $name = $email = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $name_error = "please enter your name";
            } else {
                $name = $_POST["name"];
                echo $name;
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $name_error = "only letter and space allowed";
                }
            }

            echo "<br>";
            if (empty($_POST["email"])) {
                $email_error = "please enter your email";
            } else {
                $email = $_POST["email"];
                echo $email;
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "invalid email formate";
                }
            }

            echo "<br>";
            if (empty($_POST["phone"])) {
                $phone_error = "please enter your phone number";
            } else {
                $phone = $_POST["phone"];
                echo $phone;
                $pret = "/^[0-9]*$/";
                if (!preg_match($pret, $phone)) {
                    $phone_error = "only digit are allowd";
                }
            }

            echo "<br>";

            if (empty($_POST["password"])) {
                $password_err = "please enter your password";
            } else {
                $password = $_POST["password"];
                echo $password;
            }


            // $target = "image/";
            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";

            $folder = "image/";
            $path = $folder . $_FILES["profile_img"]["name"];
            $temp = $_FILES["profile_img"]["tmp_name"];


            if ($_FILES["profile_img"]["size"] < 1024000) {
                move_uploaded_file($temp, $path);
            } else {
                echo "<h2 style ='color:red;'>file size should be less than 1MB</h2>";
            }
        }


        ?>

        <form method="post" enctype="multipart/form-data">

            <div class="container">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <span class="text-danger"> <?php echo $name_error   ?> </span>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <span class="text-danger"> <?php echo $email_error   ?> </span>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="phone" class="form-control" name="phone" id="phone">
                </div>
                <span class="text-danger"> <?php echo $phone_error   ?> </span>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <span class="text-danger"> <?php echo $password_err   ?> </span>
                <div class="mb-3">
                    <label for="profile_img" class="form-label">file</label>
                    <input type="file" class="form-control" name="profile_img" id="profile_img">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>