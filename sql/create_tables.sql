-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Resepti(
id SERIAL PRIMARY KEY,
ruokalaji varchar(30) NOT NULL,
luokka varchar(20),
annosmaara INTEGER,
lahde varchar(400),
kuva varchar(600),
lisatty DATE
);

CREATE TABLE Valmistusvaihe(
resepti_id SERIAL REFERENCES Resepti(id),
vaihe INTEGER PRIMARY KEY NOT NULL,
kuvaus varchar(400) NOT NULL
);

CREATE TABLE Raaka_aine(
nimi varchar(20) PRIMARY KEY,
energiaa DECIMAL,
hiilihydraatteja DECIMAL,
proteiineja DECIMAL,
rasvaa DECIMAL
);

CREATE TABLE Ainesosa(
resepti_id SERIAL REFERENCES Resepti(id),
maara varchar(15),
raaka_aine varchar(20) REFERENCES Raaka_aine(nimi)
);