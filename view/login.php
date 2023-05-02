<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="og:image" content="<?= url('public/img/img1.jpg') ?>"/>
    <link rel="stylesheet" href="<?= url("public/css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?= url("public/css/style.css") ?>">
    <title>test project</title>
</head>
<body>
<div class="container">
    <?php
    $message = flash('error');
    if (!empty($message)) {
        ?>
        <div class="mb-2 alert alert-danger"><small class="form-text text-danger">
                <?= $message ?>
            </small></div>
        <?php
    } ?>
    <?php include BASE_PATH . "view/layout/header.php" ?>
    <div class="container">
        <form action="<?= url('reqlogin') ?>" method="post">
            <label class="mt-3" for="">username</label>
            <input type="text" name="username" class="form-control mt-3">
            <label class="mt-3" for="">password</label>
            <input type="password" name="password" class="form-control mt-3">
            <input type="submit" value="send" class="form-control btn btn-success mt-3">
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
