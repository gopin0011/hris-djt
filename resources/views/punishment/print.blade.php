<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Peringatan - @foreach ($data as $data){{ $data->nama }}@endforeach</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Arial';
            color:#333;
            text-align:left;
            font-size:11pt;
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
            font-size: 11pt;
            background-color: #cccccc;
        }
        
        tr{
            padding:3px;  
            font-size: 11pt;
        }

        td {
            padding:3px;
            font-size: 11pt;
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
   
    <table>
        <tbody>
            <tr>
                @if($data->jenis == 'SP1')
                    <td><strong><u>SURAT PERINGATAN KESATU</u></strong></td>
                @elseif($data->jenis == 'SP2')
                    <td><strong><u>SURAT PERINGATAN KEDUA</u></strong></td>
                @else
                    <td><strong><u>SURAT PERINGATAN KETIGA</u></strong></td>
                @endif
            </tr>
            <tr>
                <td style="font-size: 11pt">{{ $data->nomor }}</td>
            </tr>
        </tbody>
    </table>

    <table style="margin-top:30px">
        <tbody>
            <tr>
                <td style="text-align: left">Dibuat oleh perusahaan, dalam hal ini ditujukan kepada:</td>
            </tr>
        </tbody>
    </table>

    <table style="margin-left:70px">
        <tbody>
            <tr>
                <td style="text-align: left;width: 50px"><strong>Nama</strong></td>
                <td style="text-align: left;width: 10px"><strong>:</strong></td>
                <td style="text-align: left"><strong>{{ $data->nama }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;width: 50px"><strong>NIK</strong></td>
                <td style="text-align: left;width: 10px"><strong>:</strong></td>
                <td style="text-align: left"><strong>{{ $data->nik }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;width: 50px"><strong>Departemen</strong></td>
                <td style="text-align: left;width: 10px"><strong>:</strong></td>
                <td style="text-align: left"><strong>{{ $data->divisi }} - {{ $data->bisnis }}</strong></td>
            </tr>
        </tbody>
    </table>

    <table style="margin-top:10px">
        <tbody>
            <tr>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Sehubungan dengan kesalahan dan pelanggaran terhadap tata tertib/peraturan perusahaan yang saudara lakukan yaitu, <strong>{{ $data->alasan }}</strong>. Maka dengan ini perusahaan memberikan <strong>@if($data->jenis == "SP1")Surat Peringatan Kesatu @elseif($data->jenis == "SP2")Surat Peringatan Kedua @elseif($data->jenis == "SP3")Surat Peringatan Ketiga @endif</strong> kepada <strong>Sdr. {{ $data->nama }}</strong> dengan ketentuan sebagai berikut:
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table style="margin-left:70px">
        <tbody>
            <tr>
                <td style="text-align: left;width:10px">1.</td>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        <strong>@if($data->jenis == "SP1")Surat Peringatan Kesatu @elseif($data->jenis == "SP2")Surat Peringatan Kedua @elseif($data->jenis == "SP3")Surat Peringatan Ketiga @endif</strong> berlaku untuk <strong>6 (enam) bulan</strong> kedepan sejak diterbitkan.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;vertical-align:text-top;width:10px">2.</td>
                <td style="text-align: left">
                    @if($data->jenis == "SP1")
                    <p style="text-align: justify">
                        Jika dalam kurun waktu 1 (satu) s/d 6 (enam) bulan kedepan sejak Surat Peringatan Kesatu diterbitkan Saudara didapati kembali melakukan tindakan pelanggaran dan tidak melaksanakan tugas dan tanggung jawab dengan sebaik-baiknya, maka Perusahaan akan memberikan Surat Peringatan Kedua, Ketiga  sampai dengan Pemutusan Hubungan Kerja (PHK) tanpa adanya uang pesangon.
                    </p>
                    @elseif($data->jenis == "SP2")
                    <p style="text-align: justify">
                        Jika dalam kurun waktu 1 (satu) s/d 6 (enam) bulan kedepan sejak Surat Peringatan Kedua diterbitkan Saudara didapati kembali melakukan tindakan pelanggaran dan tidak melaksanakan tugas dan tanggung jawab dengan sebaik-baiknya, maka Perusahaan akan memberikan Surat Peringatan Ketiga sampai dengan Pemutusan Hubungan Kerja (PHK) tanpa adanya uang pesangon.
                    </p>
                    @else
                    <p style="text-align: justify">
                        Jika dalam kurun waktu 1 (satu) s/d 6 (enam) bulan kedepan sejak Surat Peringatan Ketiga diterbitkan Saudara didapati kembali melakukan tindakan pelanggaran dan tidak melaksanakan tugas dan tanggung jawab dengan sebaik-baiknya, maka Perusahaan akan memberikan Pemutusan Hubungan Kerja (PHK) tanpa adanya uang pesangon.
                    </p>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:10px">
        <tbody>
            <tr>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Demikian <strong>@if($data->jenis == "SP1")Surat Peringatan Kesatu @elseif($data->jenis == "SP2")Surat Peringatan Kedua @elseif($data->jenis == "SP3")Surat Peringatan Ketiga @endif</strong> ini dibuat agar dapat diperhatikan dan ditaati sebaik mungkin.
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top:50px">
        <tbody>
            <tr>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        Bogor, {{ $data->hari }} {{ $data->bulan }} 20{{ $data->tahun }}
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <p style="text-align: justify">
                        PT. Dwida Jaya Tama
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="margin-top:20px">
        <tbody>
            <tr>
                <td style="text-align: left">
                    Dibuat oleh,
                </td>
                <td style="text-align: right">
                    Diterima oleh,
                </td>
            </tr>
            <tr>
                <td style="height: 50px"></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <strong><u>{{ $data->hr }}</u></strong>
                </td>
                <td style="text-align: right">
                    <strong><u>{{ $data->nama }}</u></strong>
                </td>
            </tr>
            <tr>
                <td style="text-align: left">
                    Human Resources
                </td>
                <td style="text-align: right">
                    Karyawan
                </td>
            </tr>
        </tbody>
    </table>

    <table style="margin-top:20px">
        <tbody>
            <tr>
                <td style="text-align: left">
                    Mengetahui,
                </td>
                <td style="text-align: right">
                    Mengetahui,
                </td>
            </tr>
            <tr>
                <td style="height: 50px"></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <strong><u>{{ $data->direktur }}</u></strong>
                </td>
                <td style="text-align: right">
                    <strong><u>{{ $data->atasan }}</u></strong>
                </td>
            </tr>
            <tr>
                <td style="text-align: left">
                    Direktur
                </td>
                <td style="text-align: right">
                    Atasan
                </td>
            </tr>
        </tbody>
    </table>
</body>