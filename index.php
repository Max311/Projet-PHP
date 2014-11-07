<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title> Morpion </title>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />


	<style type="text/css">
		body
		{
			font-family: arial, verdana, sans-serif;
			font-size:12px;
		}
		#jeu
		{
			border:1px dotted black;
			margin:auto;
			padding:5px;
			width:300px;
			text-align:center;
		}
		#regles
		{
			border:1px dashed black;
			margin:auto;
			width:300px;
			padding:5px;
		}
		#morpion td
		{
			text-align:center;
			border: 1px solid blue;
			width: 50px;
			height:50px;
		}
		#morpion
		{
			margin:auto;
		}
		#suivi
		{
			margin:auto;
		}
		#resultat
		{
			background-color:#eeeeee;
		}
		.coup
		{
			font-family: arial, verdana, sans-serif;
			font-size:25px;
			font-weight:bold;
			color:blue;
		}
		.x
		{
			color:green;
		}
		.o
		{
			color:red;
		}
	</style>

	<script language="JavaScript">

		var tab=new Array(9);
		var i;
		for(i=0;i<=8;i++)
		{
			tab[i]=0;
		}
		var joueur=0;   
		var n;
		var cpt=0;
		var score1=0;
		var score2=0;
		
		
		function coup(n)									//prend comme parametre le numero de la case.
		{
			if((tab[n]==1) || (tab[n]==2))					//on verifie que la case est libre, si ce n'est pas le cas, on averti les joueurs et on lui rend son coup.
			{
				alert("coup impossible : case occupé !");
				joueur=joueur-1;
				cpt=cpt-1;
			}
			else
			{
				if((joueur%2)==0)							//avant d'occuper une case, on verifie quel joueur joue.
				{
					affichecoup(1,n);						//on remplit la case souhaitée par le joueur 1.
					tab[n]=1;
				}
				else
				{
					affichecoup(2,n);						//on remplit la case souhaitée par le joueur 1.
					tab[n]=2;
				}
			}
			cpt++;
		
			joueur++;
		
			score();
		}
		
		function affichecoup(a,n)							//affiche la croix ou le rond avec les bonnes classes.
		{
			if(a==1)
			{
				document.getElementById(n).classList.remove("o");
				document.getElementById(n).classList.add("x");
				document.getElementById(n).textContent="X";
				document.getElementById("prochain").classList.remove("x");
				document.getElementById("prochain").classList.add("o");
				document.getElementById("prochain").textContent="O";
			}
			else
			{
				if(a==2)
				{
					document.getElementById(n).classList.remove("x");
					document.getElementById(n).classList.add("o");
					document.getElementById(n).textContent="O";
					document.getElementById("prochain").classList.remove("o");
					document.getElementById("prochain").classList.add("x");
					document.getElementById("prochain").textContent="X";
				}
			}
		}
		
		
		
		function score()									//on verifie toutes les combinaisons possibles, on determine quel joueur gagne, quel joueur commence la manche suivante, on remet les compteurs a zero et on change le score.
		{
			if((tab[0]==tab[1])&&(tab[0]==tab[2])&&(tab[0]==1) ||
			(tab[3]==tab[4])&&(tab[3]==tab[5])&&(tab[3]==1) ||
			(tab[6]==tab[7])&&(tab[6]==tab[8])&&(tab[6]==1) ||
			(tab[0]==tab[3])&&(tab[0]==tab[6])&&(tab[0]==1) ||
			(tab[1]==tab[4])&&(tab[1]==tab[7])&&(tab[1]==1) ||
			(tab[2]==tab[5])&&(tab[2]==tab[8])&&(tab[2]==1) ||
			(tab[0]==tab[4])&&(tab[0]==tab[8])&&(tab[0]==1) ||
			(tab[2]==tab[4])&&(tab[2]==tab[6])&&(tab[2]==1))
			{
				alert("c'est joueur1 qui gagne ! ");
				document.getElementById("prochain").classList.remove("x");
				document.getElementById("prochain").classList.add("o");
				document.getElementById("prochain").textContent="O";
				joueur=1;
				cpt=0;
				score1++;
				document.getElementById("resultat").textContent="Joueur1 : "+score1+" - "+score2+": Joueur2";
				for(i=0;i<=8;i++)
				{
					n=i;
					tab[i]=0;
					document.getElementById(n).textContent="";
				}
			}
		
			else
			{
				if((tab[0]==tab[1])&&(tab[0]==tab[2])&&(tab[0]==2) ||
				(tab[3]==tab[4])&&(tab[3]==tab[5])&&(tab[3]==2) ||
				(tab[6]==tab[7])&&(tab[6]==tab[8])&&(tab[6]==2) ||
				(tab[0]==tab[3])&&(tab[0]==tab[6])&&(tab[0]==2) ||
				(tab[1]==tab[4])&&(tab[1]==tab[7])&&(tab[1]==2) ||
				(tab[2]==tab[5])&&(tab[2]==tab[8])&&(tab[2]==2) ||
				(tab[0]==tab[4])&&(tab[0]==tab[8])&&(tab[0]==2) ||
				(tab[2]==tab[4])&&(tab[2]==tab[6])&&(tab[2]==2))
				{
					alert("c'est joueur2 qui gagne !");
					document.getElementById("prochain").classList.remove("o");
					document.getElementById("prochain").classList.add("x");
					document.getElementById("prochain").textContent="X";
					joueur=0;
					cpt=0;
					score2++;
					document.getElementById("resultat").textContent="Joueur1 : "+score1+" - "+score2+" : Joueur2";
					for(i=0;i<=8;i++)
					{
						n=i;
						tab[i]=0;
						document.getElementById(n).textContent="";
					}
				}
				else										//en cas de match nul
				{
					if(cpt==9)
					{
						alert('Match nul !');
						joueur=0;
						cpt=0;
						for(i=0;i<=8;i++)
						{
							n=i;
							tab[i]=0;
							document.getElementById(n).textContent="";
						}
					}
				}
			}
		}
		
		function rejouer()									//le bouton remet tout a zero
		{
			joueur=0;
			cpt=0;
			score1=0;
			score2=0;
			document.getElementById("resultat").textContent="Joueur1 : "+score1+" - "+score2+" : Joueur2";
			
			document.getElementById("prochain").classList.remove("o");
			document.getElementById("prochain").classList.add("x");
			document.getElementById("prochain").textContent="X";
			for(i=0;i<=8;i++)
			{
				n=i;
				tab[i]=0;
				document.getElementById(n).textContent="";
			}
		}

	</script>

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
