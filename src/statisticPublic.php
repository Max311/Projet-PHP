<html>
<body>
	<h1>Résultat du questionnaire</h1>
	<?php
		$temp = file_get_contents('donnees.txt');
		$data = json_decode($temp, true);
	?>
	<p>Nombre de perticipants : <?php echo $data['nbparticipants']; ?></p>
	<table>
		<tr>
			<td>Question</td>
			<td>Oui</td>
			<td>Non</td>
		</tr>
		<?php
		foreach($data as $key=>$value)
		{
			if ($key == "nbparticipants") continue;
		?>
		<tr>
			<td><?php echo $key; ?></td>
			<td><?php echo $value; ?></td>
			<td><?php echo $data["nbparticipants"]-$value; ?></td>
		</tr>
		<?php } ?>
	</table>
	
	
</body>
</html>