<h3>Structure of DB:</h3>

```
create table messages (
  id_msg int(11) primary key not null auto_increment,
  id_msg_out int(255) not null,
  id_msg_in int(255) not null,
  message varchar(1000) not null
) engine=InnoDB default CHARSET=utf8mb4;

create table users (
  id_user int(11) primary key not null auto_increment,
  id_diff int(255) not null,
  email varchar(255) not null,
  pass varchar(255) not null,
  n_user varchar(255) not null,
  l_user varchar(255) not null,
  img_profile varchar(255) not null,
  st varchar(255) NOT NULL
) engine=InnoDB default CHARSET=utf8mb4;
```
