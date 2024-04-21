<?php
require_once __DIR__ . "/adminheader.php";
require_once(__DIR__ . "/../config/dbh.php");
require_once(__DIR__ . "/../config/session.php");
require_once __DIR__ . "/../public/adminviewusers.classes.php";
require_once __DIR__ . "/../public/adminviewusers.contr.php";
$is_admin = 0;
$rows = new AdminViewUsersContr($is_admin);
$rows = $rows->userView();
?>


<div class="col-sm-12 col-md-12 col-lg-10 ">
    <div class="col-12 mb-3 d-flex mt-3">
        <input type="search" name="" id="" class="form-control" placeholder="Search for...">
        <button class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <div class="col-12 text-muted fw-bold mb-2">
        joshuajulius2030@gmail.com <img src="../img/IMG-20230409-WA0055.jpg" class="img-fluid rounded-circle" width="30" alt="">
    </div>
    <h6>User details</h6>
    <div class="card table-responsive shadow">
        <!-- <div class="card-header w-100">
                        user details
                    </div> -->
        <div class="card-body">
            <table class="table table-responsive table-bordered border--secondary">
                <thead>
                    <tr>
                        <th scope="row">S/N</th>
                        <th scope="row">Name</th>
                        <th scope="row">Email</th>
                        <th scope="row">Username</th>
                        <th scope="row">Registration Number</th>

                        <th scope="row">Delete</th>
                        <th scope="row">Edit</th>
                        <th scope="row">Photo</th>

                    </tr>
                </thead>
                <tbody>


                    <?php
                    foreach ($rows as $row) :

                    ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['fullName'] ?> </td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['regNo'] ?></td>

                            <td><a href="delete_users.php?id=<?= $row['id']; ?>" class="btn-del btn alert-danger shadow"><i class="fa-solid fa fa-trash"></i></a></td>
                            <td><a href="delete_users.php?id=<?= $row['id']; ?>" class="btn-del btn alert-primary shadow"><i class="fa fa-edit"></i></a></td>
                            <td><img class="img-fluid" style="width:200px; " src="../inc/profileUploads/<?= $row['profileImage'] ?>" alt=""></td>
                        </tr>
                    <?php endforeach ?>


                </tbody>
            </table>


            <?php if (isset($_GET['m'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
            <?php endif ?>
            <script src="../assets/sweetalert/jquery-3.6.4.min.js"></script>
            <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>
            <script>
                $('.btn-del').on('click', function(e) {
                    e.preventDefault();
                    const href = $(this).attr('href')

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Record will be deleted',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Delete Record',
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = href;
                        }

                    })
                })
                const flashdata = $('.flash-data').data('flashdata')
                if (flashdata) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Record Deleted',
                        text: 'User has been deleted successfully'
                    })
                }
            </script>
        </div>
    </div>
</div>
<?php 
require_once __DIR__. "/adminFooter.php";
?>
