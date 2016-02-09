<?php
	require_once "dbconnect/dbconnect.php";
	opendb();

	if(isset($_POST['checkUser']))
	{	
		
		$userName = secure(trim($_POST['uid']));
		$pwd=secure(trim($_POST['pwrd']));
		$pwd2 = md5($pwd);

			$stmt = $mysqli->prepare("SELECT username,password FROM administrator WHERE nm_user=?");
			$stmt->bind_param('s',$userName);
			$stmt->execute();
			$stmt->store_result();
			$row = $stmt->num_rows;
			
			if($row<1)
			{

				echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
				echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
				echo "Nama user tidak ada !";
				echo "</div>";
						
			}
			else
			{
				$stmt->bind_result($uid,$name, $pw,$akses);
				$rek = $stmt->fetch();
				
				if($pw!==$pwd2)
				{
					echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
					echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
					echo "Password salah ! ";
					echo "</div>";
					
				
				}
				else
				{	
				
					session_start();
					$_SESSION['SES_LOGIN'] = $uid; 
					$_SESSION['USER_LEVEL'] = $akses;
					
					echo "<script>document.location.href='page.php?open=home'</script>";
					//header('location : page.php');
				}
				
					
			}	
		
	}else{
		echo "<script>document.location.href='index.php'</script>";
	}	
?>