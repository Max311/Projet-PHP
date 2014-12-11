<?php
error_reporting(E_ALL);
	function recupDonneesFichier()
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
	recupDonneesFichier();
	
	function recupDonneesBDD()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
		$req = $bdd->prepare ('SELECT COUNT(*) as count FROM questionnaire');
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
		var_dump($tab);
		
		
		if ($req = $bdd->prepare ('SELECT COUNT(*) as count FROM questionnaire'))
		{
			if ($value == 'oui')
			{
				$req = $bdd->prepare ('INSERT INTO questionnaire(question,oui,non) VALUES (:question, :oui, :non)');
				$req->execute(array(
					'question' => $key
					'oui' => 1
					'non' => 0 ));
			}
			else if ($value == 'non')
			{
				$req = $bdd->prepare ('INSERT INTO questionnaire (question,oui,non) VALUES (:question, :oui, :non)');
				$req->execute(array(
					'question' => $key
					'non' => 1
					'oui' => 0 ));
			}
		}
	}
	recupDonneesBDD();

	function updateDonneesBDD()
	{
		if ($value == 'oui'){
		$req= $bdd ->prepare('UPDATE questionnaire SET oui = :value ');
		$req->execute(array(
			'value' => ++));
		}

		else if ($value == 'non') 
		{
			$req=$bdd->prepare('UPDATE questionnaire SET non = :value');
			$req->execute(array(
				'value' => ++))
		}
	}

	
	?>