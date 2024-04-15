create database unifind;

use unifind;

create table users(
	id smallint not null primary key auto_increment,
	nama varchar(60) not null,
	email varchar(60) not null,
	password varchar(60) not null,
	username varchar(60),
	bio varchar(60),
	no_tlp varchar(15),
	profile_img varchar(60)
);

create table barang(
	id_barang smallint not null primary key auto_increment,
	id_user smallint not null,
	nama_barang varchar(60) not null,
	deskripsi varchar(100) not null,
	lokasi varchar(60) not null,
	tanggal varchar(60) not null,
	img_url varchar(60),
	
	foreign key (id_user) references users(id)
);
