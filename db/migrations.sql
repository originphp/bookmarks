CREATE TABLE `migrations` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  version VARCHAR(14) NOT NULL,
  rollback MEDIUMTEXT DEFAULT NULL,
  created DATETIME NOT NULL
) ENGINE=InnoDB;

CREATE INDEX migrations_version_index ON migrations (version)