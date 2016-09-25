CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  owner VARCHAR(128) REFERENCES users(email),
  title text NOT NULL,
  description text,
  start_date DATE NOT NULL,
  duration INT CHECK (duration > 0),
  categories text,
  amount INT NOT NULL CHECK (amount > 0),
  curr_amount INT DEFAULT 0
);

CREATE TABLE users (
  email VARCHAR(128) PRIMARY KEY,
  name VARCHAR(128) NOT NULL,
);

CREATE TABLE fundings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  p_id INT REFERENCES projects(id),
  funder VARCHAR(128) REFERENCES users(email),
  amount INT
)
