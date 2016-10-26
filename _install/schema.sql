DROP TABLE IF EXISTS fundings;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  email    VARCHAR(126) PRIMARY KEY,
  password VARCHAR(60)  NOT NULL,
  name     VARCHAR(256) NOT NULL,
  is_admin BOOL DEFAULT FALSE
);

CREATE TABLE projects (
  id            SERIAL PRIMARY KEY,
  owner         VARCHAR(256) REFERENCES users (email) ON UPDATE CASCADE NOT NULL,
  title         TEXT                                                    NOT NULL,
  description   TEXT,
  start_date    DATE                                                    NOT NULL,
  end_date      DATE                                                    NOT NULL,
  category      TEXT                                                    NOT NULL DEFAULT 'Others' CHECK (category IN
                                                                                                         ('Art', 'Charity', 'Crafts', 'Design', 'Technology', 'Others')),
  display_image TEXT,
  amount        FLOAT                                                   NOT NULL CHECK (amount > 0)
);

CREATE TABLE fundings (
  id         SERIAL PRIMARY KEY,
  project_id INT REFERENCES projects (id),
  funder     VARCHAR(256) REFERENCES users (email) ON UPDATE CASCADE,
  amount     FLOAT NOT NULL CHECK (amount > 0)
);
