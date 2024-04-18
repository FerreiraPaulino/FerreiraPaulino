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
            <li><a class="active" href="inicio.php">Inicio</a></li>
            <li><a href="index.php">Adicionar</a></li>
            <li><a href="participação.php">Participação</a></li>
            <li><a href="relatorio.php">relatorio</a></li>
        </ul>
    </nav>
<section>
    <img width=100% height=1000 src="internship.png" >
</section>
</body>
</html>