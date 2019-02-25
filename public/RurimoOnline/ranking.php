<?PHP
  header("Content-Type: text/html; charset=UTF-8");
 
  echo "<HTML><HEAD><title>루리모온라인 랭킹</title></HEAD><BODY><h2 style='text-align: center'; >";
  echo "</br></br>루리모 온라인 랭킹(1~30위)";
  echo "</h2></br></BODY></HTML>";
 
 	$mysqli = new mysqli('localhost', 'root', 'abs753951', 'supremeplay');
	if (mysqli_connect_error())
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	
	mysqli_set_charset($mysqli,"utf8");
	
	//Select ID
	$result = $mysqli->query("select* from userinfo Order By (maxhp+0) + (maxmp+0) DESC");
	
	echo '<table border="1" align="center" cellpadding="15" cellspacing="15" style="border-collapse:collapse";>';
	echo '<tr><th>닉네임</th><th>직업</th><th>레벨</th><th>금전</th></tr>'; 
	 
	$count=0;
	while($row = mysqli_fetch_array($result))
	{
		$job='평민';
		if($count==30) break;
		
		echo '<tr>';
		echo '<td>',$row['nickname'].'</td>';
		
		// job name matching
		if(strcmp($row['job'], '2') == 0) $job = '주술사';
		else if(strcmp($row['job'], '3') == 0) $job = '술사';
		else if(strcmp($row['job'], '4') == 0) $job = '도사';
		else if(strcmp($row['job'], '5') == 0) $job = '현사';
		else if(strcmp($row['job'], '6') == 0) $job = '현인';
		else if(strcmp($row['job'], '7') == 0) $job = '전사';
		
		echo '<td>',$job.'</td>';
		echo '<td>',$row['LEVEL'].'</td>';
		echo '<td>',$row['gold'].'</td>';
	    echo '</tr>';
		$count++;
	}

    echo '</table><br />';
?>