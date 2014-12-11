<?php
	function recupDonnees()
	{
		//chargement donnée precedente
		$precedentData = file_get_contents('donnees.txt');
		if($precedentData == '')
		{
			$precedentData = array();//si vide pas de donnée
		}
		else
		{
			$precedentData = json_decode($precedentData, true);//donné au format json
			
		}
		if(isset($precedentData['nbparticipants']))
			$precedentData['nbparticipants']++;
		else
			$precedentData['nbparticipants'] = 1;
		foreach ($_POST as $key=>$value)
		{			
			if($value == 'oui')
			{
				if(isset($precedentData[$key]))
					$precedentData[$key]++;
				else
				{
					$precedentData[$key] = 1;
				}
			}
			else if(!isset($precedentData[$key]))
			{
				$precedentData[$key] = 0;
			}
		}
		$nouvelledata = json_encode($precedentData, JSON_PRETTY_PRINT);//on reencode le tout en json
		file_put_contents('donnees.txt', $nouvelledata);//on reenregistre le tout
		//var_dump($precedentData);
	}
	recupDonnees();
	
	$req = $bdd->prepare('SELECT Question FROM reponsesQuestionnaire = ?');
	$req->execute(array($_GET['']));
	
	
	
?>