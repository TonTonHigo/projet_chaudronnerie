-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 16 nov. 2023 à 01:13
-- Version du serveur : 10.6.16-MariaDB
-- Version de PHP : 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sc3nuxz4136_dain-hugo.chaudronnerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `image`) VALUES
(1, 'LA SOUDURE AU CHALUMEAU', '\r\n<u><strong>Un Art Ancien de Liaison Métallique</strong></u>\r\n\r\nDepuis des siècles, l\'art de la soudure au chalumeau a été un pilier dans la fabrication, la réparation et la création d\'objets métalliques. Cette technique, qui repose sur l\'utilisation habile de la chaleur pour fondre et joindre les métaux, a façonné de nombreux aspects de notre monde moderne.\r\n\r\n<u><strong>Histoire et Évolution</strong></u>\r\n\r\nLes racines de cette technique remontent à l\'Antiquité, lorsque les forgerons utilisaient des outils rudimentaires pour chauffer les métaux à des températures élevées. Cependant, la véritable révolution dans ce domaine s\'est produite au XIXe siècle avec la découverte de l\'acétylène comme source de chaleur. Cette percée a ouvert la voie à des températures de combustion bien plus élevées, permettant aux artisans et aux industriels de joindre des métaux auparavant difficiles à assembler.\r\n\r\n<u><strong>Techniques et Méthodes</strong></u>\r\n\r\nCet art est une forme complexe et polyvalente. Les artisans qualifiés maîtrisent différentes techniques pour obtenir des résultats précis et esthétiquement agréables.\r\n\r\n<u><i>La Soudure à la Flamme Douce :</i></u> <br>Cette méthode est souvent utilisée pour joindre des métaux de faible épaisseur. Elle implique l\'utilisation d\'une flamme douce pour éviter la surchauffe et la distorsion du métal.\r\n\r\n<u><i>La Soudure à la Flamme Forte :</i></u><br> Les métaux plus épais et les joints plus robustes nécessitent une température de fusion plus élevée. Cette technique emploie une flamme plus intense pour fondre les métaux et créer des liaisons solides.\r\n\r\n<u><i>Le Brasage :</i></u><br> Une variante de cette méthode, le brasage utilise un matériau d\'apport à bas point de fusion pour joindre les pièces métalliques. Cela est couramment utilisé dans l\'assemblage de bijoux et d\'autres objets délicats.\r\n\r\n<u><strong>Applications Modernes</strong></u>\r\n\r\nCet art reste vital dans de nombreuses industries et disciplines.\r\n\r\n<u><i>Industrie Automobile et Aérospatiale :</i></u><br> Les structures métalliques complexes des véhicules et des aéronefs nécessitent des joints précis et résistants, souvent réalisés par cette technique.\r\n\r\n<u><i>Construction Métallique :</i></u><br> Des gratte-ciels aux ponts, cette méthode est utilisée pour assembler d\'énormes structures en acier et en métal.\r\n\r\n<u><i>Art et Design :</i></u><br> De nombreux artistes contemporains utilisent cette technique pour créer des sculptures métalliques audacieuses et des œuvres d\'art novatrices.\r\n\r\n<u><i>Industrie des Bijoux : </i></u><br>Les bijoutiers se tournent vers cette méthode pour créer des pièces uniques et des designs complexes.\r\n\r\n<u><strong>Conclusion</strong></u>\r\n\r\nCette technique, bien plus qu\'une simple méthode de fixation de métaux, incarne l\'union de la tradition et de la technologie. C\'est un art qui a évolué au fil des siècles pour façonner le monde moderne d\'une manière que peu d\'autres techniques ont réussi à faire. En tant que lien entre passé et présent, cet art continue de briller, reliant les métaux et les esprits créatifs d\'une manière qui dépasse les frontières du temps.\r\n', '../image/image13.jpg'),
(3, 'LA SOUDURE A l\'ARC ', '<u><strong>Créativité Fusionnée avec Praticité</strong></u>\r\n\r\nParmi les méthodes de soudage traditionnelles qui continuent de faire leurs preuves, la technique de soudage à l\'arc se distingue par sa simplicité et son efficacité. Cette méthode allie habileté technique et praticité pour créer des joints solides dans une variété de contextes.\r\n\r\n<u><strong>Racines Historiques et Développement</strong></u>\r\n\r\nLe soudage à l\'arc à l\'électrode enrobée a émergé au début du 20e siècle et est devenu rapidement populaire en raison de sa facilité d\'utilisation. Initialement destiné à des applications de réparation et de maintenance, cette technique a depuis évolué pour s\'adapter à des tâches plus complexes dans diverses industries.\r\n\r\n<u><strong>Mécanisme Fondamental</strong></u>\r\n\r\nCe processus de soudage implique la création d\'un arc électrique entre une électrode enrobée et les pièces à souder, voici comment cela fonctionne.\r\n\r\n<u><i>Électrode Enrobée :</i></u><br>L\'électrode est un fil métallique recouvert d\'un enrobage constitué de matériaux qui génèrent un gaz protecteur, une scorie et des composants chimiques pour stabiliser l\'arc.\r\n\r\n<u><i>Création de l\'Arc :</i></u><br>Lorsque l\'électrode entre en contact avec les pièces à souder, un arc électrique se forme, générant une chaleur intense qui fait fondre les bords des pièces.\r\n\r\n<u><i>Formation de la Scorie :</i></u><br>L\'enrobage se décompose pour former une scorie protectrice qui flotte au-dessus du bain de fusion. Cette scorie protège le métal en fusion des contaminants atmosphériques.\r\n\r\n<u><i>Solidification et Refroidissement :</i></u><br>Après que le bain de fusion a refroidi, la scorie se solidifie en une couche protectrice. Le résultat est un joint solide et résistant.\r\n\r\n<u><strong>Polyvalence et Domaines d\'Application</strong></u>\r\n\r\nCette méthode de soudage trouve des applications variées dans diverses industries.\r\n\r\n<u><i>Chantier de Construction :</i></u><br>Elle est couramment utilisée sur les chantiers de construction pour souder des structures métalliques telles que les charpentes et les poutres.\r\n\r\n<u><i>Réparation et Maintenance :</i></u><br>Le soudage stick est idéal pour les travaux de réparation, car il peut être effectué dans des conditions variées et avec un équipement portable.\r\n\r\n<u><i>Travaux en Extérieur :</i></u><br> Sa simplicité et son indépendance par rapport aux gaz externes en font une option pratique pour les travaux en extérieur et dans des environnements difficiles.\r\n\r\n<u><i>Fabrication de Navires :</i></u><br> Cette technique est souvent utilisée pour la construction de navires et de plates-formes offshore, où des joints résistants à la corrosion sont nécessaires.\r\n\r\n<u><strong>Conclusion</strong></u>\r\n\r\nLe soudage à l\'arc aussi appeler ‘à l\'électrode enrobée’, ‘stick’ bien qu\'étant une technique traditionnelle, continue de jouer un rôle vital dans le domaine de la soudure. Sa simplicité, sa polyvalence et sa capacité à produire des joints solides en font un choix privilégié pour de nombreux professionnels de la construction, de la réparation et de la fabrication. En combinant le savoir-faire technique avec des outils simples, cette méthode de soudage rappelle que la créativité peut être fusionnée avec la praticité pour créer des connexions durables dans le monde de la métallurgie.', '../image/image15.jpg'),
(4, 'LA SOUDURE AU TIG', '\r\n<u><strong>Fusion Précise pour des Résultats Impeccables</strong></u>\r\n\r\nDans le vaste paysage du soudage, le procédé TIG (Tungstène Inerte Gaz), également connu sous le nom de GTAW (Gaz Tungstène Arc Welding), se distingue par sa capacité à produire des soudures de haute qualité, précises et esthétiquement impressionnantes. Cette méthode, qui allie précision technique et contrôle minutieux, est au cœur de nombreuses applications exigeantes.\r\n\r\n<u><strong>Génèse et Évolution</strong></u>\r\n\r\nLe soudage TIG a vu le jour au début du 20e siècle, mais il a fallu du temps pour développer la technologie nécessaire pour en faire une méthode de soudage pratique et largement utilisée. Au fil des décennies, grâce aux avancées dans les équipements et les matériaux, le procédé TIG est devenu l\'une des techniques les plus respectées et polyvalentes.\r\n\r\n<u><strong>Mécanisme de Soudage</strong></u>\r\n\r\nLe soudage TIG repose sur l\'utilisation d\'un arc électrique établi entre une électrode de tungstène non consommable et les pièces à souder, voici comment fonctionne ce procédé.\r\n\r\n<u><i>Électrode de Tungstène :</i></u><br>Contrairement à d\'autres procédés de soudage, l\'électrode de tungstène n\'est pas consommée pendant le soudage. Elle reste stable à des températures élevées et agit comme conducteur d\'électricité pour établir l\'arc.\r\n\r\n<u><i>Gaz de Protection :</i></u><br>Un gaz inerte, généralement de l\'argon, est utilisé pour protéger l\'arc et les métaux en fusion de l\'oxydation. Ce gaz crée un environnement sans réaction chimique, assurant la pureté du joint.\r\n\r\n<u><i>Apport de Matériau :</i></u><br>Si nécessaire, un matériau d\'apport peut être ajouté manuellement au bain de fusion pour renforcer le joint. Ce matériau d\'apport est introduit avec précision pour obtenir le résultat souhaité.\r\n\r\n<u><i>Contrôle Fin :</i></u><br>Le soudage TIG offre un contrôle extrêmement fin sur l\'arc et l\'apport de matériau, permettant aux soudeurs de produire des soudures d\'une grande précision et d\'une qualité exceptionnelle.\r\n\r\n<u><i>Solidification et Refroidissement :</i></u><br>Après avoir arrêté l\'apport de chaleur, le métal fondu se refroidit et se solidifie pour former un joint solide.\r\n\r\n<u><strong>Applications et Polyvalence</strong></u>\r\n\r\nLe soudage TIG est apprécié pour ses résultats impeccables et sa polyvalence. Voici quelques-unes de ses applications :\r\n\r\n<u><i>Industrie Aérospatiale :</i></u><br>Les exigences de sécurité élevées de l\'industrie aérospatiale en font un terrain propice au soudage TIG, où les soudures de haute qualité sont essentielles.\r\n\r\n<u><i>Fabrication de Produits Alimentaires et Pharmaceutiques :</i></u><br>Le soudage TIG est utilisé pour des équipements en acier inoxydable nécessaires à la fabrication de produits sensibles.\r\n\r\n<u><i>Industrie de la Haute Technologie :</i></u><br>Les composants électroniques et les circuits nécessitent une précision extrême, rendant le soudage TIG idéal pour ces applications.\r\n\r\n<u><i>Soudage de Tubes :</i></u><br>Les tubes et tuyaux minces en acier inoxydable, en titane et en cuivre sont fréquemment soudés avec la méthode TIG.\r\n\r\n<u><strong>Conclusion</strong></u>\r\n\r\nLe soudage TIG, une fusion entre compétence technique et minutie, illustre comment la maîtrise de l\'arc peut donner naissance à des œuvres d\'art fonctionnelles. Au-delà de l\'aspect esthétique, cette méthode offre des joints de haute qualité et de précision dans diverses industries. Alors que la technologie continue de progresser, le soudage TIG reste un pilier du soudage de précision, reliant les métaux avec une délicatesse qui témoigne de la virtuosité des artisans et de l\'ingéniosité humaine.', '../image/image16.jpg'),
(5, 'LA BRASURE', '<u><strong>L\'Art Ancien de Joindre les Métaux avec Subtilité</strong></u>\r\n\r\nDans le vaste domaine de l\'assemblage métallique, la brasure se distingue comme une méthode délicate et raffinée pour créer des liaisons solides et esthétiquement attrayantes. Cette technique ancestrale, utilisée depuis des millénaires, continue de jouer un rôle crucial dans diverses industries et artisanats.\r\n\r\n<u><strong>Histoire et Origines</strong></u>\r\n\r\nLa pratique de la brasure remonte à l\'Antiquité, où les artisans ont découvert qu\'en chauffant un matériau d\'apport, généralement sous forme de métal ou d\'alliage à bas point de fusion, il était possible de joindre des métaux sans les faire fondre complètement. Cette découverte a ouvert la voie à une méthode de liaison moins invasive que la fusion complète, préservant la structure et les propriétés des métaux.\r\n\r\n<u><strong>Mécanisme de Brasure</strong></u>\r\n\r\nLa brasure implique le chauffage d\'un matériau d\'apport, appelé \"brasure\", jusqu\'à ce qu\'il atteigne son point de fusion, mais sans faire fondre les pièces à joindre. Voici comment fonctionne le processus de brasure :\r\n\r\n<u><i>Préparation des Surfaces :</i></u><br>Les surfaces à joindre sont nettoyées pour éliminer toute saleté, oxydation ou graisse. Cela garantit une adhérence optimale de la brasure.\r\n\r\n<u><i>Chauffage Contrôlé :</i></u><br>La brasure est chauffée à l\'aide d\'une flamme, d\'un chalumeau ou d\'autres sources de chaleur, jusqu\'à ce qu\'elle fonde et se répande entre les surfaces à joindre.\r\n\r\n<u><i>Capillarité :</i></u><br>La brasure fondue est attirée par capillarité dans les espaces minuscules entre les surfaces. Ce phénomène permet à la brasure de remplir les interstices et de former un joint solide.\r\n\r\n<u><i>Refroidissement et Solidification :</i></u><br>Après avoir arrêté la source de chaleur, la brasure se refroidit et se solidifie, créant ainsi un lien solide entre les métaux.\r\n\r\n<u><strong>Applications et Variations</strong></u>\r\n\r\nLa brasure offre une flexibilité exceptionnelle et se décline en plusieurs méthodes et alliages, notamment :\r\n\r\n<u><i>Brasure Forte :</i></u><br>Utilisant des alliages de cuivre, d\'argent, d\'or et de palladium, la brasure forte crée des joints solides pour les applications nécessitant une résistance élevée.\r\n\r\n<u><i>Brasure Tendre :</i></u><br>À base d\'étain et de plomb, la brasure tendre est utilisée pour des liaisons plus délicates, comme dans l\'industrie électronique.\r\n\r\n<u><i>Brasure à l\'Argent :</i></u><br>Les alliages d\'argent sont utilisés pour des applications nécessitant une liaison résistante, comme les équipements de plomberie.\r\n\r\n<u><i>Brasure au Cuivre Phosphoreux :</i></u><br>Cette brasure est couramment utilisée pour assembler des tubes en cuivre dans les systèmes de plomberie et de climatisation.\r\n\r\n<u><strong>Conclusion</strong></u>\r\n\r\nLa brasure, symbole de l\'union subtile des métaux, continue d\'être un artisanat précieux et une technique essentielle dans de nombreuses industries. Cette méthode, qui met en avant la délicatesse et la maîtrise du chauffage, relie les métaux tout en préservant leurs caractéristiques uniques. En fusionnant savoir-faire traditionnel et applications modernes, la brasure témoigne de l\'ingéniosité et de l\'adaptabilité de l\'homme dans l\'art ancestral de joindre les éléments pour créer des liaisons durables et significatives.', '../image/image18.png'),
(6, 'LE RIVETAGE A CHAUD\r\n', '<u><strong>Une Connexion Permanente et Robuste au Cœur de la Construction</strong></u>\r\n\r\nParmi les méthodes d\'assemblage mécanique les plus anciennes et les plus fiables, le rivetage occupe une place centrale dans le monde de la construction et de l\'ingénierie. Cette technique, qui repose sur la déformation du métal pour créer des joints solides et durables, continue de jouer un rôle essentiel dans la création de structures résistantes et sécurisées.\r\n\r\n<u><strong>Origines et Évolution</strong></u>\r\n\r\nLe rivetage remonte à l\'Antiquité, où les artisans utilisaient des rivets en bois pour joindre des matériaux tels que le bois et la pierre. Cependant, ce sont les progrès de l\'industrie métallurgique au 19e siècle qui ont permis l\'utilisation généralisée de rivets en métal, en particulier dans la construction de structures en acier telles que les ponts, les bâtiments et les navires.\r\n\r\n<u><strong>Mécanisme de Rivetage</strong></u>\r\n\r\nLe rivetage consiste à insérer un rivet chauffé dans des trous pré-percés dans les pièces à joindre. Voici les étapes du processus de rivetage traditionnel :\r\n\r\n<u><i>Préparation des Pièces :</i></u><br>Les pièces à joindre sont préparées en perçant des trous alignés.\r\n\r\n<u><i>Chauffage du Rivet :</i></u><br>Le rivet est chauffé jusqu\'à ce qu\'il devienne incandescent.\r\n\r\n<u><i>Insertion du Rivet :</i></u><br>Le rivet chaud est inséré dans le trou de la première pièce et dépasse légèrement de la surface.\r\n\r\n<u><i>Formage de la Tête :</i></u><br>À l\'aide d\'une enclume et d\'un marteau, le rivet est martelé pour former une tête à une extrémité, créant ainsi une pression sur les pièces à joindre.\r\n\r\n<u><i>Solidification et Refroidissement :</i></u><br>En refroidissant, le rivet se contracte, créant une connexion solide et permanente entre les pièces.\r\n\r\n<u><strong>Applications et Adaptations</strong></u>\r\n\r\nLe rivetage a évolué au fil du temps pour s\'adapter aux besoins modernes et aux nouvelles technologies. Certaines applications et variations incluent :\r\n\r\n<u><i>Rivetage aveugle :</i></u><br>Utilisé lorsque l\'accès à une face de la pièce est limité, le rivetage aveugle implique l\'utilisation d\'un outil spécifique pour insérer et former le rivet.\r\n\r\n<u><i>Rivetage à grande vitesse :</i></u><br>Les techniques modernes ont permis le développement de processus de rivetage automatisés pour une productivité accrue.\r\n\r\n<u><i>Rivetage structural :</i></u><br>Dans l\'industrie aérospatiale et de la construction, le rivetage est utilisé pour créer des structures résistantes aux charges élevées.\r\n\r\n<u><i>Rivetage décoratif :</i></u><br>Dans le domaine de la mode et du design, le rivetage est utilisé comme élément esthétique sur des vêtements, des accessoires et des objets décoratifs.\r\n\r\n<u><strong>Conclusion</strong></u>\r\n\r\nLe rivetage, témoignage vivant de l\'ingéniosité humaine, continue d\'être une méthode d\'assemblage essentielle dans le monde de la construction et de l\'ingénierie. En fusionnant la chaleur, la pression et le savoir-faire, le rivetage forme des joints solides et durables qui résistent à l\'épreuve du temps. Bien que d\'autres méthodes modernes aient émergé, le rivetage reste un rappel puissant que la simplicité peut être synonyme de résistance, et que l\'union métallique peut symboliser la force et la solidarité.', '../image/image11a.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `message`, `date`, `id_article`, `id_utilisateur`) VALUES
(7, 'zaza', '2023-11-15 20:10:24', 1, 10),
(9, 'massalé', '2023-11-15 20:13:08', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_1`
--

CREATE TABLE `commentaire_1` (
  `id_commentaire_1` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_tutoriel` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `pseudonyme` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id_galerie` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `descriptif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id_galerie`, `photo`, `descriptif`) VALUES
(1, '../image/image5.jpg', '\r\n\r\n\"Voici une cuve en acier inoxydable 316L d\'une capacité de 300 litres, équipée de son propre couvercle et d\'un tube transparent offrant un aperçu de l\'intérieur. Les vannes papillon garantissent un remplissage et une évacuation faciles des produits alimentaires. Une solution fonctionnelle qui séduira les passionnés de vin, de brassage ou de cuisine.\"'),
(2, '../image/image4.jpg', '\r\n\r\nVoici une trémie don le sommet est un tuyau doté d\'une bride à collerette , tandis que sa base est rectangulaire, équipée d\'une bride fixe . Cette trémie d\'une longueur imposante de 5 à 6 mètres offre une réponse robuste à un défi. Elle remplace un tuyau utilisé précédemment pour collecter les boues des eaux usées, qui s\'était malheureusement déformé sous la force des chutes. On y voit une sonde de température intégrée et une trappe de regard en verre . '),
(3, '../image/image12.jpg', '\"Découvrez ce réseau de tuyauterie en acier inoxydable, alimentant tout l\'étage en remplacement d\'une ancienne structure en galvanisé, qui avait malheureusement succombé à la rouille. Cette tuyauterie assure l\'alimentation des climatiseurs de chaque pièce . Cette évolution ingénieuse illustre comment le choix judicieux des matériaux peut faire la différence dans la durabilité et la performance d\'un système.\"');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `type`) VALUES
(1, 'admin'),
(2, 'subscriber');

-- --------------------------------------------------------

--
-- Structure de la table `tutoriel`
--

CREATE TABLE `tutoriel` (
  `id_tutoriel` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tutoriel`
--

INSERT INTO `tutoriel` (`id_tutoriel`, `titre`, `contenu`, `image`, `image2`) VALUES
(1, 'La soudure au TIG', '<u><strong>Maîtrise du Mouvement Godillé </strong></u>\r\n\r\nBienvenue dans ce guide visant à vous familiariser avec le mouvement godillé, une technique cruciale dans le domaine exigeant du soudage TIG. Comprendre et maîtriser cette technique est essentiel pour réaliser des soudures de qualité supérieure.\r\n\r\nLe mouvement godillé, tel que son nom l\'indique, consiste en un mouvement sinueux, semblable à un \"S\" ou à un zigzag, réalisé avec la torche de soudage TIG. Cette méthode est particulièrement utile pour répartir de manière uniforme la chaleur et le métal fondu lors de la fusion des pièces.\r\n\r\nLorsque vous débutez dans le soudage TIG, il peut sembler difficile d\'adopter cette technique. Cependant, avec de la pratique et des conseils adéquats, vous serez en mesure d\'exécuter des mouvements godillés fluides et précis.\r\n\r\n<u><strong>Pourquoi le Mouvement Godillé est-il Important ?</strong></u>\r\n\r\nLe mouvement godillé est essentiel dans le soudage TIG pour plusieurs raisons. Tout d\'abord, il permet de répartir uniformément la chaleur sur la zone à souder. Cela évite la surchauffe d\'une zone spécifique, garantissant ainsi une soudure homogène et solide.\r\n\r\nEnsuite, le mouvement godillé favorise la fusion complète du matériau. Lorsque vous déplacez la torche en zigzag, la chaleur se diffuse dans le matériau de manière équilibrée, ce qui facilite la pénétration adéquate de la soudure.\r\n\r\n<u><strong>Comment Exécuter le Mouvement Godillé ?</strong></u>\r\n\r\n<u><i>Positionnement de la Torche :</i></u><br> Placez la torche de soudage TIG à une distance appropriée du matériau à souder. Assurez-vous que l\'angle est optimal pour une fusion efficace.\r\n\r\n<u><i>Amorçage de l\'Arc :</i></u><br>Amorcez l\'arc en effectuant un contact léger entre la torche et le matériau tout en appuyant sur la pédale d\'amorçage du poste à souder TIG.\r\n\r\n<u><i>Début du Mouvement Godillé :</i></u><br> Une fois l\'arc amorcé, commencez le mouvement godillé en effectuant des mouvements en \"S\" ou en zigzag avec la torche. Maintenez une régularité dans le mouvement.\r\n\r\n<u><i>Contrôle et Ajustement :</i></u><br> Ajustez la vitesse et l\'amplitude du mouvement godillé en fonction de la progression de la soudure. Surveillez la fusion et ajustez en conséquence.\r\n\r\n<u><i>Arrêt et Refroidissement :</i></u><br> Lorsque la soudure est complète, arrêtez le mouvement godillé, éloignez doucement la torche du matériau et laissez la soudure refroidir avant d\'inspecter le résultat final.\r\n\r\n<u><strong>Conseils pour la Maîtrise du Mouvement Godillé</strong></u>\r\n\r\n<u><i>Pratiquez Régulièrement :</i></u><br> La clé pour maîtriser le mouvement godillé est la pratique régulière. Faites des exercices de soudure en utilisant cette technique pour améliorer votre fluidité et votre précision.\r\n\r\n<u><i>Adaptez-vous aux Matériaux :</i></u><br> Chaque matériau réagit différemment à la chaleur. Adaptez votre mouvement godillé en fonction du matériau que vous soudez pour obtenir les meilleurs résultats.\r\n\r\n<u><i>Soyez Patient :</i></u><br> Le mouvement godillé peut sembler délicat au début, mais la patience est essentielle. Prenez le temps de comprendre et d\'affiner votre technique.\r\n\r\n<u><strong>Conclusion</strong></u>\r\n\r\nLe mouvement godillé est une compétence précieuse dans le soudage TIG. En le maîtrisant, vous pourrez produire des soudures de haute qualité, renforçant ainsi votre expertise dans le domaine du soudage.', '..\\image\\Gifsoudure.gif', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudonyme` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudonyme`, `email`, `mdp`, `id_role`) VALUES
(2, 'gogo', 'hugoh420@outlook.fr', '$argon2i$v=19$m=65536,t=4,p=1$NG5BWm5weDFDMThqRy9CRg$UFCChnVdq1UOBGFCZ9HX1nM9NQnBd6DJfuYyuqTHla0', 1),
(10, 'zaza', 'zaza@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VVVGNEtBak05ekpRcGFxTw$ISDDueWM9+tOBOZu+Vq8SolTqQlExJCvm59q8VS1vwY', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `Commentaire_fk0` (`id_article`),
  ADD KEY `Commentaire_fk1` (`id_utilisateur`);

--
-- Index pour la table `commentaire_1`
--
ALTER TABLE `commentaire_1`
  ADD PRIMARY KEY (`id_commentaire_1`),
  ADD KEY `Commentaire_1_fk0` (`id_tutoriel`),
  ADD KEY `Commentaire_1_fk1` (`id_utilisateur`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `Contact_fk0` (`id_utilisateur`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id_galerie`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `tutoriel`
--
ALTER TABLE `tutoriel`
  ADD PRIMARY KEY (`id_tutoriel`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `Utilisateur_fk0` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commentaire_1`
--
ALTER TABLE `commentaire_1`
  MODIFY `id_commentaire_1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id_galerie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tutoriel`
--
ALTER TABLE `tutoriel`
  MODIFY `id_tutoriel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_commentaire_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_commentaire_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire_1`
--
ALTER TABLE `commentaire_1`
  ADD CONSTRAINT `FK_commentaire1_tutoriel` FOREIGN KEY (`id_tutoriel`) REFERENCES `tutoriel` (`id_tutoriel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_commentaire1_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_contact_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
