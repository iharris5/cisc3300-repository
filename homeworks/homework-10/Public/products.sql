USE `cookie eaters`;

CREATE TABLE `merch`
(
	`product_id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(80) NOT NULL,
	`price` int(11) NOT NULL,
	primary key (`product_id`)
);

insert into merch (name, price)
values ('Cookie Hat', 35);
insert into merch (name, price)
values ('Cookie Jacket', 45);
insert into merch (name, price)
values ('Cookie Fanatic Hoodie', 60);
