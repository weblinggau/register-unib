<?php 

class zpmData{
	private function curlLog($username,$password,$role){

		if ($role == 'portal') {
			$dat = array(
				'username' => $username,
				'password' => $password
			);
			define('LOGIN_FORM_URL', 'https://pak.unib.ac.id/');
			define('LOGIN_ACTION_URL', 'https://pak.unib.ac.id/index.php?pModule=zdKbnKU=&pSub=zdKbnKU=&pAct=0dWjppyl');
			define('LOGIN_PAGE', 'https://pak.unib.ac.id/index.php?pModule=1taZpQ==&pSub=0dWjmaCemQ==&pAct=18yZqg==');
			define('COOKIE_FILE', 'cookie.txt');
		}elseif ($role == 'regmaba') {
			$dat = array(
				'username' => 'debug',
				'password' => $password,
				'Nopes' => $username
			);
			define('LOGIN_FORM_URL', 'https://regmaba.unib.ac.id/index.php?m=content&p=login_lihat_ukt_snmptn');
			define('LOGIN_ACTION_URL', 'https://regmaba.unib.ac.id/registrasi/content/proseslogin_lihat.php');
			define('LOGIN_PAGE', 'https://regmaba.unib.ac.id/registrasi/content/tampil_data.php');
			define('COOKIE_FILE', 'cookie.txt');
		}

		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
	 	curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($dat));
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIE_FILE);
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_REFERER, LOGIN_FORM_URL);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
		curl_exec($curl);
		curl_setopt($curl, CURLOPT_URL, LOGIN_PAGE);
		$hasil = curl_exec($curl);
		return $hasil;
	}

	public function logNpm($user,$pass){
		$curl = $this->curlLog($user,$pass,'portal');
		$hasil = $curl;
		$exp1 = explode('<td>', $hasil);
		$h4 = explode('<h4>', $hasil);
		$nimex = explode('</td>', $exp1[1]);
		$namx = explode('</td>', $exp1[2]);
		$ttlx = explode('</td>', $exp1[4]);
		$agmx = explode('</td>', $exp1[5]);
		$jlx = explode('</td>', $exp1[6]);
		$ktpx = explode('</td>', $exp1[7]);
		$sltax = explode('</td>', $exp1[9]);
		$ortux = explode('</td>', $exp1[11]);
		$prod = explode('</h4>', $h4[2]);
		$nim = $nimex[0];
		$nama = $namx[0];
		$prodi = $prod[0];
		$ttl = $ttlx[0];
		$agma = $agmx[0];
		$gender = $jlx[0];
		$ktp = $ktpx[0];
		$asal = $sltax[0];
		$ortu = $ortux[0];
		if (empty($nim)) {
			$result = array(
				    'pesan' => 'error',
				);
		}else{
			$result = array(
				    'pesan' => 'berhasil',
				    'npm' => $nim,
				    'nama' => $nama,
				    'prodi' => $prodi,
				    'ttl' => $ttl,
				    'agama' => $agma,
				    'kelamin' => $gender,
				    'ktp' => $ktp,
				    'slta' => $asal,
				    'ortu' => $ortu
				);
		}
		return $result;
	}

	public function logPeserta($user,$pass){
		$curl = $this->curlLog($user,$pass,'regmaba');
		$nm = explode('<td>', $curl);
		$nm1 = explode('</td>', $nm[3]);
		$nm2 = explode('"', $nm1[0]);
		$nama = $nm2[5];

		$js = explode('</td>', $nm[9]);
		$js1 = explode('"', $js[0]);
		$gender = $js1[11];

		$agm = explode('</td>', $nm[12]);
		$agm1 = explode('"', $agm[0]);
		$agama = $agm1[27];

		$ttl = explode('</td>', $nm[23]);
		$ttl1 = explode('"', $ttl[0]);
		$tgl = $ttl1[13];

		$gd = explode('</td>', $nm[26]);
		$gd1 = explode('"', $gd[0]);
		$goldar = $gd1[27];

		$nop = explode('</td>', $nm[53]);
		$nop1 = explode('"', $nop[0]);
		$hp = $nop1[9];

		$mail = explode('</td>', $nm[59]);
		$mail1 = explode('"', $mail[0]);
		$email = $mail1[11];

		if (empty($gender)) {
			$data = array(
				'pesan' => 'expired',
				'try' => 'coba gunakan metode ktm',
				'nama' => $nama,
				'photo' => 'https://regmaba.unib.ac.id/content/ktm/img/foto/'.$user.'/'.$user.'.jpg'
						 );
		}else{
			$data = array(
				'pesan' => 'sukses',
				'nama' => $nama,
				'gender' => $gender,
				'agama' => $agama,
				'ttl' => $tgl,
				'goldar' => $goldar,
				'hp' => $hp,
				'email' => $email,
				'photo' => 'https://regmaba.unib.ac.id/content/ktm/img/foto/'.$user.'/'.$user.'.jpg' 
			);
		}

		return $data;
	}

}

?>