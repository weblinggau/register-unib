# deskripsi singkat
library ini di buat untuk memudahkan pembuatan system registrasi mahasiswa unib melalui npm dan pin portal sehingga dapat memangkas waktu saat mengisi data.
perlu diingat bahwa npm dan password portal sangat di butuhkan jika salah maka data yang di ambil tidak akan berhasil.

# lisensi
library ini mengguanakan linsesni yang open sorce namun terbatas tidak untuk projek komersial hanya digunakan untuk diri pribadi jika ketahuan maka akan di tindak lajuti secara hukum. 

# penggunaan
untuk menggunakan librari ini cukup simpel yaitu tinggal memanggil nama file dan jalankan fungsi 
```
<?php 

require ('pak.php');

$data = dataPortal('npm','pass-pak');

$datanama = $data['nama'];

echo $datanama;

?>
```
atau bisa lihat di folder ```example``` untuk melihat contoh dalam bentuk aslinya.

# data yang di response
pada saat memanggil fungsi ``` dataPortal() ``` wajib menyertakan 2 parameter yaitu NPM dan Password maka fungsi akan meresponse data sebgai berikut
``` 
array(10) {
  ["pesan"]=>
  string(8) "berhasil"
  ["npm"]=>
  string(8) "data npm"
  ["nama"]=>
  string(4) "nama"
  ["prodi"]=>
  string(5) "prodi"
  ["ttl"]=>
  string(3) "ttl"
  ["agama"]=>
  string(5) "agama"
  ["kelamin"]=>
  string(6) "gender"
  ["ktp"]=>
  string(3) "ktp"
  ["sekola asal"]=>
  string(11) "asal sekola"
  ["ortu"]=>
  string(9) "nama ayah"
}

```

namun jika gagal bisa jadi salah password atau portal unib gangguan, atau juga karna ad masa review dosen maka akan muncul pesan

``` 
array(1) {
  ["pesan"]=>
  string(13) "Login Gagal.!"
}

```

data response semua berbentuk ``` array() ```.
