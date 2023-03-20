<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak SPL</title>
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
        header { position: fixed; top: -50px; left: 0px; right: 20px; height: 50px; }
        p { page-break-after: always;line-height:15pt }
        p:last-child { page-break-after: never; }
    </style>
</head>
<body>
    <header>
        @foreach ($overtime as $overtime)
        <table>
            <tr>
                <td style="text-align: left"><strong>SURAT PERINTAH LEMBUR</strong></td>
                <td style="text-align: right"><img src="dwida.png" width="200"></td>
            </tr>
            <tr>
                <td style="text-align: left;font-size:8pt">Nomor SPL</td>
                <td style="text-align: right;font-size:8pt">Departemen/Divisi</td>
            </tr>
            <tr>
                <td style="text-align: left"><strong>{{ $overtime->nomor }}</strong></td>
                <td style="text-align: right"><strong>{{ $overtime->bisnis }}/{{ $overtime->divisi }}</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;font-size:8pt">Tanggal Lembur</td>
                <td style="text-align: right;font-size:8pt">Waktu Lembur</td>
            </tr>
            <tr>
                <td style="text-align: left"><strong>{{ $overtime->hspl }} {{ $overtime->bspl }} {{ $overtime->thspl }}</strong></td>
                <td style="text-align: right"><strong>{{ $overtime->waktu }}</strong></td>
            </tr>
        </table>
        @endforeach
    </header>

    <table style="margin-top:100px">
        <tbody>
            <tr>
                <th style="font-size:8pt">NIK</th>
                <th style="font-size:8pt">Nama</th>
                <th style="font-size:8pt">Jabatan</th>
                <th style="font-size:8pt">Pekerjaan</th>
                <th style="font-size:8pt">SPK</th>
                <th style="font-size:8pt">No. SPK</th>
                <th style="font-size:8pt">Hasil</th>
                <th style="font-size:8pt">Persen</th>
                <th style="font-size:8pt">Mulai</th>
                <th style="font-size:8pt">Berakhir</th>
                <th style="font-size:8pt">Total</th>
            </tr>
            @foreach ($detail as $row)
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->nik }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->nama }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->jabatan }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->pekerjaan }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->spk }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->nospk }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->hasil }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->persen }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->mulai }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $row->akhir }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ intdiv(($row->total),60) .'.'. ($row->total)%60 }}</td>
            </tr>
            @endforeach
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:8pt" colspan="10">TOTAL WAKTU LEMBUR</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ intdiv(($detail->sum('total')),60) .'.'. ($detail->sum('total'))%60 }}</td>
            </tr>
        </tbody>
    </table>

    <table style="margin-top:50px">
        <tbody>
            <tr>
                <th style="font-size:8pt">Diajukan oleh,</th>
                <th style="font-size:8pt">Disetujui oleh,</th>
                <th style="font-size:8pt">Diketahui oleh,</th>
            </tr>
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $overtime->pemohon }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $overtime->nmmanajer }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $overtime->nmhr }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>