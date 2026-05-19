<?php

$dbPath = __DIR__ . '/eshop.db';

// smaže starou DB
if (file_exists($dbPath)) {
    unlink($dbPath);
    echo "Stará databáze smazána.\n";
}

$db = new PDO('sqlite:' . $dbPath);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Vytvoření tabulky kategorií
$db->exec('
    CREATE TABLE categories (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        slug TEXT NOT NULL UNIQUE
    )
');

// Rozšířená tabulka produktů
$db->exec('
    CREATE TABLE products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        category_id INTEGER,
        name TEXT NOT NULL,
        description TEXT,
        specs TEXT,
        gallery TEXT,
        price INTEGER NOT NULL,
        image TEXT NOT NULL,
        FOREIGN KEY (category_id) REFERENCES categories(id)
    )
');

// vložení dat
$db->exec("INSERT INTO categories (name, slug) VALUES ('Fotoaparáty', 'fotoaparaty'), ('Objektivy', 'objektivy')");

$db->exec("
    INSERT INTO products (id, category_id, name, description, specs, gallery, price, image) VALUES
    (1, 1, 'Sony Alpha A7 IV', 
     'Sony Alpha 7 IV je zbrusu nový hybridní fotoaparát pro zachycení kvalitních fotografií, plynulých videí i zprostředkování živých streamů. Jeho zpracování i funkce ocení i nároční tvůrci obsahu. Obrazový snímač CMOS s rozlišením 33 megapixelů a procesor BIONZ XR vám dovolí zachytit nádherné snímky a videa plné detailů a barev.', 
     'Full Frame snímač 33 Mpx;4K video;Výměnné objektivy Sony FE;Maximální rychlost sekvenčního snímání 10 sn./s', 
     'Assets/images/Sony Alpha A7 IV detail/Sony Alpha A7 IV 1 detail.webp;Assets/images/Sony Alpha A7 IV detail/Sony Alpha A7 IV 2 detail.webp;Assets/images/Sony Alpha A7 IV detail/Sony Alpha A7 IV 3 detail.webp',
     64402, 'Assets/images/Sony Alpha A7 IV detail/OS170b.webp'),
    
    (2, 1, 'Sony ZV-E10', 
     'Sony Alpha ZV-E10 je kompaktní a výkonný fotoaparát navržený především pro vlogery a tvůrce videí. Nabízí špičkovou kvalitu obrazu, rychlé automatické ostření a jednoduché ovládání.', 
     'APS-C snímač 24,2 Mpx;4K video;Výměnné objektivy Sony E;Dotykový výklopný displej', 
     'Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail 1.webp;Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail 2.webp;Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail 3.webp',
     18990, 'Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail.webp'),
    
    (3, 1, 'Fujifilm X100VI', 
     'Fujifilm X100VI Silver je šestou generací legendární řady X100, která kombinuje ikonický retro design s pormyšlenými technologiemi. Fotoaparát je vybaven 40,2Mpx snímačem X-Trans CMOS 5 HR a výkonným obrazovým procesorem X-Processor 5.', 
     'APS-C snímač 40,2 Mpx;6K video;Minimální čas závěrky 1/30 s;Maximální rychlost sekvenčního snímání 20 sn./s', 
     'Assets/images/FujiFilm X100VI detail/detail 2.webp;Assets/images/FujiFilm X100VI detail/detail 3.webp;Assets/images/FujiFilm X100VI detail/detail 4.webp',
     44990, 'Assets/images/FujiFilm X100VI detail/detail 1.webp'),
    
    (4, 1, 'Canon EOS 250D', 
     'Canon 250D je dobře vybavená zrcadlovka v malém těle. Je to ideální volba jak pro začátečníky, tak náročnější fotografy, kteří chtějí mít ovládání pod kontrolou.', 
     'APS-C snímač 24,1 Mpx;4K video;Výměnné objektivy Canon EF-S;Maximální rychlost sekvenčního snímání 5 sn./s', 
     'Assets/images/Canon EOS 250D detail/detail 2.webp;Assets/images/Canon EOS 250D detail/detail 3.webp;Assets/images/Canon EOS 250D detail/detail 4.webp',
     17990, 'Assets/images/Canon EOS 250D detail/detail 1.webp'),

    (5, 1, 'Canon EOS R6 Mark III', 
     'Digitální fotoaparát - bezzrcadlovka, Full Frame 32,5 Mpx, bajonet Canon RF, stabilizace obrazu na snímači (IBIS), max. rychlost frekvenčního snímání 40 sn./s, elektronický hledáček 3,69 Mpx, otočný / výklopný displej, 6K/119,9p', 
     'Full Frame snímač 32,5 Mpx;6K video;Výměnné objektivy Canon RF;Maximální rychlost sekvenčního snímání 40 sn./s', 
     'Assets/images/Canon EOS R6 Mark III detail/detail 2.webp;Assets/images/Canon EOS R6 Mark III detail/detail 3.webp;Assets/images/Canon EOS R6 Mark III detail/detail 4.webp',
     84490, 'Assets/images/Canon EOS R6 Mark III detail/detail 1.webp'),

    (6, 1, 'Canon EOS RP', 
     'Kompaktní digitální bezzrcadlovka Canon EOS RP je vybavena lehkým ergonomickým tělem a nejmodernějšími technologiemi, které vám poskytnou neskutečně velký tvůrčí potenciál.', 
     'Full Frame snímač 26,2 Mpx;4K video;Výměnné objektivy Canon RF;Maximální rychlost sekvenčního snímání 5 sn./s', 
     'Assets/images/Canon EOS RP detail/detail 2.webp;Assets/images/Canon EOS RP detail/detail 3.webp;Assets/images/Canon EOS RP detail/detail 4.webp',
     29490, 'Assets/images/Canon EOS RP detail/detail 1.webp'),

    (7, 1, 'Sony Alpha A7C II', 
     'Digitální bezzrcadlovka Sony Alpha 7C II zaujme kompaktní velikostí, stylovým designem a vysokým výkonem. Fotoaparát Sony Alpha 7C II využívá 33megapixelový snímač CMOS Exmor R.', 
     'Full Frame snímač 33 Mpx;4K video;Výměnné objektivy Sony E;Maximální rychlost sekvenčního snímání 10 sn./s', 
     'Assets/images/Sony Alpha A7C II stříbrný detail/detail 2.webp;Assets/images/Sony Alpha A7C II stříbrný detail/detail 3.webp;Assets/images/Sony Alpha A7C II stříbrný detail/detail 4.webp',
     50614, 'Assets/images/Sony Alpha A7C II stříbrný detail/detail 1.webp'),

    (8, 1, 'Fujifilm X-T30 III', 
     'Digitální fotoaparát Fujifilm X-T30 III v elegantním provedení s objektivem XC 13–33 mm f/3.5–6.3 OIS je kompaktní bezzrcadlovka, která spojuje špičkovou obrazovou kvalitu.', 
     'APS-C snímač 26,1 Mpx;6K video;Výměnné objektivy Fujifilm X;Maximální rychlost sekvenčního snímání 30 sn./s', 
     'Assets/images/Fujifilm X-T30 III detail/detail 2.webp;Assets/images/Fujifilm X-T30 III detail/detail 3.webp;Assets/images/Fujifilm X-T30 III detail/detail 4.webp',
     26990, 'Assets/images/Fujifilm X-T30 III detail/detail 1.webp'),

    (9, 1, 'Fujifilm X-E5', 
     'FUJIFILM X-E5 ve stříbrném provedení zaujme každého, kdo touží po spojení nadčasového designu a moderních technologií. Kompaktní bezzrcadlovka s 40,2Mpx APS-C snímačem.', 
     'APS-C snímač 40,2 Mpx;6K video;Výměnné objektivy Fujifilm X;Maximální rychlost sekvenčního snímání 20 sn./s', 
     'Assets/images/Fujifilm X-E5 detail/detail 2.webp;Assets/images/Fujifilm X-E5 detail/detail 3.webp;Assets/images/Fujifilm X-E5 detail/detail 4.webp',
     38990, 'Assets/images/Fujifilm X-E5 detail/detail 1.webp'),

    (10, 2, 'Canon RF-S 18-150mm', 
     'Canon RF-S 18-150 mm je lehký a kompaktní objektiv spadají do řady EOS R, který oplývá zoomem pro fotoaparáty využívající APS-C snímač.', 
     'Bajonet Canon RF;Typ objektivu Zoom;Min. ohnisková vzdálenost 18 mm;Max. ohnisková vzdálenost (přepočet na 35mm) 240 mm', 
     'Assets/images/Canon RF-S detail/detail 2.webp;Assets/images/Canon RF-S detail/detail 3.webp;Assets/images/Canon RF-S detail/detail 4.webp',
     14490, 'Assets/images/Canon RF-S detail/detail 1.webp'),

    (11, 2, 'Canon EF 50mm f/1.8 STM', 
     'Objektiv Canon EF 50 mm f/1.8 STM nechá vaše objekty vyniknout oproti rozostřenému pozadí. Současně vám umožní vyfotografovat objekty pěkně detailně.', 
     'Bajonet Canon EF;Typ objektivu Pevné ohnisko;Snímač APS-C, Full Frame;Min. ohnisková vzdálenost 50 mm;Max. ohnisková vzdálenost 50 mm', 
     'Assets/images/Canon EF 50mm detail/detail 2.webp;Assets/images/Canon EF 50mm detail/detail 3.webp;Assets/images/Canon EF 50mm detail/detail 1.webp',
     2999, 'Assets/images/Canon EF 50mm detail/detail 1.webp'),

    (12, 2, 'Canon RF 16 mm F2.8 STM', 
     'Canon RF 16 mm F2.8 STM vám bude spolehlivým pomocníkem na vašich dobrodružstvích. Díky kompaktním rozměrům a nízké hmotnosti vás objektiv nikde tlačit nebude.', 
     'Bajonet Canon RF;Pro snímač Full Frame;Min. ohnisková vzdálenost 16 mm;Max. ohnisková vzdálenost 16 mm', 
     'Assets/images/Canon RF 16 mm detail/detail 2.webp;Assets/images/Canon RF 16 mm detail/detail 3.webp;Assets/images/Canon RF 16 mm detail/detail 4.webp',
     8690, 'Assets/images/Canon RF 16 mm detail/detail 1.webp'),

    (13, 2, 'Sony 18-105 mm f/4.0 G SEL', 
     'Sony 18-105 mm f/4.0 G SEL je kvalitní objektiv, který si rozumí především s fotoaparáty s APS-C snímači. Dokonale pasuje na bajonet E. Se svou minimální vzdáleností pro zaostření 45 cm (širokoúhlý), respektive 95 cm (teleobjektiv) a 0,11× poměrem zvětšení se bude hodit i pro pořizování snímků na velké vzdálenosti.', 
     'Bajonet Sony E;Typ objektivu Zoom;Min. ohnisková vzdálenost 18 mm;Max. ohnisková vzdálenost 105 mm', 
     'Assets/images/Sony 18-105 mm f/detail 2.webp;Assets/images/Sony 18-105 mm f/detail 3.webp;Assets/images/Sony 18-105 mm f/detail 4.webp',
     15990, 'Assets/images/Sony 18-105 mm f/detail 1.webp'),

    (14, 2, 'Sony FE 35mm f/1.8', 
     'Sony FE 35 / 1.8 je příjemný lehký objektiv, který vám nezabere skoro žádné místo v brašně. Autofokus je rychlý a přesný. Kvalita obrazu je výborná včetně dobrého přenosu kontrastu.', 
     'Bajonet Sony E;Snímač APS-C, Full Frame;Typ objektivu Pevné ohnisko;Min. ohnisková vzdálenost 35 mm;Max. ohnisková vzdálenost 35 mm', 
     '',
     18990, 'Assets/images/Sony FE 35 mm .webp'),

    (15, 2, 'Samyang AF 14mm f/2.8 Sony FE', 
     'Širokoúhlý objektiv s automatickým ostřením Samyang AF 14mm f/2.8 Sony FE pro full frame a APS-C digitální fotoaparáty je navržený pro bezkonkurenční kvalitu obrazu a vysoký optický výkon.', 
     'Bajonet Sony FE;Pro snímač APS-C, Full Frame;Typ objektivu Pevné ohnisko;Min. ohnisková vzdálenost 14 mm;Max. ohnisková vzdálenost 14 mm', 
     'Assets/images/Samyang AF 14mm detail/detail 2.webp;Assets/images/Samyang AF 14mm detail/detail 3.webp;Assets/images/Samyang AF 14mm detail/detail 1.webp',
     16890, 'Assets/images/Samyang AF 14mm detail/detail 1.webp'),

    (16, 2, 'Fujifilm Fujinon XF 16-50mm f/2.8-4.8 R LM WR', 
     'Objektiv Fujifilm Fujinon XF 16–50mm f/2.8–4.8 R LM WR pro digitální bezzrcadlovky s bajonetem Fujifilm X je určen pro APS-C snímače a nabízí rozsah ohniskových vzdáleností odpovídající 24 až 75 mm. Objektiv, navržený pro fotoaparáty páté generace řady X, představuje nové pojetí standardního zoomu a stává se klíčovým prvkem v nabídce značky Fujinon jako nový „kitový“ objektiv.', 
     'Bajonet Fujifilm X;Typ objektivu Zoom;Pro snímač APS-C;Min. ohnisková vzdálenost 16 mm', 
     'Assets/images/Fujifilm Fujinon XF 16-50mm detail/detail 2.webp;Assets/images/Fujifilm Fujinon XF 16-50mm detail/detail 3.webp;Assets/images/Fujifilm Fujinon XF 16-50mm detail/detail 4.webp',
     19890, 'Assets/images/Fujifilm Fujinon XF 16-50mm detail/detail 1.webp'),

    (17, 2, 'Fujifilm Fujinon XF 50mm f/2.0 R WR Black', 
     'Objektiv Fujifilm Fujinon XF 50mm f/2.0 R WR v černém barevném provedení je vhodný pro portréty, reportáže, módu, street foto, koncerty. Rozšiřuje nabídku výměnných objektivů řady X, jež jsou proslulé vynikající kvalitou snímků, a proto maximálně zužitkuje i působivé vlastnosti snímače X-TRANS CMOS.', 
     'Bajonet Fujifilm X;Typ objektivu Pevné ohnisko;Pro snímač APS-C;Min. ohnisková vzdálenost 50 mm',
     '',
     12990, 'Assets/images/Fujifilm Fujinon XF 50mm detail/detail 1.webp'),

    (18, 2, 'Fujifilm Fujinon XF 55-200mm F/3.5-4.8', 
     'Objektiv Fujifilm Fujinon XF 55–200mm f/3.5–4.8 pro digitální bezzrcadlovky s bajonetem Fujifilm X je určen pro APS-C snímače. Závit pro filtry má průměr 62 mm, objektiv je vybaven automatickým ostřením, clonovým kroužkem, optickou stabilizací a váží 580 gramů.', 
     'Bajonet Fujifilm X;Typ objektivu Zoom;Pro snímač APS-C;Min. ohnisková vzdálenost 55 mm;Max. ohnisková vzdálenost 200 mm', 
     'Assets/images/Fujifilm Fujinon XF 55-200mm detail/detail 2.webp;Assets/images/Fujifilm Fujinon XF 55-200mm detail/detail 3.webp;Assets/images/Fujifilm Fujinon XF 55-200mm detail/detail 4.webp',
     19990, 'Assets/images/Fujifilm Fujinon XF 55-200mm detail/detail 1.webp')
");

echo "Databáze vytvořena!\n";