I had a pleasure to make this small project. 
Previously, I didn't work with PHP and sometimes some parts were a bit challenged for me.
Most of the time I used to project I devote for backend.

I was inspired by:
1) https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database - forms and session
2) https://www.youtube.com/watch?v=WU2C4bX8zLo - back end

Below DB Tables:

CREATE TABLE Users (
    UserID int NOT NULL AUTO_INCREMENT,
    UserName varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    PRIMARY KEY (UserID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE Notes (
    NoteID int NOT NULL AUTO_INCREMENT,
    UserID int,
    Note text,
    PRIMARY KEY (NoteID),
    CONSTRAINT FK_UserNotes FOREIGN KEY (UserID)
    REFERENCES Users(UserID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8
