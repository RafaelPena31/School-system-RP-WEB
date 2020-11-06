<?php 
header("Content-type:text/html; charset=utf8");

require_once "../classes/Alunos.php";

$Alunos = new Alunos();
$listaAlunos = $Alunos->listarTodos();

if(isset($_GET["matricula"])) {
    $Alunos->excluir($_GET["matricula"]);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Styles/bootstrap.min.css" />
  <link rel="stylesheet" href="../Styles/global.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      body {
          background: #fff;
      }
  </style>

  <title>Alunos</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-11">
        <h3>Lista de Alunos</h3>
      </div>
      <div class="col-md-1">
        <a href="create_alunos.php" class="btn btn-success">Novo</a>
      </div>
    </div>

    <table class="table table-dark">
      <thead>
        <tr>
          <th>Matrícula</th>
          <th>Nome</th>
          <th>Sexo</th>
          <th>Telefone</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      
        <?php 
          if($listaAlunos) :
            foreach ($listaAlunos as $aluno) : ?>
            <tr>
              <td><?php echo $aluno->MATRICULA; ?></td>
              <td><?php echo $aluno->NOME; ?></td>
              <td><?php echo $aluno->SEXO; ?></td>
              <td><?php echo $aluno->TELEFONE; ?></td>
              <td>
                <a href="update_alunos.php?matricula=<?php echo $aluno->MATRICULA; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a href="index_alunos.php?matricula=<?php echo $aluno->MATRICULA; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
          <td colspan="5">Nenhum aluno cadastrado!!!</td>
        </tr>
        <?php endif; ?>

      </tbody>
    </table>

  </div> 
</body>
<script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"
  ></script>
</html>