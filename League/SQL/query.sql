/* Query to find out total games for the week*/

SELECT DISTINCT COUNT(GameNumber) AS Games
FROM GAME_SCHEDULE
WHERE WeekNumber = 1
GROUP BY WeekNumber;

/* Stored procedure for win loss updates*/

DELIMITER $$
	CREATE PROCEDURE userStatUpdate(WeekNumber INT, GameNumber INT, TeamName VARCHAR(40), TeamResult CHAR(1), GameYear INT)
    BEGIN
    	DECLARE Week INT;
        DECLARE Game INT;
        DECLARE Team VARCHAR(40);
        DECLARE Result CHAR(1);
        DECLARE Yr	INT;
        SET Week = WeekNumber;
        SET Game = GameNumber;
        SET Team = TeamName;
        SET Result = TeamResult;
        SET Yr = GameYear;
        
        UPDATE STATS
        SET StatResult = Result WHERE TeamName = Team AND WeekNumber = Week AND GameNumber = Game AND GameYear = Yr;
    END $$
DELIMITER ;

/*UPDATE TEAM_SCHEDULE
SET TeamScore = 28, TeamResult = 'W'
WHERE Team = 'Eagles' and WeekNumber = 6 and GameNumber = 1;

UPDATE TEAM_SCHEDULE
SET TeamScore = 23, TeamResult = 'L'
WHERE Team = 'Panthers' and WeekNumber = 6 and GameNumber = 1;*/

/* General Query to select the weeks games */

SELECT t.WeekNumber AS Week, t.GameNumber AS Game, t.Team, t.TeamStatus AS Location, t.TeamScore AS Score, DATE_FORMAT(g.GameDate, '%a %b %d %Y') AS Date, DATE_FORMAT(g.GameDate, '%r') AS Time 
FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
WHERE t.WeekNumber = 2 ORDER BY t.GameNumber, t.TeamStatus DESC;

/* Thursday game query */

SELECT t.WeekNumber AS Week, t.GameNumber AS Game, t.Team, t.TeamStatus AS Location, t.TeamScore AS Score, DATE_FORMAT(g.GameDate, '%a %b %d %Y') AS Date, DATE_FORMAT(g.GameDate, '%r') AS Time 
FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Thu' AND t.WeekNumber = 2 
ORDER BY t.GameNumber, t.TeamStatus DESC;

/* Sunday game query */

SELECT t.WeekNumber AS Week, t.GameNumber AS Game, t.Team, t.TeamStatus AS Location, t.TeamScore AS Score, DATE_FORMAT(g.GameDate, '%a %b %d %Y') AS Date, DATE_FORMAT(g.GameDate, '%r') AS Time 
FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Sun' AND t.WeekNumber = 2 
ORDER BY t.GameNumber, t.TeamStatus DESC;

/* Monday game query */

SELECT t.WeekNumber AS Week, t.GameNumber AS Game, t.Team, t.TeamStatus AS Location, t.TeamScore AS Score, DATE_FORMAT(g.GameDate, '%a %b %d %Y') AS Date, DATE_FORMAT(g.GameDate, '%r') AS Time 
FROM TEAM_SCHEDULE t JOIN GAME_SCHEDULE g ON t.WeekNumber = g.WeekNumber AND t.GameNumber = g.GameNumber
WHERE LEFT(DATE_FORMAT(g.GameDate, '%a'), 3) = 'Mon' AND t.WeekNumber = 2 
ORDER BY t.GameNumber, t.TeamStatus DESC;

/* Team Schedule INSERT query */

