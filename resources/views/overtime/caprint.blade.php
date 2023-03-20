<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pengajuan Dana SPL</title>
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
    <table>
        <tr>
            <td style="text-align: left; font-size:14pt;"><strong>FORM PENGAJUAN DANA</strong></td>
            <td style="text-align: right"><img src="dwida.png" width="200"></td>
        </tr>
    </table>

    <table>
        <tbody>
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: left">Tanggal</td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: left">{{ date(now()->format('d-m-Y')) }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: left">Unit Bisnis</td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: left">{{ $bisnis }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: left">Departemen</td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: left">Human Resources</td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td style="font-size:10pt">Dengan ini mengajukan permohonan dana untuk keperluan <strong>CA Uang Makan Lembur {{ $bisnis }}</strong></td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"><strong>URAIAN</strong></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"><strong>JUMLAH</strong></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"><strong>NOMINAL</strong></td>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: left">{{ $item->a }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt">{{ $item->b }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: right">{{ $item->b*15000 }}</td>
            </tr>
            @endforeach
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"><strong>TOTAL</strong></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"><strong>{{ $data->sum('b') }}</strong></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; text-align: right"><strong>{{ $data->sum('b')*15000 }}</strong></td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td style="font-size:10pt">Demikian kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</strong></td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <th style="font-size:10pt">Pemohon</th>
                <th colspan="2" style="font-size:10pt">Menyetujui</th>
                <th style="font-size:10pt">Mengetahui</th>
            </tr>
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt; height:50px;"></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"></td>
            </tr>
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:10pt">{{ Auth::user()->name }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt"></td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt">Keuangan</td>
                <td style="border: 1px solid #aaaaaa; font-size:10pt">Direktur Utama</td>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>

    <table>
        <tr>
            <td style="text-align: center; font-size:10pt;"><strong>DAFTAR PESANAN MAKANAN</strong></td>
        </tr>
    </table>

    <table style="margin-top:10px">
        <tr>
            <td style="text-align: left; font-size:10pt; width:80px">UNIT BISNIS</td>
            <td style="text-align: center; font-size:10pt; width:5px">:</td>
            <td style="text-align: left; font-size:10pt"><strong>{{ $bisnis }}</strong></td>
            <td style="text-align: right; font-size:10pt"><strong>{{ $hari }} {{ $bulan }} {{ $tahun }}</strong></td>
        </tr>
    </table>
    
    <table style="margin-top:5px">
        <tbody>
            <tr>
                <th style="font-size:8pt; width:150px">DIVISI</th>
                <th style="font-size:8pt; width:150px">MENU</th>
                <th style="font-size:8pt; width:50px">JUMLAH</th>
                <th style="font-size:8pt">CATATAN</th>
                
            </tr>
            @foreach ($datamenu as $item)
            <tr>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $item->divisi }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $item->makan }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt">{{ $item->jumlah }}</td>
                <td style="border: 1px solid #aaaaaa; font-size:8pt"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>