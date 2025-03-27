CREATE DATABASE `in_class_19`;

CREATE TABLE `posts`
(
	`post_id` int (11) NOT NULL AUTO_INCREMENT,
	`title` varchar(80) NOT NULL,
	`description` text NOT NULL,
	primary key (`post_id`)
);

insert into posts (title, description)
values ('Post One', 'Okay, here is the first post');
insert into posts (title, description)
values ('Post Two', 'Here be the second post');
insert into posts (title, description)
values ('Post Three', 'Thirdly, this is the third post');
