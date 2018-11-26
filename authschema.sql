DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS role;
DROP TABLE IF EXISTS user2role;

CREATE TABLE users (
id int not null primary key auto_increment,
username varchar(255),
userpass varchar(255),
email varchar(255),
creationdate datetime,
realname varchar(255),
userstatus varchar(255)
);

CREATE TABLE role (
id int not null primary key auto_increment,
rolename varchar(255)
);

CREATE TABLE user2role (
id int not null primary key auto_increment,
userid int,
roleid int
);

INSERT INTO user (username,userpass,email,creationdate,realname,userstatus) VALUES ('test@example.com','$2y$10$HLfwFMf/L7FlT6tbeDZeteKhJRiri6nvlDfnjRYcA8XrkAYhF6Il2','test@example.com',now(),'Testy McTesterson','A');
INSERT INTO role (rolename) VALUES ('admin');
INSERT INTO role (rolename) VALUES ('user');
INSERT INTO user2role (userid,roleid) VALUES (1,1);
INSERT INTO user2role (userid,roleid) VALUES (1,2);

INSERT INTO user (username,userpass,email,creationdate,realname,userstatus) VALUES ('someemail@example.com','$2y$10$WhDNGxqzRlAlFLPMsDYMNuRizTFjRxMvwagclm/x9XMw9w7Yv9iGa','someemail@example.com', now(),'Bill Bob','B');
INSERT INTO user2role (userid,roleid) VALUES (2,1);
INSERT INTO user2role (userid,roleid) VALUES (2,2);

INSERT INTO user (username,userpass,email,creationdate,realname,userstatus) VALUES ('oldman@aol.com','$2y$10$BQ7eEtBLykpFxJJOC7VQlu1WrKeoMXbfFAjot10urNEea/mgTHkNW','oldman@aol.com', now(),'Mike N Ike','C');
INSERT INTO user2role (userid,roleid) VALUES (3,2);


/* Test - THIS IS INCORRECT FOR MOST USES 
SELECT rolename FROM role,user2role,user WHERE username = 'test@example.com';
*/

/* Join all three tables.
SELECT role.rolename, user.userpass, user.userstatus, user.realname, user.email 
FROM  user2role, users , role
WHERE username = 'test@example.com' 
AND user.id = user2role.userid 
AND role.id = user2role.roleid;*/