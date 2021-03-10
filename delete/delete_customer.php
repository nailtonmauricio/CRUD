<?php
session_start();
include_once "../config/config.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
if(!empty($id))
{
    $sql = "DELETE FROM customers WHERE id =:id";
    $res = $conn->prepare($sql);
    $res ->bindParam("id", $id, PDO::PARAM_INT);
    $res ->execute();

    //DEBUG
    #$res->debugDumpParams();

    if($res->rowCount()>0)
    {
        $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
  <strong>Cliente apagado com sucesso</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
        header("Location: ../index.php");
    }
}