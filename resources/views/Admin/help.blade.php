@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        
        <div class="back-help col-md-12">
            <div class="title-dash m-b-md">
                <img src="{{  asset('images/logomewahfix.png') }}" width="200px" height="150px"><br>
                <p>Ruang Bantuan Teknis Admin</p>
            </div>
            
            <hr color="white">
            <section>
                <div class="container">
                    <div class="row" style="color:white;">
                
                        <h4> <strong>Halaman Dashboard</strong> </h4>
                        <p>
                            Halaman dashboard adalah halaman utama dari fitur admin Mewah. Halaman ini akan ditampilkan
                            tepat setelah anda melakukan login admin. <br>
                            Dalam halaman ini terdapat sebuah informasi secara singkat mengenai: <br>
                            1. Kategori produk yang dimiliki <br>
                            2. Jumlah total produk (unit) <br>
                            3. Jumlah jenis produk (merk) <br>
                            4. Pesan dari pengunjung <br><br><br>
                        </p>

                        <h4> <strong>Penambahan Produk Baru</strong> </h4>
                        <p>
                            <strong>Cara 1 : Apabila Kategori Produk Belum Ada</strong> <br><br>
                            Untuk menambahkan produk baru, anda perlu untuk menambahkan Kategori terlebih dahulu, caranyaa: <br>
                            1. Tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri halaman<br>
                            2. Pilih menu <strong>Blog</strong> <br>
                            3. Pilih menu <strong>Kategori</strong> <br>
                            4. Kemudian isi formulirnya sesuai kategori produk yang ingin ditambahkan.<br>
                            5. Klik tombol <button class="btn btn-warning" >Simpan</button> <br>
                            6. Setelah kategori dibuat, kita tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri lagi,<br>
                            7. Kali ini kita menuju menu <strong>Produk</strong>, klik untuk masuk <br>
                            8. Nah kita akan disajikan tabel kosong, untuk menambahkan produk baru klik <button class="btn btn-primary">Tambah Produk</button><br>
                            9. Kemudain isikan formulir tentang produknya, untuk lebih mendeskripsikan secara detail, anda dapat menuliskannya di form deskripsi.
                                Untuk pengisian harga produk hanya tuliskan saja nominalnya. Semisal Rp.350.000, tuliskan saja 350000. <br>
                                Sekiranya tidak ingin mengisikan harga karena alasan tertentu, maka formulir harga dapat dikosongkan.<br>
                            10. Setelah selesai tekan tombol <button class="btn btn-warning">Simpan</button>. <br>
                            11. Jadii deeh! Produk berhasil ditambahkan. Setelah simpan berhasil biasanya anda akan diantar ke daftar umum semua produk. Untuk melihat
                                secara spesifiknya bisa menuju menu produknya lagi.<br> <br> <br>

                            <strong>Cara 2 : Apabila Kategori Produk Sudah Ada</strong> <br><br>
                            Untuk menambahkan prduk baru yang telah tersedia kategorinya: <br>
                            1. Tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri halaman<br>
                            2. Langsung pilih menu <strong>Produk</strong> dan pilih kategori yang ada. <br>
                            3. Nah kita akan disajikan tabel produk, untuk menambahkan produk baru klik <button class="btn btn-primary">Tambah Produk</button><br>
                            4. Kemudain isikan formulir tentang produknya, untuk lebih mendeskripsikan secara detail, anda dapat menuliskannya di form deskripsi. <br>
                            5. Setelah selesai tekan tombol <button class="btn btn-warning">Simpan</button>. <br>
                            6. Jadii deeh! Produk baru berhasil ditambahkan. Setelah simpan berhasil biasanya anda akan diantar ke daftar umum semua produk. Untuk melihat
                                secara spesifiknya bisa menuju menu produknya lagi, melalui (<i class="fa fa-bars"></i>) lagi.<br> <br> <br>

                        </p>

                        <h4> <strong>Penambahan Galeri Produk Baru</strong> </h4>
                        <p>
                            1. Setelah berhasil menambah produk, kita tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri lagi,<br>
                            2. Kali ini kita menuju menu <strong>Produk</strong>, klik untuk masuk <br>
                            3. Kemudian pilih tombol <button class="btn btn-info"> Galeri </button> <br>
                            4. Nah kita akan disajikan tabel kosong, untuk menambahkan foto baru klik <button class="btn btn-primary">Tambah Gambar</button><br>
                            5. Kemudain isikan formulir tentang gambarnya. Isi juga <strong>Merk Produk</strong> sesuai produknya. <br>
                            6. Setelah selesai tekan tombol <button class="btn btn-warning">Simpan</button>. <br>
                            7. Jadii deeh! Gambar berhasil ditambahkan. Setelah simpan berhasil biasanya anda akan diantar ke daftar umum semua galeri. Untuk melihat
                                secara spesifiknya bisa menuju menu produknya lagi.<br><br><br>
                        </p>

                        <h4> <strong>Editing Data</strong> </h4>
                        <p>
                            <strong>Untuk pengeditan data baik galeri, produk, maupun kategori perlu diperhatikan baik-baik langkah nya ya.</strong><br><br>
                            1. Klik tombol <button class="btn btn-warning">Edit</button> pada produk/galeri/kategori yang ingin anda ubah <br>
                            2. Kemudian anda akan diantar menuju halaman formulir untuk edit data.<br>
                            3. Perlu diperhatikan terutama jika mengedit Produk, <strong>Merk/Tipe Produk</strong> harus diisi kembali sebelum di simpan.
                                Hal ini penting diperhatikan, karena jika belum terisi maka proses edit data tidak bisa tersimpan.<br>
                            4. Untuk <strong>Gambar</strong> jika tidak ingin diubah, maka tidak perlu mengupload gambar apapun. Akan tertera <br>
                                dua keterangan, yaitu: <strong>Gambar Baru (Update)</strong> dan <strong>Gambar Saat Ini</strong>. <br>
                                <strong>Gambar Saat Ini</strong> adalah gambar anda yang sedang ditampilkan pada website saat itu juga, sedangkan <br>
                                <strong>Gambar Baru (Update)</strong> adalah gambar pengganti. Jika tidak ingin mengganti, maka biarkan saja kosong.<br>
                            5. Jika semua sudah terisi dengan sesuai, anda bisa klik tombol <button class="btn btn-warning">Simpan</button> <br>
                            6. Data anda sudah berhasil terupdate! <br><br><br>
                        </p>

                        <h4> <strong>Penambahan/Update Lokasi</strong> </h4>
                        <p>
                            Untuk Footer bagian Lokasi dibahas terpisah karena ada beberapa langkah yang harus diperhatikan dengan cermat.
                            Dikarenakan langkah ini berbeda dengan tambah dan edit data lainnya.
                            Kesuksesan menampilkan peta Google pada website ditentukan dengan melalui langkah ini dengan tepat. <br> <br>
                            1. Kita tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri,<br>
                            2. Kali ini kita menuju menu <strong>Blog -> Footer</strong>, klik untuk masuk <br>
                            3. Dalam bagian lokasi klik tombol <button class="btn btn-primary"> Tambah Lokasi </button> <br>
                            4. Nah kita akan disajikan dua formulir untuk diisi, yaitu <strong>Alamat</strong> dan <strong>Link Embed Map</strong><br>
                            5. Pada formulir <strong>Alamat</strong> isikan alamat lengkap sesuai lokasi anda.
                            6. Nah, pada formulir <strong>Link Embed Map</strong> anda perlu pergi ke platform Google Map terlebih dahulu.<br>
                            7. Langkah pertama yaitu cari lokasi anda pada kolom pencarian Google Map, seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor1.jpg') }}"><br><br>
                            8. Setelah lokasi ditemukan, selanjutnya klik ikon <strong>Share</strong> seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor2.jpg') }}"><br><br>
                            9. Selanjutnya Klik bagian <strong>Embed a map</strong> seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor3.jpg') }}"><br><br>
                            10. Kemudian akan muncul link panjang, dan Klik-lah <strong>COPY HTML</strong> seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor4.jpg') }}"><br><br>
                            11. Pastekan link tersebut ke dalam formulir <strong>Link Embed Map</strong> seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor5.png') }}"><br><br>
                            12. Setelah itu PERHATIKAN BAIK-BAIK! HAPUS BAGIAN : <strong>(<`iframe src=")</strong> seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor6.png') }}"><br><br>
                            13. Kemudian PERHATIKAN BAIK-BAIK LAGI! HAPUS BAGIAN : <br>
                                <strong>(" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"><`/iframe>)</strong> <br>
                                pada bagian belakang link seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor7.png') }}"><br><br>
                            12. Hingga kemudian link benar-benar bersih tanpa <br> 
                                <strong>(<`iframe src="LINK MAP KITA" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"><`/iframe>)</strong> <br>
                                seperti berikut :<br>
                                <img class="help-img" src="{{ asset('images/maptutor8.png') }}"><br><br>
                            13. Terakhir klik tombol <button class="btn btn-warning">Simpan</button> untuk menyimpan lokasi.<br>
                            14. Jadi deh!! Silahkan Cek Map anda di Admin Footer, dan di seluruh akhir halaman website. <br>


                        </p><br>

                        <h4> <strong>Deleting Data</strong> </h4>
                        <p>
                            Delete data pada halaman admin ini cukup mudah, karena hanya tinggal memencet tombol <button class="btn btn-danger">Delete</button>,
                            saja. <br>
                            Namun dimohon untuk hati-hati, karena data yang akan anda hapus akan <strong>Hilang Selamanya</strong> dari Sistem Mewah Rent. Maka pastikan
                             data yang akan anda hapus merupakan data yang benar.<br>
                        </p>
                    </div>
                </div>
            </section>
            
        </div>
    </div>
         
         
</div>

@endsection