/* Week 6 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Panthers', 'Home', 6, 1),
('Eagles', 'Away', 6, 1),
('Ravens', 'Home', 6, 2),
('Bears', 'Away', 6, 2),
('Texans', 'Home', 6, 3),
('Browns', 'Away', 6, 3),
('Vikings', 'Home', 6, 4),
('Packers', 'Away', 6, 4),
('Saints', 'Home', 6, 5),
('Lions', 'Away', 6, 5),
('Falcons', 'Home', 6, 6),
('Dolphins', 'Away', 6, 6),
('Jets', 'Home', 6, 7),
('Patriots', 'Away', 6, 7),
('Redskins', 'Home', 6, 8),
('49ers', 'Away', 6, 8),
('Cardinals', 'Home', 6, 9),
('Buccaneers', 'Away', 6, 9),
('Jaguars', 'Home', 6, 10),
('Rams', 'Away', 6, 10),
('Chiefs', 'Home', 6, 11),
('Steelers', 'Away', 6, 11),
('Raiders', 'Home', 6, 12),
('Chargers', 'Away', 6, 12),
('Broncos', 'Home', 6, 13),
('Giants', 'Away', 6, 13),
('Titans', 'Home', 6, 14),
('Colts', 'Away', 6, 14);


/* Week 7 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Raiders', 'Home', 7, 1),
('Chiefs', 'Away', 7, 1),
('Bills', 'Home', 7, 2),
('Buccaneers', 'Away', 7, 2),
('Steelers', 'Home', 7, 3),
('Bengals', 'Away', 7, 3),
('Vikings', 'Home', 7, 4),
('Ravens', 'Away', 7, 4),
('Dolphins', 'Home', 7, 5),
('Jets', 'Away', 7, 5),
('Rams', 'Home', 7, 6),
('Cardinals', 'Away', 7, 6),
('Bears', 'Home', 7, 7),
('Panthers', 'Away', 7, 7),
('Browns', 'Home', 7, 8),
('Titans', 'Away', 7, 8),
('Packers', 'Home', 7, 9),
('Saints', 'Away', 7, 9),
('Colts', 'Home', 7, 10),
('Jaguars', 'Away', 7, 10),
('49ers', 'Home', 7, 11),
('Cowboys', 'Away', 7, 11),
('Giants', 'Home', 7, 12),
('Seahawks', 'Away', 7, 12),
('Chargers', 'Home', 7, 13),
('Broncos', 'Away', 7, 13),
('Patriots', 'Home', 7, 14),
('Falcons', 'Away', 7, 14),
('Eagles', 'Home', 7, 15),
('Redskins', 'Away', 7, 15);


/* Week 8 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Ravens', 'Home', 8, 1),
('Dolphins', 'Away', 8, 1),
('Browns', 'Home', 8, 2),
('Vikings', 'Away', 8, 2),
('Jets', 'Home', 8, 3),
('Falcons', 'Away', 8, 3),
('Buccaneers', 'Home', 8, 4),
('Panthers', 'Away', 8, 4),
('Eagles', 'Home', 8, 5),
('49ers', 'Away', 8, 5),
('Saints', 'Home', 8, 6),
('Bears', 'Away', 8, 6),
('Patriots', 'Home', 8, 7),
('Chargers', 'Away', 8, 7),
('Bills', 'Home', 8, 8),
('Raiders', 'Away', 8, 8),
('Bengals', 'Home', 8, 9),
('Colts', 'Away', 8, 9),
('Seahawks', 'Home', 8, 10),
('Texans', 'Away', 8, 10),
('Redskins', 'Home', 8, 11),
('Cowboys', 'Away', 8, 11),
('Lions', 'Home', 8, 12),
('Steelers', 'Away', 8, 12),
('Chiefs', 'Home', 8, 13),
('Broncos', 'Away', 8, 13);


/* Week 9 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Jets', 'Home', 9, 1),
('Bills', 'Away', 9, 1),
('Texans', 'Home', 9, 2),
('Colts', 'Away', 9, 2),
('Jaguars', 'Home', 9, 3),
('Bengals', 'Away', 9, 3),
('Saints', 'Home', 9, 4),
('Buccaneers', 'Away', 9, 4),
('Giants', 'Home', 9, 5),
('Rams', 'Away', 9, 5),
('Panthers', 'Home', 9, 6),
('Falcons', 'Away', 9, 6),
('Eagles', 'Home', 9, 7),
('Broncos', 'Away', 9, 7),
('Titans', 'Home', 9, 8),
('Ravens', 'Away', 9, 8),
('49ers', 'Home', 9, 9),
('Cardinals', 'Away', 9, 9),
('Seahawks', 'Home', 9, 10),
('Redskins', 'Away', 9, 10),
('Cowboys', 'Home', 9, 11),
('Chiefs', 'Away', 9, 11),
('Dolphins', 'Home', 9, 12),
('Raiders', 'Away', 9, 12),
('Packers', 'Home', 9, 13),
('Lions', 'Away', 9, 13);


/* Week 10 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Cardinals', 'Home', 10, 1),
('Seahawks', 'Away', 10, 1),
('Bears', 'Home', 10, 2),
('Packers', 'Away', 10, 2),
('Lions', 'Home', 10, 3),
('Browns', 'Away', 10, 3),
('Colts', 'Home', 10, 4),
('Steelers', 'Away', 10, 4),
('Jaguars', 'Home', 10, 5),
('Chargers', 'Away', 10, 5),
('Bills', 'Home', 10, 6),
('Saints', 'Away', 10, 6),
('Buccaneers', 'Home', 10, 7),
('Jets', 'Away', 10, 7),
('Redskins', 'Home', 10, 8),
('Vikings', 'Away', 10, 8),
('Titans', 'Home', 10, 9),
('Bengals', 'Away', 10, 9),
('Rams', 'Home', 10, 10),
('Texans', 'Away', 10, 10),
('Falcons', 'Home', 10, 11),
('Cowboys', 'Away', 10, 11),
('49ers', 'Home', 10, 12),
('Giants', 'Away', 10, 12),
('Broncos', 'Home', 10, 13),
('Patriots', 'Away', 10, 13),
('Panthers', 'Home', 10, 14),
('Dolphins', 'Away', 10, 14);


/* Week 11 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Steelers', 'Home', 11, 1),
('Titans', 'Away', 11, 1),
('Browns', 'Home', 11, 2),
('Jaguars', 'Away', 11, 2),
('Packers', 'Home', 11, 3),
('Ravens', 'Away', 11, 3),
('Texans', 'Home', 11, 4),
('Cardinals', 'Away', 11, 4),
('Vikings', 'Home', 11, 5),
('Rams', 'Away', 11, 5),
('Bears', 'Home', 11, 6),
('Lions', 'Away', 11, 6),
('Saints', 'Home', 11, 7),
('Redskins', 'Away', 11, 7),
('Giants', 'Home', 11, 8),
('Chiefs', 'Away', 11, 8),
('Chargers', 'Home', 11, 9),
('Bills', 'Away', 11, 9),
('Broncos', 'Home', 11, 10),
('Bengals', 'Away', 11, 10),
('Raiders', 'Home', 11, 11),
('Patriots', 'Away', 11, 11),
('Cowboys', 'Home', 11, 12),
('Eagles', 'Away', 11, 12),
('Seahawks', 'Home', 11, 13),
('Falcons', 'Away', 11, 13);


/* Week 12 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Lions', 'Home', 12, 1),
('Vikings', 'Away', 12, 1),
('Cowboys', 'Home', 12, 2),
('Chargers', 'Away', 12, 2),
('Redskins', 'Home', 12, 3),
('Giants', 'Away', 12, 3),
('Chiefs', 'Home', 12, 4),
('Bills', 'Away', 12, 4),
('Colts', 'Home', 12, 5),
('Titans', 'Away', 12, 5),
('Bengals', 'Home', 12, 6),
('Browns', 'Away', 12, 6),
('Falcons', 'Home', 12, 7),
('Buccaneers', 'Away', 12, 7),
('Patriots', 'Home', 12, 8),
('Dolphins', 'Away', 12, 8),
('Eagles', 'Home', 12, 9),
('Bears', 'Away', 12, 9),
('Jets', 'Home', 12, 10),
('Panthers', 'Away', 12, 10),
('Rams', 'Home', 12, 11),
('Saints', 'Away', 12, 11),
('49ers', 'Home', 12, 12),
('Seahawks', 'Away', 12, 12),
('Cardinals', 'Home', 12, 13),
('Jaguars', 'Away', 12, 13),
('Raiders', 'Home', 12, 14),
('Broncos', 'Away', 12, 14),
('Steelers', 'Home', 12, 15),
('Packers', 'Away', 12, 15),
('Ravens', 'Home', 12, 16),
('Texans', 'Away', 12, 16);


/* Week 13 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Cowboys', 'Home', 13, 1),
('Redskins', 'Away', 13, 1),
('Falcons', 'Home', 13, 2),
('Vikings', 'Away', 13, 2),
('Titans', 'Home', 13, 3),
('Texans', 'Away', 13, 3),
('Jets', 'Home', 13, 4),
('Chiefs', 'Away', 13, 4),
('Saints', 'Home', 13, 5),
('Panthers', 'Away', 13, 5),
('Dolphins', 'Home', 13, 6),
('Broncos', 'Away', 13, 6),
('Ravens', 'Home', 13, 7),
('Lions', 'Away', 13, 7),
('Bills', 'Home', 13, 8),
('Patriots', 'Away', 13, 8),
('Bears', 'Home', 13, 9),
('49ers', 'Away', 13, 9),
('Packers', 'Home', 13, 10),
('Buccaneers', 'Away', 13, 10),
('Jaguars', 'Home', 13, 11),
('Colts', 'Away', 13, 11),
('Chargers', 'Home', 13, 12),
('Browns', 'Away', 13, 12),
('Raiders', 'Home', 13, 13),
('Giants', 'Away', 13, 13),
('Cardinals', 'Home', 13, 14),
('Rams', 'Away', 13, 14),
('Seahawks', 'Home', 13, 15),
('Eagles', 'Away', 13, 15),
('Bengals', 'Home', 13, 16),
('Steelers', 'Away', 13, 16);


/* Week 14 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Falcons', 'Home', 14, 1),
('Saints', 'Away', 14, 1),
('Bills', 'Home', 14, 2),
('Colts', 'Away', 14, 2),
('Buccaneers', 'Home', 14, 3),
('Lions', 'Away', 14, 3),
('Chiefs', 'Home', 14, 4),
('Raiders', 'Away', 14, 4),
('Jaguars', 'Home', 14, 5),
('Seahawks', 'Away', 14, 5),
('Texans', 'Home', 14, 6),
('49ers', 'Away', 14, 6),
('Browns', 'Home', 14, 7),
('Packers', 'Away', 14, 7),
('Bengals', 'Home', 14, 8),
('Bears', 'Away', 14, 8),
('Panthers', 'Home', 14, 9),
('Vikings', 'Away', 14, 9),
('Chargers', 'Home', 14, 10),
('Redskins', 'Away', 14, 10),
('Broncos', 'Home', 14, 11),
('Jets', 'Away', 14, 11),
('Cardinals', 'Home', 14, 12),
('Titans', 'Away', 14, 12),
('Giants', 'Home', 14, 13),
('Cowboys', 'Away', 14, 13),
('Rams', 'Home', 14, 14),
('Eagles', 'Away', 14, 14),
('Steelers', 'Home', 14, 15),
('Ravens', 'Away', 14, 15),
('Dolphins', 'Home', 14, 16),
('Patriots', 'Away', 14, 16);


/* Week 15 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Colts', 'Home', 15, 1),
('Broncos', 'Away', 15, 1),
('Lions', 'Home', 15, 2),
('Bears', 'Away', 15, 2),
('Chiefs', 'Home', 15, 3),
('Chargers', 'Away', 15, 3),
('Jaguars', 'Home', 15, 4),
('Texans', 'Away', 15, 4),
('Browns', 'Home', 15, 5),
('Ravens', 'Away', 15, 5),
('Panthers', 'Home', 15, 6),
('Packers', 'Away', 15, 6),
('Bills', 'Home', 15, 7),
('Dolphins', 'Away', 15, 7),
('Vikings', 'Home', 15, 8),
('Bengals', 'Away', 15, 8),
('Redskins', 'Home', 15, 9),
('Cardinals', 'Away', 15, 9),
('Giants', 'Home', 15, 10),
('Eagles', 'Away', 15, 10),
('Saints', 'Home', 15, 11),
('Jets', 'Away', 15, 11),
('Seahawks', 'Home', 15, 12),
('Rams', 'Away', 15, 12),
('49ers', 'Home', 15, 13),
('Titans', 'Away', 15, 13),
('Steelers', 'Home', 15, 14),
('Patriots', 'Away', 15, 14),
('Raiders', 'Home', 15, 15),
('Cowboys', 'Away', 15, 15),
('Buccaneers', 'Home', 15, 16),
('Falcons', 'Away', 15, 16);


/* Week 16 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Ravens', 'Home', 16, 1),
('Colts', 'Away', 16, 1),
('Packers', 'Home', 16, 2),
('Vikings', 'Away', 16, 2),
('Bengals', 'Home', 16, 3),
('Lions', 'Away', 16, 3),
('Chiefs', 'Home', 16, 4),
('Dolphins', 'Away', 16, 4),
('Patriots', 'Home', 16, 5),
('Bills', 'Away', 16, 5),
('Bears', 'Home', 16, 6),
('Browns', 'Away', 16, 6),
('Panthers', 'Home', 16, 7),
('Buccaneers', 'Away', 16, 7),
('Saints', 'Home', 16, 8),
('Falcons', 'Away', 16, 8),
('Redskins', 'Home', 16, 9),
('Broncos', 'Away', 16, 9),
('Titans', 'Home', 16, 10),
('Rams', 'Away', 16, 10),
('Jets', 'Home', 16, 11),
('Chargers', 'Away', 16, 11),
('49ers', 'Home', 16, 12),
('Jaguars', 'Away', 16, 12),
('Cowboys', 'Home', 16, 13),
('Seahawks', 'Away', 16, 13),
('Cardinals', 'Home', 16, 14),
('Giants', 'Away', 16, 14),
('Texans', 'Home', 16, 15),
('Steelers', 'Away', 16, 15),
('Eagles', 'Home', 16, 16),
('Raiders', 'Away', 16, 16);


/* Week 17 */

