<?php

// Ligação a Base de Dados
include '../ligacao_bd.php';


$sql = "SELECT * FROM ocorrencias";  
$setRec = mysqli_query($conn, $sql);  

$columnHeader = '';  
$columnHeader = "ID" . "\t" . "Nome Ocorrência" . "\t";  
$setData = '';  


  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 