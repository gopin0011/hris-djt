<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Pelamar - @foreach ($user as $a) {{ $a->name }} @endforeach</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:20px;
            margin-bottom:15px;
        }
        table{
            border:0px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        th{
            padding:3px;
            border:1px solid #aaaaaa;  
            font-size: 10pt;
            background-color: #cccccc;
        }
        
        tr{
            padding:3px;  
            font-size: 10pt;
        }

        td {
            padding:3px;
            font-size: 10pt;
        }

        h4, p{
            margin:0px;
            
        }
        table{
            border: 0px;
            margin-left: 1cm;
            margin-right: 2cm;
        }
        
        tbody{
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }
        @page { margin: 150px 50px; }
        header { position: fixed; top: -60px; left: 0px; right: 0px; height: 50px; }
        footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px; }
        p { page-break-after: always; }
        p:last-child { page-break-after: never; }
    </style>
</head>

<body>
    <header>
        <table>
            <tr>
                <td style="text-align: left"><img src="dwida.png" width="250"></td>
                <td><h2>APLIKASI PELAMAR</h2></td>
            </tr>
        </table>
    </header>

    <table>
        <tbody>
            @foreach ($application as $row)
            <tr>
                <td colspan="3" style="text-align: left">Posisi yang dilamar</td>
                <td style="width:10px">:</td> 
                <td colspan="2" style="text-align: left">{{ Crypt::decryptString($row->posisi) }}</td>  
            </tr>
            <tr>
                <td colspan="3" style="text-align: left">Posisi lain yang diminati</td>
                <td style="width:10px">:</td> 
                <td colspan="2" style="text-align: left">{{ Crypt::decryptString($row->posisialt) }}</td>  
            </tr>
            <tr>
                <td colspan="3" style="text-align: left">Sumber informasi lowongan</td>
                <td style="width:10px">:</td> 
                <td colspan="2" style="text-align: left">{{ Crypt::decryptString($row->info) }}</td>  
            </tr>
            <tr>
                <td colspan="3" style="text-align: left">Memiliki kerabat/saudara di PT. Dwida Jaya Tama</td>
                <td style="width:10px">:</td> 
                <td colspan="2" style="text-align: left">
                    @if( $row->kerabat == null)
                        {{ 'Tidak' }}
                    @else
                        {{ 'Ya' }}
                    @endif
                </td>  
            </tr>

            @if( $row->kerabat == null)
            
            @else
            <tr>
                <td colspan="3" style="text-align: left">Jika "Ya", tuliskan nama dan posisinya</td>
                <td style="width:10px">:</td> 
                <td colspan="2" style="text-align: left">{{ Crypt::decryptString($row->kerabat) }}</td>  
            </tr>
            @endif
            
            <tr>
                <td colspan="3" style="text-align: left">
                @if( $row->jadwalhari == null)
                    {{ 'Keterangan' }}
                @else
                    {{ 'Jadwal interview' }}
                @endif
                </td>
                <td style="width:10px">:</td> 
                <td colspan="2" style="text-align: left">
                @if( $row->jadwalhari == null)
                    <strong style="color:red">{{ 'Dokumen sedang diverifikasi' }}</strong>
                @else
                <strong>{{ Crypt::decryptString($row->jadwalhari) }} {{ Crypt::decryptString($row->jadwalbulan) }} {{ Crypt::decryptString($row->jadwaltahun) }}</strong>
                @endif
                </td>  
            </tr>
            <tr>
                <td style="color: white">.</td>
                <td style="color: white">.</td>
                <td style="color: white">.</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="6" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>IDENTITAS DIRI</h4></td>
            </tr>
            @foreach ($user as $user)
            @foreach ($profile as $row)
            <tr>
                <td colspan="2" style="text-align: left; width:275px">Nama Lengkap / Panggilan</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ $user->name }} / {{ Crypt::decryptString($row->panggilan) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">e-Mail</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ $user->email }}</td>  
            </tr>
            @endforeach

            <tr>
                <td colspan="2" style="text-align: left">Nomor Kontak</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->kontak) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Tempat, Tanggal Lahir (yyyy-mm-dd)</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->tempatlahir) }}, {{ Crypt::decryptString($row->hari) }} {{ Crypt::decryptString($row->bulan) }} {{ Crypt::decryptString($row->tahun) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Jenis Kelamin</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->gender) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Kewarganegaraan</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->warganegara) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Agama</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->agama) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Golongan Darah</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->darah) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Alamat sesuai KTP</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->alamat) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Alamat Domisili</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->domisili) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Status</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->status) }}</td>  
            </tr>
            <tr>
                <td colspan="2" style="text-align: left">Hobi</td>
                <td style="width:10px">:</td> 
                <td colspan="3" style="text-align: left">{{ Crypt::decryptString($row->hobi) }}</td>  
            </tr>
            @endforeach
        </tbody>
        <tr>
            <td colspan="6" style="color: white">.</td>
        </tr>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="6" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>LATAR BELAKANG KELUARGA</h4></td>
            </tr>
            <tr>
                <th style="border:1pt solid #000000">Nama</th>
                <th style="width: 75px;border:1pt solid #000000">Hubungan</th>
                <th style="width: 30px;border:1pt solid #000000">Jenis Kelamin</th>
                <th style="width: 125px;border:1pt solid #000000">TTL</th>
                <th style="width: 75px;border:1pt solid #000000">Pendidikan</th>
                <th style="width: 75px;border:1pt solid #000000">Pekerjaan</th>
            </tr>
            @forelse ($family as $row)
            <tr>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->nama) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->status) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->gender) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->ttl) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->pendidikan) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->pekerjaan) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data tidak lengkap</td>
            </tr> 
            @endforelse             
        </tbody>
        <tr>
            <td colspan="6" style="color: white">.</td>
        </tr>
    </table>
    <div class="page-break"></div>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="6" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>LATAR BELAKANG PENDIDIKAN FORMAL</h4></td>
            </tr>
            <tr>
                <th style="width: 75px;border:1pt solid #000000">Jenjang</th>
                <th style="border:1pt solid #000000">Nama Sekolah</th>
                <th style="width: 125px;border:1pt solid #000000">Kota</th>
                <th style="width: 75px;border:1pt solid #000000">Jurusan/Fakultas</th>
                <th style="width: 75px;border:1pt solid #000000">Masuk</th>
                <th style="width: 75px;border:1pt solid #000000">Keluar</th>
            </tr>
            @forelse ($study as $row)
            <tr>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->tingkat) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->nama) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->kota) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->jurfak) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->masuk) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->keluar) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data tidak lengkap</td>
            </tr> 
            @endforelse           
        </tbody>
        <tr>
            <td colspan="6" style="color: white">.</td>
        </tr>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="5" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>PENDIDIKAN NON-FORMAL (KURSUS / SEMINAR / PENATARAN)</h4></td>
            </tr>
            <tr>
                <th style="border:1pt solid #000000">Pendidikan</th>
                <th style="width: 75px;border:1pt solid #000000">Tahun</th>
                <th style="width: 75px;border:1pt solid #000000">Durasi</th>
                <th style="width: 75px;border:1pt solid #000000">Ijazah</th>
                <th style="width: 75px;border:1pt solid #000000">Sumber Biaya</th>
            </tr>
            @forelse ($training as $row)
            <tr>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->kursus) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->tahun) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->durasi) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->ijazah) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->biaya) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada pendidikan non-formal yang diikuti.</td>
            </tr> 
            @endforelse            
        </tbody>
        <tr>
            <td colspan="5" style="color: white">.</td>
        </tr>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="5" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>KEMAMPUAN BAHASA</h4></td>
            </tr>
            <tr>
                <th style="border:1pt solid #000000">Bahasa</th>
                <th style="width: 75px;border:1pt solid #000000">Menulis</th>
                <th style="width: 75px;border:1pt solid #000000">Membaca</th>
                <th style="width: 75px;border:1pt solid #000000">Berbicara</th>
                <th style="width: 100px;border:1pt solid #000000">Keterangan</th>
            </tr>
            @forelse ($language as $row)
            <tr>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->bahasa) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->menulis) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->membaca) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->bicara) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->catatan) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data.</td>
            </tr> 
            @endforelse            
        </tbody>
        <tr>
            <td colspan="5" style="color: white">.</td>
        </tr>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="4" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>KEGIATAN SOSIAL / POLITIK / PROFESIONAL YANG PERNAH DIIKUTI</h4></td>
            </tr>
            <tr>
                <th style="border:1pt solid #000000">Kegiatan</th>
                <th style="width: 75px;border:1pt solid #000000">Tahun</th>
                <th style="width: 75px;border:1pt solid #000000">Jabatan</th>
                <th style="width: 150px;border:1pt solid #000000">Keterangan</th>
            </tr>
            @forelse ($social as $row)
            <tr>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->kegiatan) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->tahun) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->jabatan) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->catatan) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada kegiatan sosial yang diikuti.</td>
            </tr> 
            @endforelse            
        </tbody>
        <tr>
            <td colspan="4" style="color: white">.</td>
        </tr>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="4" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>REFERENSI</h4></td>
            </tr>
            <tr>
                <th style="border:1pt solid #000000">Nama</th>
                <th style="width: 150px;border:1pt solid #000000">Perusahaan</th>
                <th style="width: 100px;border:1pt solid #000000">Kontak</th>
                <th style="width: 150px;border:1pt solid #000000">Jabatan / Posisi</th>
            </tr>
            @forelse ($reference as $row)
            <tr>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->nama) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->perusahaan) }}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->kontak)}}</td>
                <td style="border:1pt solid #000000">{{ Crypt::decryptString($row->jabatan) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada referensi.</td>
            </tr> 
            @endforelse            
        </tbody>
        <tr>
            <td colspan="4" style="color: white">.</td>
        </tr>
    </table>

    <div class="page-break"></div>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="3" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>RIWAYAT PEKERJAAN</h4></td>
            </tr>
            
            @forelse ($career as $row)
           <tr>
               <td style="text-align: left; width:200px">Nama Perusahaan</td>
               <td style="width: 20px">:</td>
               <td style="text-align: left">{{ Crypt::decryptString($row->perusahaan) }}</td>
           </tr>
           <tr>
                <td style="text-align: left">Alamat Perusahaan</td>
                <td>:</td>
                <td style="text-align: left">{{ Crypt::decryptString($row->alamat) }}</td>
            </tr>
            <tr>
                <td style="text-align: left">Jabatan / Posisi</td>
                <td>:</td>
                <td style="text-align: left">{{ Crypt::decryptString($row->jabatan) }}</td>
            </tr>
            <tr>
                <td style="text-align: left">Periode</td>
                <td>:</td>
                <td style="text-align: left">{{ Crypt::decryptString($row->bulanmasuk) }} {{ Crypt::decryptString($row->tahunmasuk) }} - {{ Crypt::decryptString($row->bulankeluar) }} {{ Crypt::decryptString($row->tahunkeluar) }}</td>
            </tr>
            <tr>
                <td style="text-align: left">Total Gaji dan Tunjangan</td>
                <td>:</td>
                <td style="text-align: left">Rp. {{ number_format(Crypt::decryptString($row->gaji)) }}</td>
            </tr>
            <tr>
                <td style="text-align: left">Detail Pekerjaan</td>
                <td>:</td>
                <td style="text-align: left">{{ Crypt::decryptString($row->pekerjaan) }}</td>
            </tr>
            <tr>
                <td style="text-align: left">Prestasi</td>
                <td>:</td>
                <td style="text-align: left">{{ Crypt::decryptString($row->prestasi) }}</td>
            </tr>
            <tr>
                <td style="text-align: left">Alasan Pengunduran Diri</td>
                <td>:</td>
                <td style="text-align: left">{{ Crypt::decryptString($row->alasan) }}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;border:1pt solid #000000"></td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum mempunyai riwayat pekerjaan.</td>
            </tr> 
            @endforelse            
        </tbody>
        <tr>
            <td colspan="3" style="color: white">.</td>
        </tr>
    </table>

    <div class="page-break"></div>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>INFORMASI DIRI LAINNYA</h4></td>
            </tr>
            
            @foreach ($question as $row)
            <tr>
                <td style="text-align: left; width:200px"><strong>1. Apa alasan Anda bersedia mengikuti proses rekrutmen di PT. Dwida Jaya Tama?</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">{{ $row->alasan }}</td>
            </tr>
             <tr>
                <td style="text-align: left; width:200px"><strong>2. Sebutkan bidang yang menjadi minat Anda dalam bekerja, jelaskan!</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">{{ $row->bidang }}</td>
            </tr>
             <tr>
                <td style="text-align: left; width:200px"><strong>3. Apa rencana Anda dalam 3 - 5 tahun ke depan?</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">{{ $row->rencana }}</td>
            </tr>
             <tr>
                <td style="text-align: left; width:200px"><strong>4. Prestasi apa saja yang pernah Anda raih?</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">{{ $row->prestasi }}</td>
            </tr>
             <tr>
                <td style="text-align: left; width:200px"><strong>5. Apakah saat ini, Anda melamar pekerjaan di perusahaan selain PT. Dwida Jaya Tama? Jika ya, sebutkan!</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">{{ $row->lamaran }}</td>
            </tr>
             @endforeach        
        </tbody>
    </table>

    <div class="page-break"></div>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>GAMBARAN DIRI</h4></td>
            </tr>
            
            @foreach ($question as $row)
            <tr>
                <td style="text-align: left; width:200px"><strong>Berikan gambaran mengenai diri Anda, mencakup: kehidupan keluarga, hobi, tokoh yang menginspirasi, kondisi yang tidak sesuai dengan harapan di tempat kerja saat ini dan diharapkan di PT. Dwida Jaya Tama, dan kontribusi yang dapat diberikan kepada PT. Dwida Jaya Tama apabila bergabung.</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">{{ $row->deskripsi }}</td>
            </tr>
             @endforeach        
        </tbody>
    </table>
</body>

</html>