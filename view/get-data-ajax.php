<?php foreach ($item as $i) { ?>
    <tr>
        <th scope="row">1</th>
        <td><?= $i['name'] ?></td>
        <td><img style="width: 100px;height: 100px" src="<?= url($i['img']) ?>"></td>
        <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                edite
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <label for="">name</label>
                                <input type="text" value="<?= $i['name'] ?>" class="form-control mt-2"
                                       name="name" id="">
                                <label for="image"></label>
                                <img style="width: 100px;height: 100px;border-radius: 50%"
                                     src="<?= url($i['img']) ?>" alt="">
                                <input type="file" class="form-control mt-2" name="img">
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
            <button onclick="delete()" id="btn-<?= $i['id'] ?>" value="<?= $i['id'] ?>" class="btn btn-danger item">
                delete
            </button>
        </td>
    </tr>
<?php } ?>
