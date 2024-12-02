<table>
  <thead>
    <tr>
        <th>NIS</th>
        <th>NAMA</th>
        <th>RAYON</th>
        <th>ROMBEL</th>
        <th>KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tanggal:</td>
      <td>{{ $absens['tgl'] }}</td>
    </tr>
    @foreach($absens as $absen)
      <tr>
          <td>{{ $absen->nis }}</td>
          <td>{{ $absen->nama }}</td>
          <td>{{ $absen->rayon }}</td>
          <td>{{ $absen->rombel }}</td>
          <td>{{ $absen->ket }}</td>
      </tr>
    @endforeach
  </tbody>
</table>