-- create database test;
use php_final_project;

CREATE TABLE artists ( 
	artist_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT , 
	stage_name VARCHAR(50) NULL , 
	birth_name VARCHAR(50) NOT NULL , 
	date_of_birth DATE NOT NULL , 
	hometown VARCHAR(50) NULL , 
	date_of_death DATE NULL , 
	fun_fact TEXT NOT NULL 
) ;

CREATE TABLE genres ( 
	genre_id INT NOT NULL PRIMARY KEY  AUTO_INCREMENT , 
	genre VARCHAR(50) NOT NULL
) ;

CREATE TABLE albums ( 
	album_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT , 
	album_name VARCHAR(50) NOT NULL , 
	artist_id INT NOT NULL , 
	record_label VARCHAR(50) NOT NULL , 
	genre_id INT NOT NULL , 
	release_date DATE NOT NULL , 
	notable_fact TEXT NULL,
  FOREIGN KEY (artist_id) REFERENCES artists(artist_id),
	FOREIGN KEY (genre_id) REFERENCES genres(genre_id)
 );

CREATE TABLE songs ( 
	song_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT , 
	song_name VARCHAR(50) NOT NULL , 
	artist_id INT NOT NULL , 
	album_id INT NOT NULL  , 
	length_in_seconds INT NOT NULL , 
	comments TEXT NULL , 
	highest_billboard_ranking INT NULL , 
	date_of_billboard_ranking INT NULL , 
	writer_name VARCHAR(500) NOT NULL , 
  FOREIGN KEY (artist_id) REFERENCES artists(artist_id),
  FOREIGN KEY (album_id) REFERENCES albums(album_id)
);








INSERT INTO artists 
	(stage_name, birth_name, date_of_birth, hometown, date_of_death, fun_fact) 
VALUES 
-- 1
	('Cher', 'Cherilyn Sarkisian', '1946-05-20', 'El Centro, California', NULL, 'With the success of "Believe," Cher became the oldest woman to have a number one song — at the age of 52.  It also marked the longest span between number one songs for any artists.  Cher had to wait nearly a quarter century between number ones, with "Dark Lady" hitting the top spot in 1974 and "Believe" hitting the same milestone in 1999.'),
-- 2
	('Melissa Etheridge', 'Melissa Etheridge', '1961-05-29', 'Leavenworth, Kansas', NULL, 'Etheridge is known for her mixture of confessional lyrics, pop-based folk-rock, and raspy, smoky vocals.  She has also been a gay and lesbian activist since her public coming out in January 1993.  She has received fifteen Grammy Award nominations throughout her career, winning two, in 1993 and 1995.'),
-- 3
	('Lauren Daigle', 'Lauren Daigle', '1991-09-09', 'Lake Charles, Louisiana', NULL, 'Daigle did not consider music seriously until contracting cytomegalovirus at age 15.  This diagnosis kept her out of school for the next two years.  During that time, Daigle took voice lessons that provided her with a creative outlet.'),
-- 4
	('Tim McGraw', 'Samuel Timothy McGraw', '1967-05-01', 'Delhi, Louisiana', NULL, "McGraw holds a pilot's license and has an airplane.  'When I quit drinking, it was a good diversion, a good way to focus on something,' the country star says of flying."),
-- 5
	('Tracy Lawrence', 'Tracy Lee Lawrence', '1968-01-27', 'Atlanta, Texas', NULL, 'Lawrence wrote his first song when he was four years old. His mother had to write down the lyrics for him.'),
-- 6
	('Eminem', 'Marshall Bruce Mathers III', '1972-10-17', 'Saint Joseph, Missouri', NULL, "Contrary to the belief that he was named after the famous chocolate candy, Eminem came up with his stage name by combining the first initial of his first and last name. Sometimes, he also refers to Eminem as his “alter-ego” when he gets mad."),
-- 7
	('Lady Gaga', 'Stefani Joanne Angelina Germanotta', '1986-03-28', 'Yonkers, New York', NULL, 'Her Stage Name Was Inspired by Queen. Apparently, it was inspired by the Queen song, Radio Ga Ga.'),
