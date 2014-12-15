<?php
error_reporting(E_ALL);
	function recupDonneesBDD()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=sondage', 'root', 'root');
		$test = $bdd->prepare ('SELECT COUNT(*)  FROM questionnaire');
		$req = $test;
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
		
		
		foreach ($_POST as $key=>$value)
		{
			if ($value == 'oui')
			{
				if ($test == 0)
				{
					$req = $bdd->prepare ('INSERT INTO questionnaire(question,oui,non) VALUES (:question, :oui, :non)');
					$req->execute(array('question' => $key,'oui' => 1,'non' => 0 ));
					echo "1";
				}
				/*else
				{
					$req= $bdd ->prepare('UPDATE questionnaire SET oui = :value ');
					$req->execute(array('value' => ++));
					echo "2";
				}*/
			}
			elseif ($value == 'non')
			{
				if ($req = $bdd->prepare ('SELECT COUNT(*) as count FROM questionnaire'))
				{
					$req = $bdd->prepare ('INSERT INTO questionnaire (question,oui,non) VALUES (:question, :oui, :non)');
					$req->execute(array('question' => $key,'non' => 1,'oui' => 0 ));
					echo "3";
				}
				/*else
				{
					$req=$bdd->prepare('UPDATE questionnaire SET non = :value');
					$req->execute(array('value' => ++));
					echo "4";
				}*/
			}
			echo $key.$value.'<br>';
		}
	}
	recupDonneesBDD();

 