<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<style>
			*{
		   font-family: 'Rubik', sans-serif;
		   margin:0; padding:0;
		   box-sizing: border-box;
		   list-style: none;
		  
			}
			nav{
				background: #8ad7f1;
				height: 80px;
				width: 100%;
			}
			label.logo{
				color: white;
				font-size: 35px;
				line-height: 80px;
				padding: 0 100px;
				font-weight: bold;
			}
			nav ul{
				float:right;
				margin-right:20px;
			}
			nav ul li{
				display: inline-block;
				line-height:80px;
				margin:0 5px;
			}
			nav ul li a{
				color:white;
				font-size:17px;
				padding: 7px 13px;
				border-radius: 3px;
				text-transform:uppercase;
				text-decoration:none;
			}
			a.active,a:hover{
				background: #b6e7f8;
				transition:.5s;
		
			}
			.checkbtn{
				font-size:30px;
				color:white;
				float:right;
				line-height:80px;
				margin-right:40px;
				cursor:pointer;
				display:none;
			}
			#check{
				display:none;
			}
			@media (max-width: 952px){
				label.logo{
					font-size:30px;
					padding-left:50px;
				}
				nav ul li a{
					font-size:16px;
				}
			}
			@media (max-width:858px) {
				.checkbtn{
					display:block;
				}
				ul{
					position:fixed;
					width:100%;
					height:100vh;
					background:#2c3e50;
					top:80px;
					left:-100%;
					text-align:center;
					transition: all .5s;
				}
				nav ul li{
					display:block;
					margin: 50px 0;
					line-height:80px;
				}
				nav ul li a{
					font-size:20px;
				}
				a:hover,a.active{
					background:none;
					color:#0082e6;
				}
				#check:checked ~ ul{
					left:0;
				}
			}
				</style>
</head>
<body>
<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"><ion-icon name="menu-outline"></ion-icon></label>
        <label class="logo">Education</label>
        <ul>
            <li><a  href="inicio.php">Inicio</a></li>
            <li><a href="index.php">Adicionar</a></li>
            <li><a href="participação.php">Participação</a></li>
            <li><a class="active" href="relatorio.php">relatorio</a></li>
        </ul>
    </nav>
<table width="800" border="1" align="center">
      <tr>
        <td bordercolor="#330033" bgcolor="#CCCCFF"><h1 align="center"><strong><span class="style1">Sistema de avaliação de presença</span></strong></h1></td>
      </tr>
      <tr>
       
      </tr>
      <tr>
        <td><div align="center">
        <form action="" method="post">
          <table width="606" border="2" align="center" bordercolor="#9966FF" bgcolor="#C7B6B1">
          	<tr><td colspan="3" align="center"><h3>Pesquisa os ausentes aqui!</h3></td></tr>
            <tr>
              <td width="308" bgcolor="#9999CC"><div align="center"><strong><span class="style2">Enter the p_id</span></strong></div></td>
              <td width="144" bgcolor="#9999CC"><span class="style6">
                <input type="text" name="eno" />
              </span></td>
              <td width="130" bgcolor="#9999CC"><input type="submit" value="Ver informação" name="btnsubmit"/></td>
            </tr>
          </table>
          </form>
        </div></td>
      </tr>
		<?php
		if(isset($_POST["btnsubmit"]))
		{
			include "conn.php";
			extract($_POST);
			$query = "select * from `estudante` where id = ".$eno." limit 1";

			$result = mysqli_query($conn,$query);
			while($rec = mysqli_fetch_array($result))
			{
				echo '<tr><td colspan="2"><table width="400" border="2" align="center" bordercolor="#9966FF" bgcolor="#C7B6B1">
				<tr>
				  <td width="160" bgcolor="#9999CC"><span class="style2">p_id</span></td>
				  <td width="160" bgcolor="#9999CC"><span class="style2">Name</span></td>';
				  $query1 = "select * from presença where `id` = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1)or die("select error error");
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td bgcolor="#9999CC" class=style2>'.$rec1["data"].'</td>';
					}
				echo '</tr>
				<tr>
				  <td width="222"><span class="style6">'.$rec["id"].'</span></td>
				  <td width="222"><span class="style6">'.$rec["nome"].'</span></td>';
				  $query1 = "select *from presença where id = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1)or die("select error error");
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td>';
						if($rec1["presença"]==0)
							echo "Ausente";
						else
							echo "Presente";
						echo '</td>';
					}
				
				echo '
				</tr>
								
			  </table></td></tr>';
			}
		}
		else
		{
			include "conn.php";
			extract($_POST);
			$query = "select * from `estudante` ";

			$result = mysqli_query($conn,$query);
			while($rec = mysqli_fetch_array($result))
			{
				echo '<tr><td colspan="2"><table width="90%" border="2" align="center" bordercolor="#9966FF" bgcolor="#C7B6B1">
				<tr>
				  <td width="160" bgcolor="#9999CC"><span class="style2">p_id</span></td>
				  <td width="160" bgcolor="#9999CC"><span class="style2">nome</span></td>';
				  $query1 = "select * from presença where id = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1);
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td bgcolor="#9999CC" class=style2>'.$rec1["data"].'</td>';
					}
				echo '</tr>
				<tr>
				  <td width="222"><span class="style6">'.$rec["id"].'</span></td>
				  <td width="222"><span class="style6">'.$rec["nome"].'</span></td>';
				  $query1 = "select * from presença where id = ".$rec["id"]." order by data";
					$result1 = mysqli_query($conn,$query1)or die("select error error");
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td>';
						if($rec1["presença"]==0)
							echo "Ausente";
						else
							echo "Presente";
						echo '</td>';
					}
				
				echo '
				</tr>
								
			  </table></td></tr>';
			}
		}
		?>    
	</table>

</body>
</html>