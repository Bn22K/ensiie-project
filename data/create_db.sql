-- Supprime les tables a remplacer
DROP TABLE IF EXISTS USERS CASCADE;
DROP TABLE IF EXISTS events CASCADE;

-- Cr�e les tables
CREATE TABLE USERS( 
	id SERIAL,
	nom VARCHAR(255) CONSTRAINT nn_nom NOT NULL,
	prenom VARCHAR(255) CONSTRAINT nn_prenom NOT NULL,
	email VARCHAR(255) UNIQUE CONSTRAINT nn_email NOT NULL,
	passwd VARCHAR(255) CONSTRAINT nn_passwd NOT NULL,
	CONSTRAINT pk_id_USERS PRIMARY KEY(id) ); 

CREATE TABLE events( 
	id SERIAL,
	libelle VARCHAR(255),
	detail VARCHAR(255),
	dateStart timestamp,
	dateEnd timestamp,
	id_USER INTEGER CONSTRAINT fk_nn_id_USER NOT NULL,
	CONSTRAINT pk_id_events PRIMARY KEY (id),
	CONSTRAINT fk_id_USER FOREIGN KEY(id_USER) REFERENCES USERS(id) ON DELETE CASCADE,
	constraint check_dates check (dateStart < dateEnd)) ;