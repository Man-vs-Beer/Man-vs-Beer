<?php


AnonymousModel::addSqlQuery('COMPTE_COMPTES',
		'select count(LOGIN) from COMPTE');

AnonymousModel::addSqlQuery('USER_LOGIN',
'select * from COMPTE where LOGIN=:login AND PASSWORD=:password');

AnonymousModel::addSqlQuery('LOGIN_USED',
'select LOGIN from COMPTE where LOGIN=:login');

AnonymousModel::addSqlQuery('USER_CREATE',
'insert into COMPTE (LOGIN, EMAIL, ROLE, PASSWORD, PSEUDO)
 values (:login, :email, :role, :pwd, :name)');

AnonymousModel::addSqlQuery('USER_CONNECT',
'select LOGIN,EMAIL,PSEUDO from COMPTE where LOGIN=:login and PASSWORD=:password');

?>