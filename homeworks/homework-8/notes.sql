CREATE TABLE `notes`
(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(80) NOT NULL, 
	`description` text NOT NULL,
	primary key (`id`)
);

insert into notes (title, description)
values ('Tagline', 'Man, we love cookies!');
insert into notes (title, description)
values ('Motto', 'If it does not involve cookies, we are not interested');
insert into notes (title, description)
values ('Description 3', 'Wll nt hv vwls hr');
insert into notes (title, description)
values ('Delete', 'I want this description out, pronto.');

UPDATE notes
SET title='No Vowels'
WHERE id=3;

DELETE FROM notes
WHERE id=4;

SELECT * FROM notes
ORDER BY title DESC;

SELECT * FROM notes
LIMIT 1 OFFSET 1;

SELECT * FROM notes
WHERE description REGEXP '[aeiouAEIOU]';



