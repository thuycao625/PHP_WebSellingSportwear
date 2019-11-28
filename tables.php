


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect.php");
mysqli_set_charset($link,"utf8");

$sql = "CREATE TABLE categories (
id int(11) NOT NULL AUTO_INCREMENT,
icon varchar(255) default null,
name varchar(255) default null,
date_sold date NOT NULL ,
description text,
PRIMARY KEY (id))";

$sql1 = "INSERT INTO categories (id, name, description, icon,date_sold)
VALUES (1, 'Áo Bóng Đá', 'ĐBĐ', 'bongicon.JPG','2018/04/15'),
       (2, 'Áo Bóng Chuyền', 'ĐBC', 'chuyen.JPG','2018/6/15'),
       (3, 'Áo Bóng Rổ', 'BR', 'bongro.JPG','2018/09/15'),
       (4, 'Đồ Bơi', 'CL', 'boi.JPG','2018/11/15'),
       (5, 'Đồ Yoga', 'ĐYG', 'yoga.JPG','2018/1/15'),
       (6, 'Giày Thể Thao', 'GTT', 'giay.png','2019/01/15')";


$sql2 = "CREATE TABLE products (
id int(11) NOT NULL AUTO_INCREMENT,
name varchar(255) default null,
price int(11) default null,
quantity int(11) default null,
category_id int(11) NOT NULL,
date_sold date NOT NULL ,
comments varchar(500) default null,
Images  varchar(255) default null,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES categories (id))";


$sql3 = "INSERT INTO products (id, name, price, quantity ,category_id,date_sold,comments ,Images)
VALUES ('1', 'Giày Reebok', 350, 30 ,6,'2019/01/15','MN','g1.jpg'),
    ('2', 'Giày Alexander', 30, 30 ,6,'2018/6/15','BC','g2.jpg'),
    ('3', 'Giày Balenciaa', 500, 30 ,6,'2019/01/15','','g4.png'),
    ('4', 'Giày Guccii', 400, 30 ,6,'2018/6/15','','g16.jpg'),
    ('5', 'Áo bóng đá Liverpool', 350, 30 ,1,'2019/01/15','MN','b3.jpg'),
    ('6', 'Áo bóng đá Manchester', 350, 30 ,1,'2018/04/15','BC','b4.jpg'),
    ('7', 'Áo bóng đá Bayern Munich', 200, 30,1,'2019/01/15','MN','b2.jpg'),
    ('8', 'Áo bóng đá Barcelona', 400, 30 ,1,'2018/04/15','BC','b6.jpg'),
    ('9', 'Áo bóng chuyền Chelsea', 350, 30 ,2,'2019/01/15','MN','c1.jpg'),
    ('10', 'Áo bóng chuyền Alexander', 500, 30 ,2,'2018/6/15','','c2.jpg'),
    ('11', 'Áo bóng chuyền Guccii', 400, 30 ,2,'2018/6/15','','c3.jpg'),
    ('12', 'Áo bóng chuyền Liverpool', 350, 30 ,2,'2018/6/15','BC','c4.jpg'),
    ('13', 'Giày quần vợt', 350, 30 ,6,'2019/01/15','HT','g8.jpg'),
    ('14', 'Giày Thái  ', 30, 30 ,6,'2019/01/15','BC','g12.jpg'),
    ('15', 'Giày Bittit', 500, 30 ,6,'2019/01/15','BT','g3.jpg'),
    ('16', 'Quần vợt', 350, 30 ,5,'2019/01/15','QV','cl1.jpg'),
    ('17', 'Bộ chơi cầu lông', 30, 30 ,5,'2019/01/15','BC','cl8.jpg'),
    ('18', 'Cầu Xốp', 500, 30 ,5,'2019/01/15','CD','cd2.png'),
    ('19', 'Cầu lông gà', 30, 30 ,5,'2019/01/15','CD','cd4.jpg'),
    ('20', 'Cầu nhiều màu', 500, 30 ,5,'2019/01/15','CD','cd5.png'),
    ('21', 'Bóng ngoại hạng Anh', 600, 30 ,3,'2018/09/15','BD','bd3.png'),
    ('22', 'Bóng ĐWC', 600, 30 ,3,'2018/09/15','BD','bd6.png')";


