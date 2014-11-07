</head>




<body>
	<div id="regles">
		<u>Mode d'emploi : </u>
		<ol>
			<li>Il s'agit d'un jeu de morpion</li>
			<li>Alignez trois symboles pour gagner</li>
			<li>Le gagnant commence la partie suivante</li>
			<li>Le bouton "Nouvelle partie" remet les scores a zero</li>
		</ol>
	</div>
	<div id="jeu">
		<table id="morpion">
			<tr>
				<td name="0" onclick="coup(0)" id="0" class="coup">&nbsp;</td>
				<td name="1" onclick="coup(1)" id="1" class="coup">&nbsp;</td>
				<td name="2" onclick="coup(2)" id="2" class="coup">&nbsp;</td>
			</tr>
			<tr>
				<td name="3" onclick="coup(3)" id="3" class="coup">&nbsp;</td>
				<td name="4" onclick="coup(4)" id="4" class="coup">&nbsp;</td>
				<td name="5" onclick="coup(5)" id="5" class="coup">&nbsp;</td>
			</tr>
			<tr>
				<td name="6" onclick="coup(6)" id="6" class="coup">&nbsp;</td>
				<td name="7" onclick="coup(7)" id="7" class="coup">&nbsp;</td>
				<td name="8" onclick="coup(8)" id="8" class="coup">&nbsp;</td>
			</tr>
		</table>
	
		<table id="suivi" >
			<tr>
				<td>Le prochain coup est pour : </td>
				<td id="prochain" class="coup x">X</td>
			</tr>
			<tr>
				<td colspan="2"><input type="button" value="Nouvelle partie" onclick="rejouer()" id="raz"/></td>
			</tr>
			<tr>
				<td colspan="2" id="resultat">Joueur1 : 0 - 0 : Joueur2</td>
			</tr>
		</table>
	</div>
</body>
</html>