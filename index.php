<?php 

     include 'connect.php';

     if(isset($_POST['enviar'])){
          $nome=$_POST['nome'];
          $email=$_POST['email'];
          $telefone=$_POST['telefone'];
          $data=$_POST['data'];
          
          $sql="insert into `users` (nome,email,telefone,data)
          values('$nome','$email','$telefone','$data')";
          $result=mysqli_query($con,$sql);

          if($result){
               // echo "Banco de dados conectado";
               header('location:display.php');
          } else{
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
                    Registre os dados do competidor:
               </h2>
               <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Insira seu nome" name="nome" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" placeholder="Insira seu e-mail" name="email" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>Telefone</label>
                    <input type="number" class="form-control" placeholder="Insira seu telefone" name="telefone" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" placeholder="Insira sua data de nascimento" name="data" autocomplete="off">
               </div>
               <button type="submit" class="btn btn-primary" name="enviar">ENVIAR</button>
          </form>
     </div>
</body>

</html>