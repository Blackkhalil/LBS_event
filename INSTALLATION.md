# Guide d'Installation - LBS Event

## 📋 Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- WAMP/XAMPP/LAMP installé
- Accès à la ligne de commande (optionnel)

## 🚀 Installation Rapide

### Étape 1: Télécharger le Projet

```bash
# Si vous utilisez Git
git clone https://github.com/votre-repo/lbs-event.git
cd lbs-event

# Ou téléchargez l'archive ZIP
```

### Étape 2: Installer dans WAMP

1. Ouvrez le dossier WAMP : `C:\wamp64\www\`
2. Copiez le projet `LBS_Event` dans ce dossier
3. L'URL sera : `http://localhost/LBS_Event/public/`

### Étape 3: Configurer la Base de Données

#### Option A: Via phpMyAdmin
1. Ouvrez phpMyAdmin : `http://localhost/phpmyadmin`
2. Créez une nouvelle base de données nommée `mydb`
3. Importez le fichier `database/schema.sql`

#### Option B: Via Ligne de Commande MySQL
```bash
mysql -u root -p
create database mydb;
use mydb;
source C:/wamp64/www/LBS_Event/database/schema.sql;
exit;
```

#### Option C: Via MySQL Workbench
1. Ouvrez MySQL Workbench
2. Créez la base de données `mydb`
3. Exécutez le script `database/schema.sql`

### Étape 4: Configuration de la Base de Données

Éditez le fichier `src/config/database.php` :

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // Votre mot de passe si nécessaire
define('DB_NAME', 'mydb');
```

### Étape 5: Tester l'Application

1. Ouvrez votre navigateur
2. Accédez à : `http://localhost/LBS_Event/public/login.php`
3. Connectez-vous avec :
   - Email: `super@admin.com`
   - Password: `admin123`

## 🔧 Configuration Apache (Optionnel)

Pour utiliser une URL personnalisée :

### 1. Éditez le fichier hosts

Ajoutez dans `C:\Windows\System32\drivers\etc\hosts` :
```
127.0.0.1    lbs-event.local
```

### 2. Éditez httpd-vhosts.conf

Ajoutez dans `C:\wamp64\bin\apache\apache2.x.x\conf\extra\httpd-vhosts.conf` :

```apache
<VirtualHost *:80>
    DocumentRoot "C:/wamp64/www/LBS_Event/public"
    ServerName lbs-event.local
    <Directory "C:/wamp64/www/LBS_Event">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### 3. Redémarrez WAMP

Accédez à : `http://lbs-event.local`

## 📂 Structure des URLs

Après installation, les pages seront accessibles à :

- **Login** : `http://localhost/LBS_Event/public/login.php`
- **Register** : `http://localhost/LBS_Event/public/register.php`
- **Admin Dashboard** : `http://localhost/LBS_Event/public/index_admin.php`
- **Super Admin Dashboard** : `http://localhost/LBS_Event/public/index_super_admin.php`

## 🐛 Résolution de Problèmes

### Problème : "Access Denied" ou "Forbidden"
**Solution** : 
```bash
# Vérifiez les permissions du dossier
# Dans WAMP, assurez-vous que les permissions sont correctes
```

### Problème : Page blanche
**Solution** :
1. Activez l'affichage des erreurs dans `php.ini` :
   ```ini
   display_errors = On
   error_reporting = E_ALL
   ```
2. Vérifiez les logs dans `C:\wamp64\logs\`

### Problème : Erreur de connexion à la base de données
**Solution** :
1. Vérifiez que MySQL est démarré
2. Vérifiez les credentials dans `src/config/database.php`
3. Testez la connexion :
   ```php
   <?php
   $conn = new mysqli('localhost', 'root', '', 'mydb');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   echo "Connected successfully";
   ?>
   ```

### Problème : Les images ne s'affichent pas
**Solution** :
1. Vérifiez que les images sont dans `public/assets/images/`
2. Vérifiez les permissions du dossier
3. Vérifiez le chemin dans le HTML

## ✅ Vérification de l'Installation

1. **Vérifiez la structure** :
   ```
   LBS_Event/
   ├── public/
   │   ├── assets/
   │   ├── pages/
   │   ├── index_admin.php
   │   ├── index_super_admin.php
   │   ├── login.php
   │   └── register.php
   ├── src/
   │   ├── config/
   │   ├── controllers/
   │   ├── models/
   │   └── includes/
   └── database/
       └── schema.sql
   ```

2. **Testez la connexion** :
   - Login/Register fonctionne
   - Dashboard s'affiche
   - Navigation fonctionne
   - Assets se chargent

3. **Vérifiez la base de données** :
   ```sql
   SELECT * FROM admin;
   SELECT * FROM super_admin;
   SELECT * FROM evenement;
   ```

## 🔐 Sécurité Recommandée pour Production

1. **Changer les mots de passe par défaut**
2. **Utiliser HTTPS**
3. **Masquer les erreurs PHP**
4. **Limiter les accès**
5. **Mettre à jour régulièrement**

## 📞 Support

Pour toute question :
- Consultez `README.md`
- Consultez `PROJECT_STRUCTURE.md`
- Contactez l'équipe de développement

---

**Installation Terminée** ✅

