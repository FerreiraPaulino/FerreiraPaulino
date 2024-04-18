
<?php
	if(isset($_POST["btnsubmit"]))
	{
		include "conn.php";
		
		$data = $_POST["cyear"]."-".$_POST["cmonth"]."-".$_POST["cdata"];
               		
		$query = "select *from estudante ";
		$result = mysqli_query($conn,$query)or die("select error");
		while($rec = mysqli_fetch_array($result))
		{
			$mno = $rec["id"];
			if(isset($_POST[$mno]))
			{
				$query1 = "INSERT INTO  presença(`id` ,  `data` ,  `presença`) VALUES('$mno','$data','1')";
			}
			else
			{
				$query1 = "INSERT INTO  presença(`id` ,  `data` ,  `presença`) VALUES('$mno','$data','0')";
			}
			mysqli_query($conn,$query1)or die("insert error".$mno);
			print "<script>";
			print "alert('presença get successfully....');";
			print "self.location='index.php';";
			print "</script>";
		}
		
		
			
		
	}
	