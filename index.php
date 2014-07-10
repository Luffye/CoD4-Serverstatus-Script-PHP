<?
	include('COD4ServerStatus.php');
	
	$status = new COD4ServerStatus('127.0.0.1', '28960'); //Edit IP
	$ip = "127.0.0.1.28960";	//Edit IP
	
	if ($status->getServerStatus()){
		$status->parseServerData();
		
		$serverStatus = $status->returnServerData();
		
		$players = $status->returnPlayers();
		$pings = $status->returnPings();
		$scores = $status->returnScores();
		
		
		//print_r($serverStatus);
		
		?>
        	Server: <? echo $serverStatus['sv_hostname'];?><br /> 
        	IP: <? echo $ip;?><br /> 
			Map: <? echo $serverStatus['mapname']; ?><br />
			Gametype:
			<?php if(isset($serverStatus['fs_game']) != NULL){
				echo $serverStatus['fs_game'];
			} else {
				echo "No Mod";
			} ?><br />
			Players: <? echo sizeof($players) . " / " . $serverStatus['sv_maxclients']; ?><br />
            Admin: <? echo $serverStatus['_Admin'];?><br />
			Punkbuster: <? echo $serverStatus['sv_punkbuster']; ?><br />
            Email: <? echo $serverStatus['_Email'];?><br />
            Location: <? echo $serverStatus['_Location']; ?><br />
			Website: <a href="http://<? echo $serverStatus['_Website']; ?>">http://<? echo $serverStatus['_Website']; ?></a><br /><br />

			<table width="50%" cellspacing="1" cellpadding="1" border="1">
            	<tr>
                	<th width="5%">#</th>
                    <th>Player</th>
                    <th width="15%">Score</th>
                    <th width="15%">Ping (ms)</th>
                </tr>
		<?
			$rank = 1;
            foreach($players as $i => $v){
        ?>
        		<tr>
                	<td><? echo $rank; ?></td>
                    <td><? echo $players[$i]; ?></td>
                    <td><? echo $scores[$i]; ?></td>
                    <td><? echo $pings[$i]; ?></td>
                </tr>
        <?
				$rank++;
            }
        ?>
            </table>           
		<?
	}
?>