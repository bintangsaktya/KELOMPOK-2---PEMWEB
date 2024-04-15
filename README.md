# KELOMPOK 2 - PROJECT PEMROGRAMAN WEB 
## Kelas Pemrograman Web SI - D

Dibuat oleh:
- Muhammad Bintang Saktya R (225150407111051)
- Noval Raihan Ramadhan (225150407111056)
- Muhammad Hansel Abilo (225150407111049)
- Aditya Rizki Pratama (225150400111023)

# Penjelasan Project
Unifind adalah sebuah website yang digunakan untuk mencari benda yang hilang berdasarkan postingan orang-orang yang menemukan barang.

# Keterangan
Dalam membuat website, kami menggunakan PDO untuk melakukan CRUD dengan database MySQL

## Tabel
- Tabel Barang 
  - id_barang (smallint) (PK)
  - id_user (smallint) (FK)
  - nama_barang (varchar)
  - deskripsi (varchar)
  - lokasi (varchar)
  - tanggal (varchar)
  - img_url (varchar)
  
- Tabel Pengguna
  - id (smallint) (PK)
  - nama (varchar)
  - email (varchar)
  - password (varchar)
  - username (varchar)
  - bio (varchar)
  - no_tlp (varchar)

## Fitur Upload File
Upload file digunakan saat mengupload gambar barang dan gambar profile user

## Penggunaan Cookie / Session
Website kami hanya menggunakan session untuk menyimpan data user yang terlogin dan melakukan pengecekan jika user telah login atau tidak sebelum mengakses page lain

## Penggunaan Ajax
Untuk ajax, website kami menggunakan library Axios untuk melakukan POST dan PUT

