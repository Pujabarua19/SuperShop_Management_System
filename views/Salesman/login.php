<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../resources/style/summery.css">
    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resources/style/style.css">

    <title>Salesman Login</title>
    <script>

    </script>

</head>
<body style="background-image: url('../resources/images/ad_back.jpg');">


<div id="contentt">
    <img src="../../resources/images/pic.png" alt="" width="1380" height="180"/>
</div>

<div class="container" style="margin-top: 2%">
    <div id="content">
        <h1>Salesman Log in</h1>
        <form action="salesmanLoginCheck.php" method="post">
            <div class="md-form col-8 offset-2">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input  type="text" id="materialFormCardEmailEx" class="form-control" name="email">
                <label for="materialFormCardEmailEx" class="font-weight-light">Username</label>
            </div>

            <!-- Material input email -->

            <!-- Material input password -->
            <div class="md-form col-8 offset-2">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="materialFormCardPasswordEx" class="form-control" name="password">
                <label for="materialFormCardPasswordEx" class="font-weight-light">Password</label>
            </div>

            <div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-success">Log in</button>

            </div>

        </form>
    </div>
</div>

</body>
</html>