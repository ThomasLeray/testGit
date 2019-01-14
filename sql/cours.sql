select date, heureDebut, heureFin, matieres.intitule, salles.intitule, TD.intitule, couleur.intitule
		from cours
		inner join matieres on idMatiere = matieres.id
		inner join salles on idSalle = salles.id
		inner join TD on idTD = TD.id
		inner join couleur on matieres.idCouleur = couleur.id;