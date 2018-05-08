-- ---------------------------------------------------------------
-- ** SUPPRESSION DES TABLES ET SEQUENCES SI ELLES EXISTENT DEJA
-- ----------------------------------------------------------------

DROP TABLE IF EXISTS PERSONNE, ADMINISTRATEUR, UTILISATEUR, ADHERENT, DON, GROUPE, INFORMATION, EVENEMENT, OUTILWEB, INFORMATIONSGENERALES, PHOTO CASCADE;
DROP SEQUENCE IF EXISTS SeqIdDon, SeqIdGroupe;
DROP TYPE IF EXISTS TYPEADHESION;

-- ---------------------------------------------------------------
-- ** CREATION SEQUENCE(S)
-- ---------------------------------------------------------------

CREATE SEQUENCE SeqIdDon START WITH 1 MINVALUE 1 INCREMENT BY 1 NO CYCLE;

-- ---------------------------------------------------------------
-- ** CREATION TABLE(S)
-- ---------------------------------------------------------------

CREATE TABLE PERSONNE
(   Mail VARCHAR PRIMARY KEY,
    Nom VARCHAR NOT NULL,
    Prenom VARCHAR NOT NULL,
    Photo VARCHAR NOT NULL,
    Tel VARCHAR,
    mdp_hache VARCHAR NOT NULL
);

CREATE TABLE ADMINISTRATEUR
(   ID_admin VARCHAR REFERENCES PERSONNE(Mail) PRIMARY KEY
);

CREATE TABLE UTILISATEUR
(
    ID_user VARCHAR REFERENCES PERSONNE(Mail) PRIMARY KEY,
    Confidentialite BOOLEAN DEFAULT FALSE
);

CREATE TABLE DON
(
    ID_don INTEGER PRIMARY KEY DEFAULT nextval('SeqIdDon'),
    Montant INTEGER NOT NULL,
    ID_donateur VARCHAR REFERENCES UTILISATEUR(Id_user) NOT NULL,
    Date_don DATE DEFAULT CURRENT_DATE NOT NULL
);


