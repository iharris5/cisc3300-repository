CREATE DATABASE `in_class_20`;

USE `in_class_20`;

CREATE TABLE `posts`
(
	`id` int (11) NOT NULL AUTO_INCREMENT,
	`title` varchar(80) NOT NULL,
	`description` text NOT NULL,
	primary key (`id`)
);

insert into posts (title, description)
values ('First Post', 'The title aint a lie, this is the first post');
insert into posts (title, description)
values ('Second Post', 'Secondably, post number 2 is here');
insert into posts (title, description)
values ('Third Post', 'Alright, the third post is right here');