$sql4 = "CREATE TABLE  customers(
    id int(11) auto_increment primary key not null,
    name varchar(255) not null,
    birthday date,
    email varchar(255),
    phone varchar(30) ,
    username varchar(100) not null,
    password varchar(100) not null)";

$sql5 = "INSERT INTO customers (id, name,birthday,email,phone, username, password)
VALUES ('1','Nguyễn Văn Bình','1999/04/15','nguyen.binh@gmail.com','032659856','nguyen.binh','11111111'),
       ('2','Mai Xuân an','1999/04/15','nguyen.xuan@gmail.com','032669555','mai.an','11111111'),
       ('3','Hoàng Xuân Phúc','1989/04/20','nguyen.phuc@gmail.com','032125555','hoang.phuc','11111111'),
       ('4','Đỗ Thị Kim Oanh','1999/01/10','nguyen.oanh@gmail.com','032333555','do.oanh','11111111'),
       ('5','Trần Thanh Thảo','1995/09/15','nguyen.thao@gmail.com','032125000','tran.thao','11111111'),
       ('6','Anh Bùi Thịnh','1996/02/20','nguyen.thinh@gmail.com','032122222','anh.thinh','11111111'),
       ('7','Anh Anh Bảo','1998/01/14','nguyen.bao@gmail.com','016225555','Anh.bao','11111111')";
                                                                                                  


$sql6 = "CREATE TABLE  orders(
    id int(11) auto_increment primary key not null,
    cus_id int (11) not null,
    date_sold date not null,
    foreign key(cus_id) references CUSTOMERS(id))";

$sql7 = "INSERT INTO orders (id, cus_id, date_sold)
VALUES ('1',1,'2018/12/29'),
       ('2',2,'2018/12/19'),
       ('3',3,'2018/04/30'),
       ('4',4,'2018/10/20'),
       ('5',5,'2018/10/14'),
       ('6',6,'2018/10/29'),
       ('7',7,'2018/11/19')";

$sql8 ="CREATE TABLE  orders_details(
    id int(11) auto_increment primary key not null,
    ord_id int (11) not null,
    prod_id int(11) not null,
    quantity int(30) not null,
    foreign key(ord_id) references orders(id),
    foreign key(prod_id) references products(id))";

$sql9 = "INSERT INTO orders_details (id, ord_id, prod_id, quantity)
VALUES ('1',1,1,2),
       ('2',2,2,1),
       ('3',3,2,3),
       ('4',4,4,1),
       ('5',5,5,8),
       ('6',6,1,2),
       ('7',7,2,2)";

$sql10 = "CREATE TABLE  admin (
    id int(11) auto_increment primary key not null,
    name varchar (11) ,
    username varchar(11) not null,
    password varchar(255) not null)";



$sql11 = "INSERT INTO admin (id, name, username, password)
VALUES  ('1','Cao Thị Thúy','thuy.cao','11111111'),
        ('2','Hồ Thị Thiều','thieu.ho','22222222')";


if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute  " . mysqli_error($link);
 }

if(mysqli_query($link, $sql1)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute  " . mysqli_error($link);
 }

if(mysqli_query($link, $sql2)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute " . mysqli_error($link);
 }

if(mysqli_query($link, $sql3)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute  " . mysqli_error($link);
 }

if(mysqli_query($link, $sql4)){
     echo "Table created successfully.";
 } else{
     echo "ERROR: Could not able to execute  " . mysqli_error($link);
 }

if(mysqli_query($link, $sql5)){
    echo "Table created successfully.";
} else{
     echo "ERROR: Could not able to execute  " . mysqli_error($link);
 }

if(mysqli_query($link, $sql6)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute  " . mysqli_error($link);
 }

if(mysqli_query($link, $sql7)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute " . mysqli_error($link);
 }

if(mysqli_query($link, $sql8)){
    echo "Table created successfully.";
} else{
     echo "ERROR: Could not able to execute  " . mysqli_error($link);
}

//  Close connection
if(mysqli_query($link, $sql9)){
    echo "Table created successfully.";
} else{
     echo "ERROR: Could not able to execute  " . mysqli_error($link);
}
if(mysqli_query($link, $sql10)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute " . mysqli_error($link);
 }

if(mysqli_query($link, $sql11)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute " . mysqli_error($link);
 }
mysqli_close($link);

?>