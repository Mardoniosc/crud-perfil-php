<?php 
include_once('../../conexao.php');


if(!empty($_GET['id']) ) {
  $id = $_GET['id'];
  try {
    $sql = "DELETE FROM perfil WHERE id=:id";
    $stm = $conexaoPDO->prepare($sql);
    $stm->bindValue(':id', $id);
    $stm->execute();
  } catch (\Throwable $th) {
      // echo $th->getMessage();
      header("Location: ../perfil-lista.php?action=deletado&msg=error");
      exit();
  }
  
  header("Location: ../perfil-lista.php?action=deletado&msg=success");
  exit();
}

header("Location: perfil-lista.php");
