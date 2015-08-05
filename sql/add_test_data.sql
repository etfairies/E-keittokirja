-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Resepti (ruokalaji, luokka, annosmaara, lahde, lisatty) 
    VALUES ('Värikäs wokki', 'Pääruoat', '4', 'http://pidempikorsi.tumblr.com/post/1455188063/v%C3%A4rik%C3%A4s-wokki', NOW());

INSERT INTO Resepti (ruokalaji, luokka, annosmaara, lahde, lisatty)
    VALUES ('Pinaattikeitto', 'Keitot', '4', 'http://www.kotikokki.net/reseptit/nayta/2419/Pinaattikeitto/', NOW());

INSERT INTO Raaka_aine 
    VALUES ('Pinaatti', '13', '0.4', '1.6', '0.3');

INSERT INTO Raaka_aine
    VALUES ('Tofu', '82', '1.6', '8.1', '4.8');
