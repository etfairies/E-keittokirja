-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Resepti(
id SERIAL PRIMARY KEY,
ruokalaji varchar(30) NOT NULL,
luokka varchar(20),
annosmaara INTEGER,
lahde varchar(400),
kuvan_lahde varchar(600),
lisayspaiva DATE
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

CREATE TABLE Reseptin_ainesosa(
resepti_id SERIAL REFERENCES Resepti(id),
maara varchar(15),
raaka_aine varchar(20) REFERENCES Raaka_aine(nimi)
);