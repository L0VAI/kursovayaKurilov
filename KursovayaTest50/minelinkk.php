<?php
	// require __DIR__ . '/xPaw/src/MinecraftPing.php';
	// require __DIR__ . '/xPaw/src/MinecraftPingException.php';
	
	// use xPaw\MinecraftPing;
	// use xPaw\MinecraftPingException;
	
	// try
	// {
	// 	$Query = new MinecraftPing( 'LOVAI.exaroton.me:49933', 49933 ); //f1.qwertyx.host 21004
		
	// 	$status = $Query->Query();
    //     $onlineMax = $status['players']['max'];
    //     $onlineOnline = $status['players']['online'];
    //     $playersList = isset($status['players']['sample']) ? $status['players']['sample'] : [];


	// }
	// catch( MinecraftPingException $e )
	// {
	// 	echo $e->getMessage();
	// }
	// finally
	// {
	// 	if( $Query )
	// 	{
	// 		$Query->Close();
	// 	}
	// }

	require __DIR__ . '/xPaw/src/MinecraftPing.php';
	require __DIR__ . '/xPaw/src/MinecraftPingException.php';
	use xPaw\MinecraftPing;
	use xPaw\MinecraftPingException;
	// Инициализируем переменные со значениями по умолчанию
	$onlineMax = 0;
	$onlineOnline = 0;
	$playersList = [];
	$error = null;
	try
	{
		$Query = new MinecraftPing('LOVAI.exaroton.me', 49933);
		
		$status = $Query->Query();
		
		// Проверяем структуру ответа
		if($status && isset($status['players'])) {
			$onlineMax = $status['players']['max'] ?? 0;
			$onlineOnline = $status['players']['online'] ?? 0;
			$playersList = $status['players']['sample'] ?? [];
		} else {
			$error = "Сервер вернул неожиданный ответ";
		}
	}
	catch(MinecraftPingException $e)
	{
		$error = $e->getMessage();
	}
	finally
	{
		if($Query)
		{
			$Query->Close();
		}
	}

?>