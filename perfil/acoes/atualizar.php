<?php
include_once('../../conexao.php');

$nome = $_POST['nome'];
$id = $_POST['id'];

if(!empty($nome) && !empty($id) ) {
  try {
    $sql = "UPDATE perfil SET nome=:nome WHERE id=:id";
    $stm = $conexaoPDO->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':id', $id);
    $stm->execute();
  } catch (\Throwable $th) {
      //  echo $th->getMessage();
      header("Location: ../formCadastrar.php?action=atualizado&msg=error&nome=" . $nome);
      exit();
  }

  header("Location: ../perfil-lista.php?action=atualizado&msg=success");
  exit();
}

header("Location: ../perfil-lista.php");

?>