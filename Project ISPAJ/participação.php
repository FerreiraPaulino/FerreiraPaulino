<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

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
            <li><a class="active" href="participação.php">Participação</a></li>
            <li><a href="relatorio.php">relatorio</a></li>
        </ul>
    </nav>
    

<title>Simple Online presença System - Avadh Tutor</title>

<script type="text/javascript">
	function getatt(value)
	{
		if(value == true)
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
		}
		else
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
		}
	}
</script>


<table width="800" border="1" align="center">
      
        <td>
        <form action="part.php" method="post">
        <table width="180px" align="left" style="">
            	<tr>
                	<td> Select date : <br />
                   <?php 
				 		    $dt = getdate();
							$day = $dt["mday"];
							$month = date("m");
							$year = $dt["year"];
							
							echo "<select name='cdate'>";
							for($a=1;$a<=31;$a++)
							{
								if($day == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cmonth'>";
							for($a=1;$a<=12;$a++)
							{
								if($month == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cyear'>";
							for($a=2010;$a<=$year;$a++)
							{
								if($year == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select>";
						?>                    
                    </td>
                </tr>
             </table>	
        
          <table width="400" border="2" align="left"  style="margin-left:20px;">
            <tr>
              <td colspan="3"><div align="center"><strong><span class="style2">Lista de presença</span></strong></div></td>
            </tr>
            <tr >
              <td><span >Id</span></td>
              <td><span >Nome</span></td>
              <td><span >Presença</span></td>
            </tr>
            <?php
				include "conn.php";
				extract($_POST);
				$query = "select * from estudante order by id";
				$s = 0;
				$result = mysqli_query($conn,$query);
				while($rec = mysqli_fetch_array($result))
				{
					$s = $s + 1;
					echo ' <tr>
							  <td width="114">'.$rec["id"].'</td>
							  <td width="152">'.$rec["nome"].'</td>
							  <td width="110"><input type=checkbox name='.$rec["id"].' onclick="getatt(this.checked);"/></td>
							</tr>';
				}
			?>			
            <tr>
              <td colspan="3"><div align="center">
                <input type="submit" value="Enviar" name="btnsubmit"/>
                &nbsp;&nbsp;</div></td>
            </tr>
          </table>
          </form>
         
         	<table width="100px" align="right" style="margin-left:35px">
            	<tr>
                	<td> Total Ausente : <input type="text" id="txtAbsent" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> Total Presente : <input type="text" id="txtPresent" value="0" size="10"  disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> Estudante Total : <input type="text" id="txtStrength" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
             </table>
         
         </td>
      </tr>
    </table>

</body>
</html>