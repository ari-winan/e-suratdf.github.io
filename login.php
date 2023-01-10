<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAS - Sistem Informasi Arsip Surat</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    <link href="assets/berandaLogin.css" rel="stylesheet">


</head>

    <body oncontextmenu='return false' class='snippet-body'>
    <body class="login">
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>
        <div class="wrapper bg-white">

    <form action="controllers/act_login.php" method="post">
        <div class="h2 text-center">E-Arsip</div>
        <div class="h6 text-muted text-center pt-2"
        >Masukkan Username dan Password</div>
        <form class="pt-3">
            <div class="form-group py-2">
                <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" name="username" placeholder="Username" required class=""> </div>
            </div>
            <div class="form-group py-1 pb-2">
                <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="password" name="password" placeholder="Password" required class=""></div>
            </div>
            <div class="d-flex align-items-start">
                <div class="remember"> <label class="option text-muted"> Remember me <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
            </div> <button class="btn btn-success text-center my-3" type="submit" name="login">Log in</button>
        </form>
    </div>
<script type='text/javascript'></script>
</body>
</html>