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
                
                        <h4> Halaman Dashboard </h4>
                        <p>
                            Halaman dashboard adalah halaman utama dari fitur admin Mewah. Halaman ini akan ditampilkan
                            tepat setelah anda melakukan login admin. <br>
                            Dalam halaman ini terdapat sebuah informasi secara singkat mengenai: <br>
                            1. Kategori produk yang dimiliki <br>
                            2. Jumlah total produk (unit) <br>
                            3. Jumlah jenis produk (merk) <br>
                            4. Pesan dari pengunjung <br>
                        </p>

                        <h4> Penambahan Produk Baru </h4>
                        <p>
                            Untuk menambahkan produk baru, anda perlu untuk menambahkan Kategori terlebih dahulu, caranyaa: <br>
                            1. Tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri <br>
                            2. Pilih menu <strong>Blog</strong> <br>
                            3. Pilih menu <strong>Kategori</strong> <br>
                            4. Kemudian isi formulirnya sesuai kategori produk yang ingin ditambahkan.
                            5. Klik tombol <button class="btn btn-warning" >Simpan</button>
                            6. Setelah kategori dibuat, kita tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri lagi,<br>
                            7. Kali ini kita menuju menu <strong>Produk</strong>, klik untuk masuk <br>
                            8. Nah kita akan disajikan tabel kosong, untuk menambahkan produk baru klik <button class="btn btn-primary">Tambah Produk</button><br>
                            9. Kemudain isikan formulir tentang produknya, untuk lebih mendeskripsikan secara detail, anda dapat menuliskannya di form deskripsi. <br>
                            10. Setelah selesai tekan tombol <button class="btn btn-warning">Simpan</button>. <br>
                            11. Jadii deeh! Produk berhasil ditambahkan. Setelah simpan berhasil biasanya anda akan diantar ke daftar umum semua produk. Untuk melihat
                                secara spesifiknya bisa menuju menu produknya lagi.<br>
                        </p>

                        <h4> Penambahan Galeri Produk Baru </h4>
                        <p>
                            1. Setelah berhasil menambah produk, kita tarik menu (<i class="fa fa-bars"></i>) biru pada samping kiri lagi,<br>
                            2. Kali ini kita menuju menu <strong>Produk</strong>, klik untuk masuk <br>
                            3. Kemudian pilih tombol <button class="btn btn-info"> Galeri </button> <br>
                            4. Nah kita akan disajikan tabel kosong, untuk menambahkan foto baru klik <button class="btn btn-primary">Tambah Gambar</button><br>
                            5. Kemudain isikan formulir tentang gambarnya. Isi juga <strong>Merk Produk</strong> sesuai produknya. <br>
                            6. Setelah selesai tekan tombol <button class="btn btn-warning">Simpan</button>. <br>
                            7. Jadii deeh! Gambar berhasil ditambahkan. Setelah simpan berhasil biasanya anda akan diantar ke daftar umum semua galeri. Untuk melihat
                                secara spesifiknya bisa menuju menu produknya lagi.<br>
                        </p>

                        <h4> Editing Data </h4>
                        <p>
                            Untuk pengeditan data baik galeri, produk, maupun kategori perlu diperhatikan baik-baik langkah nya ya.<br>
                            1. Klik tombol <button class="btn btn-warning">Edit</button> pada produk/galeri/kategori yang ingin anda ubah <br>
                            2. Kemudian anda akan diantar menuju halaman formulir kembali.<br>
                            3. Perlu diperhatikan <strong>Gambar</strong> dan <strong>Merk/Tipe Produk</strong> harus diisi kembali, sebelum di simpan.
                                Hal ini penting diperhatikan, karena jika belum terisi maka proses edit data tidak bisa tersimpan.<br>
                            4. Jika semua sudah terisi dengan sesuai, anda bisa klik tombol <button class="btn btn-warning">Simpan</button> <br>
                        </p>

                        <h4> Deleting Data </h4>
                        <p>
                            Delete data pada halaman admin ini cukup mudah, karena hanya tinggal memencet tombol <button class="btn btn-danger">Delete</button>,
                            saja. <br>
                            Namun hati-hati, data yang akan anda hapus akan hilang selamanya dari Sistem Mewah Rent. Maka pastikan data yang akan anda hapus
                            merupakan data yang benar.<br>
                        </p>
                    </div>
                </div>
            </section>
            
        </div>
    </div>
         
         
</div>

@endsection
