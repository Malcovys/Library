CREATE TABLE `adherent` (
  `id` VARCHAR(200) PRIMARY KEY,
  `firstName` VARCHAR(50) NOT NULL,
  `lastName` VARCHAR(50) NOT NULL,
  `email` VARCHAR(200),
  `phone` VARCHAR(13),
  `neighborhood` CHAR(20),
  `batch` CHAR(20),
  `registrationDate` DATE NOT NULL,
  `subscription` INT DEFAULT 1,
  `isAdmin` BOOLEAN DEFAULT FALSE,
  `password` VARCHAR(30) NOT NULL,
  `isAvailable` BOOLEAN DEFAULT TRUE
);

CREATE TABLE `publishingHouse` (
  `id` VARCHAR(200) PRIMARY KEY,
  `name` CHAR(30) NOT NULL
);

CREATE TABLE `book` (
  `isbn` VARCHAR(20) PRIMARY KEY,
  `title` CHAR(30) NOT NULL,
  `publishingHouseID` VARCHAR(200),
  `price` DECIMAL(5, 2) NOT NULL,
  `quantity` INT DEFAULT 1,
  `publishingDate` DATE NOT NULL,
  FOREIGN KEY(`publishingHouseID`) REFERENCES `publishingHouse`(`id`)
);

CREATE TABLE `category` (
  `id` VARCHAR(100) PRIMARY KEY,
  `name` CHAR(20) NOT NULL
);

CREATE TABLE `bookCategory` (
  `isbn` VARCHAR(20),
  `categoryID` VARCHAR(100),
  FOREIGN KEY(`isbn`) REFERENCES `book`(`isbn`),
  FOREIGN KEY(`categoryID`) REFERENCES `category`(`id`)
);

CREATE TABLE `author` (
  `id` VARCHAR(200) PRIMARY KEY,
  `name` CHAR(30) NOT NULL
);

CREATE TABLE `paperBack` (
  `id` VARCHAR(200) PRIMARY KEY,
  `isbn` VARCHAR(20),
  `authorID` VARCHAR(200),
  FOREIGN KEY(`isbn`) REFERENCES `book`(`isbn`),
  FOREIGN KEY(`authorID`) REFERENCES `author`(`id`)
);

CREATE TABLE `bookCopy` (
  `id` VARCHAR(200) PRIMARY KEY,
  `isbn` VARCHAR(20),
  `registrationDate` DATE NOT NULL,
  `isAvailable` BOOLEAN DEFAULT TRUE,
  FOREIGN KEY(`isbn`) REFERENCES `book`(`isbn`)
);

CREATE TABLE `lending` (
  `id` VARCHAR(200) PRIMARY KEY,
  `adherentID` VARCHAR(200),
  `copyID` VARCHAR(200),
  `lendingDate` DATE NOT NULL,
  `DueDate` DATE NOT NULL,
  `returnDate` DATE,
  FOREIGN KEY(`adherentID`) REFERENCES `adherent`(`id`),
  FOREIGN KEY(`copyID`) REFERENCES `bookCopy`(`id`)
);

CREATE TABLE `penalty` (
  `id` VARCHAR(100) PRIMARY KEY,
  `adherentID` VARCHAR(200) NOT NULL,
  `type` CHAR(2) NOT NULL,
  `sanction` DECIMAL(5, 2) NOT NULL,
  FOREIGN KEY(`adherentID`) REFERENCES `adherent`(`id`)
);

CREATE TABLE `notice` (
  `id` VARCHAR(200) PRIMARY KEY,
  `isbn` VARCHAR(20),
  `adherentID` VARCHAR(200),
  `comment` VARCHAR(255) NOT NULL,
  FOREIGN KEY(`isbn`) REFERENCES `book`(`isbn`),
  FOREIGN KEY(`adherentID`) REFERENCES `adherent`(`id`)
);
