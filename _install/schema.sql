CREATE TABLE users (
  email VARCHAR(128) PRIMARY KEY,
  name VARCHAR(128) NOT NULL
);

CREATE TABLE projects (
  id SERIAL PRIMARY KEY,
  owner VARCHAR(128) REFERENCES users(email),
  title text NOT NULL,
  description text,
  start_date DATE NOT NULL,
  end_date DATE,
  categories text,
  amount FLOAT NOT NULL CHECK (amount > 0)
);

CREATE TABLE fundings (
  id SERIAL PRIMARY KEY,
  p_id INT REFERENCES projects(id),
  funder VARCHAR(128) REFERENCES users(email),
  amount FLOAT NOT NULL CHECK (amount > 0)
);
