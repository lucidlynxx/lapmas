<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Print Laporan</title>
</head>
<body>
  <style type="text/css">
    table{
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
		td{
      padding: 8px;
      text-align: left;
      border: 1px solid #bebebe;
		}
    h2{
      font-family: sans-serif;
    }
	</style>
  <center>
    <h2>Print Laporan</h2>
  </center>
  <table>
    <tr>
      <td style="width:23%">Nama : </td>
      <td>{{$report->user->name}}</td>
    </tr>
    <tr>
      <td>Email : </td>
      <td>{{$report->user->email}}</td>
    </tr>
    <tr>
      <td>Tempat Kejadian : </td>
      <td>{{$report->lokKejadian}}</td>
    </tr>
    <tr>
      <td>Tanggal Kejadian : </td>
      <td>{{date('d F Y', strtotime($report->tglKejadian))}}</td>
    </tr>
    <tr>
      <td>Klasifikasi Laporan : </td>  
      <td>{{$report->classification->name}}</td>
    </tr>
    <tr>
      <td>Kategori Laporan: </td>
      <td>{{$report->Kategori}}</td>
    </tr>
    <tr>
      <td>Judul Laporan : </td>
      <td>{{ $report->title }}</td>
    </tr>
    <tr>
      <td>Isi Laporan : </td>
      <td>{{ $report->body }}</td>
    </tr>
    {{-- <tr>
      <td>Lampiran foto : </td>
      <td>{{ asset('storage/' . $report->image) }}</td>
    </tr> --}}
  </table>
</body>
</html>