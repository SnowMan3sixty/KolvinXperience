<?php

require_once('Categoria.php');

$categoria = new Categoria();

$categoria = $categoria->selectTotesCategories();

echo json_encode($categoria);

?>