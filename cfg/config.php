<?php
$error = '';
date_default_timezone_set("Asia/Jakarta");
class config
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "tokoku";
        $user = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
    }
    public function showBarang()
    {
        $query = $this->db->prepare("SELECT * FROM barang ORDER BY create_at DESC LIMIT 50");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showPelayananDom()
    {
        $query = $this->db->prepare("SELECT * FROM dom ORDER BY create_at DESC LIMIT 25");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showPenduduk()
    {
        $query = $this->db->prepare("SELECT * FROM penduduk ORDER BY created_at DESC LIMIT 50");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function file()
    {
        $query = $this->db->prepare("SELECT * FROM templete_surat ORDER BY create_at DESC LIMIT 25");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function file2()
    {
        $query = $this->db->prepare("SELECT * FROM templete_surat WHERE pigma='public' ORDER BY create_at DESC LIMIT 25");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showPelayananSkbpm()
    {
        $query = $this->db->prepare("SELECT * FROM skbpm ORDER BY create_at DESC LIMIT 25");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showPelayananDomH()
    {
        $query = $this->db->prepare("SELECT * FROM domh ORDER BY create_at DESC LIMIT 25");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showPelayananSktm()
    {
        $query = $this->db->prepare("SELECT * FROM sktm ORDER BY create_at DESC LIMIT 25");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function showMaxNomorSuratSKU()
    {
        $query = $this->db->prepare("SELECT max(nomor_surat) as kodeTerbesar FROM sku");
        $query->execute();
        $data = $query->fetch();
        $kode = $data['kodeTerbesar'];
        $urutan = $kode;
        $urutan++;
        $kd = sprintf("%03s", $urutan);
        return $kd;
    }
    public function showMaxNomorSuratDOM()
    {
        $query = $this->db->prepare("SELECT max(nomor_surat) as kodeTerbesar FROM dom");
        $query->execute();
        $data = $query->fetch();
        $kode = $data['kodeTerbesar'];
        $urutan = $kode;
        $urutan++;
        $kd = sprintf("%03s", $urutan);
        return $kd;
    }
    public function showMaxNomorSuratDomH()
    {
        $query = $this->db->prepare("SELECT max(nomor_surat) as kodeTerbesar FROM domh");
        $query->execute();
        $data = $query->fetch();
        $kode = $data['kodeTerbesar'];
        $urutan = $kode;
        $urutan++;
        $kd = sprintf("%03s", $urutan);
        return $kd;
    }
    public function showMaxNomorSuratSKBPM()
    {
        $query = $this->db->prepare("SELECT max(nomor_surat) as kodeTerbesar FROM skbpm");
        $query->execute();
        $data = $query->fetch();
        $kode = $data['kodeTerbesar'];
        $urutan = $kode;
        $urutan++;
        $kd = sprintf("%03s", $urutan);
        return $kd;
    }
    public function showMaxNomorSuratSKTM()
    {
        $query = $this->db->prepare("SELECT max(nomor_surat) as kodeTerbesar FROM sktm");
        $query->execute();
        $data = $query->fetch();
        $kode = $data['kodeTerbesar'];
        $urutan = $kode;
        $urutan++;
        $kd = sprintf("%03s", $urutan);
        return $kd;
    }
    public function showMaxAkun()
    {
        $query = $this->db->prepare("SELECT max(id_akses) as kodeTerbesar FROM akses_login");
        $query->execute();
        $data = $query->fetch();
        return $data;
    }
    public function showMaxPenduduk()
    {
        $query = $this->db->prepare("SELECT max(id_pen) as kodeTerbesar FROM penduduk");
        $query->execute();
        $data = $query->fetch();
        return $data;
    }
    public function hitungPengguna()
    {
        $query = $this->db->prepare("SELECT COUNT(id_akses)
        FROM akses_login");
        $query->execute();
        $data = $query->fetchColumn();
        return $data;
    }
    public function hitungBelumBaca()
    {
        $query = $this->db->prepare("SELECT COUNT(id)
        FROM pesan where status_baca='belum'");
        $query->execute();
        $data = $query->fetchColumn();
        return $data;
    }
    public function hitungPelayananSku()
    {
        $query = $this->db->prepare("SELECT COUNT(id)
        FROM sku");
        $query->execute();
        $data = $query->fetchColumn();
        return $data;
    }
    public function hitungPelayananDOM()
    {
        $query = $this->db->prepare("SELECT COUNT(id)
        FROM dom");
        $query->execute();
        $data = $query->fetchColumn();
        return $data;
    }
    public function hitungPelayananDomH()
    {
        $query = $this->db->prepare("SELECT COUNT(id)
        FROM domh");
        $query->execute();
        $data = $query->fetchColumn();
        return $data;
    }
    public function hitungPelayananSkbpm()
    {
        $query = $this->db->prepare("SELECT COUNT(id)
        FROM skbpm");
        $query->execute();
        $data = $query->fetchColumn();
        return $data;
    }
    public function hitungPelayananSktm()
    {
        $query = $this->db->prepare("SELECT COUNT(id)
        FROM sktm");
        $query->execute();
        $data = $query->fetchColumn();
        return $data;
    }

    //SHOW AKUN
    public function showAkun()
    {
        $query = $this->db->prepare("SELECT * FROM akses_login ORDER BY create_at DESC LIMIT 25");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    //SHOW AKUN
    public function showPesan()
    {
        $query = $this->db->prepare("SELECT * FROM pesan ORDER BY create_at ASC LIMIT 50");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    //SHOW KONTAK
    public function showKontak()
    {
        $query = $this->db->prepare("SELECT * FROM kontak");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    //REGISTRASI AKUN
    public function registrasiAkun($id, $nama, $jk, $np, $user, $pass, $aks)
    {
        $createAT = date("Y-m-d");
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO akses_login (id_akses, nama, jenis_kelamin, nohp, userID, pass, akses, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $data->bindParam(1, $id);
            $data->bindParam(2, $nama);
            $data->bindParam(3, $jk);
            $data->bindParam(4, $np);
            $data->bindParam(5, $user);
            $data->bindParam(6, $pass);
            $data->bindParam(7, $aks);
            $data->bindParam(8, $createAT);

            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    //REGISTRASI AKUN
    public function registrasiPenduduk($id, $nik, $nokk, $namalengkap, $tmp, $tgl, $alamat, $jenis_k, $sp, $agama, $kwg, $pkr, $rt, $rw)
    {
        $createAT = date("Y-m-d");
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO penduduk (id_pen, nik, no_kk, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, status_perkawinan, agama, warga_negara, pekerjaan, alamat, rt, rw, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $data->bindParam(1, $id);
            $data->bindParam(2, $nik);
            $data->bindParam(3, $nokk);
            $data->bindParam(4, $namalengkap);
            $data->bindParam(5, $tmp);
            $data->bindParam(6, $tgl);
            $data->bindParam(7, $jenis_k);
            $data->bindParam(8, $sp);
            $data->bindParam(9, $agama);
            $data->bindParam(10, $kwg);
            $data->bindParam(11, $pkr);
            $data->bindParam(12, $alamat);
            $data->bindParam(13, $rt);
            $data->bindParam(14, $rw);
            $data->bindParam(15, $createAT);
            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    public function buatPesan($nama, $email, $message)
    {
        $createAT = date("Y-m-d H:i:s");
        $sts = 'belum';
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO pesan (nama_lengkap, email, pesan, status_baca, create_at) VALUES (?, ?, ?, ?, ?)');
            $data->bindParam(1, $nama);
            $data->bindParam(2, $email);
            $data->bindParam(3, $message);
            $data->bindParam(4, $sts);
            $data->bindParam(5, $createAT);

            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    public function registrasiPelayananSku($id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $nu, $au, $nop, $cvtgl)
    {
        $createAT = date('Y-m-d');
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO sku (nomor_surat, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, wargaNegara, agama, pekerjaan, alamat, no_nik_ktp, no_kk, keperluan, nama_usaha, alamat_usaha, no_surat_pengantar_RT, tgl, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $data->bindParam(1, $id);
            $data->bindParam(2, $nm);
            $data->bindParam(3, $ttl);
            $data->bindParam(4, $tgl_lahir_bf);
            $data->bindParam(5, $jenis_k);
            $data->bindParam(6, $wn);
            $data->bindParam(7, $agama);
            $data->bindParam(8, $pekerjaan);
            $data->bindParam(9, $alamat_domisili);
            $data->bindParam(10, $no_nik);
            $data->bindParam(11, $no_kk);
            $data->bindParam(12, $keperluan);
            $data->bindParam(13, $nu);
            $data->bindParam(14, $au);
            $data->bindParam(15, $nop);
            $data->bindParam(16, $cvtgl);
            $data->bindParam(17, $createAT);

            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    public function registrasiPelayananDom($id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $nop, $cvtgl)
    {
        $createAT = date('Y-m-d');
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO dom (nomor_surat, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, wargaNegara, agama, pekerjaan, alamat, no_nik_ktp, no_kk, keperluan, no_surat_pengantar_RT, tgl, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $data->bindParam(1, $id);
            $data->bindParam(2, $nm);
            $data->bindParam(3, $ttl);
            $data->bindParam(4, $tgl_lahir_bf);
            $data->bindParam(5, $jenis_k);
            $data->bindParam(6, $wn);
            $data->bindParam(7, $agama);
            $data->bindParam(8, $pekerjaan);
            $data->bindParam(9, $alamat_domisili);
            $data->bindParam(10, $no_nik);
            $data->bindParam(11, $no_kk);
            $data->bindParam(12, $keperluan);
            $data->bindParam(13, $nop);
            $data->bindParam(14, $cvtgl);
            $data->bindParam(15, $createAT);

            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    public function registrasiPelayananDomH($id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $nop, $cvtgl)
    {
        $createAT = date('Y-m-d');
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO domh (nomor_surat, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, wargaNegara, agama, pekerjaan, alamat, no_nik_ktp, no_kk, no_surat_pengantar_RT, tgl, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $data->bindParam(1, $id);
            $data->bindParam(2, $nm);
            $data->bindParam(3, $ttl);
            $data->bindParam(4, $tgl_lahir_bf);
            $data->bindParam(5, $jenis_k);
            $data->bindParam(6, $wn);
            $data->bindParam(7, $agama);
            $data->bindParam(8, $pekerjaan);
            $data->bindParam(9, $alamat_domisili);
            $data->bindParam(10, $no_nik);
            $data->bindParam(11, $no_kk);
            $data->bindParam(12, $nop);
            $data->bindParam(13, $cvtgl);
            $data->bindParam(14, $createAT);

            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    // tambah barang
    public function tambahBarang($id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $kl, $nop, $nopr, $cvtgl)
    {
        $createAT = date('Y-m-d');
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO barang(nomor_surat, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, wargaNegara, agama, pekerjaan, alamat, no_nik_ktp, no_kk, keperluan, tambah_keluhan, no_surat_pengantar_RT, no_surat_rw, tgl, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $data->bindParam(1, $id);
            $data->bindParam(2, $nm);
            $data->bindParam(3, $ttl);
            $data->bindParam(4, $tgl_lahir_bf);
            $data->bindParam(5, $jenis_k);
            $data->bindParam(6, $wn);
            $data->bindParam(7, $agama);
            $data->bindParam(8, $pekerjaan);
            $data->bindParam(9, $alamat_domisili);
            $data->bindParam(10, $no_nik);
            $data->bindParam(11, $no_kk);
            $data->bindParam(12, $keperluan);
            $data->bindParam(13, $kl);
            $data->bindParam(14, $nop);
            $data->bindParam(15, $nopr);
            $data->bindParam(16, $cvtgl);
            $data->bindParam(17, $createAT);

            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    public function registrasiPelayananSkbpm($id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $nop, $nopr, $cvtgl)
    {
        $createAT = date('Y-m-d');
        if (!isset($error)) {
            $data = $this->db->prepare('INSERT INTO skbpm (nomor_surat, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, wargaNegara, agama, pekerjaan, alamat, no_nik_ktp, no_kk, keperluan, no_surat_pengantar_RT, surat_rw, tgl, create_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $data->bindParam(1, $id);
            $data->bindParam(2, $nm);
            $data->bindParam(3, $ttl);
            $data->bindParam(4, $tgl_lahir_bf);
            $data->bindParam(5, $jenis_k);
            $data->bindParam(6, $wn);
            $data->bindParam(7, $agama);
            $data->bindParam(8, $pekerjaan);
            $data->bindParam(9, $alamat_domisili);
            $data->bindParam(10, $no_nik);
            $data->bindParam(11, $no_kk);
            $data->bindParam(12, $keperluan);
            $data->bindParam(13, $nop);
            $data->bindParam(14, $nopr);
            $data->bindParam(15, $cvtgl);
            $data->bindParam(16, $createAT);

            $data->execute();
            return $data->rowCount();
        } else {
            echo "<script>alert('Gagal Mengirim Pesan!')</script>" . $error;
            exit();
        }
    }
    public function uploadTemplete(
        $file,
        $ukuran_file,
        $tmp,
        $pigma
    ) {
        $createAT = date('Y-m-d');
        $files_names = $file;
        $path = "../../templete_surat/" . $files_names;
        // get the file extension
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $limit = 90 * 1024 * 1024;
        if (!in_array($extension, ['pdf', 'docx', 'doc'])) {
            echo "<script type='text/javascript'>alert('file yang diupload harus ber ekstensi .pdf, .docx, .doc');window.location.href = '../admin/form_upload.php';</script>";
        } else {
            if ($ukuran_file <= $limit) {
                if (move_uploaded_file($tmp, $path)) {
                    $sql = $this->db->prepare("INSERT INTO templete_surat(nama_file, pigma, create_at) VALUES(:names, :pigma, :createAt)");
                    $sql->bindParam(':names', $files_names);
                    $sql->bindParam(':pigma', $pigma);
                    $sql->bindParam(':createAt', $createAT);
                    $sql->execute();

                    if ($sql) {
                        echo "<script type='text/javascript'>alert('Berhasil Upload File!');window.location.href = '../admin/templete.php';</script>"; //redirect halaman
                    } else {
                        echo "<script type='text/javascript'>alert('Gagal Upload File!');window.location.href = '../admin/form_upload.php';</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('Gagal memasukan file kedalam folder!');window.location.href = '../admin/form_upload.php';</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Size tidak boleh lebih dari 2 Mb!');window.location.href = '../akses/admin/form_upload.php';</script>";
            }
        }
    }

    public function ubahFileSurat(
        $idx,
        $file,
        $ukuran_file,
        $tmp,
        $pigma
    ) {
        $updateAT = date("Y-m-d");
        if (empty($file)) {
            $queryUpdate = $this->db->prepare('UPDATE templete_surat set pigma=?, update_at=?  where id=?');
            $queryUpdate->bindParam(1, $pigma);
            $queryUpdate->bindParam(2, $updateAT);
            $queryUpdate->bindParam(3, $idx);
            $queryUpdate->execute();
            if ($queryUpdate) {
                echo "<script type='text/javascript'>alert('Berhasil Mengubah Data!');window.location.href = '../admin/templete.php';</script>"; //redirect halaman
            } else {
                echo "<script type='text/javascript'>alert('Gagal Mengubah Data!');window.location.href = '../admin/ubah_file.php';</script>";
            }
        } else {
            $path = "../../templete_surat/" . $file;
            $limit = 90 * 1024 * 1024;
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array($extension, ['pdf', 'docx', 'doc'])) {
                if ($ukuran_file <= $limit) {
                    if (move_uploaded_file($tmp, $path)) {
                        $query = $this->db->prepare("SELECT * FROM templete_surat where id=?");
                        $query->bindParam(1, $idx);
                        $query->execute();
                        $data = $query->fetch();
                        if (is_file("../../templete_surat/" . $data['nama_file'])) {
                            unlink("../../templete_surat/" . $data['nama_file']);
                        }
                        $sql = $this->db->prepare("UPDATE templete_surat SET nama_file=:files, pigma=:pigmax, update_at=:updateAt WHERE id=:idx");
                        $sql->bindParam(':files', $file);
                        $sql->bindParam(':pigmax', $pigma);
                        $sql->bindParam(':updateAt', $updateAT);
                        $sql->bindParam(':idx', $idx);
                        $sql->execute();
                        if ($sql) {
                            echo "<script type='text/javascript'>alert('Berhasil Mengubah Data!');window.location.href = '../admin/templete.php';</script>"; //redirect halaman
                        } else {
                            echo "<script type='text/javascript'>alert('Gagal Mengubah Data!');window.location.href = '../admin/ubah_file.php?ubah='" . $idx . ";</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('Gagal memasukan file kedalam folder!');window.location.href = '../admin/ubah_file.php?ubah=" . $idx . "';</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('file yang diupload harus ber ekstensi .pdf, .docx, .doc');window.location.href = '../admin/ubah_file.php?ubah=" . $idx . "';</script>";
                }
            } else {
            }
        }
    }

    //delete templete
    public function deleteTemplete($kd)
    {
        $sql = $this->db->prepare("SELECT nama_file FROM templete_surat WHERE id=:idx");
        $sql->bindParam(':idx', $kd);
        $sql->execute();
        $data = $sql->fetch();
        if (is_file("../../templete_surat/" . $data['nama_file']))
            unlink("../../templete_surat/" . $data['nama_file']);
        $query = $this->db->prepare("DELETE FROM templete_surat where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->rowCount();
    }
    public function CariDataPetugas($cari)
    {
        $query = $this->db->prepare("SELECT * FROM akses_login where nama like '%" . $cari . "%' or nohp like '%" . $cari . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariDataSKU($cari2)
    {
        $query = $this->db->prepare("SELECT * FROM sku where nama_lengkap like '%" . $cari2 . "%' or no_nik_ktp like '%" . $cari2 . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariDataPenduduk($cari)
    {
        $query = $this->db->prepare("SELECT * FROM penduduk where nik like '%" . $cari . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariDataPenduduk2($cari)
    {
        $query = $this->db->prepare("SELECT * FROM penduduk where nik like '%" . $cari . "%'");
        $query->execute();
        $data = $query->fetch();
        return $data;
    }
    public function CariDataPesan($cari8)
    {
        $query = $this->db->prepare("SELECT * FROM pesan where nama_lengkap like '%" . $cari8 . "%' or email like '%" . $cari8 . "%' or status_baca like '%" . $cari8 . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariDataSKTM($cari3)
    {
        $query = $this->db->prepare("SELECT * FROM sktm where nama_lengkap like '%" . $cari3 . "%' or no_nik_ktp like '%" . $cari3 . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariDataDOM($cari4)
    {
        $query = $this->db->prepare("SELECT * FROM dom where nama_lengkap like '%" . $cari4 . "%' or no_nik_ktp like '%" . $cari4 . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariDataDOMH($cari5)
    {
        $query = $this->db->prepare("SELECT * FROM domh where nama_lengkap like '%" . $cari5 . "%' or no_nik_ktp like '%" . $cari5 . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariDataSKBPM($cari6)
    {
        $query = $this->db->prepare("SELECT * FROM skbpm where nama_lengkap like '%" . $cari6 . "%' or no_nik_ktp like '%" . $cari6 . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function CariFile($cari7)
    {
        $query = $this->db->prepare("SELECT * FROM templete_surat where nama_file like '%" . $cari7 . "%'");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    public function deleteAkun($kd)
    {
        $query = $this->db->prepare("DELETE FROM barang where id_akses=?");

        $query->bindParam(1, $kd);

        $query->execute();
        return $query->rowCount();
    }
    public function deleteBarang($kd)
    {
        $query = $this->db->prepare("DELETE FROM barang where id_barang=?");

        $query->bindParam(1, $kd);

        $query->execute();
        return $query->rowCount();
    }
    public function deletePelayananSku($kd)
    {
        $query = $this->db->prepare("DELETE FROM sku where id=?");

        $query->bindParam(1, $kd);

        $query->execute();
        return $query->rowCount();
    }
    public function deletePelayananDom($kd)
    {
        $query = $this->db->prepare("DELETE FROM dom where id=?");

        $query->bindParam(1, $kd);

        $query->execute();
        return $query->rowCount();
    }
    public function deletePelayananDomH($kd)
    {
        $query = $this->db->prepare("DELETE FROM domh where id=?");

        $query->bindParam(1, $kd);

        $query->execute();
        return $query->rowCount();
    }
    public function deletePelayananSkbpm($kd)
    {
        $query = $this->db->prepare("DELETE FROM skbpm where id=?");

        $query->bindParam(1, $kd);

        $query->execute();
        return $query->rowCount();
    }
    public function deletePelayananSktm($kd)
    {
        $query = $this->db->prepare("DELETE FROM sktm where id=?");

        $query->bindParam(1, $kd);

        $query->execute();
        return $query->rowCount();
    }
    public function get_by_id($kd)
    {
        $query = $this->db->prepare("SELECT * FROM sku where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_by_id_penduduk($kd)
    {
        $query = $this->db->prepare("SELECT * FROM penduduk where id_pen=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_file($kd)
    {
        $query = $this->db->prepare("SELECT * FROM templete_surat where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_by_userID($user)
    {
        $query = $this->db->prepare("SELECT * FROM akses_login where userID=?");
        $query->bindParam(1, $user);
        $query->execute();
        return $query->rowCount();
    }
    public function get_by_id_sktm($kd)
    {
        $query = $this->db->prepare("SELECT * FROM sktm where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_by_id_kontak($kd)
    {
        $query = $this->db->prepare("SELECT * FROM kontak where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_by_dom($kd)
    {
        $query = $this->db->prepare("SELECT * FROM dom where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_by_DomH($kd)
    {
        $query = $this->db->prepare("SELECT * FROM domh where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_by_skbpm($kd)
    {
        $query = $this->db->prepare("SELECT * FROM skbpm where id=?");
        $query->bindParam(1, $kd);
        $query->execute();
        return $query->fetch();
    }
    public function get_by_id_account($kd_pengguna)
    {
        $query = $this->db->prepare("SELECT * FROM akses_login where id_akses=?");
        $query->bindParam(1, $kd_pengguna);
        $query->execute();
        return $query->fetch();
    }
    public function updateDataPelayananSku($idx, $id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $nu, $au, $nop, $cvtgl)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE sku set nomor_surat=?, nama_lengkap=?, tempat_lahir=?, tgl_lahir=?, jenis_kelamin=?, wargaNegara=?, agama=?, pekerjaan=?, alamat=?, no_nik_ktp=?, no_kk=?, keperluan=?, nama_usaha=?, alamat_usaha=?, no_surat_pengantar_RT=?, tgl=?, update_at=?  where id=?');
        $queryUpdate->bindParam(1, $id);
        $queryUpdate->bindParam(2, $nm);
        $queryUpdate->bindParam(3, $ttl);
        $queryUpdate->bindParam(4, $tgl_lahir_bf);
        $queryUpdate->bindParam(5, $jenis_k);
        $queryUpdate->bindParam(6, $wn);
        $queryUpdate->bindParam(7, $agama);
        $queryUpdate->bindParam(8, $pekerjaan);
        $queryUpdate->bindParam(9, $alamat_domisili);
        $queryUpdate->bindParam(10, $no_nik);
        $queryUpdate->bindParam(11, $no_kk);
        $queryUpdate->bindParam(12, $keperluan);
        $queryUpdate->bindParam(13, $nu);
        $queryUpdate->bindParam(14, $au);
        $queryUpdate->bindParam(15, $nop);
        $queryUpdate->bindParam(16, $cvtgl);
        $queryUpdate->bindParam(17, $updateAT);
        $queryUpdate->bindParam(18, $idx);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function perbaharuiKontak($idx, $almtx, $kontak1, $kontak2, $kontak3, $emailx)
    {
        $queryUpdate = $this->db->prepare('UPDATE kontak set alamat=?, whatsapp=?, telephone=?, faks=?, email=?  where id=?');
        $queryUpdate->bindParam(1, $almtx);
        $queryUpdate->bindParam(2, $kontak1);
        $queryUpdate->bindParam(3, $kontak2);
        $queryUpdate->bindParam(4, $kontak3);
        $queryUpdate->bindParam(5, $emailx);
        $queryUpdate->bindParam(6, $idx);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function updateDataPelayananDom($idx, $id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $nop, $cvtgl)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE dom set nomor_surat=?, nama_lengkap=?, tempat_lahir=?, tgl_lahir=?, jenis_kelamin=?, wargaNegara=?, agama=?, pekerjaan=?, alamat=?, no_nik_ktp=?, no_kk=?, keperluan=?, no_surat_pengantar_RT=?, tgl=?, update_at=?  where id=?');
        $queryUpdate->bindParam(1, $id);
        $queryUpdate->bindParam(2, $nm);
        $queryUpdate->bindParam(3, $ttl);
        $queryUpdate->bindParam(4, $tgl_lahir_bf);
        $queryUpdate->bindParam(5, $jenis_k);
        $queryUpdate->bindParam(6, $wn);
        $queryUpdate->bindParam(7, $agama);
        $queryUpdate->bindParam(8, $pekerjaan);
        $queryUpdate->bindParam(9, $alamat_domisili);
        $queryUpdate->bindParam(10, $no_nik);
        $queryUpdate->bindParam(11, $no_kk);
        $queryUpdate->bindParam(12, $keperluan);
        $queryUpdate->bindParam(13, $nop);
        $queryUpdate->bindParam(14, $cvtgl);
        $queryUpdate->bindParam(15, $updateAT);
        $queryUpdate->bindParam(16, $idx);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function updateDataPelayananDomH($idx, $id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $nop, $cvtgl)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE dom set nomor_surat=?, nama_lengkap=?, tempat_lahir=?, tgl_lahir=?, jenis_kelamin=?, wargaNegara=?, agama=?, pekerjaan=?, alamat=?, no_nik_ktp=?, no_kk=?, no_surat_pengantar_RT=?, tgl=?, update_at=?  where id=?');
        $queryUpdate->bindParam(1, $id);
        $queryUpdate->bindParam(2, $nm);
        $queryUpdate->bindParam(3, $ttl);
        $queryUpdate->bindParam(4, $tgl_lahir_bf);
        $queryUpdate->bindParam(5, $jenis_k);
        $queryUpdate->bindParam(6, $wn);
        $queryUpdate->bindParam(7, $agama);
        $queryUpdate->bindParam(8, $pekerjaan);
        $queryUpdate->bindParam(9, $alamat_domisili);
        $queryUpdate->bindParam(10, $no_nik);
        $queryUpdate->bindParam(11, $no_kk);
        $queryUpdate->bindParam(12, $nop);
        $queryUpdate->bindParam(13, $cvtgl);
        $queryUpdate->bindParam(14, $updateAT);
        $queryUpdate->bindParam(15, $idx);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function tandaiBaca($kd, $user)
    {
        $sts = 'sudah';
        $updateAT = date("Y-m-d H:i:s");
        $queryUpdate = $this->db->prepare('UPDATE pesan set dibaca_oleh=?, status_baca=?, tanggal_baca=? where id=?');
        $queryUpdate->bindParam(1, $user);
        $queryUpdate->bindParam(2, $sts);
        $queryUpdate->bindParam(3, $updateAT);
        $queryUpdate->bindParam(4, $kd);


        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function updateDataPelayananSKTM($idx, $id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $kl, $nop, $nopr, $cvtgl)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE sktm set nomor_surat=?, nama_lengkap=?, tempat_lahir=?, tgl_lahir=?, jenis_kelamin=?, wargaNegara=?, agama=?, pekerjaan=?, alamat=?, no_nik_ktp=?, no_kk=?, keperluan=?, tambah_keluhan=?, no_surat_pengantar_RT=?, no_surat_rw=?,  tgl=?, update_at=?  where id=?');
        $queryUpdate->bindParam(1, $id);
        $queryUpdate->bindParam(2, $nm);
        $queryUpdate->bindParam(3, $ttl);
        $queryUpdate->bindParam(4, $tgl_lahir_bf);
        $queryUpdate->bindParam(5, $jenis_k);
        $queryUpdate->bindParam(6, $wn);
        $queryUpdate->bindParam(7, $agama);
        $queryUpdate->bindParam(8, $pekerjaan);
        $queryUpdate->bindParam(9, $alamat_domisili);
        $queryUpdate->bindParam(10, $no_nik);
        $queryUpdate->bindParam(11, $no_kk);
        $queryUpdate->bindParam(12, $keperluan);
        $queryUpdate->bindParam(13, $kl);
        $queryUpdate->bindParam(14, $nop);
        $queryUpdate->bindParam(15, $nopr);
        $queryUpdate->bindParam(16, $cvtgl);
        $queryUpdate->bindParam(17, $updateAT);
        $queryUpdate->bindParam(18, $idx);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function updateDataPenduduk($id, $nik, $nokk, $namalengkap, $tmp, $tgl, $alamat, $jenis_k, $sp, $agama, $kwg, $pkr, $rt, $rw)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE penduduk set nik=?, no_kk=?, nama_lengkap=?, tempat_lahir=?, tanggal_lahir=?, jenis_kelamin=?, status_perkawinan=?, agama=?, warga_negara=?, pekerjaan=?, alamat=?, rt=?,  rw=?, update_at=?  where id_pen=?');
        $queryUpdate->bindParam(1, $nik);
        $queryUpdate->bindParam(2, $nokk);
        $queryUpdate->bindParam(3, $namalengkap);
        $queryUpdate->bindParam(4, $tmp);
        $queryUpdate->bindParam(5, $tgl);
        $queryUpdate->bindParam(6, $jenis_k);
        $queryUpdate->bindParam(7, $sp);
        $queryUpdate->bindParam(8, $agama);
        $queryUpdate->bindParam(9, $kwg);
        $queryUpdate->bindParam(10, $pkr);
        $queryUpdate->bindParam(11, $alamat);
        $queryUpdate->bindParam(12, $rt);
        $queryUpdate->bindParam(13, $rw);
        $queryUpdate->bindParam(14, $updateAT);
        $queryUpdate->bindParam(15, $id);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function updateDataPelayananSKBPM($idx, $id, $nm, $ttl, $tgl_lahir_bf, $jenis_k, $wn, $agama, $pekerjaan, $alamat_domisili, $no_nik, $no_kk, $keperluan, $nop, $nopr, $cvtgl)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE skbpm set nomor_surat=?, nama_lengkap=?, tempat_lahir=?, tgl_lahir=?, jenis_kelamin=?, wargaNegara=?, agama=?, pekerjaan=?, alamat=?, no_nik_ktp=?, no_kk=?, keperluan=?, no_surat_pengantar_RT=?, surat_rw=?,  tgl=?, update_at=?  where id=?');
        $queryUpdate->bindParam(1, $id);
        $queryUpdate->bindParam(2, $nm);
        $queryUpdate->bindParam(3, $ttl);
        $queryUpdate->bindParam(4, $tgl_lahir_bf);
        $queryUpdate->bindParam(5, $jenis_k);
        $queryUpdate->bindParam(6, $wn);
        $queryUpdate->bindParam(7, $agama);
        $queryUpdate->bindParam(8, $pekerjaan);
        $queryUpdate->bindParam(9, $alamat_domisili);
        $queryUpdate->bindParam(10, $no_nik);
        $queryUpdate->bindParam(11, $no_kk);
        $queryUpdate->bindParam(12, $keperluan);
        $queryUpdate->bindParam(13, $nop);
        $queryUpdate->bindParam(14, $nopr);
        $queryUpdate->bindParam(15, $cvtgl);
        $queryUpdate->bindParam(16, $updateAT);
        $queryUpdate->bindParam(17, $idx);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function updatePengguna($id, $nama, $jk, $np, $aks)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE akses_login set nama=?, jenis_kelamin=?, nohp=?, akses=?, update_at=?  where id_akses=?');

        $queryUpdate->bindParam(1, $nama);
        $queryUpdate->bindParam(2, $jk);
        $queryUpdate->bindParam(3, $np);
        $queryUpdate->bindParam(4, $aks);
        $queryUpdate->bindParam(5, $updateAT);
        $queryUpdate->bindParam(6, $id);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
    public function updatePasswordPengguna($id, $pass)
    {
        $updateAT = date("Y-m-d");
        $queryUpdate = $this->db->prepare('UPDATE akses_login set pass=?, update_at=?  where id_akses=?');

        $queryUpdate->bindParam(1, $pass);
        $queryUpdate->bindParam(2, $updateAT);
        $queryUpdate->bindParam(3, $id);

        $queryUpdate->execute();
        return $queryUpdate->rowCount();
    }
}
