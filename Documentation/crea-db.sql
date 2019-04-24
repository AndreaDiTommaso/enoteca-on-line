DROP DATABASE IF EXISTS Enotecaonline;
CREATE DATABASE Enotecaonline;
USE Enotecaonline;
CREATE TABLE Utente (
 id int NOT NULL AUTO_INCREMENT,
 nome varchar (20) NOT NULL,
 cognome varchar (20) NOT NULL,
 password int (20) NOT NULL,
 email varchar (50) NOT NULL,
 citta varchar (20) NOT NULL,
 indirizzo varchar (40) NOT NULL,
 cap varchar (5) NOT NULL,
 tipo char,
 immagine blob,
 codice_attivazione int,
 stato bool,
 PRIMARY KEY (id)
 );
 CREATE TABLE Vino (
 id int NOT NULL AUTO_INCREMENT,
 proprietario int NOT NULL,
 nome varchar (20) NOT NULL,
 colore varchar (20) NOT NULL,
 tipo varchar (20) NOT NULL,
 provenienza varchar (20) NOT NULL,
 gradazione FLOAT NOT NULL,
 immagine blob,
 dimensione FLOAT NOT NULL,
 prezzo FLOAT NOT NULL,
 descrizione TEXT,
 PRIMARY KEY (id),
 FOREIGN KEY (proprietario) REFERENCES Utente(id)
 );
 CREATE TABLE Ordine (
 id int NOT NULL AUTO_INCREMENT,
 data DATETIME NOT NULL ,
 pagato bool NOT NULL ,
 utente int NOT NULL,
 confermato bool NOT NULL,
 PRIMARY KEY (id),
 FOREIGN KEY (utente) REFERENCES Utente(id)
 );
CREATE TABLE Cartadicredito (
 numero int NOT NULL,
 ccv int NOT NULL,
 data DATETIME NOT NULL ,
 nome varchar (20) NOT NULL ,
 cognome varchar(20) NOT NULL ,
 titolare int NOT NULL,
 PRIMARY KEY (numero),
 FOREIGN KEY (titolare) REFERENCES Utente(id)
 );
 CREATE TABLE Ordineitem (
 id int NOT NULL AUTO_INCREMENT,
 ordine int NOT NULL,
 vino int NOT NULL,
 quantita int NOT NULL,
 PRIMARY KEY (id),
 FOREIGN KEY (ordine) REFERENCES Ordine(id),
 FOREIGN KEY (vino) REFERENCES Vino(id)
 );
 CREATE TABLE Commento (
 id int NOT NULL AUTO_INCREMENT,
 utente int NOT NULL,
 vino int  NOT NULL,
 data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (id),
 FOREIGN KEY (utente) REFERENCES Utente(id),
 FOREIGN KEY (vino) REFERENCES Vino(id)
 );

 

