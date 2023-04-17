<?php
include_once "./conexao.php";
include_once "./model.php";
include_once "./dao.php";

//instancia as classes
$perfil = new Perfil();
$perfildao = new PerfilDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if (isset($_POST['cadastrar'])) {
  $perfil->setNome($d['nome']);
  $perfildao->create($perfil);
  header("Location: ../lista.php?action=cadastrado&msg=success");
}
// se a requisição for editar
else if (isset($_POST['editar'])) {

  $perfil->setNome($d['nome']);
  $perfil->setId($d['id']);

  $perfildao->update($perfil);

  header("Location: ../lista.php?action=atualizado&msg=success");
}
// se a requisição for deletar
else if (isset($_GET['del'])) {

  $perfil->setId($_GET['del']);

  $perfildao->delete($perfil);

  header("Location: ../lista.php?action=deletado&msg=success");
} else {
  header("Location: ../lista.php");
}
