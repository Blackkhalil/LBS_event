# Structure du Projet LBS Event

## 📁 Architecture Professionnelle

Ce document décrit la nouvelle architecture professionnelle du projet LBS Event.

### Vue d'ensemble

```
LBS_Event/
├── public/                      # Point d'entrée public (DocumentRoot)
│   ├── assets/                 # Ressources statiques
│   │   ├── css/
│   │   │   └── main.css       # Styles principaux
│   │   ├── js/
│   │   │   └── main.js        # Scripts JavaScript
│   │   └── images/            # Images et médias
│   ├── pages/                 # Pages de l'application
│   │   ├── evenements.php
│   │   ├── ajouter-evenement.php
│   │   └── ...
│   ├── index_admin.php        # Dashboard Admin
│   ├── index_super_admin.php  # Dashboard Super Admin
│   ├── login.php              # Page de connexion
│   ├── register.php           # Page d'inscription
│   ├── logout.php             # Déconnexion
│   └── .htaccess              # Configuration Apache
│
├── src/                        # Code source backend
│   ├── config/                 # Configuration
│   │   ├── config.php         # Configuration générale
│   │   └── database.php       # Configuration BDD
│   ├── controllers/            # Contrôleurs (logique métier)
│   │   └── AuthController.php # Contrôleur d'authentification
│   ├── models/                 # Modèles de données
│   │   ├── User.php           # Modèle utilisateur
│   │   └── Event.php          # Modèle événement
│   └── includes/               # Composants réutilisables
│       ├── header.php          # En-tête HTML
│       └── footer.php          # Pied de page HTML
│
├── database/                   # Base de données
│   └── schema.sql              # Schéma SQL
│
├── .gitignore                  # Fichiers ignorés par Git
├── README.md                   # Documentation principale
└── PROJECT_STRUCTURE.md        # Ce fichier
```

## 🎯 Séparation des Préoccupations

### 1. **Dossier `public/`** (Point d'Entrée)
   - Contient uniquement les fichiers accessibles via le navigateur
   - Configuration Apache (.htaccess)
   - Assets (CSS, JS, Images)
   - Pages PHP qui interagissent avec l'utilisateur

### 2. **Dossier `src/`** (Backend)
   - **config/**: Configuration de l'application
   - **controllers/**: Logique métier et actions
   - **models/**: Accès aux données
   - **includes/**: Composants réutilisables (header, footer)

### 3. **Dossier `database/`** (Base de Données)
   - Schémas SQL
   - Scripts de migration
   - Données de test

## 🔐 Sécurité

### Implémentée

- ✅ **Hachage sécurisé des mots de passe** avec `password_hash()`
- ✅ **Protection contre l'injection SQL** via requêtes préparées
- ✅ **Validation des entrées** (sanitization)
- ✅ **Gestion de sessions** sécurisée
- ✅ **Headers de sécurité** dans .htaccess

### Avant vs Après

#### Avant (Ancien Code)
```php
// Passwords en plain text!
$sql = "INSERT INTO admin (nom, prenom, email, `mot de passe`) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe')";
mysqli_query($con, $sql);
```

#### Après (Code Sécurisé)
```php
// Password hashé
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $this->conn->prepare("INSERT INTO admin (nom, prenom, email, `mot de passe`) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nom, $prenom, $email, $hashedPassword);
$stmt->execute();
```

## 📂 Migration des Fichiers

### Fichiers Archivés (anciens)

- `Acceuil/` → Remplacé par `public/index_admin.php` et `index_super_admin.php`
- `Page de fonctionalité/` → Réorganisé dans `public/pages/`
- `Image/` → Déplacé vers `public/assets/images/`
- `bootstrap-4.0.0/` → Supprimé (utilise CDN)

### Nouveaux Fichiers

| Ancien Chemin | Nouveau Chemin |
|--------------|----------------|
| `Acceuil/index_admin.php` | `public/index_admin.php` |
| `Acceuil/index_super_admin.php` | `public/index_super_admin.php` |
| `Page de fonctionalité/login.php` | `public/login.php` |
| `Page de fonctionalité/register.php` | `public/register.php` |
| `Page de fonctionalité/evenement.php` | `public/pages/evenements.php` |
| `Page de fonctionalité/Ajout_Event.php` | `public/pages/ajouter-evenement.php` |
| `Image/*` | `public/assets/images/*` |

## 🛠️ Configuration Requise

### Apache (.htaccess)
```apache
RewriteEngine On
Options -Indexes
AddDefaultCharset UTF-8
```

### VHost (Optionnel)
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

## 🔄 Patterns Utilisés

### 1. Singleton Pattern (Database)
```php
class Database {
    private static $instance = null;
    public static function getInstance() { ... }
}
```

### 2. MVC Pattern
- **Model**: `src/models/`
- **View**: Templates dans `public/`
- **Controller**: `src/controllers/`

### 3. Dependency Injection
```php
$authController = new AuthController();
$user = $authController->getCurrentUser();
```

## 📝 Variables d'Environnement

Pour une configuration encore plus sécurisée, utilisez des variables d'environnement :

```env
# .env
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=mydb
```

## 🚀 Déploiement

1. **Serveur local** (WAMP/XAMPP)
   ```
   C:\wamp64\www\LBS_Event\public\
   ```

2. **Production** (Linux/Apache)
   ```
   /var/www/html/lbs-event/public/
   ```

## ✅ Checklist de Migration

- [x] Créer structure de dossiers
- [x] Déplacer assets
- [x] Créer modèles sécurisés
- [x] Créer contrôleurs
- [x] Créer composants réutilisables
- [x] Fixer chemins
- [x] Ajouter sécurité
- [x] Créer documentation
- [x] Ajouter .gitignore
- [ ] Tester toutes les pages
- [ ] Nettoyer anciens fichiers

## 🎓 Bonnes Pratiques Appliquées

1. **Séparation des couches** (MVC)
2. **Code DRY** (Don't Repeat Yourself)
3. **Securité avant tout**
4. **Documentation complète**
5. **Version control** (Git)
6. **Standards PSR** (quand applicable)

---

**Architecture Professionnelle - Version 2.0**  
© 2024 Lomé Business School

