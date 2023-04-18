<?php
include_once('./perfil/conexao.php');
include_once('./perfil/dao.php');
include_once('./perfil/model.php');
$id = $_GET['id'];

//instancia as classes
$perfildao = new PerfilDAO();
$perfil = new Perfil();
$perfil->setId($id);
$perfil = $perfildao->readById($perfil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil Cadastrar</title>

  <!-- SCRIPT PARA CSS -->
 
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="flex flex-row justify-around">
    <h1 class="m-4 text-3xl font-bold">
      <a href="lista.php" class="text-blue-400">HOME</a>
    </h1>
  </div>

<div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden p-6">
      <form class="w-full max-w-lg" action="./perfil/controller.php" method="POST">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Nome
            </label>
            <input value="<?= $perfil->getNome() ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Nome do perfil" name="nome">

            <input type="hidden" name="id" value="<?= $perfil->getId() ?>" />
          </div>
        </div>
        <button 
          class="w-32 flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" 
          type="submit"  
          name="<?php echo $perfil->getId() ? 'editar' : 'cadastrar' ?>"
        >
          <?php echo $perfil->getId() ? 'editar' : 'cadastrar' ?>
        </button>
      </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>