<?php
session_start();
include_once "../config/config.php";
require_once "../config/functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
    //DEBUG
    #var_dump($data);

    $register_name = antInjection($data["register_name"]);
    $register_contribution = convertCurrency($data["register_contribution"]);

    //CRIAR AS VALIDAÇÕES DE CAMPOS VAZIOS E TUDO MAIS
    $sql = "INSERT INTO customers VALUES(DEFAULT, :name, :birth_day, :document, :phone, :email, :address, :frequency_id, :payment_id, :contribution, NOW(), NULL)";
    $res = $conn->prepare($sql);
    $res->bindValue("name", $register_name, PDO::PARAM_STR);
    $res->bindValue("birth_day", $data["register_birth_date"], PDO::PARAM_STR);
    $res->bindValue("document", $data["register_document"], PDO::PARAM_STR);
    $res->bindValue("phone", $data["register_phone"], PDO::PARAM_STR);
    $res->bindValue("email", $data["register_email"], PDO::PARAM_STR);
    $res->bindValue("address", $data["register_address"], PDO::PARAM_STR);
    $res->bindValue("frequency_id", $data["register_frequency"], PDO::PARAM_INT);
    $res->bindValue("payment_id", $data["register_payment"], PDO::PARAM_INT);
    $res->bindValue("contribution", $register_contribution, PDO::PARAM_STR);
    $res->execute();

    //DEBUG
    #$res->debugDumpParams();

    if($res->rowCount()>0)
    {
        $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
  <strong>Cliente cadastrado com sucesso</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
        header("Location: ../index.php");
    }
}