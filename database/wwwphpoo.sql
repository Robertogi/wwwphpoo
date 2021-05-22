DROP DATABASE IF EXISTS wwwphpoo;
CREATE DATABASE wwwphpoo CHARACTER SET utf8 COLLATE utf8_general_ci;
USE wwwphpoo;

CREATE TABLE config (
    id INT PRIMARY KEY AUTO_INCREMENT,
    var VARCHAR(63) NOT NULL,
    val LONGTEXT NOT NULL
);

-- Insere configurações
INSERT INTO config (var, val) VALUES
('pageTitle', ''),
('pageCSS', ''),
('pageJS', ''),
('siteName', 'WWW-PHP-OO'),
('siteFullName', 'Site em PHPOO'),
('siteSlogan', 'Difícil, mas complicado.'),
('siteLogo', '/img/logo_01.png'),
('favicon', '/favicon.png'),
('siteBackground', '/img/bg_02.jpg'),
('templateCSS', '/css/global.css'),
('social_github', 'http://github.com/fuinhas'),
('social_youtube', 'http://youtube.com/fuinhas'),
('social_linkedin', 'http://linkedin.com/fuinhas'),
('social_facebook', 'http://facebook.com/fuinhas'),
('siteOwner', 'André Luferat'),
('siteOwnerEmail', 'andre@luferat.net'),
('siteYear', '2019'),
('meta_author', 'André Luferat'),
('meta_description', 'Site sobre fuinhas, furões e afins.'),
('meta_keywords', 'fuinha, furão, pet, exótico, mamífero'),
('meta_copyright', '© 2021 André Luferat')
;