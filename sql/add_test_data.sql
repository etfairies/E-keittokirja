-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Kokki (nimi, salasana)
    VALUES ('kokkailija', 'muffinssi');

INSERT INTO Resepti (ruokalaji, luokka, annosmaara, lahde, kuva, lisatty) 
    VALUES ('Värikäs wokki', 'Pääruoat', '4', 'http://pidempikorsi.tumblr.com/post/1455188063/v%C3%A4rik%C3%A4s-wokki', 'http://38.media.tumblr.com/tumblr_lb81rvsJ931qbhin2.jpg', NOW());

INSERT INTO Resepti (ruokalaji, luokka, annosmaara, lahde, kuva, lisatty)
    VALUES ('Pinaattikeitto', 'Keitot', '4', 'http://www.kotikokki.net/reseptit/nayta/2419/Pinaattikeitto/', 'http://www.kotikokki.net/media/cache/large/recipeimage/large/52d6db99d074a9ec0e06c7a2/original.jpg?1297426471', NOW());

INSERT INTO Raaka_aine 
    VALUES ('Pinaatti', '13', '0.4', '1.6', '0.3');

INSERT INTO Raaka_aine
    VALUES ('Tofu', '82', '1.6', '8.1', '4.8');


