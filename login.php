<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .mean {
            width: 50%;
            margin: auto;
            padding: 30px;
            border: 4px solid #161313;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="mean">
        <?php
        $name_err = "";
        $password_err = "";

        echo $name_err;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"])) {
                $name_err = "please enter your user name *";
            } else {
                $name_r = "/^[a-zA-Z]+/";
                if (!preg_match($name_r, $_POST["name"])) {
                    $name_err = "only for latter";
                }
            }

            if (empty($_POST["password"])) {
                $password_err = "please enter your password *";
            }

            echo $_POST["name"] . "" . "<br>";
            echo $_POST["password"] . "" . "<br>";



        }


        ?>

        <form method="post">

            <div class="container">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="enter your user name"
                        name="name">
                </div>
                <p class=text-danger>
                    <?php
                    echo $name_err;

                    ?>
     </p>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1"
                        placeholder="enter your password" name="password" aria-describedby="emailHelp">
                </div>
                <p class=text-danger>
                    <?php
                    echo $password_err;
                    ?>
                </p>



                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>