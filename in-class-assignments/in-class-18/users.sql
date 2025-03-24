CREATE DATABASE `in_class_18`;

USE `in_class_18`;

CREATE TABLE `users`
(
	`id`        int(11) NOT NULL AUTO_INCREMENT,
	`username`  varchar(80) NOT NULL,
	primary key (`id`)
);

CREATE TABLE `userComments`
(
	`commentID` int(11) AUTO_INCREMENT,
	`comment`   TEXT,
	`userID`    int(11) NOT NULL,
	primary key (`commentID`),
	foreign key (`userID`) references `users`(`id`)
);

insert into users (username)
values ('cooldude');
insert into users (username)
values ('awesomegirl');
insert into users (username)
values ('lameguy');

insert into userComments (comment, userID)
values ('What can I say, I am a cool dude', 1);
insert into userComments (comment, userID)
values ('Well guess what, I am an awesome girl', 2);

select * from users left join userComments on users.id = userComments.userID;

select * from users join userComments on users.id = userComments.userID;
