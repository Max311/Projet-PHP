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
		
		foreach ($_POST as $key=>$value)
		{
			if ($value == 'oui')

			{	
				if ($data['nbrLignes'] == 0)
				{
					$req = $bdd->prepare ('INSERT INTO questionnaire(question,oui,non) VALUES (:question, :oui, :non)');
					$req->execute(array('question' => $key,'oui' => 1,'non' => 0 ));
				}
				else
				{
					$req=$bdd->prepare('SELECT oui from questionnaire where question = :key');
					$req->execute(array('key' => $key));
					$value = $req->fetch()['oui'];
					$req=$bdd->prepare('UPDATE questionnaire SET oui = :value WHERE question = :key');
					$response = $req->execute(array(':value' => $value+1, ':key' => $key));
				}
			}
			elseif ($value == 'non')
			{
				if ($data['nbrLignes'] == 0)
				{
					$req = $bdd->prepare ('INSERT INTO questionnaire (question,oui,non) VALUES (:question, :oui, :non)');
					$req->execute(array('question' => $key,'non' => 1,'oui' => 0 ));
				}
				else
				{
					$req=$bdd->prepare('SELECT non from questionnaire where question = :key');
					$req->execute(array(':key' => $key));
					$value = $req->fetch()['non'];
					$req=$bdd->prepare('UPDATE questionnaire SET non = :value WHERE question = :key');
					$response = $req->execute(array(':value' => $value+1, ':key' => $key));
				}
			}
		}
	}
	recupDonneesBDD();
?>