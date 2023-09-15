<?php
include 'connect.php';
if (isset($_GET['updatenome'])) {
    $nome = $_GET['updatenome'];
    // protecao contra sql injec.
    $sql = "SELECT * FROM `users` WHERE nome=?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $nome);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        if (isset($_POST['enviar'])) {
            $nomeNovo = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data'];

            $sqlUpdate = "UPDATE `users` SET nome=?, email=?, telefone=?, data=? WHERE nome=?";
            $stmtUpdate = mysqli_prepare($con, $sqlUpdate);

            if ($stmtUpdate) {
                mysqli_stmt_bind_param($stmtUpdate, "sssss", $nomeNovo, $email, $telefone, $data, $nome);
                if (mysqli_stmt_execute($stmtUpdate)) {
                    header('location: display.php');
                } else {
                    die(mysqli_error($con));
                }
                mysqli_stmt_close($stmtUpdate);
            } else {
                die(mysqli_error($con));
            }
        }
    } else {
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="pt-br">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <title>Cadastro</title>
</head>

<body>
     <div class="container my-5">
          <form method="post">
               <h2 style="font-family: 'Arial';">
                    Edite os dados do competidor:
               </h2>
               <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Insira seu nome" name="nome" value="<?php echo $row['nome']; ?>" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" placeholder="Insira seu e-mail" name="email" value="<?php echo $row['email']; ?>" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>Telefone</label>
                    <input type="number" class="form-control" placeholder="Insira seu telefone" name="telefone" value="<?php echo $row['telefone']; ?>" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" placeholder="Insira sua data de nascimento" name="data" value="<?php echo $row['data']; ?>" autocomplete="off">
               </div>
               <button type="submit" class="btn btn-primary" name="enviar">Editar</button>
          </form>
     </div>
</body>
</html>
