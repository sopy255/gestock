Hello.
Etape a suivre pour executer le proget **gestock**

1- Installer **wampserver** ou **EasyPHP**

3- Lancer les l'application choisi

2-Verifier que les serveur apache et Mysql fonctionne

3-dans le cas de **wamp** l'icone de l'aplication aparait en **vert** 
dans la barre des icone

4-ouvrir son navigateur et saisir l'url : http://127.0.0.1/phpmyadmin/

5- se connecter avec  
**login** : "root" et **mdp** : "" 

5-dans le menu **Privilège** cree un nouveau compte utilisateur

6-se rendre dans le fichier /config/conf.php du proget

7-modifier les lignes 15 et 17 suivant les donné de l'utilisateur cree en **5**

8-Ouvrir ensuite le **cree un nouvelle basse de donne** dans le menu lataral de phpmyadmin nom de la bd "bd_produit"

9-selectionner la base de donné cree en 8

10-cliquer sur **importer** puis **choisir un fichier** et selectioner le fichier **bd_produit.sql**
situer dans le dossier **db** du proget

11-deplacer le dossier **boutik** dans le repertoire **www** de **wamp** ou **easyPHP**

12-naviguer l'url : **http://127.0.0.1/boutik**


Vous aver terminer
