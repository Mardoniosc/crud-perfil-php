<?php
include_once('../../conexao.php');

$nome = $_POST['nome'];

if(!empty($nome)) {
  try {
    $sql = "INSERT INTO perfil (nome) VALUES(:nome)";
    $stm = $conexaoPDO->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->execute();
  } catch (\Throwable $th) {
      // echo $th->getMessage();
      header("Location: ../formCadastrar.php?action=cadastrado&msg=error&nome=" . $nome);
      exit();
  }

  header("Location: ../perfil-lista.php?action=cadastrado&msg=success");
  exit();
}

header("Location: ../perfil-lista.php");

?>