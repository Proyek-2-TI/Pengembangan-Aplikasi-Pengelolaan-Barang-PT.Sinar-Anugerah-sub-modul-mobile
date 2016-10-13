# BAB I

# PENDAHULUAN

## 1.1	Latar Belakang

PT Sinar Anugerah merupakan salah satu dari sekian perusahaan yang menjalankan bisnis pendistribusian barang. Perusahaan yang berdiri sejak tahun 2004 ini masih melakukan sistem pendataan tanpa menggunakan sistem aplikasi. Misalnya semua pendataan barang masuk dan keluar serta return barang masih menggunakan blueprint.<br>

Sistem aplikasi yang telah dibangun pada proyek I sebelumnya masih memiliki kekurangan. Pada proyek II ini, aplikasi pengelolaan dan transaksi barang yang berkaitan dengan pergudangan pada PT. Sinar Anugerah akan diperbaiki serta di kembangakan sesuai proses bisnis yang ada pada PT. Sinar Anugerah.<br>

Pada pembangunan aplikasi proyek I yang telah diselesaikan, aplikasi yang mengelola data transaksi barang masuk belum memiliki sistem rekapitulasi data pengeluaran uang berdasarkan waktu yang ditentukan. Sehingga data yang dikelola belum dapat di optimalkan untuk menunjang perkembangan PT.Sinar Anugerah. Selain itu, aplikasi pengelolaan dan transaksi barang PT. Sinar Anugerah juga belum memiliki chart yang berfungsi untuk memudahkan user atau pegawai PT.Sinar Anugerah untuk memantau pendapatan dan pengeluaran baik dari segi keuangan maupun barang.<br>

Dalam segi keamanan, aplikasi ini hanya menggunakan session untuk dapat masuk dan mengakses konten yang ada pada aplikasi ini. Sehingga memungkinkan pihak yang tidak berkaitan dengan PT. Sinar Anugerah dapat dengan mudah mengakses konten yang ada pada aplikasi ini. 
Dalam hal ini, kami berusaha mengembangkan sebuah sistem yang telah dibangun sebelumnya dengan menggunakan bahasa pemograman web yaitu PHP berbasis framework Codeigniter disertai dengan OAuth2 sebagai penunjang aplikasi dan untuk integrasi datanya akan dibangun sebuah wadah penyimpanan berupa database dengan menggunakan Mysql. Adapun proyek ini saya beri judul “Pengembangan Aplikasi Pengelolaan Dan Transaksi Barang PT.Sinar Anugerah Berbasis Framework Codeigniter Sub Modul Pergudangan”.<br>

## 1.2	Identifikasi Masalah

Berdasarkan latar belakang diatas, maka dapat disimpulkan perumusan masalah yaitu: <br>
1.	Sistem yang ada pada pengelolaan data barang di gudang belum sepenuhnya menunjang aktifitas pergudangan pada PT. Sinar Anugerah.<br>
2.	Belum ada chart yang mempermudah user untuk memantau keuntungan dan kerugian pada proses transaksi dalam jangka waktu yang ditentukan.<br>
3.	Lemah dalam segi keamanan sehingga memungkinkan presentase peretasan konten dan data pada aplikasi pengelolaan dan transaksi barang PT.Sinar Anugerah besar.<br>

## 1.3	Tujuan
Berdasarkan rumusan masalah diatas, maka tujuan dari pembuatan aplikasi ini yaitu: <br>
1.	Meningkatkan sistem yang ada pada aplikasi pengelolaan dan transaksi barang PT.Sinar Anugerah agar dapat menunjang aktifitas pergudangan .<br>
2.	Mempermudah user untuk memantau keuntungan dan kerugian pada proses transaksi dalam jangka waktu yang ditentukan.<br>
3.	Meningkatkan keamanan aplikasi agar meminimalisir kejadian peretasan pada konten dan data.<br>

## 1.4	Ruang Lingkup
Agar penelitian berjalan dengan baik dan terarah, maka harus ada batasan masalah dalam ruang lingkup penelitian. Adapun pembatasan masalah penelitian ini yaitu: <br>
1.	Pengembangan aplikasi ini menggunakan PHP sebagai bahasa pemprogamannya disertai dengan OAuth2 sebagai penunjangnya dan Mysql Sebagai DBMS, serta windows sebagai sistem operasinya.<br>
2.	Aplikasi hanya dikelola oleh seorang administrator, pegawai sales, dan pegawai gudang dari pihak pengelola yang mempunyai hak akses penuh dalam pengelolaan data, sedangkan konsumen atau para pengunjung tidak disediakan layanan dalam aplikasi ini. <br>
3.	Untuk aktivitas pada pihak supplier maupun konsumen tidak dikaitkan pada aplikasi ini dikarenakan data dan aktivitas yang diambil pada supplier dan konsumen hanya berubah data nya saja kemudian dijadikan sumber acuan pada sistem.<br>

## 1.5	Sistematika Penulisan
Laporan proyek II yang berjudul “Pengembangan Aplikasi Pengelolaan Dan Transaksi Barang PT.Sinar Anugerah Berbasis Framework Codeigniter Sub Modul Pergudangan” ini terdiri dari  5 bab yaitu :<br>
Bab I Pendahuluan berisikan tentang Sistem aplikasi yang dibangun untuk PT Sinar Anugerah masih belum dapat menunjang proses bisnis pada PT, Sinar Anugerah.<br>
Bab II Landasan Teori berisikan tentang teori dan referensi yang berkaitan dengan  pengelolaan barang. Selain itu, BAB II ini berisikan tentang teori-teori seperti bahasa pemrograman PHP, OAuth2, MySQL, Database, Context Diagram, Data Flow Diagram, HTML, Sublime, dan Software yang akan menunjang dalam perancangan dan pembuatan aplikasi pengelolaan barang berbasis web ini.<br>
Bab III Analisis dan Perancangan berisikan tentang analisis sistem yang sedang berjalan saat ini menggunakan flow map, metode alirnya menggunakan Unfied Modeling Language (UML) yang terdiri dari Use Case, Class Diagram, Sequence Diagram, Communication Diagram, Activity Diagram, Statechart, Deployment Diagram, Component Diagram, dan Object Diagram. Perancangan sistem yang akan dibangun mengacu pada sistem yang saat ini sedang berjalan, sehingga sesuai dengan karakteristik sistem manual yang sudah ada dan tentunya tidak mengubah fungsi-fungsi sistem yang sudah berjalan di suatu perusahaan.<br>
Bab IV Pada bab ini berisi implementasi sistem yang menjelaskan tentang implementasi hasil dari analisis dan perancangan sistem ke dalam bentuk Bahasa pemograman, serta kebutuhan dalam mengembangkan sistem. Selain itu, akan membahas tentang pengujian aplikasi yang dibuat.<br>
Bab V berisikan kesimpulan tercapai atau tidaknya tujuan dibuat aplikasi pengelolaan barang PT Sinar Anugerah  berbasis web ini serta saran untuk membangun aplikasi ini menjadi lebih baik.<br>

