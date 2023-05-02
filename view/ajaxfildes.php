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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>create item</title>
</head>
<body>
<?php include BASE_PATH . "view/layout/header.php" ?>

<div class="container">
    <!-- Button trigger modal -->
    <button value="h" type="button" class="btn btn-primary m-auto mt-4 b" data-toggle="modal"
            data-target="#exampleModal">
        create item
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= url('/created/req/item') ?>" id="myForm" method="post"
                          enctype="multipart/form-data">
                        <label for="image"></label>
                        <input type="file" class="form-control mt-2" accept="image/*" id="img" name="img">
                        <label for="">name</label>
                        <input type="text" class="form-control mt-2" name="name" id="name">

                        <input type="submit" value="send" class="form-control mt-2 btn btn-success">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">count</th>
            <th scope="col">name</th>
            <th scope="col">image</th>
            <th scope="col">status</th>
        </tr>
        </thead>
        <tbody id="data-container">

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        function fetchData() {
            $.ajax({
                url: "<?=url('/ajax/item')?>",
                type: 'get',
                dataType: 'html',
                success: function (data) {
                    $('#data-container').html(data);
                    setTimeout(fetchData, 4000); // درخواست بعدی پس از 4 ثانیه
                },
                error: function () {
                    setTimeout(fetchData, 4000); // درخواست بعدی پس از 4 ثانیه
                }
            });
        }

        fetchData(); // شروع درخواست ها
    });


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
