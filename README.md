# LBS Events - Event Management System

**Version:** 2.0  
**Status:** Production Ready  
**Last Updated:** 2024

## 👨‍💻 Développeur

**Développé par :** SIBI Ibrahim Khalil  
**Établissement :** Ancien étudiant de Lomé Business School (LBS)

## 📋 Description

LBS Events est une plateforme de gestion d'événements développée pour Lomé Business School. Cette application permet aux administrateurs de créer, gérer et suivre des événements organisés par l'école.

## 🚀 Caractéristiques

- Système d'authentification sécurisé avec hachage de mots de passe
- Gestion des rôles (Admin et Super Admin)
- CRUD complet pour les événements
- Interface responsive avec Bootstrap 4
- Architecture MVC professionnelle
- Protection contre les injections SQL
- Design moderne et intuitif

## 📁 Structure du Projet

```
LBS_Event/
├── public/                    # Dossier public (Point d'entrée web)
│   ├── assets/               # Ressources statiques
│   │   ├── css/             # Feuilles de style
│   │   ├── js/              # Fichiers JavaScript
│   │   └── images/          # Images et médias
│   ├── pages/               # Pages de l'application
│   ├── index_admin.php       # Dashboard Admin
│   ├── index_super_admin.php # Dashboard Super Admin
│   ├── login.php            # Page de connexion
│   ├── register.php         # Page d'inscription
│   └── logout.php           # Déconnexion
│
├── src/                      # Code source
│   ├── config/              # Configuration
│   │   └── database.php     # Configuration BDD
│   ├── controllers/         # Contrôleurs
│   │   └── AuthController.php
│   ├── models/              # Modèles de données
│   │   ├── User.php        # Modèle utilisateur
│   │   └── Event.php        # Modèle événement
│   └── includes/            # Composants réutilisables
│       ├── header.php       # En-tête
│       └── footer.php       # Pied de page
│
├── database/                 # Base de données
│   └── schema.sql           # Schéma SQL
│
├── .gitignore               # Fichiers ignorés par Git
└── README.md                # Documentation
```

## 🛠️ Installation

### Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- WAMP/XAMPP/LAMP
- Composer (optionnel)

### Étapes d'installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/votre-repo/lbs-event.git
   cd lbs-event
   ```

2. **Configuration de la base de données**
   - Créez une base de données MySQL nommée `mydb`
   - Importez le fichier `database/schema.sql`

3. **Configuration du serveur**
   - Placez le projet dans votre dossier www (WAMP) ou htdocs (XAMPP)
   - Configurez votre serveur pour pointer vers le dossier `public/`
   
   **Configuration Apache (.htaccess)**
   ```apache
   <VirtualHost *:80>
       DocumentRoot "C:/wamp64/www/LBS_Event/public"
       ServerName lbs-event.local
   </VirtualHost>
   ```

4. **Configuration de la base de données**
   - Éditez `src/config/database.php`
   - Modifiez les constantes si nécessaire :
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'mydb');
     ```

5. **Accès à l'application**
   - Ouvrez votre navigateur
   - Accédez à `http://localhost/lbs-event/public/login.php`

## 👤 Utilisateurs

### Types de comptes

- **Admin** : Peut créer et gérer ses propres événements
- **Super Admin** : Peut gérer tous les événements et utilisateurs

### Création de compte

1. Accédez à `/public/register.php`
2. Remplissez le formulaire
3. Connectez-vous avec vos identifiants

## 🔒 Sécurité

- Mots de passe hashés avec `password_hash()`
- Protection contre les injections SQL (requêtes préparées)
- Validation et nettoyage des entrées utilisateur
- Sessions sécurisées
- Headers de sécurité

## 🎨 Technologies Utilisées

- **Backend** : PHP 7.4+
- **Frontend** : HTML5, CSS3, JavaScript
- **Framework CSS** : Bootstrap 4.6
- **Base de données** : MySQL 5.7+
- **Police** : Open Sans (Google Fonts)

## 📝 Fonctionnalités Principales

### Authentification
- Connexion sécurisée
- Inscription utilisateur
- Déconnexion
- Gestion des sessions

### Gestion des Événements
- Liste des événements
- Création d'événement
- Modification d'événement
- Suppression d'événement

### Interface Utilisateur
- Design responsive
- Navigation intuitive
- Alertes et notifications
- Formulaires validés

## 🔧 Configuration Serveur

### WAMP (Windows)

1. Démarrez WAMP
2. Naviguez vers `http://localhost/lbs-event/public/login.php`

### Configuration Apache

Dans `httpd.conf`, ajoutez :
```apache
<Directory "C:/wamp64/www/LBS_Event">
    AllowOverride All
    Require all granted
</Directory>
```

## 📚 Documentation API

### Modèle User

```php
// Inscription
$user->register($nom, $prenom, $email, $password, $userType);

// Connexion
$user->login($email, $password);

// Obtenir utilisateur
$user->getUserById($id, $userType);
```

### Modèle Event

```php
// Créer événement
$event->create($data);

// Obtenir tous les événements
$event->getAll($adminId, $userType);

// Obtenir par ID
$event->getById($id);
```

## 🐛 Dépannage

### Erreur de connexion à la base de données
- Vérifiez que MySQL est démarré
- Vérifiez les credentials dans `src/config/database.php`
- Assurez-vous que la base de données existe

### Erreur "Page not found"
- Vérifiez que le DocumentRoot pointe vers `/public/`
- Vérifiez les permissions des fichiers

### Erreur de session
- Vérifiez que `session_start()` est appelé
- Vérifiez les permissions du dossier

## 📞 Support

Pour toute question ou problème, contactez l'équipe de développement.

## 📄 Licence

© 2024 Lomé Business School. Tous droits réservés.

## 👨‍💻 Auteur

**SIBI Ibrahim Khalil**  
Ancien étudiant de Lomé Business School

- 📧 Contact : [Votre email]
- 🔗 GitHub : [@Blackkhalil](https://github.com/Blackkhalil)

## 🚀 Améliorations Futures

- [ ] Système de notifications
- [ ] Export PDF des événements
- [ ] Calendrier interactif
- [ ] Gestion des participants
- [ ] API REST
- [ ] Application mobile

---

**Développé avec ❤️ pour Lomé Business School**

