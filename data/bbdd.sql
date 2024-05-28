-- CUENTA ADMIN
-- Email: admin@gmail.com
-- Contraseña: admin

CREATE DATABASE IF NOT EXISTS tiendajuegos;
use tiendajuegos;

CREATE TABLE usuario(
    dniUsuario VARCHAR(9) PRIMARY KEY NOT NULL,
    nombreUsuario VARCHAR(20) NOT NULL,
    apellidosUsuario VARCHAR(25) NOT NULL,
    emailUsuario VARCHAR(50) NOT NULL,
    passwordUsuario VARCHAR(60) NOT NULL,
    administrador boolean DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE consolas(
    id_consola INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombreConsola VARCHAR(15) NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE juegos(
    id_juego INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fotoJuego VARCHAR(200) NOT NULL,
    nombreJuego VARCHAR(50) NOT NULL,
    precioJuego NUMERIC(6,2),
    id_consola INT UNSIGNED NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE carrito(
    id_compra INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    dniUsuario VARCHAR(9) NOT NULL,
    id_juego INT UNSIGNED,
    id_consola INT UNSIGNED,
    nombreJuego VARCHAR(50) NOT NULL,
    fotoJuego VARCHAR(200) NOT NULL,
    precioJuego NUMERIC(6,2),
    cantidad INT,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE compras(
    id_compra INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    dniUsuario VARCHAR(9),
    id_juego INT UNSIGNED,
    id_consola INT UNSIGNED,
    precioJuego NUMERIC(6,2),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE juegos ADD FOREIGN KEY (id_consola) REFERENCES consolas(id_consola) ON DELETE CASCADE;

ALTER TABLE carrito ADD FOREIGN KEY (dniUsuario) REFERENCES usuario(DNIUsuario) ON DELETE CASCADE;
ALTER TABLE carrito ADD FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE;
ALTER TABLE carrito ADD FOREIGN KEY (id_consola) REFERENCES consolas(id_consola) ON DELETE CASCADE;

ALTER TABLE compras ADD FOREIGN KEY (dniUsuario) REFERENCES usuario(DNIUsuario) ON DELETE CASCADE;
ALTER TABLE compras ADD FOREIGN KEY (id_juego) REFERENCES juegos(id_juego) ON DELETE CASCADE;
ALTER TABLE compras ADD FOREIGN KEY (id_consola) REFERENCES consolas(id_consola) ON DELETE CASCADE;
ALTER TABLE compras ADD FOREIGN KEY (id_compra) REFERENCES carrito(id_compra) ON DELETE CASCADE;

INSERT INTO usuario (dniUsuario, nombreUsuario, apellidosUsuario, emailUsuario, passwordUsuario, administrador) values ('12345678R', 'NombreAdmin', 'ApellidosAdmin', 'admin@gmail.com', '$2y$04$urbyEoLeMSTkDeCqegwUveu11Q1ypPmGRIDcNNNbLYe8uiwq7cPJ.', 1);

INSERT INTO consolas (id_consola, nombreConsola) VALUES 
('1', 'Play Station 5'),
('2', 'Xbox Series'),
('3', 'Nintendo Switch'),
('4', 'PC');

INSERT INTO juegos (fotoJuego, nombreJuego, precioJuego, id_consola) VALUES
('HogwartsLegacy-ps5.png', 'Hogwarts Legacy', 49.99, '1'),
('FC24-ps5.png', 'FC24', 79.99, '1'),
('RatchetClank-PS5.png', 'Ratchet & Clank', 69.99, '1'),
('Spiderman2-PS5.png', "Spider-Man 2", 79.99, '1'),
('Horizon-PS5.png', 'Horizon Forbidden', 59.99, '1'),
('GodOfWar-PS5.png', 'God Of War', 69.99, '1'),
('GranTurismo-PS5.png', 'Gran Turismo 7', 69.99, '1'),
('ModernWarfare3-PS5.jpg','Modern Warfare III', 79.99, '1'),
('Forspoken-PS5.png','Forspoken', 29.99, '1'),
('Persona3Reload-PS5.jpg','P3 Reload', 69.99, '1'),
('NBA2K24-PS5.png','NBA 24', 49.99, '1'),
('FinalFantasyXVI-PS5.png','Final Fantasy XVI', 69.99, '1'),
('LastOfUs1-PS5.png','The Last Of Us I', 69.99, '1'),
('LastOfUs2-PS5.jpg','The Last Of Us II', 69.99, '1'),
('F122-PS5.jpg','F1 22', 49.99, '1'),
('Jedi-PS5.jpg','Jedi Survivor', 59.99, '1'),
('WRC-PS5.jpg','WRC', 49.99, '1'),
('EldenRing-PS5.jpg','Elden Ring', 59.99, '1'),
('Valhalla-PS5.jpg','AC. Valhalla', 19.99, '1'),
('Mirage-PS5.jpg','AC. Mirage', 19.99, '1'),

('ForzaHorizon5-Xbox.png', 'Forza Horizon 5', 59.99, '2'),
('Starfield-Xbox.png', 'Starfield', 79.99, '2'),
('Batman-Xbox.jpg', 'Batman', 19.99, '2'),
('NeedForSpeed.png', 'Need For Speed', 49.99, '2'),
('HogwartsLegacy-Xbox.png', 'Hogwarts Legacy', 54.99, '2'),
('Battlelfield-Xbox.jpg', 'Battlefield 2042', 39.99, '2'),
('MortalKombat-Xbox.png', 'Mortal Kombat', 74.99, '2'),
('Cities-Xbox.jpg', 'Cities Skyline II', 49.99, '2'),
('ColdWar-Xbox.jpeg', 'Cold War', 29.99, '2'),
('ForzaHorizon5-Xbox.jpg', 'Forza Horizon 5', 59.99, '2'),
('JumpForce-Xbox.jpg', 'Jump Force', 12.95, '2'),
('Callisto-Xbox.png', 'Callisto protocol', 14.99, '2'),
('Lord-Xbox.jpg', 'Lords Of The Fallen', 69.99, '2'),
('Mirage-Xbox.jpg', 'AC. Mirage', 49.99, '2'),
('r6-Xbox.jpg', 'Raimbow Six Siege', 14.99, '2'),
('Tenis-Xbox.jpg', 'Tennis World Tour', 29.99, '2'),
('Avatar-Xbox.jpg', 'Avatar', 79.99, '2'),
('LordOfRing-Xbox.jpg', 'Lord Of Ring', 34.99, '2'),
('Trilogy-Xbox.jpg', 'GTA Trilogy', 19.99, '2'),
('Gear5-Xbox.jpg', 'Gear Of War 5', 39.99, '2'),

('MarioKart-Nintendo.png', 'Mario Kart 8', 49.99, '3'),
('AnimalCrossing-Nintendo.png', 'Animal Crossing', 49.99, '3'),
('FC24-Nintendo.png', 'FC24', 59.99, '3'),
('MarioOdyssey-Nintendo.png', 'Mario Odyssey', 49.99, '3'),
('Zelda-Nintendo.png', 'The Legend of Zelda 2', 59.99, '3'),
('Splatoon3-Nintendo.png', 'Splatoon 3', 49.99, '3'),
('GTAV-Nintendo.png', 'Gta V', 19.99, '3'),
('Xenoblade-Nintendo.jpg', 'Xenoblade Chronicles', 59.99 ,'3'),
('WWZ-Nintendo.jpg', 'World War Z', 39.95,'3'),
('Smash-Nintendo.jpg', 'Super Smash Bros', 59.99,'3'),
('PokemonEscarlata-Nintendo.jpg', 'Pokemon Escarlata', 49.99,'3'),
('PokemonDiamante-Nintendo.jpg', 'Pokemon Diamante', 59.99,'3'),
('Miitopia-Nintendo.jpg', 'Miitopia', 49.99,'3'),
('MarioYSonic-Nintendo.jpg', 'MARIO & SONIC JJOO', 49.99,'3'),
('MarioStriker-Nintendo.jpg', 'Mario Strikers', 49.99,'3'),
('Luigi-Nintendo.jpg', 'Luigi Mansion 3', 49.99,'3'),
('Kirby-Nintendo.jpg', 'Kirby StarAllies', 49.99,'3'),
('HumanFallFlat-Nintendo.jpg', 'Human Fall Flat', 34.99,'3'),
('Arms-Nintendo.jpg', 'Arms', 49.99,'3'),
('JustDance-Nintendo.jpg', 'Just Dance 2021', 29.99,'3'),

('EldenRing-PC.jpg', 'Elden Ring ', 54.99, '4'),
('DeadIsland2-PC.jpg', 'Dead Island 2', 59.99, '4'),
('Cod2-PC.jpg', 'Modern Warfare II', 29.99, '4'),
('FC24-PC.jpg', 'FC24', 69.99, '4'),
('Isaac-PC.jpg', 'Isaac', 39.99, '4'),
('LosSims4-PC.jpg', 'Los Sims 4', 0, '4'),
('Battelfield-PC.jpg', 'Battelfield', 49.99, '4'),
('ViceCity-PC.jpg', 'Vice City', 49.99, '4'),
('HogwartsLegacy-PC.jpg', 'Hogwarts Legacy', 79.99, '4'),
('Prey-PC.jpg', 'Prey', 14.99, '4'),
('EvilDead-PC.jpg', 'Evil Dead', 19.99, '4'),
('ResidentEvil-PC.png', 'Resident Evil', 69.99, '4'),
('Farcry4-PC.jpg', 'Farcry 4', 19.99, '4'),
('InfiniteWarfare-PC.jpg', 'Infinite Warfare', 69.99, '4'),
('WatchDogs2-PC.jpg', 'WatchDogs 2', 24.99, '4'),
('MickeyMouse-PC.png', 'Mickey Mouse', 15.99, '4'),
('Dishonored2-PC.jpg', 'Dishonored 2', 9.99, '4'),
('TheSurge-PC.jpg', 'The surge', 29.99, '4'),
('Medium-PC.jpg', 'The Medium', 29.99, '4'),
('Origins-PC.jpg', 'Origins', 69.99, '4');