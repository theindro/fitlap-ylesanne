CREATE TABLE battletag
(
  battle_tag_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  battle_tag VARCHAR(255),
  lvl INT(11),
  avatar VARCHAR(255),
  rank INT(11),
  tier VARCHAR(20),
  wins INT(11),
  lost INT(11),
  ties INT(11),
  played INT(11)
);