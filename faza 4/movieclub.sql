-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2019 at 10:03 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movieclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `funfact` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `biography` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `highlight` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `posterSrc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profileImgLeft` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profileImgRight` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthplace` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `birthday`, `funfact`, `biography`, `highlight`, `posterSrc`, `profileImgLeft`, `profileImgRight`, `birthplace`) VALUES
(1, 'Robert De Niro', '1943-08-17', 'He married his second wife Grace Hightower in 1997, and she gave birth to their son, Elliot De Niro on March 18, 1998. In 1999, the couple renewed marriage vows at their Ulster County farm in New York\'s Catskill Mountains, but later that year De Niro filed for divorce. Their fallout continued into 2001 as a potential custody battle over their son, Elliott, heated up. However, the divorce was never finalized and they managed to smooth over their troubles. Their second child was born in December 2011 via surrogate.', 'One of the greatest actors of all time, Robert De Niro was born on August 17, 1943 in Manhattan, New York City, to artists Virginia (Admiral) and Robert De Niro Sr. His paternal grandfather was of Italian descent, and his other ancestry is English, Dutch, German, French and Irish. He was trained at the Stella Adler Conservatory and the American Workshop. De Niro first gained fame for his role in Bang the Drum Slowly (1973), but he gained his reputation as a volatile actor in Mean Streets (1973), which was his first film with director Martin Scorsese. He received an Academy Award for Best Supporting Actor for his role in The Godfather: Part II (1974) and received Academy Award nominations for best actor in Taxi Driver (1976), The Deer Hunter (1978) and Cape Fear (1991). He received the Academy Award for Best Actor for his role as Jake LaMotta in Raging Bull (1980).', 'Robert Anthony De Niro Jr. is an American actor, producer, and director. He is a recipient of numerous accolades, including two Academy Awards, a Golden Globe Award, the Cecil B DeMille Award, AFI Life ... ', 'images/poster-DeNiro.jpg', 'images/left-DeNiro.png', 'images/right-DeNiro.JPG', 2),
(2, 'Al Pacino', '1940-04-25', 'Was a longtime member of David Wheeler\'s Theatre Company of Boston, for which he performed in \"Richard III\" in Boston from December 1972 to January 1973 and at the Cort Theater in New York City from June 10 to July 15, 1979. He also appeared in their productions of Bertolt Brecht\'s \"Aurturo Ui\" at the Charles Theater in Boston in 1975 and later in New York and London, and in David Rabe\'s \"The Basic Training of Pavlo Hummel\" at the Longacre Theater in New York in 1977, for which Pacino won a Tony Award. Wheeler also directed Pacino in Heathcote Williams\' \"The Local Stigmatic\" for Joseph Papp\'s Public Theater in New York City in 1976. Pacino appeared in a 1989 film of \"Stigmatic\" (The Local Stigmatic (1990)) directed by Wheeler that was presented at the Cinémathèque in Los Angeles.', 'Al Pacino  is an American actor and filmmaker[1] who has had a career spanning more than five decades. He has received numerous accolades and honors both competitive and honorary, among them an Academy Award, two Tony Awards, two Primetime Emmy Awards, a British Academy Film Award, four Golden Globe Awards, the Lifetime Achievement Award from the American Film Institute, the Golden Globe Cecil B. DeMille Award and the National Medal of Arts. He is one of few performers to have won a competitive Oscar, an Emmy and a Tony Award for acting, dubbed the \"Triple Crown of Acting\".\r\n\r\nA method actor and former student of the HB Studio and the Actors Studio in New York City, where he was taught by Charlie Laughton and Lee Strasberg, Pacino made his feature film debut with a minor role in Me, Natalie (1969) and gained favorable notice for his lead role as a heroin addict in The Panic in Needle Park (1971). ', 'Alfredo James Pacino is an American actor and filmmaker who has had a career spanning more than five decades.', 'images/poster-AlPacino.jpg', 'images/left-AlPacino.jpg', 'images/right-AlPacino.jpg', 2),
(3, 'Christian Bale', '1974-01-30', 'Since a young age, he was very ambitious about attending Drama School, and auditioned for the Royal Academy of Dramatic Art (RADA), the London Academy of Music and Dramatic Art (LAMDA), and the Central School of Speech and Drama at age 20. He was accepted to all, but was convinced by his parents to continue working instead. To this day, he regrets not attending drama school for his personal passion of learning his craft.In the \"Fresh Air with Terry Gross\" radio interview first aired June 13, 2005, he admitted to Gross that because Batman is \"such an American icon\", he had decided not to perform his promotional interviews for the movie Batman Begins (2005) in his natural English accent. Instead he spoke to Gross in an almost inflection-less mid-American accent, only revealing his dialectic roots with a few words.', 'His first acting job was a cereal commercial in 1983; amazingly, the next year, he debuted on the West End stage in \"The Nerd\". A role in the 1986 NBC mini-series Anastasia: The Mystery of Anna (1986) caught Steven Spielberg\'s eye, leading to Bale\'s well-documented role in Empire of the Sun (1987). For the range of emotions he displayed as the star of the war epic, he earned a special award by the National Board of Review for Best Performance by a Juvenile Actor.\r\n\r\nAdjusting to fame and his difficulties with attention (he thought about quitting acting early on), Bale appeared in Kenneth Branagh\'s 1989 adaptation of Shakespeare\'s Henry V (1989) and starred as Jim Hawkins in a TV movie version of Treasure Island (1990).', 'Christian Charles Philip Bale was born in Pembrokeshire, Wales, UK on January 30, 1974, to English parents Jennifer \"Jenny\" (James) and David Bale. His mother was a circus performer and his father, who was born in South Africa, was a commercial pilot. The family lived in different countries throughout Bale\'s childhood, including England, Portugal, and the United States. Bale acknowledges the constant change was one of the influences on his career choice.', 'images/poster-Bale.jpg', 'images/left-Bale.jpg', 'images/right-Bale.jpg', 1),
(4, 'Brad Pitt', '1963-12-18', 'An actor and producer known as much for his versatility as he is for his handsome face, Golden Globe-winner Brad Pitt\'s most widely recognized role may be Tyler Durden in Fight Club (1999). However, his portrayals of Billy Beane in Moneyball (2011), and Rusty Ryan in the remake of Ocean\'s Eleven (2001) and its sequels', 'An actor and producer known as much for his versatility as he is for his handsome face, Golden Globe-winner Brad Pitt\'s most widely recognized role may be Tyler Durden in Fight Club (1999). However, his portrayals of Billy Beane in Moneyball (2011), and Rusty Ryan in the remake of Ocean\'s Eleven (2001) and its sequels, also loom large in his filmography.\r\n\r\nPitt was born William Bradley Pitt on December 18th, 1963, in Shawnee, Oklahoma, and was raised in Springfield, Missouri. He is the son of Jane Etta (Hillhouse), a school counselor, and William Alvin Pitt, a truck company manager. He has a younger brother, Douglas (Doug) Pitt, and a younger sister, Julie Neal Pitt. At Kickapoo High School, Pitt was involved in sports, debating, student government and school musicals. Pitt attended the University of Missouri, where he majored in journalism with a focus on advertising.', 'Pitt\'s earliest credited roles were in television, starting on the daytime soap opera Another World (1964) before appearing in the recurring role of Randy on the legendary prime time soap opera Dallas (1978). Following a string of guest appearances on various television series through the 1980s, Pitt gained widespread attention with a small part in Thelma & Louise (1991), in which he played a sexy criminal who romanced and conned Geena Davis. ', 'images/poster-Pitt.jpg', 'images/left-Pitt.jpg', 'images/right-Pitt.jpg', 3),
(5, 'Leonardo DiCaprio', '1974-11-11', 'During the filming of the Wolf of Wall Street, Jonah Hill took revenge on Leonardo DiCaprio by giving him food poisoning. By improvising a line, Hill made DiCaprio eat the last piece of raw yellowtail sushi. DiCaprio had to repeat this 70 times. Only Hill and Martin Scorsese found it funny.\', \'Few actors in the world have had a career quite as diverse as Leonardo DiCaprio\\\'s. DiCaprio has gone from relatively humble beginnings, as a supporting cast member of the sitcom Growing Pains (1985) and low budget horror movies, such as Critters 3 (1991), to a major teenage heartthrob in the 1990s, as the hunky lead actor in movies such as Romeo + Juliet (1996) and Titanic (1997), to then become a leading man in Hollywood blockbusters, made by internationally renowned directors such as Martin Scorsese and Christopher Nolan', 'Leonardo Wilhelm DiCaprio was born November 11, 1974 in Los Angeles, California, the only child of Irmelin DiCaprio (née Indenbirken) and former comic book artist George DiCaprio. His father is of Italian and German descent, and his mother, who is German-born, is of German and Russian ancestry. His middle name, \"Wilhelm\", was his maternal grandfather\'s first name. Leonardo\'s father had achieved minor status as an artist and distributor of cult comic book titles, and was even depicted in several issues of American Splendor, the cult semi-autobiographical comic book series by the late \'Harvey Pekar\', a friend of George\'s. Leonardo\'s performance skills became obvious to his parents early on, and after signing him up with a talent agent who wanted Leonardo to perform under the stage name \"Lenny Williams\", DiCaprio began appearing on a number of television commercials and educational programs.', 'DiCaprio began attracting the attention of producers, who cast him in small roles in a number of television series, such as Roseanne (1988) and The New Lassie (1989), but it wasn\'t until 1991 that DiCaprio made his film debut in Critters 3 (1991), a low-budget horror movie. ', 'images/poster-Leonardo.jpg', 'images/left-Leonardo.jpg', 'images/right-Leonardo.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

DROP TABLE IF EXISTS `cast`;
CREATE TABLE IF NOT EXISTS `cast` (
  `idActor` int(11) NOT NULL,
  `idMovie` int(11) NOT NULL,
  PRIMARY KEY (`idActor`,`idMovie`),
  KEY `cast_movie` (`idMovie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`idActor`, `idMovie`) VALUES
(3, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Will be taken from session (active user)',
  `body` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `idMovie` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_movie` (`idMovie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `body`, `idMovie`, `title`) VALUES
(1, 'ana', '5/5 This is the best movie ever', 1, 'Best movie ever!'),
(2, 'zoka', 'I rate it 3/3', 1, 'I dont like it...');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthplace` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `funfact` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `biography` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `posterSrc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profileImgLeft` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profileImgRight` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `highlight` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `birthplace`, `birthday`, `funfact`, `biography`, `posterSrc`, `profileImgLeft`, `profileImgRight`, `highlight`) VALUES
(1, 'Martin Scorsese', 2, '1942-11-17', ' Martin Scorsese is the fourth-oldest winner for the Best Director Academy Award (won for \"The Departed\" at age 64 years, 100 days).', 'Martin Charles Scorsese is an American and naturalized-Italian filmmaker and historian, whose career spans more than 50 years. Scorsese\'s body of work addresses such themes as Italian-American identity, Roman Catholic concepts of guilt and redemption, faith, machismo, modern crime, and gang conflict.', 'images/poster-Martin.jpg', 'images/left-Martin.jpg', 'images/right-Martin.jpg', 'Martin Scorsese (born November 17, 1942) is an American director, producer, screenwriter, actor, and film historian whose career spans more than fifty years. Scorsese has directed twenty-five narrative films to date. His movies Taxi Driver, Raging Bull, and Goodfellas are often cited among the greatest films ever made.'),
(2, 'Christopher Nolan', 1, '1970-07-30', 'Christopher Nolan is the eighth-highest-grossing director by worldwide box office ($4.705 billion).\r\nWhile Nolan grew up in London, England, he did visit Evanston, Illinois, Chicago at least four to five times during his early childhood and teenage years but his enrollment in Hertfordshire\'s Haileybury and Imperial Service College meant his travels would not be as frequent as his brother. It wasn\'t until his University College London (UCL) years when he started making his professed visits to the US.\r\nNolan has both British and American Citizenship. His mandatory US Citizenship (not Nationality) was legitimized in 2002.', 'Christopher Edward Nolan, CBE is an English film director, screenwriter, and producer. He is renowned as an auteur, making personal, distinctive films within the Hollywood mainstream. Critic Philip French called him the \"first major talent to emerge this [21st] century\". Over the course of 15 years of filmmaking, Nolan has gone from low-budget independent films to working on some of the biggest blockbusters ever made. At 7 years old, Nolan began making short movies. One of the best-reviewed and highest-grossing movies of 2012, The Dark Knight Rises (2012) concluded Nolan\'s Batman trilogy. Due to his success rebooting the Batman character, Warner Bros. enlisted Nolan to produce their revamped Superman movie Man of Steel (2013), which opened in the summer of 2013. In 2014, Nolan directed, wrote, and produced the science fiction epic Interstellar (2014), starring Matthew McConaughey, Anne Hathaway and Jessica Chastain. ', 'images/poster-Nolan.jpg', 'images/left-Nolan', 'images/right-Nolan', 'Best known for his cerebral, often nonlinear, storytelling, acclaimed writer-director Christopher Nolan was born on July 30, 1970 in London, England. '),
(3, 'Woody Allen', 2, '1935-12-01', 'Frequently plays a neurotic New Yorker\r\nFrequently casts himself, Diane Keaton, Mia Farrow and Judy Davis\r\nA lot of his movies feature at least one character who is a writer. This is often Woody himself.\r\nNearly all of his films start and end with white-on-black credits, set in the Windsor typeface, set to jazz music, without any scrolling.\r\nFilms his dialog using long, medium-range shots instead of the typical intercut close-ups\r\nHis films are almost all set in New York City\r\nHis characters (that he plays himself) are often a semi-famous, semi-successful film/tv writer, director, or producer... or a novelist\r\nHis thick black glasses, the same type since the 1960s\r\nFrom Stardust Memories (1980) through Melinda and Melinda (2004), frequently and almost exclusively employs Dick Hyman to contribute musical arrangements, incidental music, and piano accompaniment.', 'While best known for his romantic comedies Annie Hall (1977) and Manhattan (1979), Woody has made many transitions in his films throughout the years, transitioning from his \"early, funny ones\" of Bananas (1971), Love and Death (1975) and Everything You Always Wanted to Know About Sex * But Were Afraid to Ask (1972); to his more storied and romantic comedies of Annie Hall (1977), Manhattan (1979) and Hannah and Her Sisters (1986); to the Bergmanesque films of Stardust Memories (1980) and Interiors (1978); and then on to the more recent, but varied works of Crimes and Misdemeanors (1989), Husbands and Wives (1992), Mighty Aphrodite (1995), Celebrity (1998) and Deconstructing Harry (1997);', 'images/poster-Woody', 'images/left-Woody', 'images/right-Woody', 'Heywood \"Woody\" Allen is an American director, writer, actor, and comedian whose career spans more than six decades. He began his career as a comedy writer in the 1950s, writing jokes and scripts for television and publishing several books of short humor pieces. ');

-- --------------------------------------------------------

--
-- Table structure for table `directs`
--

DROP TABLE IF EXISTS `directs`;
CREATE TABLE IF NOT EXISTS `directs` (
  `idDirector` int(11) NOT NULL,
  `idMovie` int(11) NOT NULL,
  PRIMARY KEY (`idDirector`,`idMovie`),
  KEY `direct_movie` (`idMovie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `directs`
--

INSERT INTO `directs` (`idDirector`, `idMovie`) VALUES
(2, 1),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Crime'),
(2, 'Drama'),
(3, 'SciFi'),
(4, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `rating` double NOT NULL,
  `posterSrc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trailerSrc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `ratingcnt` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `move_genre` (`genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `duration`, `rating`, `posterSrc`, `description`, `img1`, `img2`, `img3`, `img4`, `trailerSrc`, `year`, `ratingcnt`, `genre`) VALUES
(1, 'Interstellar', 169, 4.25, 'images/poster-Interstellar', 'Earth\'s future has been riddled by disasters, famines, and droughts. There is only one way to ensure mankind\'s survival: Interstellar travel. A newly discovered wormhole in the far reaches of our solar system allows a team of astronauts to go where no man has gone before, a planet that may have the right environment to sustain human life. ', 'images/img1-interstellar.jpg', 'images/img2-interstellar.jpg', 'images/img3-interstellar.jpg', 'images/img4-interstellar.jpg', 'https://www.youtube.com/embed/UDVtMYqUAyw', 2014, 6, 3),
(2, 'The Dark Knight', 152, 4.1666666666667, 'images/poster-DarkKnight.jpg', 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'images/img1-darkKnight.jpeg', 'images/img2-darkKnight.jpg', 'images/img3-darkKnight.jpg', 'images/img4-darkKnight.jpg', 'https://www.youtube.com/embed/xGcfBRkJSWQ', 2008, 6, 4),
(3, 'Goodfellas', 146, 3.7857142857143, 'images/poster-goodfellas.jpg', 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate. Henry Hill might be a small time gangster, who may have taken part in a robbery with Jimmy Conway and Tommy De Vito, two other gangsters who might have set their sights a bit higher. His two partners could kill off everyone else involved in the robbery, and slowly start to think about climbing up through the hierarchy of the Mob. Henry, however, might be badly affected by his partners\' success, but will he consider stooping low enough to bring about the downfall of Jimmy and Tommy? ', 'images/img1-goodfellas.jpeg', 'images/img2-goodfellas.jpg', 'images/img3-goodfellas.jpg', 'images/img4-goodfellas.jpg', 'https://www.youtube.com/embed/vc4mBGIDEeU', 1990, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `imgSrc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Will be taken from session (active user)',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `imgSrc`, `date`, `author`, `status`) VALUES
(1, 'Cannes film festival: New talent shines', 'Cannes Directors\' Fortnight focuses on some of the industry\'s most famous directors and is credited with shaping cinematic history. The two-week-long event discovered Director George Lucas who went on to create Star Wars and launched the careers of Martin Scorsese, Spike Lee, and Xavier Dolan. The undisputed queen of the red carpet this year was Elle Fanning. Still riding a wave of Met Gala praise, the 21-year-old juror cycled through Gucci and Valentino before peaking with a \'40s-inspired Dior couture confection at the Tarantino premiere. Not receiving the positive PR was Prada: Fanning said she fainted in a 1950s Prada prom dress at a party the night before, later claiming on Instagram that it was too tight.\r\n', 'images/news1.jpg', '2019-05-24', 'marko', 1),
(2, 'Cumberbatch\'s The Current War Release Date', 'Benedict Cumberbatch\'s Thomas Edison drama, The Current War, has been picked up and re-scheduled for an October release date. The film was actually shot in 2016, and premiered at the Toronto International Film Festival the year after. Written by Michael Mitnick (The Giver) and directed by Alfonso Gomez-Rejon (Me and Earl and the Dying Girl), The Current War is a period piece that explores the real-life competition between inventor Edison (Cumberbatch) and businessman George Westinghouse (Michael Shannon), to see who could design a sustainable electrical system in the late 19th century. The movie\'s all finished at this point, and has merely been waiting for a studio to pick it up and release it in theaters. And now, after a nearly two year wait, that\'s finally happening.', 'images/news2.jpg', '2019-05-23', 'ana', 1),
(3, 'Christopher Nolan\'s New Movie Tenet Sets Cast', 'Christopher Nolan\'s new movie has an official title, Tenet, and has added more cast members as production begins. Nolan has become one of the biggest working directors thanks to his work on major tentpoles like The Dark Knight or original concepts like Inception and Interstellar. His name alone is enough to drive audiences to the theaters, and it was announced earlier this year that they\'d get the chance to do so once again next summer. ', 'images/news3.jpg', '2019-05-25', 'ana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idNews` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `not_news` (`idNews`),
  KEY `not_user` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `idMovie` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `rating` double NOT NULL,
  PRIMARY KEY (`idMovie`,`idUser`),
  KEY `rating_user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`idMovie`, `idUser`, `rating`) VALUES
(1, 2, 5),
(2, 2, 5),
(3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `savedmovies`
--

DROP TABLE IF EXISTS `savedmovies`;
CREATE TABLE IF NOT EXISTS `savedmovies` (
  `idUser` int(11) NOT NULL,
  `idMovie` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idMovie`),
  KEY `saved_movie` (`idMovie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `city`, `state`) VALUES
(1, 'London', 'England'),
(2, 'New York', 'USA'),
(3, 'Oklahoma', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `idUser` int(11) NOT NULL,
  `idActor` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idActor`),
  KEY `actor_subscr` (`idActor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`idUser`, `idActor`) VALUES
(1, 1),
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `idNews` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idNews`,`idTag`),
  KEY `tag_actor` (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('0','1','2','') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `email`) VALUES
(1, 'ana', 'ana123', '1', 'ana@gmail.com'),
(2, 'zoka', 'zoka123', '2', 'zoka@gmail.com'),
(3, 'marko', 'marko123', '0', 'marko@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast`
--
ALTER TABLE `cast`
  ADD CONSTRAINT `cast_actor` FOREIGN KEY (`idActor`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cast_movie` FOREIGN KEY (`idMovie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_movie` FOREIGN KEY (`idMovie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `directs`
--
ALTER TABLE `directs`
  ADD CONSTRAINT `direct_director` FOREIGN KEY (`idDirector`) REFERENCES `directors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `direct_movie` FOREIGN KEY (`idMovie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `move_genre` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `not_news` FOREIGN KEY (`idNews`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `not_user` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating_movie` FOREIGN KEY (`idMovie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `savedmovies`
--
ALTER TABLE `savedmovies`
  ADD CONSTRAINT `saved_movie` FOREIGN KEY (`idMovie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_user` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `actor_subscr` FOREIGN KEY (`idActor`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_subscr` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tag_actor` FOREIGN KEY (`idTag`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_news` FOREIGN KEY (`idNews`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
