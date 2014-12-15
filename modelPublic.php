<?php
error_reporting(E_ALL);
	function recupDonneesBDD()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=sondage', 'root', 'root');
		$req = $bdd->prepare ('SELECT COUNT(*) as count FROM questionnaire');
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
		
		
		foreach ($_POST as $key=>$value)
		{
			if ($value == 'oui')
			{
				if ($req = $bdd->prepare ('SELECT COUNT(*) as count FROM questionnaire'))
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
<<<<<<< HEAD
	
	
	
	/*function updateDonneesBDD()
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
				'value' => ++));
		}
<<<<<<< HEAD
	}


=======
	}*/
	
>>>>>>> 8d62a1a0985e23b92ebd06401c4b64f02030f5e9
	?>
=======
?>
>>>>>>> 74ac8c850db91bb3925410524494f52b93444cfc
