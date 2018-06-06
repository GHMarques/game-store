/*
Created: 28/04/2018
Modified: 01/05/2018
Model: PostgreSQL 9.5
Database: PostgreSQL 9.5
*/


-- Create tables section -------------------------------------------------

-- Table client

CREATE TABLE "client"(
 "id" SERIAL NOT NULL,
 "name" Character varying(50) NOT NULL,
 "email" Character varying(50) NOT NULL,
 "password" Character varying(20) NOT NULL,
 "birth" Date NOT NULL,
 "street" Character varying(20) NOT NULL,
 "number" Character varying(10) NOT NULL,
 "state" Character varying(20) NOT NULL,
 "complement" Character varying(20) NOT NULL,
 "country_id" Bigint NOT NULL
)
;

-- Create indexes for table client

CREATE INDEX "client_country_relationship" ON "client" ("country_id")
;

-- Add keys for table client

ALTER TABLE "client" ADD CONSTRAINT "Key1" PRIMARY KEY ("id")
;

ALTER TABLE "client" ADD CONSTRAINT "email" UNIQUE ("email")
;

-- Table country

CREATE TABLE "country"(
 "id" SERIAL NOT NULL,
 "name" Character varying(20) NOT NULL
)
;

-- Add keys for table country

ALTER TABLE "country" ADD CONSTRAINT "Key2" PRIMARY KEY ("id")
;

-- Table game

CREATE TABLE "game"(
 "id" SERIAL NOT NULL,
 "name" Character varying(20) NOT NULL,
 "release_date" Date NOT NULL,
 "recommended_age" Bigint NOT NULL,
 "price" Double precision NOT NULL,
 "description" Character varying(255) NOT NULL,
 "company_id" Bigint NOT NULL
)
;

-- Create indexes for table game

CREATE INDEX "game_company_relationship" ON "game" ("company_id")
;

-- Add keys for table game

ALTER TABLE "game" ADD CONSTRAINT "Key3" PRIMARY KEY ("id")
;

ALTER TABLE "game" ADD CONSTRAINT "name" UNIQUE ("name")
;

-- Table company

CREATE TABLE "company"(
 "id" SERIAL NOT NULL,
 "name" Character varying(50) NOT NULL,
 "country_id" Bigint NOT NULL,
 "money" Double precision DEFAULT 0 NOT NULL
)
;

-- Create indexes for table company

CREATE INDEX "company_country_relationship" ON "company" ("country_id")
;

-- Add keys for table company

ALTER TABLE "company" ADD CONSTRAINT "Key4" PRIMARY KEY ("id")
;

-- Table client_game

CREATE TABLE "client_game"(
 "id" SERIAL NOT NULL,
 "client_id" Bigint NOT NULL,
 "game_id" Bigint NOT NULL,
 "date" Date NOT NULL,
 "total_price" Double precision NOT NULL,
 "payment_type" Bigint NOT NULL
)
;

-- Add keys for table client_game

ALTER TABLE "client_game" ADD CONSTRAINT "Key5" PRIMARY KEY ("client_id","game_id","id")
;
-- Create foreign keys (relationships) section ------------------------------------------------- 

ALTER TABLE "client" ADD CONSTRAINT "client_country" FOREIGN KEY ("country_id") REFERENCES "country" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "company" ADD CONSTRAINT "company_country" FOREIGN KEY ("country_id") REFERENCES "country" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "game" ADD CONSTRAINT "game_company" FOREIGN KEY ("company_id") REFERENCES "company" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "client_game" ADD CONSTRAINT "client_game" FOREIGN KEY ("client_id") REFERENCES "client" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "client_game" ADD CONSTRAINT "game_client" FOREIGN KEY ("game_id") REFERENCES "game" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;



