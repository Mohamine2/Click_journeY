# 🌵 Dunes Seekers – Site de voyages dans le désert  

## 📌 Description  
**Desert Travel** est une application web développée dans le cadre d’un projet universitaire.  
Elle permet aux utilisateurs de :  
- Créer un compte et se connecter.  
- Rechercher et consulter des voyages dans le désert.  
- Personnaliser leur voyage avec différentes options.  
- Voir le prix du voyage calculé dynamiquement en fonction des choix.  
- Réserver/acheter un voyage directement en ligne.  

Un espace **administrateur** est également disponible pour gérer les voyages et les utilisateurs.  

---

## 🚀 Fonctionnalités principales  
- 🔑 **Gestion des comptes** : inscription, connexion et déconnexion sécurisées.  
- 🗺️ **Recherche de voyages** : filtrage et affichage des offres disponibles.  
- ⚡ **Personnalisation dynamique** : choix des options avec mise à jour en temps réel du prix (AJAX + JS).  
- 🛒 **Réservation/Achat** : simulation d’achat avec enregistrement en base de données.  
- 🛠️ **Espace Admin** : ajout, modification et suppression de voyages / gestion des utilisateurs.  
- 🔄 **Requêtes asynchrones (AJAX)** pour améliorer l’expérience utilisateur (ex. mise à jour des prix sans rechargement de page).  

---

## 🏗️ Technologies utilisées  
- **Frontend :** HTML5, CSS3, JavaScript  
- **Backend :** PHP  
- **Base de données :** Fichiers JSON
- **Asynchrone :** AJAX pour certaines requêtes  
- **Gestion des sessions :** PHP Sessions  

---

---

## ⚙️ Installation & utilisation  
1. **Cloner le projet** :  
   ```bash
   git clone https://github.com/Mohamine2/Click_journeY.git

## Sécurité (simplifiée pour projet scolaire)
-Utilisation des sessions PHP pour la gestion des utilisateurs connectés.
-Mots de passe stockés avec hashage (password_hash).
-Vérification côté serveur pour éviter les failles simples (ex: accès non autorisé à l’admin).

