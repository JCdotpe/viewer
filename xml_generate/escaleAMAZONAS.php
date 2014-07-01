<?php
require("phpsqlajax_dbinfo.php");
ini_set('memory_limit', '64M');

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

$query = "select * from v_Fotos_Capitulos where cap <> 3 order by id_local";
// $query = "select * from v_ubigeo_local order by codigo_de_local";

$result = mssql_query($query);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<?xml version="1.0" encoding="utf-8" ?>';
/*echo '<?xml version="1.0" encoding="ISO-8859-1"?>';*/
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mssql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  // echo 'id_local="' . parseToXML($row['codigo_de_local']) . '" '; 
  // echo 'nro_pred="' . parseToXML($row['Nro_Pred']) . '" ';
  // echo 'dpto_nombre="' . parseToXML($row['c_dpto_nombre']) . '" '; 
  // echo 'prov_nombre="' . parseToXML($row['c_prov_nombre']) . '" '; 
  // echo 'dist_nombre="' . parseToXML($row['c_dist_nombre']) . '" ';
  // echo 'cod_dpto="' . parseToXML($row['c_cod_dpto']) . '" ';
  // echo 'cod_prov="' . parseToXML($row['c_cod_prov']) . '" ';
  // echo 'cod_dist="' . parseToXML($row['c_cod_dist']) . '" ';
  // echo 'ccpp="' . parseToXML($row['centroPoblado']) . '" ';

  echo 'id_local="' . parseToXML($row['id_local']) . '" ';
  echo 'nro_pred="' . parseToXML($row['nro_pred']) . '" '; 
  echo 'cap="' . parseToXML($row['cap']) . '" '; 
  echo 'ruta_foto="' . parseToXML($row['ruta_foto']) . '" ';
  echo 'cod_dpto="' . parseToXML($row['C_cod_dpto']) . '" ';
  echo 'cod_prov="' . parseToXML($row['C_cod_prov']) . '" ';
  echo 'cod_dist="' . parseToXML($row['C_cod_dist']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>