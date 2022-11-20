


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




TABLE: orders
create table orders(
	ID int not null AUTO_INCREMENT,
    order_date datetime not null DEFAULT CURRENT_TIMESTAMP,
    order_mode varchar(100) not null,
    order_num int not null,
    order_total float not null,
    PRIMARY KEY (ID)
)




TABLE: product_orders
create table product_orders(
	ID int not null AUTO_INCREMENT,
    order_id int not null,
    product_id int not null,
    product_qty int not null,
    FOREIGN KEY (order_id) REFERENCES orders(ID),
    FOREIGN KEY (product_id) REFERENCES tblproducts(ID),
    PRIMARY KEY (ID)
)