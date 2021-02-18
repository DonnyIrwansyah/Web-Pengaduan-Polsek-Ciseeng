# Web-Pengaduan-Polsek-Ciseeng

UAS Pemrograman Web

Donny Irwansyah -- 1817101400 Muhammad Irfan Cahyanto -- 1817101438 Nizam Aditya Zuhayr -- 1817101449

DESKRIPSI : 
Pada UAS kali ini kami membuat Web Pengaduan Kejahatan pada daerah Ciseeng kepada Polsek Ciseeng. Web ini bertujuan untuk pelaporan masyarakat secara cepat dan tanggap akan kejadian kejahatan di sekitar daerah Ciseeng agar cepat dilakukan tindakan oleh para polisi.

MANFAAT/KEGUNAAN :
Manfaat adanya web ini adalah Polsek Ciseeng dapat cepat tanggap menindaklanjuti kejahatan yang terjadi di daerah ciseeng dengan melihat laporan yang dilakukan oleh masyarakat sekitar dengan tidak perlu datang jauh-jauh ke kantor polisi. Web pelaporan ini sangat bermanfaat dalam aspek waktu, dengan polisi sebagai admin maka dapat melakukan pemantauan secara online akan kejadian di sekitar Ciseeng.

FITUR KEAMANAN : 
Fitur keamanan yang digunakan adalah menyimpan password dalam database dengan menggunakan fungsi hash, menggunkaan fitur login pada admin.

PRASYARAT :
Minimal menggunakan Bootstrap3, minimal menggunakan PHP versi 4

CARA INSTALASI :
1. Upload database di folder "database" dengan nama "pengaduan.sql" pada server
2. Buka halaman web "localhost/Web-Pengaduan-Polsek-Ciseeng"
3. Untuk membuka halaman admin, masuk ke halaman web ""localhost/Web-Pengaduan-Polsek-Ciseeng/admin"
4. Username admin = admin
5. Password admin = admin

MANUAL PENGGUNAAN (USER) :
1. Pada web ini kami membuat halaman Home, Lapor, Lihat Pengaduan, dan Cara. Pada halaman home terdapat fitur ucapan Selamat Datang dan Pengumuman, List laporan terbaru, dan feed sosial media Div Humas Polri. 
2. Pada halaman Lapor difungsikan unutk masyarakat membuat laporan dengan mengisi form yang sudah disiapkan, isinya adalah id laporan (sudah terisi otomatis), nama, email, alamat tkp, jenis kejahatan, isi pengaduan, dan juga mengisi captca, pengadu harus mengisi seluruh form yang tersedia sesuai dengan ketentuan. 
3. Pada halaman Lihat pengaudan terdapat fitur untuk melihat laporan apakah sudah diproses atau belum dengan cara memasukkan id laporan yang sebelumnya dibuat pada halaman lapor, jika benar maka akan menampilkan laporan tersebut jika salah maka tidak menampilkan kesalahannya. 
4. Pada halaman cara terdapat keterangan membuat laporan pada web ini. 

MANUAL PENGGUNAAN (ADMIN) :
1.  Pada fitur Admin hal yang pertama adalah halaman login username : admin, password : admin. Jika berhasil maka terdapat halaman Dashboard, Data Report, dan Export. 
2.  Pada halaman Dashboard terdapat fitur laporan masuk, belum ditanggapi, sudah ditanggapi, dan list dari semua laporan yang masuk, jika memilih laporan masuk maka akan menampilkan seluruh laporan yang masuk pada web ini, jika memilih belum ditanggapi maka hanya menampilakn list laporan yang belum ditanggapi, dan jika memilih sudah ditanggapi maka hanya menampilkan list laporan yang sudah ditanggapi. 
3.  Pada halaman Data Report terdapat fitur detail laporan, menanggapi laporan, menghapus laporan.
4.  Pada halaman Export memiliki fitur print, export to pdf, dan export to excel yang bisa dilakukan sekaligus.
