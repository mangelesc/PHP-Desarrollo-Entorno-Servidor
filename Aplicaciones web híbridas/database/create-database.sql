-- Creamos la BBDD, si no existe
CREATE DATABASE IF NOT EXISTS Actividad06Angeles;

USE Actividad06Angeles;

-- Creamos la tabla Ciudad, para evitar repetir código
CREATE TABLE IF NOT EXISTS poblacion(
    idPoblacion int,
    poblacion varchar(100) not null,
    PRIMARY KEY (idPoblacion)
    );

-- Creamos la tabla locales, si no se han creado previamente
CREATE TABLE IF NOT EXISTS locales(
    id int auto_increment, 
    nombre varchar(100) not null,
    coordenadas varchar(100) not null,
    idCiudad int not null,
    tipo varchar(100) not null,
    PRIMARY KEY (id),
    FOREIGN KEY (idCiudad) REFERENCES poblacion(idPoblacion)
    );

-- Insertamos datos en la tablas
INSERT INTO poblacion (idPoblacion, poblacion) VALUES
    (7778677,'Dublín'),
    (2966130,'Blackrock'),
    (2963722,'Howth');

INSERT INTO locales(nombre, coordenadas, idCiudad, tipo) VALUES
    ('Neon','{ lat: 53.335386, lng: -6.264991 }',7778677,'Restaurante'),
    ('The Port House','{ lat: 53.345173, lng: -6.264950 }',7778677,'Restaurante'),
    ('O Neills','{ lat: 53.343939, lng: -6.260651 }',7778677,'Restaurante'),
    ('Diceys Garden','{ lat: 53.336030, lng: -6.263471 }',7778677,'Discoteca'),
    ('D Two','{ lat: 53.334458, lng: -6.262889 }',7778677,'Discoteca'),
    ('The Globe','{ lat: 53.343336, lng: -6.264257 }',7778677,'Discoteca'),
    ('The Bar With No Name','{ lat: 53.341922, lng: -6.264160 }',7778677,'Bar'),
    ('The Temple Bar','{ lat: 53.345564, lng: -6.264255 }',7778677,'Bar'),
    ('The Auld Dubliner','{ lat: 53.345651, lng: -6.261945 }',7778677,'Bar'),

    ('The Wicked Wolf','{ lat: 53.30196, lng: -6.17801 }',2966130,'Restaurante'),
    ('The Blackrock','{ lat: 53.30077, lng: -6.17703 }',2966130,'Bar'),
    ('Flash Harrys','{ lat: 53.30065, lng: -6.17648 }',2966130,'Discoteca'),

    ('Howth Market','{ lat: 53.38867, lng: -6.07295 }',2963722,'Restaurante'),
    ('The Summit Inn','{ lat: 53.37307, lng: -6.05793 }',2963722,'Discoteca'),
    ('Abbey Tavern','{ lat: 53.38706, lng: -6.06581 }',2963722,'Bar');

