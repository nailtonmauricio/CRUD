<?php
session_start();
include_once "config/config.php";
$sql = "SELECT customers.id, customers.name, customers.birth_date, customers.document, customers.phone, customers.email, customers.address, customers.modified, customers.contribution, frequency.id AS frequency_id, frequency.name AS frequency, payments.id AS payment_id, payments.type AS payment FROM customers JOIN frequency ON customers.frequency_id = frequency.id JOIN payments ON customers.payment_id = payments.id ORDER BY customers.id";
$res = $conn->prepare($sql);
$res->execute();
$row = $res->fetchAll(PDO::FETCH_ASSOC);
//DEBUG
#$res->debugDumpParams();
?>
<!doctype html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Sistema</title>
    <style>
        #register_button {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container container-fluid">
    <?php
    if(!$res->rowCount())
    {
        $_SESSION["msg"] = "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'><strong>Nem um registro encontrado na base de dados.</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    if (isset($_SESSION["msg"])) {
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }

    ?>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end container container-fluid" id="register_button">
    <!-- Button trigger modal for customer registration-->
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-check2-square"></i> Register
    </button>
    <hr/>
</div>
<div class="container container-fluid">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Full Name</th>
            <th scope="col">Frequency</th>
            <th scope="col">Modified</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($row as $tr): ?>
            <tr>
                <th scope="row"><?= $tr["id"] ?></th>
                <td><?= $tr["name"] ?></td>
                <td><?= $tr["frequency"] ?></td>
                <td><?= (!is_null($tr["modified"])) ? date("d/m/Y H:i:s", strtotime($tr["modified"])) : "" ?></td>
                <td class="text-center">
                    <button type="button" name="update" id="update" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate<?= $tr["id"] ?>" data-bs-whatever="<?= $tr["id"] ?>" title="Update record"><i class="bi bi-upload"></i></button>
                    <button type="button" name="read" id="read" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdropRead<?= $tr["id"] ?>" data-bs-whatever="<?= $tr["id"] ?>"><i class="bi bi-list" title="List information"></i></button>
                    <a href="delete/delete_customer.php?id=<?= $tr["id"] ?>"<button class="btn btn-outline-danger" onclick="return confirm('Remover registro?')"><i class="bi bi-trash"></i></button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
include_once "create/form_create.php";
foreach ($row as $modalItem)
{
    include "viewer/form_read.php";
    include "update/form_update.php";
}
?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script>
    jQuery(function ($) {
        $(".document").mask("999.999.999-99");
        $(".phone").mask("(99) 99999-9999");
        $(".contribution").mask("###.##0,00", {reverse: true});
    });
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>
