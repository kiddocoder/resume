DROP DATABASE IF EXISTS `cv_db`;
CREATE DATABASE  `cv_db`;
USE `cv_db`;


-- Tables utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
    `uid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `photo` VARCHAR(255) DEFAULT 'user.jpg',
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `mot_de_passe` VARCHAR(255) NOT NULL,
    `role` VARCHAR(50),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tables informations_contact
CREATE TABLE IF NOT EXISTS `informations_contact` (
    `infoId` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `adresse` VARCHAR(255),
    `ville` VARCHAR(100),
    `code_postal` VARCHAR(20),
    `pays` VARCHAR(100),
    `telephone` VARCHAR(20),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables experiences
CREATE TABLE IF NOT EXISTS `experiences` (
    `eid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `entreprise` VARCHAR(255),
    `poste` VARCHAR(100),
    `date_debut` DATE,
    `date_fin` DATE,
    `description` TEXT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables formations
CREATE TABLE IF NOT EXISTS `formations` (
    `fid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `etablisement` VARCHAR(255),
    `diplome` VARCHAR(100),
    `date_obtention` DATE,
    `description` TEXT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables competences
CREATE TABLE IF NOT EXISTS `competences` (
    `compid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `competence` VARCHAR(100),
    `niveau` INT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables projets
CREATE TABLE IF NOT EXISTS `projets` (
    `pid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `nom` VARCHAR(255),
    `description` TEXT,
    `lien` VARCHAR(255),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables types_publication
CREATE TABLE IF NOT EXISTS `types_publication` (
    `type_id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nom_type` VARCHAR(100),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tables publications
CREATE TABLE IF NOT EXISTS `publications` (
    `pubid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `titre` VARCHAR(255),
    `type_publication` BIGINT(20) UNSIGNED NOT NULL,
    `date_publication` DATE,
    `lien` VARCHAR(255),
    `description` TEXT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`type_publication`) REFERENCES `types_publication`(`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables roles
CREATE TABLE IF NOT EXISTS `roles` (
    `role_id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nom_role` VARCHAR(100),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- Tables utilisateur_role
CREATE TABLE IF NOT EXISTS `utilisateur_role` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `role_id` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `role_id`)
);

-- Tables educations
CREATE TABLE IF NOT EXISTS `educations` (
    `eid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `etablissement` VARCHAR(255),
    `diplome` VARCHAR(100),
    `date_debut` DATE,
    `date_fin` DATE,
    `description` TEXT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables utilisateur_education
CREATE TABLE IF NOT EXISTS `utilisateur_education` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `eid` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`eid`) REFERENCES `educations`(`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `eid`)
);

-- Tables activites
CREATE TABLE IF NOT EXISTS `activites` (
    `aid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `nom_activite` VARCHAR(255),
    `description` TEXT,
    `date_debut` DATE,
    `date_fin` DATE,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);


-- Tables utilisateur_activite
CREATE TABLE IF NOT EXISTS `utilisateur_activite` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `aid` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`aid`) REFERENCES `activites`(`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `aid`)
);

-- Tables certifications
CREATE TABLE IF NOT EXISTS `certifications` (
    `cid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `nom_certification` VARCHAR(255),
    `organisme` VARCHAR(255),
    `date_obtention` DATE,
    `date_expiration` DATE,
    `description` TEXT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables utilisateur_certification
CREATE TABLE IF NOT EXISTS `utilisateur_certification` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `cid` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`cid`) REFERENCES `certifications`(`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `cid`)
);

-- Tables recommandations
CREATE TABLE IF NOT EXISTS `recommandations` (
    `rid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `nom_referent` VARCHAR(255),
    `relation` VARCHAR(100),
    `description` TEXT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables utilisateur_recommandation
CREATE TABLE IF NOT EXISTS `utilisateur_recommandation` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `rid` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`rid`) REFERENCES `recommandations`(`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `rid`)
);

-- Tables objectifs
CREATE TABLE IF NOT EXISTS `objectifs` (
    `objectId` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `objectif` TEXT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables utilisateur_objectif
CREATE TABLE IF NOT EXISTS `utilisateur_objectif` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `objectif_id` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`objectif_id`) REFERENCES `objectifs`(`objectId`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `objectif_id`)
);

-- Tables type_reseau
CREATE TABLE IF NOT EXISTS `type_reseau` (
    `type_id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nom_reseau` VARCHAR(100),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tables liens_sociaux
CREATE TABLE IF NOT EXISTS `liens_sociaux` (
    `lid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `type_id` BIGINT(20) UNSIGNED NOT NULL,
    `url` VARCHAR(255),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`type_id`) REFERENCES `type_reseau`(`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables langues
CREATE TABLE IF NOT EXISTS `langues` (
    `lid` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `langue` VARCHAR(100),
    `niveau` INT,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tables niveaux_competence
CREATE TABLE IF NOT EXISTS `niveaux_competence` (
    `niveau_id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nom_niveau` VARCHAR(100),
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tables utilisateur_competence
CREATE TABLE IF NOT EXISTS `utilisateur_competence` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `compid` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`compid`) REFERENCES `competences`(`compid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `compid`)
);

-- Tables utilisateur_langue
CREATE TABLE IF NOT EXISTS `utilisateur_langue` (
    `uid` BIGINT(20) UNSIGNED NOT NULL,
    `lid` BIGINT(20) UNSIGNED NOT NULL,
    `date_creation` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `date_modification` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`uid`) REFERENCES `utilisateurs`(`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`lid`) REFERENCES `langues`(`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`uid`, `lid`)
);