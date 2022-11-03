


DATABASE NAME: mixdhub



TABLE: tblcategory
CREATE table tblcategory(
	ID int not null AUTO_INCREMENT,
    category varchar(100) not null,
    PRIMARY KEY (ID)
)




TABLE: tblproducts
CREATE TABLE tblproducts(
	ID int not null AUTO_INCREMENT,
    category_id int not null,
    productname varchar(255) not null,
    price int not null,
    image text not null,
    PRIMARY KEY (ID),
    FOREIGN KEY (category_id) REFERENCES tblcategory(ID)
)

TABLE: login
create table login(
	ID int not null AUTO_INCREMENT,
    username varchar(100) not null,
    pass varchar(100) not null,
    PRIMARY KEY (ID)
)
