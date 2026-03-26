<Files "logs.txt">
    Order Allow,Deny
    Deny from all
</Files>

# Désactiver l'affichage des index de répertoire
Options -Indexes

# Rediriger les erreurs 404 vers la page d'accueil
ErrorDocument 404 /index.html