<?php 
     include 'connect.php';


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="estilo.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
          <button class="btn btn-primary my-5"><a href="index.php" style="color:aliceblue">Adicionar</a>
          </button>
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data de Nascimento</th>
    </tr>
  </thead>
  <tbody>
     <?php 

     $sql="Select * from `users`";
     $result=mysqli_query($con,$sql);
     if($result){
          while($row=mysqli_fetch_assoc($result)){
               $nome=$row['nome'];
               $email=$row['email'];
               $telefone=$row['telefone'];
               $data=$row['data'];
               echo '<tr>
               <th scope="row">'.$nome.'</th>
               <td>'.$email.'</td>
               <td>'.$telefone.'</td>
               <td>'.$data.'</td>
               <td>
               <button class="btn btn-primary"><a href="update.php?updatenome='.$nome.'" style="color:aliceblue">Editar</a></button>
               <button class="btn btn-danger"><a href="delete.php?deletenome='.$nome.'" style="color:aliceblue">Apagar</a></button>
               </td>
             </tr>';
          }
     }

     ?>
     
  </tbody>
</table>
     </div>
</body>
</html>