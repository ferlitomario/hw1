CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null,
    propic varchar(255),
    since timestamp not null default current_timestamp,
    verified boolean default 0

) Engine = InnoDB;



create table viaggi (

titolo varchar(255),
immagine varchar(255),
descrizione varchar(355)

) Engine = InnoDB;



insert into viaggi(titolo,immagine,descrizione) values
('Giappone','Giappone.jpeg', 'Fare un viaggio in Giappone significa venire a contatto con una cultura antica,ricca di tradizioni e di usanze particolari. Il fascino del Sol Levante attira turisti da ogni parte del mondo: sono da vedere i suggestivi templi di Kyoto, i moderni edifici di Tokyo'),
('Sicilia','Catania.jpeg','Fatti sorprendere dallo splendido mare dell isola e dalla bellezza dei suoi paesaggi. Potrai vivere i colori e i profumi dell isola e di tutto quello che la Sicilia e i suoi abitanti hanno da offrire'),
('Roma','Roma.jpeg','Roma, capitale d Italia , è considerata una delle più belle città del mondo. Il suo centro storico, insieme alle proprietà extraterritoriali della Santa Sede dentro la città e alla Basilica di San Paolo Fuori le mura, è tra i 55 siti italiani inseriti dall Unesco nella World Heritage list.'),
('Londra','Londra.jpeg','Londra vanta di un identità unica, donatale da secoli di storia e incentrata su celebri monumenti, luoghi iconici, cultura, moda e divertimento.'),
('Olanda','Olanda.jpeg','L Olanda rappresenta solo una regione dello stato dei Paesi Bassi, una meta turistica davvero interessante tra grandi città, mulini a vento e divertimenti.'),
('Australia','Sidney.jpeg','L Australia è un continente e uno stato, Le sue principali città, Sydney, Melbourne, Adelaide, si trovano sulla costa. La capitale, Canberra, è invece nell entroterra. Il Paese è famoso per l Opera House di Sydney, la Grande Barriera Corallina, la vasta zona desertica denominata Outback e le specie uniche di animali'),
('NewYork','NewYork.jpeg','Soprannominata la Grande Mela, New York resta una delle mete turistiche più desiderate del mondo, un set che non smette mai di ispirare scrittori e registi. New York raccoglie il meglio dell arte, del design, dell architettura e della musica di tutto il mondo. New York è simbolo del viaggio oltreoceano, di culture e stili diversi che ogni giorno si incontrano nella sua frenetica e ricchissima quotidianità extra-ordinaria.'),
('Brasile','Brasile.jpeg','Il Brasile è un luogo dominato dai contrasti, dove un eccezionale patrimonio naturale si concilia con tesori artistici e culturali di notevole valore. Farete amicizia con abitanti cordiali e sorridenti, che vi accompagneranno nel vostro viaggio in Brasile, rendendolo piacevole e memorabile.'),
('Cina','Cina.jpeg','Sarai entusiasta dei colori e del mondo nuovo che scoprirai venendo a visitare questa meravigliosa terra ,ricca di storia e tradizione')
 ;
