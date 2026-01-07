-- Database/stored_procedures.sql
USE jamin;
DROP PROCEDURE IF EXISTS spLeverancierCount;
DROP PROCEDURE IF EXISTS spLeveranciersPaginated;
DROP PROCEDURE IF EXISTS spLeverancierById;
DROP PROCEDURE IF EXISTS spUpdateLeverancier;

DELIMITER $$

CREATE PROCEDURE spLeverancierCount()
BEGIN
  SELECT COUNT(*) AS Total
  FROM Leverancier
  WHERE IsActief = b'1';
END $$

CREATE PROCEDURE spLeveranciersPaginated(IN pOffset INT, IN pLimit INT)
BEGIN
  SELECT
    l.Id,
    l.Naam,
    l.ContactPersoon,
    l.LeverancierNummer,
    l.Mobiel
  FROM Leverancier l
  WHERE l.IsActief = b'1'
  ORDER BY l.Id
  LIMIT pLimit OFFSET pOffset;
END $$

CREATE PROCEDURE spLeverancierById(IN pId INT)
BEGIN
  SELECT
    l.Id,
    l.Naam,
    l.ContactPersoon,
    l.LeverancierNummer,
    l.Mobiel,
    c.Straat,
    c.Huisnummer,
    c.Postcode,
    c.Stad
  FROM Leverancier l
  JOIN Contact c ON c.Id = l.ContactId
  WHERE l.Id = pId;
END $$

CREATE PROCEDURE spUpdateLeverancier(
  IN pId INT,
  IN pMobiel VARCHAR(20),
  IN pStraat VARCHAR(100)
)
BEGIN
  -- Scenario_02: technische storing voor De Bron (Id=5)
  IF pId = 5 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'TECH_FAIL';
  END IF;

  UPDATE Leverancier
  SET
    Mobiel = pMobiel,
    DatumGewijzigd = CURRENT_TIMESTAMP(6)
  WHERE Id = pId;

  UPDATE Contact c
  JOIN Leverancier l ON l.ContactId = c.Id
  SET
    c.Straat = pStraat,
    c.DatumGewijzigd = CURRENT_TIMESTAMP(6)
  WHERE l.Id = pId;
END $$

DELIMITER ;
