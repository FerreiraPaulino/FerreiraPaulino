<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$passe'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['nome'];
        $_SESSION['cargo'] = $row['cargo'];

        if ($row['cargo'] == 'admin') {
            header("Location: inicio.php");
        }
    } else {
        $error = "Nome ou senha invalida!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User And Admin Login </title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        body{
            background-image: url("imagens/Fundo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        *{
            box-sizing: border-box;
        }
        h2{
            text-align: center;
            margin-bottom: 40px;
        }
        form{
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }
        input{
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
        }
        button{
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }
    </style>
</head>
<body>
<?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="">
    <p>	
	    <div><H2>Sistema de Gestão de Alunos</H2>
    </p>
	<div align="center">
		<p>
            <img src="Imagens/ISPAJ.jpg">
		</p>
	</div>

	    <input type="email" name="email" value="" placeholder="Email">
        <input type="password" name="passe" placeholder="Palavra-passe">
        <button type="submit" class="btn" >Login</button>
    </form>
</body>
</html>