INSERT INTO TEAM_SCHEDULE (Team, TeamStatus, WeekNumber, GameNumber)
VALUES ('Falcons', 'Home', 17, 1),
('Panthers', 'Away', 17, 1),
('Ravens', 'Home', 17, 2),
('Bengals', 'Away', 17, 2),
('Titans', 'Home', 17, 3),
('Jaguars', 'Away', 17, 3),
('Buccaneers', 'Home', 17, 4),
('Saints', 'Away', 17, 4),
('Steelers', 'Home', 17, 5),
('Browns', 'Away', 17, 5),
('Lions', 'Home', 17, 6),
('Packers', 'Away', 17, 6),
('Colts', 'Home', 17, 7),
('Texans', 'Away', 17, 7),
('Dolphins', 'Home', 17, 8),
('Bills', 'Away', 17, 8),
('Vikings', 'Home', 17, 9),
('Bears', 'Away', 17, 9),
('Patriots', 'Home', 17, 10),
('Jets', 'Away', 17, 10),
('Giants', 'Home', 17, 11),
('Redskins', 'Away', 17, 11),
('Eagles', 'Home', 17, 12),
('Cowboys', 'Away', 17, 12),
('Chargers', 'Home', 17, 13),
('Raiders', 'Away', 17, 13),
('Broncos', 'Home', 17, 14),
('Chiefs', 'Away', 17, 14),
('Rams', 'Home', 17, 15),
('49ers', 'Away', 17, 15),
('Seahawks', 'Home', 17, 16),
('Cardinals', 'Away', 17, 16);