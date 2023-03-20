
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontrak Pegawai - @foreach ($contract as $a) {{ Crypt::decryptString($a->nama) }} @endforeach</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Arial';
            color:#333;
            text-align:left;
            font-size:12px;
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
            width:800px;
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
        @page { margin: 100px 20px 20px 20px; }
        header { position: fixed; top: -50px; left: 0px; right: 0px; height: 50px; }
        p { page-break-after: always;line-height:15pt }
        p:last-child { page-break-after: never; }
    </style>
</head>
<body>
    @foreach ($contract as $detail)
    @foreach ($profile as $detailprofile)
    <header>
        <table style="margin-left: -5px">
            <tr>
                <td>
                    <table style="width:350px">
                        <tr>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt;width:100px">Nama</td>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt">{{ Crypt::decryptString($detail->nama) }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt">Jabatan</td>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt">{{ Crypt::decryptString($detail->posisi) }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt">Tgl. Mulai Kontrak</td>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt">{{ $detail->awalkontrakhari }} {{ $detail->awalkontrakbulan }} {{ $detail->awalkontraktahun }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt">Tgl. Akhir Kontrak</td>
                            <td style="border: 1pt solid black; text-align:left; padding-left: 5pt; font-size:8pt">{{ $detail->akhirkontrakhari  }} {{ $detail->akhirkontrakbulan }} {{ $detail->akhirkontraktahun }}</td>
                        </tr>
                    </table>
                </td>
                <td style="text-align: right"><img src="dwida.png" width="250"></td>
            </tr>
        </table>
    </header>
<!-- HALAMAN 1 /////////////////////////////////////////////////////////////// -->
    <table style="margin-top:50px">
        <tbody>
            <tr>
                <td><strong><u>PENAWARAN KERJA</u></strong></td>
            </tr>
            <tr>
                <td style="font-size: 9pt">{{ Crypt::decryptString($detail->nomor) }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td style="text-align: left;width:100px"><strong>Memperhatikan</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">Permohonan kerja Saudara <strong>{{ Crypt::decryptString($detail->nama) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="3"><strong>Menetapkan</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"><i>Pertama</i></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Menerima permohonan kerja Saudara {{ Crypt::decryptString($detail->nama) }} sebagai karyawan dengan masa kontrak selama {{ $detail->durasi }} bulan di PT. Dwida Jaya Tama.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"></td>
                <td style="width:10px"></td>
                <td style="text-align: left">
                    <table>
                        <tr>
                            <td style="text-align: left;width:130px;vertical-align: text-top">Nama</td>
                            <td style="width:5px; text-align:left">:</td>
                            <td colspan="3" style="text-align: left">{{ Crypt::decryptString($detail->nama) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Tanggal Masuk</td>
                            <td style="text-align:left">:</td>
                            <td colspan="3" style="text-align: left">{{ $detail->awalkontrakhari }} {{ $detail->awalkontrakbulan }} {{ $detail->awalkontraktahun }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Jabatan/Bagian</td>
                            <td style="text-align:left">:</td>
                            <td colspan="3" style="text-align: left">{{ Crypt::decryptString($detail->posisi) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Unit Bisnis</td>
                            <td style="text-align:left">:</td>
                            <td colspan="3" style="text-align: left">{{ $detail->kantor }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Gaji</td>
                            <td style="text-align:left">:</td>
                            <td style="width:10px; text-align:left">Rp.</td>
                            <td style="text-align: right;width:60px">{{ number_format(Crypt::decryptString($detail->jabatan) + Crypt::decryptString($detail->gapok) + Crypt::decryptString($detail->kinerja) + Crypt::decryptString($detail->pulsa) + Crypt::decryptString($detail->makan) + Crypt::decryptString($detail->transport)) }}</td>
                            <td style="text-align: left"> /bulan</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td colspan="5" style="text-align: left;vertical-align: text-top"><strong>Dengan perincian sebagai berikut:</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width:130px ;vertical-align: text-top">Gaji Pokok</td>
                            <td style="width:5px; text-align: left">:</td>
                            <td style="width:10px; text-align:left">Rp.</td>
                            <td style="text-align: right;width:60px">{{ number_format(Crypt::decryptString($detail->gapok)) }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Tunjangan Jabatan</td>
                            <td style="text-align:left">:</td>
                            <td style="text-align:left">Rp.</td>
                            <td style="text-align: right">{{ number_format(Crypt::decryptString($detail->jabatan)) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Tunjangan Kinerja</td>
                            <td style="text-align:left">:</td>
                            <td style="text-align:left">Rp.</td>
                            <td style="text-align: right">{{ number_format(Crypt::decryptString($detail->kinerja)) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Tunjangan Pulsa</td>
                            <td style="text-align:left">:</td>
                            <td style="text-align:left">Rp.</td>
                            <td style="text-align: right">{{ number_format(Crypt::decryptString($detail->pulsa)) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Tunjangan Makan</td>
                            <td style="text-align:left">:</td>
                            <td style="text-align:left">Rp.</td>
                            <td style="text-align: right">{{ number_format(Crypt::decryptString($detail->makan)) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;vertical-align: text-top">Tunjangan Transport</td>
                            <td style="text-align:left">:</td>
                            <td style="text-align:left">Rp.</td>
                            <td style="text-align: right">{{ number_format(Crypt::decryptString($detail->transport)) }}</td>
                        </tr>
                        <tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"><i>Kedua</i></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Evaluasi prestasi dan kinerja Saudara akan dilakukan setiap bulan sejak hari pertama Saudara masuk bekerja. Evaluasi akhir atas prestasi dan kinerja Saudara akan dilakukan satu bulan sebelum masa percobaan berakhir. Hasil evaluasi akhir selanjutnya akan menjadi pertimbangan perusahaan untuk memperpanjang atau tidak memperpanjang perjanjian kerja, atau mengangkat Saudara menjadi karyawan tetap.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"><i>Ketiga</i></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Apabila dari hasil evaluasi bulanan prestasi dan kinerja Saudara tidak terpenuhi atau tidak memuaskan, maka PT. Dwida Jaya Tama akan melakukan pemutusan hubungan kerja dengan Saudara dan membayarkan gaji untuk masa kerja yang telah Saudara laksanakan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"><i>Keempat</i></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Saudara wajib menjalankan tugas yang diberikan perusahaan dengan sebaik-baiknya dalam waktu yang ditetapkan, menjaga kerahasiaan perusahaan dan bersedia mentaati peraturan dan ketentuan perusahaan, baik yang ada sekarang maupun dikemudian hari.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"><i>Kelima</i></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Saudara wajib bersedia dipindahkan/dimutasikan/ditugaskan ke kantor/bagian/unit kerja lainnya apabila diperlukan dan melaksanakan tugas-tugas tambahan yang diberikan oleh atasan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"><i>Keenam</i></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Ketentuan lain yang belum dicantumkan dalam surat penawaran kerja ini akan ditetapkan dikemudian hari dan/atau diberlakukan sesuai peraturan perusahaan, pedoman kerja dan surat edaran/keputusan direksi yang berlaku.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align: text-top"><i>Ketujuh</i></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Surat penawaran kerja ini berlaku sejak tanggal {{ $detail->awalkontrakhari .' '. $detail->awalkontrakbulan .' '. $detail->awalkontraktahun }}.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody> 
            <tr>
                <td style="color: white">.</td>
            </tr>        
            <tr>
                <td style="text-align: left"><strong>Bogor, {{ $detail->awalkontrakhari .' '. $detail->awalkontrakbulan .' '. $detail->awalkontraktahun }}</strong></td>
                <td style="width:500px"></td>
                <td style="text-align: right"><strong>Menyetujui</strong></td>
            </tr>
            <tr>
                <td style="color: white">.</td>
            </tr>
            <tr>
                <td style="text-align: left"><u><strong>{{ $detail->direktur }}</strong></u></td>
                <td style="width:500px"></td>
                <td style="text-align: right"><strong>{{ Crypt::decryptString($detail->nama) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left"><strong>Direktur</strong></td>
                <td style="width:500px"></td>
                <td style="text-align: right"></td>
            </tr>
        </tbody>
    </table>
    
    <div class="page-break"></div> 
<!-- HALAMAN 1 /////////////////////////////////////////////////////////////// -->
<!-- HALAMAN 2 /////////////////////////////////////////////////////////////// -->
    <table style="margin-top:50px">
        <tbody>
            <tr>
                <td><strong><u>PERJANJIAN KERJA</u></strong></td>
            </tr>
            <tr>
                <td style="font-size: 9pt">{{ Crypt::decryptString($detail->nomor) }}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                {{ setlocale(LC_ALL, 'IND') }}
                <td style="text-align: justify">Perjanjian kerja waktu tertentu ini dibuat di Bogor, pada tanggal {{ $detail->awalkontrakhari }} {{ $detail->awalkontrakbulan }} {{ $detail->awalkontraktahun }}, oleh dan antara:</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td style="text-align: left;width:50px;color:white">.</td>
                <td style="text-align: left;width:100px"><strong>Nama</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ $detail->direktur }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"><strong>Alamat</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>Jl. Pemuda No. 4 Kel. Padurenan, Kec. Gunung Sindur, Kab. Bogor, Jawa Barat, 16340</strong></td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="text-align: justify">
                        Dalam hal ini bertindak dalam kedudukannya sebagai direktur sebuah perseroan terbatas bernama <strong>PT. Dwida Jaya Tama</strong> dari dan oleh karena itu berwenang bertindak untuk dan atas nama perseroan dimaksud , berkedudukan di Jl. Pemuda No. 4 Kel. Padurenan, Kec. Gunung Sindur, Kab. Bogor, Jawa Barat, 16340.
                    </p>
                </td>
            </tr>
    
            <tr>
                <td colspan="4">
                    <p style="text-align: center">
                        <strong>Selanjutnya disebut pihak pertama</strong>
                    </p>
                </td>
            </tr>
    
            <tr>
                <td style="color: white">.</td>
            </tr>
    
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Nama</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->nama) }}</strong></td>
            </tr>
            
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Jenis Kelamin</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detailprofile->gender) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;"></td>
                <td style="text-align: left"><strong>Tempat Lahir</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detailprofile->tempatlahir) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Tanggal Lahir</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detailprofile->hari) }} {{ Crypt::decryptString($detailprofile->bulan) }} {{ Crypt::decryptString($detailprofile->tahun) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Alamat</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detailprofile->alamat) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Nomor Ijazah</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->ijazah) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>NIM</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->nim) }}</strong></td>
            </tr>
    
            <tr>
                <td colspan="4">
                    <p style="text-align: center">
                        <strong>Selanjutnya disebut pihak kedua</strong>
                    </p>
                </td>
            </tr>
    
            <tr>
                <td style="color: white">.</td>
            </tr>
    
            <tr>
                <td colspan="4">
                    <p style="text-align: justify">
                        Para pihak dengan ini setuju dan sepakat untuk membuat perjanjian kerja waktu tertentu ini (selanjutnya disebut Perjanjian Kerja) dengan ketentuan dan syarat sebagai berikut:
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 780px">
        <tbody>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 1</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Hubungan Kerja</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Perjanjian Kerja ini menimbulkan hubungan kerja antara pihak pertama dengan pihak kedua terhitung sejak tanggal <strong>{{ $detail->awalkontrakhari }} {{ $detail->awalkontrakbulan }} {{ $detail->awalkontraktahun }}</strong> sampai dengan tanggal <strong>{{ $detail->akhirkontrakhari }} {{ $detail->akhirkontrakbulan }} {{ $detail->akhirkontraktahun }}</strong>.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Hubungan kerja sebagaimana disebutkan di atas dengan sendirinya berakhir pada saat Perjanjian Kerja ini berakhir, kecuali apabila disepakati secara tertulis oleh para pihak bahwa Perjanjian Kerja ini diperpanjang kembali.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Dalam hal ini, Perjanjian Kerja ini diperpanjang lagi, maka pihak pertama wajib memberitahukan maksud perpanjangan tersebut kepada pihak kedua selambat-lambatnya 7 (tujuh) hari sebelum Perjanjian Kerja ini berakhir.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 780px">
        <tbody>
            <tr>
                <td style="color: white">.</td>
            </tr> 
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 2</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Penempatan dan Kompensasi Pihak Kedua</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td style="text-align: justify">
                    Pihak kedua dengan ini menerima dan menyetujui penempatan pihak kedua di bagian manapun di kantor maupun pabrik pihak pertama untuk pekerjaan sebagai berikut:
                    <table style="width: 680px">
                        <tr>
                            <td style="width: 120px;text-align:left;vertical-align:text-top"><strong>a. Posisi</strong></td>
                            <td style="width: 10px;vertical-align:text-top"><strong>:</strong></td>
                            <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->posisi) }}</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;vertical-align:text-top"><strong>b. Alamat Kantor</strong></td>
                            <td style="vertical-align:text-top"><strong>:</strong></td>
                            <td style="text-align: left"><strong>Jl. Pemuda No. 4 Kel. Padurenan, Kec. Gunung Sindur, Kab. Bogor, Jawa Barat, 16340</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini menyatakan dan menegaskan bahwa dirinya bersedia pula untuk ditempatkan diperusahaan afiliasi lain milik pihak pertama.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="page-break"></div>
<!-- HALAMAN 2 /////////////////////////////////////////////////////////////// -->
<!-- HALAMAN 3 /////////////////////////////////////////////////////////////// -->
    <table  style="width: 800px;margin-top:50px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Atas penempatan pihak kedua sebagaimana disebutkan di atas, pihak kedua berhak untuk mendapatkan kompensasi dari pihak pertama sebesar Rp. {{ number_format(Crypt::decryptString($detail->jabatan) + Crypt::decryptString($detail->gapok) + Crypt::decryptString($detail->kinerja) + Crypt::decryptString($detail->pulsa) + Crypt::decryptString($detail->makan) + Crypt::decryptString($detail->transport)) }} dengan rincian pembayaran penghasilan perbulan sebagai berikut:
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 680px;padding-left:80px">
        <tbody>
            <tr>
                <td style="width: 140px;text-align:left;vertical-align:text-top"><strong>a. Gaji pokok</strong></td>
                <td style="width: 5px;vertical-align:text-top"><strong>:</strong></td>
                <td style="width: 5px;vertical-align:text-top;text-align: left"><strong>Rp.</strong></td>
                <td style="text-align: right;width: 60px"><strong>{{number_format(Crypt::decryptString($detail->gapok)) }}</strong></td>
                <td style="text-align: left"><strong>/bulan</strong></td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:text-top"><strong>b. Tunjangan jabatan</strong></td>
                <td style="vertical-align:text-top"><strong>:</strong></td>
                <td style="vertical-align:text-top;text-align: left"><strong>Rp.</strong></td>
                <td style="text-align: right"><strong>{{number_format(Crypt::decryptString($detail->jabatan)) }}</strong></td>
                <td style="text-align: left"><strong>/bulan</strong></td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:text-top"><strong>c. Tunjangan kinerja</strong></td>
                <td style="vertical-align:text-top"><strong>:</strong></td>
                <td style="vertical-align:text-top;text-align: left"><strong>Rp.</strong></td>
                <td style="text-align: right"><strong>{{number_format(Crypt::decryptString($detail->kinerja)) }}</strong></td>
                <td style="text-align: left"><strong>/bulan</strong></td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:text-top"><strong>d. Tunjangan pulsa</strong></td>
                <td style="vertical-align:text-top"><strong>:</strong></td>
                <td style="vertical-align:text-top;text-align: left"><strong>Rp.</strong></td>
                <td style="text-align: right"><strong>{{number_format(Crypt::decryptString($detail->pulsa)) }}</strong></td>
                <td style="text-align: left"><strong>/bulan</strong></td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:text-top"><strong>e. Tunjangan makan</strong></td>
                <td style="vertical-align:text-top"><strong>:</strong></td>
                <td style="vertical-align:text-top;text-align: left"><strong>Rp.</strong></td>
                <td style="text-align: right"><strong>{{number_format(Crypt::decryptString($detail->makan)) }}</strong></td>
                <td style="text-align: left"><strong>/22 hari</strong></td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:text-top"><strong>f. Tunjangan transport</strong></td>
                <td style="vertical-align:text-top"><strong>:</strong></td>
                <td style="vertical-align:text-top;text-align: left"><strong>Rp.</strong></td>
                <td style="text-align: right"><strong>{{number_format(Crypt::decryptString($detail->transport)) }}</strong></td>
                <td style="text-align: left"><strong>/22 hari</strong></td>
            </tr>
        </tbody>
    </table>

    <table style="width: 780px">
        <tbody>
            <tr>
                <td style="color: white">.</td>
            </tr> 
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 3</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Hak dan Kewajiban</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Selama bekerja pada pihak pertama, pihak kedua bersedia untuk menitipkan ijazah asli milik pihak kedua kepada pihak pertama pada saat ditandatanganinya perjanjian kerja ini.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak pertama berhak melakukan evaluasi terhadap kinerja pihak kedua setiap saat maupun berkala.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak pertama berwenang memindahtugaskan pihak kedua dari satu tempat ke tempat lain atau dari satu bagian ke bagian lain atau dari satu jabatan ke jabatan lain atau memutasikan pihak kedua dari satu perusahaan ke perusahaan lain yang masih tergabung dalam kelompok perusahaan pihak pertama sesuai dengan kebutuhan perusahaan serta tercapainya tujuan operasional perusahaan secara efisien dan menyeluruh.
                    </p>
                    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        4.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak pertama berhak melakukan pemutusan sepihak sebelum jangka waktunya berakhir terhadap perjanjian ini dengan terlebih dahulu melakukan pemberitahuan secara tertulis kepada pihak kedua minimal 1 (satu) minggu/7 (tujuh) hari sebelumnya.
                    </p>
                    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        5.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak pertama berhak merubah ketentuan mengenai bantuan makan, transportasi pihak kedua (pasal 2 ayat 3), jika diperlukan berdasarkan pertimbangan pihak pertama tanpa harus disetujui pihak kedua.
                    </p>
                    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        6.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak pertama berhak melakukan pengakhiran sepihak atas perjanjian ini sebelum tanggal berakhirnya perjanjian dan dalam hal keadaan ini terjadi maka pihak kedua menyatakan melepaskan haknya untuk melakukan klaim, gugatan dan menuntut kompensasi pembayaran  dalam sisa waktu perjanjian maupun ganti rugi serta klaim apapun terhadap Pihak Pertama atas pemutusan sebelum waktu berakhirnya Perjanjian tersebut dan karenanya Pihak Kedua menyatakan mengesampingkan segala peraturan perundang-undangan yang berlaku dalam hukum Negera Republik Indonesia sepanjang mengatur mengenai ganti rugi akibat dibatalkannya Perjanjian secara sepihak sebelum berakhirnya waktu Perjanjian dimaksud termasuk diantaranya peraturan perundangan yang berlaku sepanjang mengatur tentang pembatalan perlu diberikan ganti rugi terhadapnya.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        7.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua berhak mendapatkan kompenasi sebagaimana dimaksud pasal 2 ayat 3.
                
                    </p>    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        8.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Selama jangka waktu Perjanjian Kerja ini, pihak kedua berhak mengundurkan diri atau melakukan pemutusan kontrak  dengan terlebih dahulu melakukan pemberitahuan secara tertulis kepada pihak pertama minimal 1 (satu) bulan/30 (tiga puluh) hari sebelumnya.
                    </p>
                    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        9.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak pertama berkewajiban melakukan pengarahan dan bimbingan kepada pihak kedua mengenai pekerjaan yang akan dilakukan, kondisi perusahan, serta berusaha sedapat mungkin menciptakan suasana kerja yang nyaman bagi pihak pertama sehingga pihak kedua dapat bekerja sesuai dengan target yang ingin dicapai oleh pihak pertama.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        10.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua berkewajiban mentaati segala ketentuan dan peraturan kerja dalam lingkungan kerja pihak pertama dimana peraturan kerja ini telah diatur dalam Peraturan Perusahaan (PP).
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="page-break"></div>
<!-- HALAMAN 3 /////////////////////////////////////////////////////////////// -->
<!-- HALAMAN 4 /////////////////////////////////////////////////////////////// -->
    <table style="width: 800px;margin-top:50px">
        <tbody>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        11.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua wajib mengikuti syarat hari dan kerja sebagaimana dimaksud dalam pasal 4 Perjanjian Kerja ini.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        12.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua wajib mengikuti ketentuan mengenai tugas dan kewajiban yang secara spesifik diatur dalam pasal 5 Perjanjian Kerja ini.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 800px">
        <tbody>
            <tr>
                <td style="color: white">.</td>
            </tr> 
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 4</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Hari dan Jam Kerja</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Sesuai dengan peraturan perusahaan pihak Pertama, maka pihak kedua diwajibkan datang dan bekerja di kantor yang telah ditentukan pihak pertama pada hari Senin sampai dengan hari Jum’at, dengan istirahat mingguan sebanyak 2 (dua) hari atau sebagai berikut:
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 680px;padding-left:80px">
        <tbody>
            <tr>
                <td style="width: 80px;text-align:left;vertical-align:text-top"><strong>Senin-Jumat</strong></td>
                <td style="width: 10px;vertical-align:text-top"><strong>:</strong></td>
                <td style="text-align: left;width: 150px"><strong>08.00 WIB-17.00 WIB</strong></td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:text-top"><strong>Istirahat</strong></td>
                <td style="vertical-align:text-top"><strong>:</strong></td>
                <td style="text-align: left"><strong>12.00 WIB-13.00 WIB</strong></td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:text-top"><strong>Sabtu-Minggu</strong></td>
                <td style="vertical-align:text-top"><strong>:</strong></td>
                <td style="text-align: left"><strong>Libur</strong></td>
            </tr>
        </tbody>
    </table>
    <table style="width: 800px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Dalam hal pihak pertama memerlukan bantuan terhadap pihak kedua, maka pihak kedua bersedia untuk bekerja diluar waktu kerja normal.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Ketidakhadiran yang disebabkan oleh izin, sakit, dan mangkir kerja, prosedur serta sanksinya maka para pihak sepakat untuk mengikuti ketentuan sesuai yang diatur dalam Peraturan Perusahaan dan peraturan lainnya yang dibuat oleh perusahaan.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 780px">
        <tbody>
            <tr>
                <td style="color: white">.</td>
            </tr> 
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 5</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Tugas dan Kewajiban Pihak Kedua</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 10px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua wajib menjalankan segala tugas dan kewajiban yang dipercayakan kepadanya, sesuai dengan uraian tugas yang merupakan lampiran dan bagian tak terpisahkan dari Perjanjian Kerja ini dan bersedia melakukan tugas lainnya sebagaimana diminta oleh pihak pertama.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua wajib menandatangani dan mengembalikan ke kantor pihak pertama Surat Penjaminan dari Orangtua/Wali yang bertanggungjawab/menjamin terhadap pihak kedua jika terjadi sesuatu hal sehubungan dengan tindakan pihak kedua yang dianggap merugikan pihak pertama atau pihak lainnya dengan dilampirkan Copy KTP Penjamin juga bersedia menitipkan ijasah SMU/S1/S2 untuk dititipkan dengan hak retensi (hak untuk menahan sepanjang masih ada kewajiban yang belum diselesaikan oleh pihak kedua sehubungan dengan Perjanjian Kerja).
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua wajib menjaga penampilan agar selalu dalam keadaan rapi secara keseluruhan menurut batas-batas yang layak dan umum seperti : rambut harus rapi (tidak boleh panjang), tidak boleh memakai anting bagi pria, tidak boleh menggunakan pakaian yang berantakan / Tidak teratur.
                    </p>
                    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        4.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua wajib menjaga kebersihan disekitar tempat kerja, meletakan sesuatu pada tempatnya seperti alat-alat kerja, sampah, dan lain-lain pada tempat yang telah disediakan.
                    </p>
                    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        5.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua wajib selalu bersikap sopan, ramah dan jujur selama dalam tugas, baik diantara sesama karyawan, atau dengan atasan/pimpinan, maupun pihak Ketiga (relasi pihak pertama).
                    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        6.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini menyatakan dan menegaskan bahwa dirinya akan tunduk dan mengikatkan diri pada ketentuan-ketentuan dan/atau peraturan-peraturan dan/atau tata tertib yang berlaku di kantor dan Pabrik serta bersedia menerima sanksi atas pelanggaran ketentuan dan/atau peraturan tersebut sepanjang ketentuan Peraturan Perusahaan yang mengatur mengenai sanksi dan peraturan-peraturan serta tata tertib.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

        <div class="page-break"></div>
<!-- HALAMAN 4 /////////////////////////////////////////////////////////////// -->
<!-- HALAMAN 5 /////////////////////////////////////////////////////////////// -->
    <table style="width: 800px;margin-top:50px">
        <tbody>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        7.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini menyatakan dan menegaskan bahwa dirinya akan tunduk dan mengikatkan diri pada ketentuan-ketentuan dan/atau peraturan-peraturan dan/atau tata tertib yang berlaku di kantor dan Pabrik serta bersedia menerima sanksi atas pelanggaran ketentuan dan/atau peraturan tersebut sepanjang ketentuan Peraturan Perusahaan yang mengatur mengenai sanksi dan peraturan-peraturan serta tata tertib.
                
                    </p>    </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        8.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini berjanji dan mengikatkan diri bahwa ia akan menjaga dengan baik seluruh asset dan inventaris milik pihak pertama yang dipercayakan kepadanya, termasuk pada data komputer , alat tulis ,dokumen, dan asset lainnya milik pihak pertama, serta wajib mengembalikannya kepada pihak pertama dalam keadaan baik apabila Perjanjian Kerja ini karena sebab apapun berakhir atau diakhiri oleh salah satu pihak.
                    </p>
                    </td>
            </tr>

            <tr>
                <td style="width:30px;vertical-align: text-top">
                    <p style="text-align: left">
                        9.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini berjanji dan mengikatkan diri untuk menyimpan dengan baik segala data dan/atau keterangan rahasia pihak pertama yang diketahui dan/atau dipercayakan kepadanya, dan tidak akan pernah membocorkan dan/atau menggunakan data/atau keterangan tersebut untuk kepentingan pribadi pihak kedua maupun pihak lain manapun juga selain pihak pertama baik selama Perjanjian Kerja ini berlangsung maupun setelah Perjanjian Kerja Berakhir. Apabila pihak kedua ditemukan oleh pihak pertama melakukan dengan cara membocorkan rahasia pihak pertama dan/atau menggunakan data atau keterangan tersebut untuk kepentingan pribadi pihak kedua atau pihak lain sehingga merugikan pihak pertama, maka pihak kedua wajib mengganti kerugian yang ditimbulkan  sebagaimana diatur dalam pasal 1365 KUH Perdata “Tiap perbuatan melanggar hukum, yang membawa kerugian kepada orang lain, mewajibkan orang yang karena salahnya menerbitkan kerugian itu, mengganti kerugian tersebut.”
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 780px">
        <tbody>
            <tr>
                <td style="color: white">.</td>
            </tr> 
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 6</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pertanggungjawaban Pekerjaan</strong>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 800px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini berjanji dan mengikatkan diri untuk mempertanggungjawabkan segala tugas dan kewajiban yang telah diberikan oleh pihak pertama kepada pihak kedua.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini berjanji dan mengikatkan diri secara pribadi bertanggungjawab terhadap semua kelalaian atas tugas dan kewajiban pekerjaan yang telah diberikan oleh pihak pertama kepada pihak kedua.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua bertanggungjawab secara pribadi, baik secara moral maupun material terhadap kerugian-kerugian financial pihak pertama akibat kelalaian pekerjaan yang telah dilakukan oleh pihak kedua berdasarkan tugas dan kewajiban perkerjaan yang telah diberikan oleh pihak pertama kepada pihak kedua.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        4.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Dalam hal pihak kedua bertanggungjawab untuk menyelesaikan segala permasalahan secara pribadi dengan melakukan penggantian atas kerugian, baik secara moral maupun material terhadap kerugian-kerugian financial dari pihak ketiga akibat kelalaian pekerjaan yang telah dilakukan oleh pihak kedua berdasarkan tugas dan kewajiban perkerjaan yang telah diberikan oleh pihak pertama kepada pihak kedua, termasuk menyalahgunakan Keuangan, sehingga merugikan pihak pertama dan pihak ketiga berdasarkan evaluasi yang dilakukan oleh pihak pertama terhadap pihak kedua. 
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        5.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dengan ini berjanji dan mengikatkan diri secara bersama-sama, baik secara moral maupun material terhadap kerugian-kerugian financial pihak pertama akibat kelalaian pekerjaan yang telah dilakukan oleh Karyawan dan/atau semua yang ada di bawah koordinasi pihak kedua.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>
<!-- HALAMAN 5 /////////////////////////////////////////////////////////////// -->
<!-- HALAMAN 6 /////////////////////////////////////////////////////////////// -->
    <table style="width: 780px;margin-top:50px">
        <tbody>
            <tr>
                <td style="color: white">.</td>
            </tr> 
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 7</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pengakhiran Perjanjian Kerja</strong>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 800px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Dalam hal pihak kedua atas kehendaknya sendiri hendak mengakhiri Perjanjian Kerja ini sebelum jangka waktunya berakhir, maka pihak kedua wajib memberitahukan maksud pengakhirannya tersebut kepada pihak pertama secara tertulis, selambat-lambatnya 1 (satu) bulan/30 (tiga puluh) hari sebelum pengakhiran tersebut dan wajib mengganti biaya training sesuai ketentuan Perusahaan dan berkewajiban untuk membayar 50% dari kompensasi yang diterima setiap bulan dikali sisa masa Perjanjian Kerja yang belum terselesaikan kepada pihak pertama sebagai uang penalty dan ijazah asli pihak kedua akan dikembalikan bersamaan pada saat diterimanya  uang penalty dari pihak kedua.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dalam hal pihak pertama  melakukan pemutusan perjanjian sepihak maka pihak kedua menyatakan melepaskan haknya untuk melakukan tuntutan ganti rugi dalam bentuk apapun  kepada pihak pertama diantaranya melakukan perhitungan akumulasi masa kontrak yang belum dibayarkan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak pertama dapat menghentikan/mengakhiri Perjanjian Kerja ini secara sepihak karena hal-hal sebagai berikut:
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 780px;padding-left:40px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        a.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua melakukan perbuatan-perbuatan yang dilarang dan bertentangan dengan arah kebijakan pihak pertama.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        b.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dianggap tidak mampu melaksanakan tugas sesuai dengan ketentuan Pasal 5 ayat 1 Perjanjian Kerja ini berdasarkan suatu evaluasi dari pihak pertama tanpa perlu persetujuan pihak kedua.
                    </p>
                </td>
            </tr>

            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        c.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua diduga telah melakukan atau terlibat dalam perbuatan tindak pidana yang terbukti dari fakta bahwa pihak kedua ditetapkan sebagai Tersangka oleh Kepolisian Republik Indonesia.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        d.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua dijatuhi hukuman pidana terbukti karena melakukan atau terlibat dalam tindakan pidana.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        e.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua melakukan tindakan dan/atau perbuatan yang melanggar hukum, ketertiban umum, serta kesusilaan yang berlaku dalam masyarakat pada umumnya atau mencemarkan nama baik perusahaan dengan cara apapun juga meskipun terdapat penyangkalan dari pihak kedua.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        f.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua diketahui bekerja pada maupun untuk perusahaan lain, tanpa ijin pihak pertama.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        g.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Berdasarkan Pertimbangan pihak pertama sendiri bahwa pihak kedua diduga tidak dapat melakukan tugas dan tanggung jawab sebagaimana diberikan dan atau diatur dalam Perjanjian ini.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        h.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua diduga telah menimbulkan kerugian baik material maupun imaterial kepada pihak pertama ataupun kepada salah satu pihak dari keluarga besar Direksi atau Dewan Komisaris , atau Pemegang Saham PT  Dwida Jaya Tama berdasarkan Pertimbangan pihak pertama.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 800px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        4.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua harus mengembalikan barang-barang inventaris pada saat Perjanjian Kerja ini berakhir/diputuskan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        5.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Pihak kedua harus melunasi sekaligus hutang/sisa hutang kepada pihak pertama pada saat Perjanjian Kerja ini berakhir/diputuskan, jika masih mempunyai hutang kepada perusahaan.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 780px">
        <tbody>
            <tr>
                <td style="color: white">.</td>
            </tr> 
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Pasal 8</strong>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="text-align: center">
                        <strong>Penutup</strong>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 800px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Hal-hal yang belum diatur atau belum cukup diatur dalam Perjanjian Kerja ini akan diatur dalam suatu addendum (tambahan) yang wajib disepakati para pihak.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Bilamana ada kekurangan atau kekeliruan dalam Perjanjian Kerja ini, akan ditinjau dan diperbaiki sebagaimana mestinya.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="page-break"></div>
<!-- HALAMAN 6 /////////////////////////////////////////////////////////////// -->
<!-- HALAMAN 7 /////////////////////////////////////////////////////////////// -->
    <table style="width: 800px;margin-top:50px">
        <tbody>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Perselisihan, kontroversi dan pertikaian yang berkaitan dengan Perjanjian Kerja ini sedapat mungkin akan diselesaikan secara musyawarah untuk mufakat oleh para pihak.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        4.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Segala lampiran yang ada dan melekat menjadi satu kesatuan yang tidak terpisahkan dari Perjanjian Kerja ini.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        5.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Sengketa yang timbul atas Perjanjian Kerja ini akan diselesaikan melalui Pengadilan Negeri Cibinong atau lembaga peradilan lain yang mengatur penyelesaian sengketa para pihak.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody> 
            <tr>
                <td style="color: white">.</td>
            </tr>        
            <tr>
                <td style="text-align: left"><strong>Pihak pertama,</strong></td>
                <td style="width:500px"></td>
                <td style="text-align: right"><strong>Pihak kedua,</strong></td>
            </tr>
            <tr>
                <td style="color: white">.</td>
            </tr>
            <tr>
                <td style="text-align: left"><u><strong>{{ $detail->direktur }}</strong></u></td>
                <td style="width:500px"></td>
                <td style="text-align: right"><strong>{{ Crypt::decryptString($detail->nama) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left"><strong>Direktur</strong></td>
                <td style="width:500px"></td>
                <td style="text-align: center"></td>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>
<!-- HALAMAN 7 /////////////////////////////////////////////////////////////// -->
<!-- HALAMAN 8 /////////////////////////////////////////////////////////////// -->
    <table style="margin-top:50px">
        <tbody>
            <tr>
                <td><strong>TANDA TERIMA IJAZAH</strong></td>
            </tr>
            <tr>
                <td style="color: white">.</td>
            </tr>   
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td style="text-align: justify">Saya yang bertanda tangan di bawah ini:</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td style="text-align: left;width:50px;color:white">.</td>
                <td style="text-align: left;width:100px"><strong>Nama</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->nama) }}</strong></td>
            </tr>

            <tr>
                <td style="text-align: left;"></td>
                <td style="text-align: left;"><strong>Alamat</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detailprofile->alamat) }}</strong></td>
            </tr>

            <tr>
                <td style="color: white">.</td>
            </tr>

            <tr>
                <td colspan="4">
                    <p style="text-align: justify">
                        Menyatakan bersedia menyerahkan ijazah yaitu:
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Ijazah</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->jurusan) }}</strong></td>
            </tr>
            
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Nomor Ijazah</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->ijazah) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;"></td>
                <td style="text-align: left"><strong>Tgl. Dikeluarkan</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->lulus) }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left"></td>
                <td style="text-align: left"><strong>Dikeluarkan oleh</strong></td>
                <td style="width:10px;vertical-align: text-top">:</td>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->universitas) }}</strong></td>
            </tr>
        
            <tr>
                <td style="color: white">.</td>
            </tr>

            <tr>
                <td colspan="4">
                    <p style="text-align: justify">
                        Sebagai tanda kesungguhan saya untuk bekerja di PT. Dwida Jaya Tama, Jl. Pemuda No. 4 Kelurahan Padurenan, Kecamatan Gunung Sindur, Bogor, Jawa Barat terhitung sejak tanggal {{ $detail->awalkontrak }}.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="text-align: justify">
                        Dengan ketentuan sebagai berikut:
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 780px;padding-left:40px">
        <tbody>
            <tr>
                <td style="width: 30px;vertical-align: text-top">
                    <p style="text-align: left">
                        1.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Ijazah akan diterima kembali setelah jangka waktu yang ditentukan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        2.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Perusahaan bertanggung jawab terhadap kelengkapan ijazah dan mengembalikan dalam kondisi semula sesuai jangka waktu yang ditentukan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        3.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Ijazah dapat diperbanyak sejumlah yang diminta oleh pemilik untuk kepentingan yang tidak perlu diketahui oleh perusahaan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: text-top">
                    <p style="text-align: left">
                        4.
                    </p>
                </td>
                <td>
                    <p style="text-align: justify">
                        Apabila mengundurkan diri ijazah dapat diambil kembali setelah seluruh pertanggung jawaban pekerjaan diselesaikan dengan tuntas kepada atasan secara tertulis dan disetujui oleh atasan.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td colspan="4">
                    <p style="text-align: justify">
                        Demikian kondisi-kondisi serah terima ijazah asli kepada PT. Dwida Jaya Tama.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody> 
            <tr>
                <td style="color: white">.</td>
            </tr>   
            <tr>
                <td style="text-align: left"><strong>Bogor, {{ $detail->awalkontrakhari }} {{ $detail->awalkontrakbulan }} {{ $detail->awalkontraktahun }}</strong></td>
                <td style="width:500px"></td>
                <td style="text-align: center"></td>
            </tr>     
            <tr>
                <td style="text-align: left"><strong>Yang menyerahkan,</strong></td>
                <td style="width:500px"></td>
                <td style="text-align: right"><strong>Yang menerima,</strong></td>
            </tr>
            <tr>
                <td style="color: white">.</td>
            </tr>
            <tr>
                <td style="text-align: left"><strong>{{ Crypt::decryptString($detail->nama) }}</strong></td>
                <td style="width:500px"></td>
                <td style="text-align: right"><u><strong>{{ $detail->direktur }}</strong></u></td>
            </tr>
            <tr>
                <td style="text-align: left"></td>
                <td style="width:500px"></td>
                <td style="text-align: right"><strong>Direktur</strong></td>
            </tr>
        </tbody>
    </table>
<!-- HALAMAN 8 /////////////////////////////////////////////////////////////// -->
    @endforeach
    @endforeach
</body>
</html>