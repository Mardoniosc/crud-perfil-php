<?php
include_once('../conexao.php');

// buscando todos os perfils
$sql = "SELECT id, nome FROM perfil";
$stm = $conexaoPDO->prepare($sql);
$stm->execute();
$dados = $stm->fetchAll(PDO::FETCH_OBJ);


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
<h1 class="m-4 text-3xl font-bold">
    Lista de perfils
  </h1>
  <?php  if ($stm->rowCount() != 0): ?>

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
          <?php foreach ($dados as $linhas): ?>

            <tr class="border-b dark:border-neutral-500">
              <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $linhas->id; ?></td>
              <td class="whitespace-nowrap px-6 py-4"><?php echo $linhas->nome; ?></td>
              <td class="whitespace-nowrap px-6 py-4">
                
                  <a
                    href="#"
                    class="rounded bg-green-200 mr-3 cursor-pointer px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-green-500 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:hover:bg-neutral-700">
                    Editar
                  </a>
                  <a
                    href="perfil-lista.php?perfil_nome=<?php echo $linhas->nome;?>&id=<?php echo $linhas->id;?>"
                    class="rounded bg-red-300 cursor-pointer px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-red-500 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:hover:bg-neutral-700">
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
<?php  endif; ?>

<?php  if ($stm->rowCount() == 0): ?>
    <div class="w-1/2 m-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
      <p class="font-bold">Info!</p>
      <p>Nenhum registro encontrado na base!</p>
    </div>
<?php endif; ?>
<?= $_GET['perfil_nome']; ?>

<?php if(!empty($_GET['perfil_nome']) && !empty($_GET['id'])):?>
<!-- JAVASCRIPT PARA EXCLUIR ITEM -->
<script>
        var resultado = confirm("Deseja realmente excluir o perfil " + '<?php echo $_GET['perfil_nome'];?>' + "?");
        if(resultado == true) {
          window.location.href = "perfil-lista.php?action=delete&id=" + <?php echo $_GET['id'];?>;
        }
</script>
<?php endif; ?>

<?php if(!empty($_GET['action']) && $_GET['action']== 'delete' && !empty($_GET['id']) ) {
  $id = $_GET['id'];
  try {
    $sql = "DELETE FROM perfil WHERE id=:id";
    $stm = $conexaoPDO->prepare($sql);
    $stm->bindValue(':id', $id);
    $stm->execute();
  } catch (\Throwable $th) {
      echo $th->getMessage();
      // header("Location: perfil-lista.php?action=delete&msg=error");
      exit();
  }
  
  header("Location: perfil-lista.php?action=delete&msg=success");
}
?>

<!-- mensagens padroes -->
<?php if(!empty($_GET['action']) && !empty($_GET['msg'])) : ?>

  <?php if($_GET['msg'] == 'success' && $_GET['action'] == 'delete'):?>
  <div class="w-1/2 mx-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
    <p class="font-bold">Sucesso!</p>
    <p>Perfil Deletado com sucesso!</p>
  </div>
<?php endif; ?>


<?php if($_GET['msg'] == 'error' && $_GET['action'] == 'delete'):?>
  <div class="w-1/2 mx-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
    <p class="font-bold">Sucesso!</p>
    <p>Erro ao deletar perfil!</p>
  </div>
<?php endif; ?>

<?php endif; ?>



</body>
</html>