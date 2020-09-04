# Registrasi_unib UnOfficial
# deskripsi singkat
library ini di buat untuk memudahkan pembuatan system registrasi mahasiswa unib melalui npm dan pin portal sehingga dapat memangkas waktu saat mengisi data.
perlu diingat bahwa npm dan password portal sangat di butuhkan jika salah maka data yang di ambil tidak akan berhasil.

# lisensi
library ini mengguanakan linsenSi yang open sorce namun terbatas tidak untuk projek komersial hanya digunakan untuk diri pribadi jika ketahuan maka akan di tindak lajuti secara hukum, PROJEK INI TIDAK PERNAH BEKERJA SAMA DENGAN PIHAK UNIB.AC.ID DALAM BENTUK APAPUN SEHINGGA SEGALA SOURCE INI DILUAR TANGGUNG JAWAB UNIB.AC.ID DAN SEPENUHNYA MENJADI TANGGUNG JAWAB PENGGUNA. 

# penggunaan
untuk menggunakan librari ini cukup simpel yaitu tinggal memanggil nama file dan jalankan fungsi berikut.

ini contoh jika login dengan npm dan pass portal
```
<?php 

require ('pak.php');

$curl = new zpmData();
$data = $curl->logNpm('npm','pass-pak');

$datanama = $data['nama'];

echo $datanama;

?>
```

ini contoh untuk login dengan nomor peserta dan password regmaba

```
<?php
require ('pak.php');

$curl = new zpmData();
$data = $curl->logPeserta('nomor_peserta','pass_regmaba');

$datanama = $data['nama'];

echo $datanama;

?>

```
atau bisa lihat di folder ```example``` untuk melihat contoh dalam bentuk aslinya.

# data yang di response
pada saat memanggil fungsi ``` logPeserta() atau logNpm``` wajib menyertakan 2 parameter yaitu NPM dan Password atau Nomor Peserta dan Password regmaba maka fungsi akan meresponse data sebgai berikut.

untuk response log dengan NPM portal
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

dan untuk response dengan nomor peserta ada penambhan data photo jika dengan metode ``` logPeserta() ```
```
        'pesan' 
        'nama'
        'gender'
        'agama' 
        'ttl'
        'goldar'
        'hp'
        'email' 
        'photo'
```
namun jika gagal bisa jadi salah password atau portal unib gangguan, atau juga karna ad masa review dosen maka akan muncul pesan

``` 
array(1) {
  ["pesan"]=>
  string(13) "Login Gagal.!"
}

```

data response semua berbentuk ``` array() ```.
