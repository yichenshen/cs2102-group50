DROP TABLE IF EXISTS fundings;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  email    VARCHAR(126) PRIMARY KEY,
  password VARCHAR(60)  NOT NULL,
  name     VARCHAR(256) NOT NULL,
  is_admin BOOL DEFAULT FALSE
);

-- Admin account
-- Password: admin123
INSERT INTO users (name, email, password, is_admin)
VALUES ('Admin', 'admin@admin.com', '$2y$10$80.NLueLLUloHm9RG1dS/euy.O9PrFvRVABk1q/yeEIPY5/MODd8O', TRUE);

CREATE TABLE projects (
  id            SERIAL PRIMARY KEY,
  owner         VARCHAR(256) REFERENCES users (email) ON UPDATE CASCADE ON DELETE CASCADE  NOT NULL,
  title         TEXT                                                                       NOT NULL,
  description   TEXT,
  start_date    DATE                                                                       NOT NULL,
  end_date      DATE                                                                       NOT NULL,
  category      TEXT                                                                       NOT NULL DEFAULT 'Others' CHECK (
    category IN
    ('Art', 'Charity', 'Crafts', 'Design', 'Technology', 'Others')),
  display_image TEXT,
  amount        FLOAT                                                                      NOT NULL CHECK (amount > 0)
);

CREATE TABLE fundings (
  id         SERIAL PRIMARY KEY,
  project_id INT REFERENCES projects (id) ON UPDATE CASCADE ON DELETE CASCADE,
  funder     VARCHAR(256) REFERENCES users (email) ON UPDATE CASCADE ON DELETE CASCADE,
  amount     FLOAT NOT NULL CHECK (amount > 0)
);
