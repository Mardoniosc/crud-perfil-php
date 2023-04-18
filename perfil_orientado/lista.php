<?php
include_once('../conexao_orientado.php');
include_once('./perfil/dao.php');
include_once('./perfil/model.php');

//instancia as classes
$perfildao = new PerfilDAO();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>

  <!-- SCRIPT PARA CSS -->

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="flex flex-row justify-around">
    <h1 class="m-4 text-3xl font-bold">
      Lista de perfils Orientado - <a href="lista.php" class="text-blue-400">HOME</a>
    </h1>
    <h1 class="m-4 text-3xl font-bold">
      <a href="./form.php" class="text-blue-400">+ Cadastrar</a>
    </h1>

  </div>

  <div class="flex flex-col">

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th scope="col" class="px-6 py-4">Id</th>
                <th scope="col" class="px-6 py-4">Nome</th>
                <th scope="col" class="px-6 py-4">Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($perfildao->read() as $perfil) : ?>

                <tr class="border-b dark:border-neutral-500">
                  <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $perfil->getId(); ?></td>
                  <td class="whitespace-nowrap px-6 py-4"><?php echo $perfil->getNome(); ?></td>
                  <td class="whitespace-nowrap px-6 py-4">

                    <a href="./form.php?id=<?php echo $perfil->getId(); ?>" class="rounded bg-green-200 mr-3 cursor-pointer px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-green-500 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:hover:bg-neutral-700">
                      Editar
                    </a>
                    <a href="./perfil/controller.php?del=<?php echo $perfil->getId(); ?>" class="rounded bg-red-300 cursor-pointer px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-red-500 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:hover:bg-neutral-700">
                      Excluir
                    </a>
                  </td>
                </tr>

              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MENSAGENS PADRẼOS -->
  <?php if (!empty($_GET['action']) && !empty($_GET['msg'])) : ?>

    <?php if ($_GET['msg'] == 'success') : ?>
      <div class="w-1/2 mx-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p class="font-bold">Sucesso!</p>
        <p>Perfil <strong><?php echo $_GET['action']; ?></strong> com sucesso!</p>
      </div>
    <?php endif; ?>


    <?php if ($_GET['msg'] == 'error') : ?>
      <div class="w-1/2 mx-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p class="font-bold">Error!</p>
        <p>Erro ao <strong><?php echo $_GET['action']; ?></strong> perfil!</p>
      </div>
    <?php endif; ?>

  <?php endif; ?>

</body>

</html>