-- 8
	('Shania Twain', 'Eilleen Regina Edwards', '1965-08-28', 'Windsor, Canada', NULL, "If Twain hadn't pursued music, she says she would have been a veterinarian or an architect."),
-- 9
	('P!nk', 'Alecia Beth Moore', '1979-09-08', 'Doylestown, Pennsylvannia', NULL, "By the time she was 14, she'd already begun writing her own songs and had a regular singing gig every Friday night at a club in Philadelphia."),
-- 10
	('Whitney Houston', 'Whitney Elizabeth Houston Brown', '1963-08-09', 'Newark, New Jersey', '2012-02-11', "Whitney is musical aristocracy: her second cousin is Dionne Warwick; her godmother is Aretha Franklin."),
-- 11
	('Bryan Adams', 'Bryan Guy Adams', '1959-11-05', 'Kingston, Canada', NULL, "His first label contract in 1978 was for $1.  That's right. $1. 'Contracts have to have a denomination passed back and forth to make them legal. And because they didn't want to give me any money, one dollar was the minimum amount to make the contract legally binding,' Adams told Rolling Stone last year. 'I still have the check somewhere … It proves the absurdity of the whole thing.'"),
-- 12
	('Gary Allan', 'Gary Allan Herzberg', '1967-12-05', 'La Mirada, California', NULL, 'He was given a $12,000 check for his singing while working as a car salesman.  Prior to his professional music career, Allan worked in a car store by day and played his music in bars by night. While working in the car store, a wealthy couple noticed his singing talent and gave him a check for $12,000. He used that money to record songs for demos, eventually getting his professional career started.')
;

INSERT INTO genres 
	(genre) 
VALUES 
	('Pop'),
  	('Rock'), 
 	('Christian'), 
 	('Country'),
  	('Rap')
;


INSERT INTO albums 
	(album_name, artist_id, record_label, genre_id, release_date, notable_fact) 
VALUES 
-- 1
	('Heart of Stone', 1, 'Geffen Records', 1, '1989-06-19', "Heart of Stone arrived at a pivotal time in Cher's career.  Having won an Oscar for Moonstruck (1987) just a year prior following two additional box office smashes (Suspect and The Witches of Eastwick), Cher had now become a bona fide film star."),
