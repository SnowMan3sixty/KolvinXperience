<?php

include('./Db/database.php');

$search = $_POST['buscador'];
if(!empty($search)) {
  $query = "SELECT * FROM categoria WHERE nombre LIKE '$search%'";
  $result = mysqli_query($connection, $query);
  

  while ($fila = mysqli_fetch_array($result)){
    $resultadoConsulta .= ','.$fila['nombre'];
  }

  echo $resultadoConsulta;


//   if(!$result) {
//     die('Query Error' . mysqli_error($connection));
//   }
//   
//   $json = array();
//   while($row = mysqli_fetch_array($result)) {
//     $json[] = array(
//       'name' => $row['name'],
//       'description' => $row['description'],
//       'id' => $row['id']
//     );
//   }
//   $jsonstring = json_encode($json);
//   echo $jsonstring;
// }
}
?>