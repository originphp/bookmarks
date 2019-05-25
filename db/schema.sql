CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  dob DATE DEFAULT NULL,
  created DATETIME NOT NULL,
  modified DATETIME NOT NULL
) ENGINE=InnoDB;

CREATE TABLE bookmarks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  title VARCHAR(50) NOT NULL,
  description TEXT,
  url TEXT,
  category VARCHAR(80) DEFAULT NULL,
  created DATETIME NOT NULL,
  modified DATETIME NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (id)
) ENGINE=InnoDB;

CREATE TABLE tags (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  created DATETIME NOT NULL,
  modified DATETIME NOT NULL,
  UNIQUE KEY title (title)
) ENGINE=InnoDB;

CREATE TABLE bookmarks_tags (
  bookmark_id INT NOT NULL,
  tag_id INT NOT NULL,
  PRIMARY KEY (bookmark_id,tag_id),
  FOREIGN KEY (tag_id) REFERENCES tags (id),
  FOREIGN KEY (bookmark_id) REFERENCES bookmarks (id)
) ENGINE=InnoDB;