-- 2
	('Yes I Am', 2, 'Island Records', 2, '1993-09-21', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in lacus at orci auctor aliquet. Donec tempus ac erat quis fringilla. Morbi in laoreet justo, sed laoreet dui."),
-- 3	
	('Look Up Child', 3, 'Centricity', 3, '2018-09-07', "The title track of Lauren Daigle's third album, 'Look Up Child' finds the singer drawing on the innocence and purity of childhood to help her maintain a passion for life."),
-- 4	
	('Greatest Hits', 4, 'Curb Records', 4, '2000-11-21', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lacinia iaculis ex sed consectetur. Fusce ac ante a tortor pulvinar lobortis ut et erat. Nam ut dapibus nisl. Nam at sapien vitae odio mollis accumsan."),
-- 5
	('Time Marches On', 5, 'Atlantic', 4, '1996-01-23', 'Vestibulum sit amet ipsum velit. Nam luctus mauris quis magna scelerisque, sed malesuada justo rhoncus.'),
-- 6
	('The Marshall Mathers LP', 6, ' Aftermath Entertainment and Interscope Records', 5, '2000-05-23', "Recorded over a two-month period in several studios around Detroit, the album features more introspective lyricism, including Eminem's thoughts on his rise from rags to riches, the criticism of his music, and his estrangement from his family and wife."),
-- 7
	('Born This Way', 7, 'Streamline, Kon Live, Interscope', 1, '2011-05-23', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),	
-- 8
	('Come On Over', 8, 'Mercury', 4, '1997-11-04', 'Come On Over became the best-selling country album, the best selling album by a Canadian and is recognized by Guinness World Records as the biggest-selling studio album by a solo female artist, and the best-selling album in the USA by a solo female artist.'),
-- 9
	('Greatest Hits... So Far!!!', 9, 'Jive', 1, '2010-11-12', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean sed felis felis. Nam faucibus fringilla efficitur.'),
-- 10
	('Whitney: The Greatest Hits', 10, 'Arista, BMG Entertainment', 1, '2000-05-16,', 'Duis et nulla non felis dignissim fermentum ac sit amet metus. Maecenas venenatis venenatis nulla nec lacinia. Nunc dictum, nisl vel pretium consectetur, libero est auctor tortor, quis venenatis ante velit eu libero.'),
-- 11
	('So Far So Good', 11, 'A&M', 2, '1993-11-02', 'Curabitur eu mollis urna. Proin interdum risus ut sapien fermentum molestie nec dictum augue. Praesent blandit tellus eros, eu fermentum lacus dignissim vitae.'),
-- 12
	('Greatest Hits', 12, 'MCA Nashville', 4, '2007-03-06', 'Aenean dolor ipsum, lobortis non nisi sit amet, aliquet rutrum nisl. Sed ultrices egestas quam, vitae hendrerit sapien tristique ac. Ut vehicula non nibh a efficitur.')
;


INSERT INTO songs 
	(song_name, artist_id, album_id, length_in_seconds, comments, highest_billboard_ranking, date_of_billboard_ranking, writer_name) 
VALUES 
-- Cher
	('If I Could Turn Back Time', 1, 1, 256, NULL, 1, '1989', 'Diane Warren'),
	('Just Like Jesse James', 1, 1, 246, NULL, 9, '1909', 'Diane Warren, Desmond Child'),
	("You Wouldn't Know Love", 1, 1, 210, NULL, NULL, NULL, 'Diane Warren, Michael Bolton'),
	('Heart of Stone', 1, 1, 261, NULL, 30, '1990', 'Andy Hill, Pete Sinfield'),
	('Still in Love with You', 1, 1, 188, NULL, NULL, NULL, 'Michael Bolton, Bob Halligan'),
	('Love on a Rooftop', 1, 1, 262, NULL, NULL, NULL, 'Diane Warren, Desmond Child'),
	('Emotional Fire', 1, 1, 233, NULL, NULL, NULL, 'Diane Warren, Desmond Child, Michael Bolton'),
	('All Because of You', 1, 1, 210, NULL, NULL, NULL, 'Jon Lind, Sue Schifrin'),
	('Does Anybody Really Fall in Love Anymore?', 1, 1, 252, NULL, NULL, NULL, 'Diane Warren, Desmond Child, Jon Bon Jovi, Richie Sambora'),
	('Starting Over', 1, 1, 249, NULL, NULL, NULL, 'Michael Bolton, Jonathan Cain'),
	('Kiss to Kiss', 1, 1, 263, NULL, NULL, NULL, "Jon Lind, Mary D'astugues, Phil Galdston"),
	("After All (with Peter Cetera)", 1, 1, 247, NULL, 1, '1989', 'Tom Snow, Dean Pitchford'),
-- Melissa Etheridge
	("I'm the Only One", 2, 2, 294, NULL, NULL, NULL, 'Melissa Etheridge'),
	('If I Wanted To', 2, 2, 235, NULL, NULL, NULL, 'Melissa Etheridge'),
	('Come To My Window', 2, 2, 235, NULL, 25, '1993', 'Melissa Etheridge'),
	('Silent Legacy', 2, 2, 322, NULL, NULL, NULL, 'Melissa Etheridge'),
	('I Will Never Be the Same', 2, 2, 281, NULL, NULL, NULL, 'Melissa Etheridge'),
	('All American Girl', 2, 2, 245, NULL, NULL, NULL, 'Melissa Etheridge'),
	('Yes I Am', 2, 2, 264, NULL, NULL, NULL, 'Melissa Etheridge'),
	('Resist', 2, 2, 177, NULL, NULL, NULL, 'Melissa Etheridge'),
	('Ruins', 2, 2, 293, NULL, NULL, NULL, 'Melissa Etheridge'),
	('Talking to My Angel', 2, 2, 288, NULL, NULL, NULL, 'Melissa Etheridge'),
-- Lauren Daigle
	('Still Rolling Stones', 3, 3, 248, NULL, 4, '2019', 'Jason Ingram, Paul Mabury, Paul Duncan, Lauren Daigle'),
	('Rescue', 3, 3, 215, NULL, NULL, NULL, 'Lauren Daigle, Jason Ingram, Paul Mabury'),
	('This Girl', 3, 3, 273, NULL, NULL, NULL, 'Lauren Daigle, Jason Ingram, Paul Mabury, Paul Duncan'),
	('Your Wings', 3, 3, 148, NULL, NULL, NULL, 'Lauren Daigle, Jason Ingram, Paul Mabury, Lauren Strahm'),
	('You Say', 3, 3, 274, NULL, 1, '2019', 'Lauren Daigle, Jason Ingram, Paul Mabury, Lauren Strahm'),
	('Everything', 3, 3, 258, NULL, NULL, NULL, 'Lauren Daigle, Jason Ingram, Paul Mabury'),
	('Love Like This', 3, 3, 254, NULL, NULL, NULL, 'Lauren Daigle, Jason Ingram, Paul Mabury'),
	('Look Up Child', 3, 3, 183, NULL, NULL, NULL, 'Lauren Daigle, Jason Ingram, Paul Mabury'),
	('Losing My Religion', 3, 3, 209, NULL, NULL, NULL, 'Lauren Daigle, Jason Ingram, Paul Mabury'),
-- Tim McGraw
	('Indian Outlaw', 4, 4, 181, NULL, NULL, NULL, 'John D. Loudermilk, Jumpin Gene Simmons, Tommy Barnes'),
	("Don't Take the Girl", 4, 4, 249, NULL, 17, '1994', 'John D. Loudermilk, Jumpin Gene Simmons, Tommy Barnes'),
	('She Never Lets It Go to Her Heart', 4, 4, 182, NULL, 73, '1994', 'Chris Waters, Tom Shapiro'),
	('I Like It, I Love It', 4, 4, 204, NULL, 25, '1995', 'Markus Hall, Jeb Stuart Anderson, Steve Dukes'),
	('Just to See You Smile', 4, 4, 214, NULL, 1, '1997', 'Mark Nesler, Tony Martin'),
	("It's Your Love (duet with Faith Hill)", 4, 4, 225, NULL, 1, '1997', 'Stephony Smith'),
	('Where the Green Grass Grows', 4, 4, 202, NULL, 79, '1998', 'Jess Leary, Craig Wiseman'),
	('Please Remember Me', 4, 4, 295, NULL, 51, '1999', 'Rodney Crowell, Will Jennings'),
-- Tracy Lawrence
	('Is That a Tear', 5, 5, 198, NULL, 2, '1996', 'John Jarrard, Kenny Beard'),
	('If You Loved Me', 5, 5, 201, NULL, NULL, NULL, 'Paul Nelson, Tom Shapiro'),
	('Time Marches On', 5, 5, 183, "Time Marches On spent three weeks at Number One on the Billboard country charts in 1996, becoming Lawrence's biggest chart hit to date.", 25, '1996', 'Bobby Braddock'),
	('Speed of a Fool', 5, 5, 202, NULL, NULL, NULL, 'Larry Boone, Paul Nelson'),
	('I Know That Hurt by Heart', 5, 5, 204, NULL, NULL, NULL,'J.B. Rudd, Thom McHugh'),
	('Somewhere Between the Moon and You', 5, 5, 204, NULL, NULL, NULL,'Tracy Lawrence, Larry Boone, Paul Nelson'),
	('Different Man', 5, 5, 204, NULL, NULL, NULL, 'Flip Anderson, Larry Boone, Paul Nelson'),
	('Excitable Boy', 5, 5, 176, NULL, NULL, NULL, 'Don Cook, Larry Boone, Paul Nelson'),
	('Stars over Texas', 5, 5, 213, NULL, 2, '1996', 'Larry Boone, Tracy Lawrence, Paul Nelson'),
	('From What We Give', 5, 5, 195, NULL, NULL, NULL, 'Larry Boone, Tracy Lawrence, Paul Nelson'),
-- Emimen
	('Stan (featureing Dido)', 6, 6, 264, NULL, 51, '2000', 'Marshall Mathers, Dido Armstrong, Paul Herman'),
	('The Way I Am', 6, 6, 290, NULL, 58, '2000', 'Marshall Mathers'),
	('The Real Slim Shady', 6, 6, 284, NULL, 4, '2000', 'Marshall Mathers, Andre Young, Melvin Bradford, Paul Rosenberg, Dean Geistlinger'),
	('Remember Me?', 6, 6, 218, NULL, NULL, NULL, 'Marshall Mathers, Andre Young, Eric Collins, Kirk Jones'),
	("I'm Back", 6, 6, 310, NULL, NULL, NULL, 'Marshall Mathers, Andre Young, Melvin Bradford'),
	('Marshall Mathers', 6, 6, 320, NULL, NULL, NULL, 'Marshall Mathers, Bass Brothers'),
	('Kim', 6, 6, 377, NULL, NULL, NULL, 'Marshall Mathers, Bass Brothers'),
-- Lady Gaga
	('Marry the Night', 7, 7, 265, NULL, 57, '2011', 'Lady Gaga, Fernando Garibay'),
	('Born This Way', 7, 7, 260, NULL, 22, '2011', 'Lady Gaga, Jeppe Laursen, Fernando Garibay, Paul Blair'),
	('Government Hooker', 7, 7, 254, NULL, NULL, NULL, 'Lady Gaga, Fernando Garibay, Paul Blair, William Grigahcine, Clinton Sparks'),
	('Judas', 7, 7, 249, NULL, NULL, NULL, 'Lady Gaga, RedOne'),
	('Americano', 7, 7, 247, NULL, NULL, NULL, 'Lady Gaga, Fernando Garibay, Paul Blair, Brian Lee'),
	('The Edge of Glory', 7, 7, 321, NULL, 7, '2011', 'Lady Gaga, Fernando Garibay, Paul Blair'),
	('You and I', 7, 7, 307, NULL, 15, '2011', 'Lady Gaga'),
	('Heavy Metal Lover', 7, 7, 253, NULL, NULL, NULL, 'Lady Gaga, Fernando Garibay'),
-- Shania Twain
	('Man! I Feel Like a Woman!', 8, 8, 233, NULL, 16, '1999', "Shania Twain, Robert John 'Mutt' Lange"),
	("I'm Holding On to Love (To Save My Life)", 8, 8, 210, NULL, NULL, NULL, "Shania Twain, Robert John 'Mutt' Lange"),
	('Love Gets Me Every Time', 8, 8, 213, NULL, NULL, NULL, "Shania Twain, Robert John 'Mutt' Lange"),
	("Don't Be Stupid (You Know I Love You)", 8, 8, 215, NULL, NULL, NULL, "Shania Twain, Robert John 'Mutt' Lange"),
	('From This Moment On (with Bryan White)', 8, 8, 283, NULL, 1, '1998', "Shania Twain, Robert John 'Mutt' Lange"),
	("You're Still the One", 8, 8, 214, NULL, 1, '1998', "Shania Twain, Robert John 'Mutt' Lange"),
	("Honey, I'm Home", 8, 8, 219, NULL, NULL, NULL, "Shania Twain, Robert John 'Mutt' Lange"),
	("That Don't Impress Me Much", 8, 8, 218, NULL, 8, '1999', "Shania Twain, Robert John 'Mutt' Lange"),
-- P!nk
	('Get the Party Started', 9, 9, 191, NULL, NULL, NULL, 'Linda Perry'),
	("Don't Let Me Get Me", 9, 9, 211, NULL, NULL, NULL, "P!nk, Kevin 'She'kspere' Briggs, Kandi Burruss"),
	('Just Like A Pill', 9, 9, 237, NULL, NULL, NULL, 'P!nk, Kandi Burruss'),
	("Family Portrait", 9, 9, 296, NULL, NULL, NULL, 'P!nk, Scott Storch'),
	('Trouble', 9, 9, 192, NULL, NULL, NULL, 'P!nk, Tim Armstrong'),
	('Who Knew', 9, 9, 208, NULL, 4, '2008', 'P!nk, Max Martin, Lukasz Gottwald'),
	('U + Ur Hand', 9, 9, 214, NULL, NULL, NULL, 'P!nk, Max Martin, Lukasz Gottwald, Rami Yacoub'),
	('So What', 9, 9, 215, NULL, 9, '2008', 'P!nk, Max Martin, Shellback'),
	("Please Don't Leave Me", 9, 9, 231, NULL, 5, '2009', 'P!nk, Max Martin'),
	("Raise Your Glass", 9, 9, 203, NULL, 9, '2011', 'P!nk, Max Martin, Shellback'),
	("Fuckin' Perfect", 9, 9, 210, NULL, 2, '2011', 'P!nk'),
-- Whitney Houston
	('Saving All My Love For You', 10, 10, 237,NULL, 1, '1985', 'Michael Masser, Gerry Goffin'),
	('Greatest Love of All', 10, 10, 294,NULL, 1, '1986', 'Michael Masser, Linda Creed'),
	('Where Do Broken Hears Go', 10, 10, 278,NULL, 1, '1988', 'Frank Wildhorn, Chuck Jackson'),
	('Run to You', 10, 10, 267,NULL, 10, '1993', 'Allan Rich, Jud Friedman'),
	('I Have Nothing', 10, 10, 293, NULL, 1, '1993', 'David Foster, Linda Thompson'),
	('I Will Always Love You', 10, 10, 268, NULL, 1, '1992', 'Dolly Parton'),
	('Exhale (Shoop Shoop)', 10, 10, 205, NULL, 5, '1996', 'Babyface'),
	('Why Does It Hurt So Bad', 10, 10, 280, NULL, 6, '1996', 'Babyface'),
	('I Believe in You and Me', 10, 10, 234, NULL, 2, '1997', 'David Wolfert, Sandy Linzer'),
	('Heartbreak Hotel', 10, 10, 246, NULL, NULL, NULL, 'Carsten Schack, Kenneth Karlin, Tamara Savage'),
	('My Love is Your Love', 10, 10, 259, NULL, NULL, NULL, 'Wyclef Jean, Jerry Duplessis'),
-- Bryan Adams
	("Summer of '69", 11, 11, 215, NULL, NULL, NULL, 'Bryan Adams, Jim Vallance'),
	('Straight from the Heart', 11, 11, 210, NULL, 29, '1983', 'Bryan Adams, Eric Kagna'),
	("Can't Stop This Thing We Started", 11, 11, 269, NULL, 40, '1991', "Bryan Adams, Robert John 'Mutt' Lange"),
	('Do I Have to Say the Words', 11, 11, 371, NULL, 5, '1992', "Bryan Adams, Robert John 'Mutt' Lange, Jim Vallance"),
	('Heaven', 11, 11, 243, NULL, 12, '1985', 'Bryan Adams, Jim Vallance'),
	("Cuts Like a Knife", 11, 11, 312, NULL, NULL, NULL, 'Bryan Adams, Jim Vallance'),
	('(Everything I Do) I Do It for You', 11, 11, 394, NULL, 1, '1991', 'Bryan Adams, Jim Vallance, Michael Kamen'),
	('Somebody', 11, 11, 284, NULL, NULL, NULL, 'Bryan Adams, Jim Vallance'),
	('Heat of the Night', 11, 11, 306, NULL, NULL, NULL, 'Bryan Adams, Jim Vallance'),
	('Please Forgive Me', 11, 11, 355, NULL, 2, '1993', "Bryan Adams, Robert John 'Mutt' Lange"),
-- Gary Allan
	('Songs About Rain', 12, 12, 212, NULL, NULL, NULL, 'Liz Rose, Pat McLaughlin'),
	('Smoke Rings in the Dark', 12, 12, 260, NULL, NULL, NULL, 'Rivers Rutherford, Houston Robert'),
	('Her Man', 12, 12, 165, NULL, NULL, NULL, 'Kent Robbins'),
	('Best I Ever Had', 12, 12, 247, NULL, NULL, NULL, 'Matthew Scannell'),
	('Nothing On by the Radio', 12, 12, 213, NULL, NULL, NULL, 'Odie Blackmon, Byron Hill, Brice Long'),
	('Man to Man', 12, 12, 224, NULL, NULL, NULL, "Jamie O'Hara"),
	("Life Ain't Always Beautiful", 12, 12, 224, NULL, NULL, NULL, 'Cyndi Goodman, Tommy Lee James')
;







