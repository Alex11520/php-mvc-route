USE product;



CREATE TABLE bike (
    bike_id INT AUTO_INCREMENT PRIMARY KEY,
    bike_name VARCHAR(100),
    bike_price int NOT NULL
);



INSERT INTO bike (bike_name,bike_price)
VALUES
('mountain bike',2000),
('city bike',3000),
('road bike',4000);

UPDATE bike
SET bike_price = 2
WHERE bike_name = 'test1';

/*
CREATE TABLE member (
    user_name VARCHAR(100) PRIMARY KEY,
    passwd INT NOT NULL
);
*/

CREATE TABLE member (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    passwd INT NOT NULL
);



INSERT INTO member (user_name,passwd)
VALUES
('a',1234),
('b',2234),
('c',3234),
('d',4234),
('e',5234);


CREATE TABLE scooter (
    scooter_id VARCHAR(50) PRIMARY KEY,
    scooter_name VARCHAR(100),
    scooter_price INT,
    scooter_size VARCHAR(10) CHECK ( scooter_size IN ('Kid','Adult'))
);

