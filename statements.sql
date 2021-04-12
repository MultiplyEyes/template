--create database/ om het makkelijker te maken om het intevoren naar een andere pc
CREATE DATABASE database_naam;
-- use database/ om het makkelijker te maken om het intevoren naar een andere pc
USE database_naam;
-- create table/ een tabel dat in de database moet met alle data
CREATE TABLE tablenaam{
    id INT NOT NULL AUTO_INCREMENT,
    username Unique VARCHAR(255),
    PRIMARY KEY(id)
}
-- create table met een FOREIGN  KEY/ een tabel met een FOREIGN KEY met data van een andere tabel
CREATE TABLE tablenaam_with_fk{
    id INT NOT NULL AUTO_INCREMENT,
    fk_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(fk_id) REFERENCES tabelnaam(id)
}