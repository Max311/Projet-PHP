<?php
error_reporting(E_ALL);
	function recupDonneesBDD()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=sondage', 'root', 'root');
		$req = $bdd->prepare ('SELECT COUNT(*) FROM questionnaire');
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
		$req = $bdd->query('SELECT COUNT(*) AS nbrLignes FROM questionnaire');
		$data = $req->fetch();
		$oui = 0;
		$non = 0;
		
		foreach ($_POST as $key=>$value)
		{
			if ($value == 'oui')

			{	
				$oui = $oui+1;
				if ($data['nbrLignes'] == 0)
				{
					$req = $bdd->prepare ('INSERT INTO questionnaire(question,oui,non) VALUES (:question, :oui, :non)');
					$req->execute(array('question' => $key,'oui' => 1,'non' => 0 ));
					echo "1";
				}
				else
				{
					$req=$bdd->prepare('UPDATE questionnaire SET oui = :value WHERE question = :key');
					$req->execute(array('value' => $oui, 'key' => $key));
					echo "2";
				}
			}
			elseif ($value == 'non')
			{
				$non = $non+1;
				if ($data['nbrLignes'] == 0)
				{
					$req = $bdd->prepare ('INSERT INTO questionnaire (question,oui,non) VALUES (:question, :oui, :non)');
					$req->execute(array('question' => $key,'non' => 1,'oui' => 0 ));
					echo "3";
				}
				else
				{
					$req=$bdd->prepare('UPDATE questionnaire SET non = :value WHERE question = :key');
					$req->execute(array('value' => $non, 'key' => $key));
					echo "4";
				}
			}
			echo $key.$value.'<br>';
		}
	}
	recupDonneesBDD();
?>