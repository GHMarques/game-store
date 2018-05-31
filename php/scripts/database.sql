/*
Created: 28/04/2018
Modified: 01/05/2018
Model: PostgreSQL 9.5
Database: PostgreSQL 9.5
*/


-- Create tables section -------------------------------------------------

-- Table user

CREATE TABLE "user"(
 "id" Bigint NOT NULL,
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

-- Create indexes for table user

CREATE INDEX "user_country_relationship" ON "user" ("country_id")
;

-- Add keys for table user

ALTER TABLE "user" ADD CONSTRAINT "Key1" PRIMARY KEY ("id")
;

ALTER TABLE "user" ADD CONSTRAINT "email" UNIQUE ("email")
;

-- Table country

CREATE TABLE "country"(
 "id" Bigint NOT NULL,
 "name" Character varying(20) NOT NULL
)
;

-- Add keys for table country

ALTER TABLE "country" ADD CONSTRAINT "Key2" PRIMARY KEY ("id")
;

-- Table game

CREATE TABLE "game"(
 "id" Bigint NOT NULL,
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
 "id" Bigint NOT NULL,
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

-- Table user_game

CREATE TABLE "user_game"(
 "id" Bigint NOT NULL,
 "user_id" Bigint NOT NULL,
 "game_id" Bigint NOT NULL,
 "date" Date NOT NULL,
 "total_price" Double precision NOT NULL,
 "payment_type" Bigint NOT NULL
)
;

-- Add keys for table user_game

ALTER TABLE "user_game" ADD CONSTRAINT "Key5" PRIMARY KEY ("user_id","game_id","id")
;
-- Create foreign keys (relationships) section ------------------------------------------------- 

ALTER TABLE "user" ADD CONSTRAINT "user_country" FOREIGN KEY ("country_id") REFERENCES "country" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "company" ADD CONSTRAINT "company_country" FOREIGN KEY ("country_id") REFERENCES "country" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "game" ADD CONSTRAINT "game_company" FOREIGN KEY ("company_id") REFERENCES "company" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "user_game" ADD CONSTRAINT "user_game" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE "user_game" ADD CONSTRAINT "game_user" FOREIGN KEY ("game_id") REFERENCES "game" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
;



