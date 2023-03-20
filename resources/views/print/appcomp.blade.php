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
        @page { margin: 100px 50px; }
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
                <td colspan="2" style="text-align: left">@if($row->posisialt != ""){{ Crypt::decryptString($row->posisialt) }}@endif</td>  
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
                    
                @else
                    {{ 'Jadwal interview' }}
                @endif
                </td>
                <td style="width: 10px">
                    @if( $row->jadwalhari == null)
                        
                    @else
                        {{ ':' }}
                    @endif
                    </td>
                <td colspan="2" style="text-align: left">
                @if( $row->jadwalhari == null)
                    
                @else
                <strong>{{ $row->jadwalhari }} {{ $row->jadwalbulan }} {{ $row->jadwaltahun }}</strong>
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
                <td style="text-align: left">Rp. {{ Crypt::decryptString($row->gaji) }}</td>
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

    <div class="page-break"></div>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>HASIL INTERVIEW</h4></td>
            </tr>
            
            @foreach ($application as $row)
            <tr>
                <td style="text-align: left; width:200px"><strong>Interview HR - @if($row->namahr != ""){{ Crypt::decryptString($row->namahr) }}@endif</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">@if($row->inthr != ""){{ Crypt::decryptString($row->inthr) }}@endif</td>
            </tr>

            <tr>
                <td style="text-align: left; width:200px"><strong>Interview User - @if($row->namauser != ""){{ Crypt::decryptString($row->namauser) }}@endif</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">@if($row->intuser != ""){{ Crypt::decryptString($row->intuser) }}@endif</td>
            </tr>

            <tr>
                <td style="text-align: left; width:200px"><strong>Interview Manajemen - @if($row->namamana != ""){{ Crypt::decryptString($row->namamana) }}@endif</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">@if($row->intmana != ""){{ Crypt::decryptString($row->intmana) }}@endif</td>
            </tr>
             @endforeach        
        </tbody>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="4" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>HASIL PSIKOTES</h4></td>
            </tr>
            
            @foreach ($application as $row)
            <tr>
                <td style="text-align: left; width:200px"><strong>DISC</strong></td>
                <td style="text-align: left">@if($row->disctest != ""){{ Crypt::decryptString($row->disctest) }}@endif</td>
                <td style="text-align: left; width:200px"><strong>IST</strong></td>
                <td style="text-align: left">@if($row->ist != ""){{ Crypt::decryptString($row->ist) }}@endif</td>
            </tr>
            <tr>
                <td style="text-align: left; width:200px"><strong>CFIT</strong></td>
                <td style="text-align: left">@if($row->cfit != ""){{ Crypt::decryptString($row->cfit) }}@endif</td>
                <td style="text-align: left; width:200px"><strong>Army Alpha</strong></td>
                <td style="text-align: left">@if($row->armyalpha != ""){{ Crypt::decryptString($row->armyalpha) }}@endif</td>
            </tr>
            <tr>
                <td style="text-align: left; width:200px"><strong>Papikostik</strong></td>
                <td style="text-align: left">@if($row->papikostik != ""){{ Crypt::decryptString($row->papikostik) }}@endif</td>
                <td style="text-align: left; width:200px"><strong>Kreprlin</strong></td>
                <td style="text-align: left">@if($row->kreprlin != ""){{ Crypt::decryptString($row->kreprlin) }}@endif</td>
            </tr>
             @endforeach        
        </tbody>
    </table>

    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="2" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>KESIMPULAN</h4></td>
            </tr>
            
            @foreach ($application as $row)
            <tr>
                <td style="text-align: left; width:200px"><strong>Kesimpulan</strong></td>
                <td style="text-align: left">@if($row->hasil != ""){{ Crypt::decryptString($row->hasil) }}@endif</td>
            </tr>
             @endforeach        
        </tbody>
    </table>

    <div class="page-break"></div>
    <table>
        <tbody style="border:1pt solid #000000">
            <tr>
                <td colspan="4" style="text-align: center; border:1pt solid #000000;background:lightgray"><h4>COMPETENCY LEVEL</h4></td>
            </tr>
        <!--BASIC-->   
            <tr>
                <td style="text-align: center; width:30px; border:1pt solid #000000;background:lightgray"><strong>No.</strong></td>
                <td style="text-align: center; border:1pt solid #000000;background:lightgray"><strong>Objective</strong></td>
                <td style="text-align: center; width:100px; border:1pt solid #000000;background:lightgray"><strong>HR Score</strong></td>
                <td style="text-align: center; width:100px; border:1pt solid #000000;background:lightgray"><strong>User Score</strong></td>
            </tr> 
        
            <tr>
                <td colspan="4" style="text-align: left; border:1pt solid #000000;background:lightyellow"><h4>I. Basic Competency</h4></td>
            </tr>

            <tr>
                <td style="text-align: center; border:1pt solid #000000">1.</td>
                <td style="text-align: left; border:1pt solid #000000">Integrity</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[0] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[0] }}</td>
            </tr>      

             <tr>
                <td style="text-align: center; border:1pt solid #000000">2.</td>
                 <td style="text-align: left; border:1pt solid #000000">Innovation</td>
                 <td style="text-align: center; border:1pt solid #000000">{{ $xhr[1] }}</td>
                 <td style="text-align: center; border:1pt solid #000000">{{ $xuser[1] }}</td>
             </tr>      

             <tr>
                <td style="text-align: center; border:1pt solid #000000">3.</td>
                <td style="text-align: left; border:1pt solid #000000">Continues Improvement</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[2] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[2] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">4.</td>
                <td style="text-align: left; border:1pt solid #000000">Accountability</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[3] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[3] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">5.</td>
                <td style="text-align: left; border:1pt solid #000000">Perseverance</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[4] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[4] }}</td>
            </tr> 

            <tr>
                <td style="text-align: center; border:1pt solid #000000">6.</td>
                <td style="text-align: left; border:1pt solid #000000">Teamwork</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[5] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[5] }}</td>
            </tr>   
        <!--BASIC-->   

        <!--BEHAVIORAL-->    
            <tr>
            <td colspan="4" style="text-align: left; border:1pt solid #000000;background:lightyellow"><h4>II. Behavioral Competency</h4></td>
            </tr>

            <tr>
                <td style="text-align: center; border:1pt solid #000000">1.</td>
                <td style="text-align: left; border:1pt solid #000000">Achievement Orientation</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[6] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[6] }}</td>
            </tr>      

            <tr>
                <td style="text-align: center; border:1pt solid #000000">2.</td>
                <td style="text-align: left; border:1pt solid #000000">Impact and Influence</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[7] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[7] }}</td>
            </tr>      

            <tr>
                <td style="text-align: center; border:1pt solid #000000">3.</td>
                <td style="text-align: left; border:1pt solid #000000">Interpersonal Relationship Building</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[8] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[8] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">4.</td>
                <td style="text-align: left; border:1pt solid #000000">Initiative</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[9] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[9] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">5.</td>
                <td style="text-align: left; border:1pt solid #000000">Self Control and Confidence</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[10] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[10] }}</td>
            </tr> 

            <tr>
                <td style="text-align: center; border:1pt solid #000000">6.</td>
                <td style="text-align: left; border:1pt solid #000000">Adapting to Change</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[11] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[11] }}</td>
            </tr>  
            
            <tr>
                <td style="text-align: center; border:1pt solid #000000">7.</td>
                <td style="text-align: left; border:1pt solid #000000">Conceptual Thinking</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[12] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[12] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">8.</td>
                <td style="text-align: left; border:1pt solid #000000">Analytical Thinking</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[13] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[13] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">9.</td>
                <td style="text-align: left; border:1pt solid #000000">Problem Solving</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[14] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[14] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">10.</td>
                <td style="text-align: left; border:1pt solid #000000">Decisive Judging</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[15] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[15] }}</td>
            </tr>  
        <!--BEHAVIORAL-->  

        <!--MANAGERIAL-->  
            <tr>
                <td colspan="4" style="text-align: left; border:1pt solid #000000;background:lightyellow"><h4>III. Managerial Competency</h4></td>
            </tr>

            <tr>
                <td style="text-align: center; border:1pt solid #000000">1.</td>
                <td style="text-align: left; border:1pt solid #000000">Visioning</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[16] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[16] }}</td>
            </tr>      

            <tr>
                <td style="text-align: center; border:1pt solid #000000">2.</td>
                <td style="text-align: left; border:1pt solid #000000">Team Leadership</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[17] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[17] }}</td>
            </tr>      

                <tr>
                <td style="text-align: center; border:1pt solid #000000">3.</td>
                <td style="text-align: left; border:1pt solid #000000">Managing Others</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[18] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[18] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">4.</td>
                <td style="text-align: left; border:1pt solid #000000">Developing Others</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[19] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[19] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">5.</td>
                <td style="text-align: left; border:1pt solid #000000">Conflict Management</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[20] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[20] }}</td>
            </tr>
        <!--MANAGERIAL-->  

        <!--TECHNICAL-->  
            <tr>
                <td colspan="4" style="text-align: left; border:1pt solid #000000;background:lightyellow"><h4>IV. Technical Competency</h4></td>
            </tr>

            <tr>
                <td style="text-align: center; border:1pt solid #000000">1.</td>
                <td style="text-align: left; border:1pt solid #000000">Presentation Skill</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[21] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[21] }}</td>
            </tr>      

            <tr>
                <td style="text-align: center; border:1pt solid #000000">2.</td>
                <td style="text-align: left; border:1pt solid #000000">Negotiation Skill</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[22] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[22] }}</td>
            </tr>      

            <tr>
                <td style="text-align: center; border:1pt solid #000000">3.</td>
                <td style="text-align: left; border:1pt solid #000000">Communication Skill</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[23] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[23] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">4.</td>
                <td style="text-align: left; border:1pt solid #000000">Financial Statements</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[24] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[24] }}</td>
            </tr>  

            <tr>
                <td style="text-align: center; border:1pt solid #000000">5.</td>
                <td style="text-align: left; border:1pt solid #000000">Software Design</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[25] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[25] }}</td>
            </tr>

            <tr>
                <td style="text-align: center; border:1pt solid #000000">6.</td>
                <td style="text-align: left; border:1pt solid #000000">Software Technics</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xhr[26] }}</td>
                <td style="text-align: center; border:1pt solid #000000">{{ $xuser[26] }}</td>
            </tr>
        <!--TECHNICAL-->  

        <tr>
            <td style="text-align: center; border:1pt solid #000000;background:lightgray" colspan="2"><strong>Sum Competency Level</strong></td>
            <td style="text-align: center; border:1pt solid #000000;background:lightgray">{{
                $xhr[0]+$xhr[1]+$xhr[2]+$xhr[3]+$xhr[4]+$xhr[5]+$xhr[6]+$xhr[7]+$xhr[8]+$xhr[9]+
                $xhr[10]+$xhr[11]+$xhr[12]+$xhr[13]+$xhr[14]+$xhr[15]+$xhr[16]+$xhr[17]+$xhr[18]+$xhr[19]+
                $xhr[20]+$xhr[21]+$xhr[22]+$xhr[23]+$xhr[24]+$xhr[25]+$xhr[26]
                }}
            </td>
            <td style="text-align: center; border:1pt solid #000000;background:lightgray">{{
                $xuser[0]+$xuser[1]+$xuser[2]+$xuser[3]+$xuser[4]+$xuser[5]+$xuser[6]+$xuser[7]+$xuser[8]+$xuser[9]+
                $xuser[10]+$xuser[11]+$xuser[12]+$xuser[13]+$xuser[14]+$xuser[15]+$xuser[16]+$xuser[17]+$xuser[18]+$xuser[19]+
                $xuser[20]+$xuser[21]+$xuser[22]+$xuser[23]+$xuser[24]+$xuser[25]+$xuser[26]
                }}
            </td>
        </tr>
        </tbody>
    </table>
</body>

</html>