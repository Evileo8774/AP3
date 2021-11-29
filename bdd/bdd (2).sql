#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: typeMateriel
#------------------------------------------------------------

CREATE TABLE typeMateriel(
        ref     Varchar (10) NOT NULL ,
        libelle Varchar (10) NOT NULL
	,CONSTRAINT typeMateriel_PK PRIMARY KEY (ref)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: typeContrat
#------------------------------------------------------------

CREATE TABLE typeContrat(
        ref               Varchar (10) NOT NULL ,
        delaiIntervention Date NOT NULL ,
        tauxApplicable    Float NOT NULL
	,CONSTRAINT typeContrat_PK PRIMARY KEY (ref)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: agence
#------------------------------------------------------------

CREATE TABLE agence(
        num     Int  Auto_increment  NOT NULL ,
        nom     Varchar (10) NOT NULL ,
        adresse Varchar (100) NOT NULL ,
        tel     Char (5) NOT NULL
	,CONSTRAINT agence_PK PRIMARY KEY (num)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        numClient        Int  Auto_increment  NOT NULL ,
        raisonSociale    Varchar (50) NOT NULL ,
        siren            Char (9) NOT NULL ,
        codeApe          Char (5) NOT NULL ,
        adresse          Varchar (100) NOT NULL ,
        tel              Char (10) NOT NULL ,
        email            Varchar (100) NOT NULL ,
        dureeDeplacement Time NOT NULL ,
        distanceKM       Int NOT NULL ,
        num              Int NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (numClient)

	,CONSTRAINT client_agence_FK FOREIGN KEY (num) REFERENCES agence(num)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: materiel
#------------------------------------------------------------

CREATE TABLE materiel(
        numSerie    Varchar (15) NOT NULL ,
        dateVente   Date NOT NULL ,
        dateInstall Date NOT NULL ,
        prixVente   Float NOT NULL ,
        emplacement Varchar (15) NOT NULL ,
        ref         Varchar (10) NOT NULL ,
        numClient   Int NOT NULL
	,CONSTRAINT materiel_PK PRIMARY KEY (numSerie)

	,CONSTRAINT materiel_typeMateriel_FK FOREIGN KEY (ref) REFERENCES typeMateriel(ref)
	,CONSTRAINT materiel_client0_FK FOREIGN KEY (numClient) REFERENCES client(numClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contratMaintenance
#------------------------------------------------------------

CREATE TABLE contratMaintenance(
        numContrat    Int  Auto_increment  NOT NULL ,
        dateSignature Date NOT NULL ,
        dateEcheance  Date NOT NULL ,
        numClient     Int NOT NULL ,
        ref           Varchar (10) NOT NULL
	,CONSTRAINT contratMaintenance_PK PRIMARY KEY (numContrat)

	,CONSTRAINT contratMaintenance_client_FK FOREIGN KEY (numClient) REFERENCES client(numClient)
	,CONSTRAINT contratMaintenance_typeContrat0_FK FOREIGN KEY (ref) REFERENCES typeContrat(ref)
	,CONSTRAINT contratMaintenance_client_AK UNIQUE (numClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: intervention
#------------------------------------------------------------

CREATE TABLE intervention(
        num         Int  Auto_increment  NOT NULL ,
        dateVisite  Date NOT NULL ,
        heureVisite Time NOT NULL ,
        numClient   Int NOT NULL ,
        matricule   Varchar (10) NOT NULL
	,CONSTRAINT intervention_PK PRIMARY KEY (num)

	,CONSTRAINT intervention_client_FK FOREIGN KEY (numClient) REFERENCES client(numClient)
	,CONSTRAINT intervention_technicien0_FK FOREIGN KEY (matricule) REFERENCES technicien(matricule)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: controler
#------------------------------------------------------------

CREATE TABLE controler(
        numSerie    Varchar (15) NOT NULL ,
        num         Int NOT NULL ,
        tempsPasse  Time NOT NULL ,
        commentaire Varchar (100) NOT NULL
	,CONSTRAINT controler_PK PRIMARY KEY (numSerie,num)

	,CONSTRAINT controler_materiel_FK FOREIGN KEY (numSerie) REFERENCES materiel(numSerie)
	,CONSTRAINT controler_intervention0_FK FOREIGN KEY (num) REFERENCES intervention(num)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: employe
#------------------------------------------------------------

CREATE TABLE employe(
        matricule    Varchar (10) NOT NULL ,
        nom          Varchar (50) NOT NULL ,
        prenom       Varchar (50) NOT NULL ,
        adresse      Varchar (100) NOT NULL ,
        dateEmbauche Date NOT NULL
	,CONSTRAINT employe_PK PRIMARY KEY (matricule)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: technicien
#------------------------------------------------------------

CREATE TABLE technicien(
        matricule     Varchar (10) NOT NULL ,
        tel           Char (10) NOT NULL ,
        qualification Varchar (100) NOT NULL ,
        dateObtention Date NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        prenom        Varchar (50) NOT NULL ,
        adresse       Varchar (100) NOT NULL ,
        dateEmbauche  Date NOT NULL ,
        num           Int NOT NULL
	,CONSTRAINT technicien_PK PRIMARY KEY (matricule)

	,CONSTRAINT technicien_employe_FK FOREIGN KEY (matricule) REFERENCES employe(matricule)
	,CONSTRAINT technicien_agence0_FK FOREIGN KEY (num) REFERENCES agence(num)
)ENGINE=InnoDB;
