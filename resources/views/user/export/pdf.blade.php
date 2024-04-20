<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GLERRY</title>
  <link rel="icon" href="{{ asset('gllery.png') }}">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: "Poppins", sans-serif;

    }
  </style>
</head>

<body>
  <h1 style="color: #00044B;">Aktivitas User {{ $user->username }}</h1>
  <p></p>
  <table border="1" cellspacing="0" cellpadding="10" style="border: 1px solid #00044B;">
    <thead>
      <tr style="background-color: #00044B; color: #fff;">
        <th>No</th>
        <th style="width: 120px;">Unggahan</th>
        <th style="width: 335px;">Aktivitas</th>
        <th>Waktu</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($aktivitas as $index => $data)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>
          @if ($data->foto)
          @php
          $imagePath = Storage::url($data->foto);
          $imageData = base64_encode(file_get_contents(public_path($imagePath)));
          $imageSrc = 'data:' . mime_content_type(public_path($imagePath)) . ';base64,' . $imageData;
          @endphp
          <img style="max-width: 150px; max-height: 400px;" src="{{ $imageSrc }}" alt="Foto">
          @else
          <p>Aktivitas tidak memuat gambar.</p>
          @endif
        </td>
        <td style="max-width: 335px">{{ $data->aktivitas }}</td>
        <td style="max-width: 250px">{{ $data->created_at->format('d M Y H:i') }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</body>

</html>