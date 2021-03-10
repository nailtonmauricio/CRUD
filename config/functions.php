<?php

//Formatar um número para Real brasileiro

function convertCurrency($data)
{
    $data = str_replace(".", "", $data);
    $data = str_replace(",", ".", $data);

    return $data;
}

function antInjection($data)
{
    $characters = array(";", "=", "&", "|", "`");
    $data = str_replace($characters, "", $data);
    $data = trim($data);
    $data = rtrim($data);
    $data = strip_tags($data);
    return addslashes($data);
}
