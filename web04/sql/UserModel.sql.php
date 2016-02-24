<?php

UserModel::addSqlQuery('TOUS_LES_USERS',
		'select PSEUDO, LOGIN, PASSWORD, EMAIL, DATE_D_INSCRIPTION, DATE_DE_DERNIERE_CONNEXION, ROLE from COMPTE order BY LOGIN');

UserModel::addSqlQuery('LISTE_PARTIES',
		'select ID_PARTIE,LOGIN,NOMBRE_DE_JOUEURS,DATE_CREATION,PARTIE_EN_COURS,PARTIE_TERMINEE from PARTIE order by DATE_CREATION DESC');

UserModel::addSqlQuery('LISTE_MES_INVITATIONS',
		'select ID_PARTIE,LOGIN,NOMBRE_DE_JOUEURS,DATE_CREATION,PARTIE_EN_COURS,PARTIE_TERMINEE from PARTIE order by DATE_CREATION DESC');

UserModel::addSqlQuery('LISTE_PARTIES_AVEC_LOGIN',
		'select ID_PARTIE,LOGIN,NOMBRE_DE_JOUEURS,DATE_CREATION,PARTIE_EN_COURS,PARTIE_TERMINEE from PARTIE where LOGIN=:login order by PARTIE.DATE_CREATION DESC');

UserModel::addSqlQuery('COMPTE_COMPTES',
		'select count(LOGIN) from COMPTE');

UserModel::addSqlQuery('MEILLEURS_COMPTES',
		'select PSEUDO, SCORE from COMPTE order by SCORE desc limit 10');

UserModel::addSqlQuery('PLUS_GRAND_NOMBRE_PARTIES',
		'select PSEUDO, SUM(NOMBRE_VICTOIRE,NOMBRE_DEFAITE) as resultat from COMPTE order by resultat,PSEUDO limit 10');

UserModel::addSqlQuery('MEILLEUR_VICTOIRES',
		'select PSEUDO, NOMBRE_VICTOIRE from COMPTE order by NOMBRE_VICTOIRE limit 10');

UserModel::addSqlQuery('MEILLEUR_RATIO',
		'select PSEUDO, IF(NOMBRE_DEFAITE=0, NOMBRE_VICTOIRE, (NOMBRE_VICTOIRE/NOMBRE_DEFAITE)) as resultat from COMPTE order by resultat, PSEUDO limit 10');



UserModel::addSqlQuery('DESTINATION_LES_PLUS_PIOCHEES',
		'select NOM,NOMBRE_DE_FOIS_PIOCHEE from DESTINATION order by NOMBRE_DE_FOIS_PIOCHEE,NOM limit 10');

UserModel::addSqlQuery('DESTINATION_LES_PLUS_JOUEES',
		'select NOM,NOMBRE_DE_FOIS_JOUEE from DESTINATION order by NOMBRE_DE_FOIS_JOUEE,NOM limit 10');

UserModel::addSqlQuery('NOMBRE_MOYEN_DESTINATION',
	'select avg(NOMBRE_DESTINATION_JOUEES) from PARTIE');

UserModel::addSqlQuery('VILLES_PLUS_JOUEES',
	'select NOM from VILLE order by NOMBRE_DE_FOIS_JOUEE,NOM limit 10');

UserModel::addSqlQuery('VILLES_MOINS_JOUEES',
	'select NOM from VILLE order by NOMBRE_DE_FOIS_JOUEE,NOM desc limit 10');

UserModel::addSqlQuery('COULEURS_JOUEES',
	'select count(COULEUR) as from PARTICIPANT order by COULEUR');

UserModel::addSqlQuery('NOMBRE_MOYEN_LOCOMOTIVE',
	'select avg(NOMBRE_LOCOMOTIVE_JOUEES) from PARTIE');


UserModel::addSqlQuery('NOMBRE_PARTIES_TERMINEES',
	'select count(ID_PARTIE) as resTermine from PARTIE where PARTIE_TERMINEE=1');

UserModel::addSqlQuery('NOMBRE_PARTIES_EN_COURS',
	'select count(ID_PARTIE) as resEnCours from PARTIE where PARTIE_EN_COURS=1');

UserModel::addSqlQuery('NOMBRE_PARTIES_JOUEES',
	'select count(ID_PARTIE) from PARTIE where PARTIE_JOUEE=1');

UserModel::addSqlQuery('NOMBRE_MOYEN_JOUEURS',
	'select avg(NOMBRE_DE_JOUEURS) from PARTIE GROUP BY ID_PARTIE');

UserModel::addSqlQuery('USER_LOGIN',
'select * from COMPTE where LOGIN=:login AND PASSWORD=:password');

UserModel::addSqlQuery('LOGIN_USED',
'select LOGIN from COMPTE where LOGIN=:login');

UserModel::addSqlQuery('USER_CREATE',
'insert into COMPTE (LOGIN, EMAIL, ROLE, PASSWORD, PSEUDO)
 values (:login, :email, :role, :pwd, :name)');

UserModel::addSqlQuery('USER_CONNECT',
'select LOGIN,EMAIL,PSEUDO from COMPTE where LOGIN=:login and PASSWORD=:password');

UserModel::addSqlQuery('NOMBRE_LOCOMOTIVE_JOUEES',
	'select NOMBRE_LOCOMOTIVE_JOUEES as resLocomotives from PARTIE');
UserModel::addSqlQuery('NOMBRE_DESTINATION_JOUEES',
	'select NOMBRE_DESTINATION_JOUEES as resDestination from PARTIE');

UserModel::addSqlQuery('NOMBRE_VILLES_JOUEES',
	'select sum( NOMBRE_DE_FOIS_JOUEE) as resVille FROM VILLE ');


?>