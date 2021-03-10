<?php
session_start();
include_once "../config/config.php";
require_once "../config/functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
    //DEBUG
    #var_dump($data);

    $update_name = antInjection($data["update_name"]);
    $update_contribution = convertCurrency($data["update_contribution"]);

    $sql = "UPDATE customers SET name =:update_name, birth_date =:update_birth_date, document =:update_document, phone =:update_phone, email =:update_email, address =:update_address, frequency_id =:update_frequency, payment_id =:update_payment, contribution =:update_contribution, modified = NOW() WHERE id =:update_id";
    $res = $conn->prepare($sql);
    $res ->bindValue("update_name", $update_name, PDO::PARAM_STR);
    $res ->bindValue("update_birth_date", $data["update_birth_date"], PDO::PARAM_STR);
    $res ->bindValue("update_document", $data["update_document"], PDO::PARAM_STR);
    $res ->bindValue("update_phone", $data["update_phone"], PDO::PARAM_STR);
    $res ->bindValue("update_email", $data["update_email"], PDO::PARAM_STR);
    $res ->bindValue("update_address", $data["update_address"], PDO::PARAM_STR);
    $res ->bindValue("update_frequency", $data["update_frequency"], PDO::PARAM_INT);
    $res ->bindValue("update_payment", $data["update_payment"], PDO::PARAM_INT);
    $res ->bindValue("update_contribution", $update_contribution, PDO::PARAM_STR);
    $res ->bindValue("update_id", $data["update_id"], PDO::PARAM_INT);
    $res ->execute();

    //DEBUG
    $res ->debugDumpParams();
    if($res->rowCount()>0)
    {
        $_SESSION["msg"] = "<div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
  <strong>Atualizações realizadas com sucesso</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
        header("Location: ../index.php");
    }
}

