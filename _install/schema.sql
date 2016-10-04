DROP TABLE IF EXISTS fundings;
DROP TABLE IF EXISTS projects;
-- DROP TABLE IF EXISTS users_confirmations;
DROP TABLE IF EXISTS users_remembered;
DROP TABLE IF EXISTS users_resets;
DROP TABLE IF EXISTS users_throttling;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id         SERIAL PRIMARY KEY,
  email      VARCHAR(255) UNIQUE NULL,
  password   VARCHAR(255)        NOT NULL,
  username   VARCHAR(100)                 DEFAULT NULL,
  verified   BOOLEAN             NOT NULL DEFAULT FALSE,
  registered INT                 NOT NULL,
  last_login INT                          DEFAULT NULL
);

-- CREATE TABLE users_confirmations (
--   id       SERIAL PRIMARY KEY,
--   email    VARCHAR(255)       NOT NULL,
--   selector VARCHAR(16) UNIQUE NOT NULL,
--   token    VARCHAR(255)       NOT NULL,
--   expires  INT                NOT NULL
-- );

CREATE TABLE users_remembered (
  id       SERIAL PRIMARY KEY,
  "user"   INT                NOT NULL REFERENCES users (id),
  selector VARCHAR(24) UNIQUE NOT NULL,
  token    VARCHAR(255)       NOT NULL,
  expires  INT                NOT NULL
);

CREATE TABLE users_resets (
  id       SERIAL PRIMARY KEY,
  "user"   INT                NOT NULL REFERENCES users (id),
  selector VARCHAR(20) UNIQUE NOT NULL,
  token    VARCHAR(255)       NOT NULL,
  expires  INT                NOT NULL
);

CREATE TABLE users_throttling (
  id          SERIAL PRIMARY KEY,
  action_type VARCHAR(13) NOT NULL CHECK (action_type IN ('login', 'register', 'confirm_email')),
  selector    VARCHAR(44)          DEFAULT NULL,
  time_bucket INT         NOT NULL,
  attempts    INT         NOT NULL DEFAULT 1,
  UNIQUE (action_type, selector, time_bucket)
);

CREATE TABLE projects (
  id            SERIAL PRIMARY KEY,
  owner         INT REFERENCES users (id),
  title         TEXT  NOT NULL,
  description   TEXT,
  start_date    DATE  NOT NULL,
  end_date      DATE,
  categories    TEXT,
  display_image TEXT,
  amount        FLOAT NOT NULL CHECK (amount > 0)
);

CREATE TABLE fundings (
  id         SERIAL PRIMARY KEY,
  project_id INT REFERENCES projects (id),
  funder_id  INT REFERENCES users (id),
  amount     FLOAT NOT NULL CHECK (amount > 0)
);
