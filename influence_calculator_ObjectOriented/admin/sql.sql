CREATE TABLE exam(
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    question varchar(500) not null,
    optionA varchar(128) not null,
    optionB varchar(128) not null,
    optionC varchar(128) not null,
    optionD varchar(128) not null,
    ans varchar(128) not null    
);
