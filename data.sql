drop table if exists `users`;
create table `users` (
    id int not null auto_increment,
    first_name text not null,
    last_name text not null,
    email text not null,
    primary key (id)
);
insert into `users` (first_name, last_name, email) values
    ("Juan","Pérez", "juanperez@gmail.com"),
    ("Alicia","Rodriguez", "aliciarodriguez@hotmail.com"),
    ("Francisco", "Cabeza", "francabeza@yahoo.com");