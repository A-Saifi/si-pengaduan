<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $title  ?></title>
    
  </head>
  <body>
    <div style="margin-right: 20px; margin-left: 20px;">
      <table style="border=1">
        <tr>
          <th style="border: 1px solid #dddddd;">NIK</th>
          <th style="border: 1px solid #dddddd;">Nama</th>
          <th style="border: 1px solid #dddddd;">RT</th>
          <th style="border: 1px solid #dddddd;">RW</th>
          <th style="border: 1px solid #dddddd;">Dusun</th>
          <th style="border: 1px solid #dddddd;">Kelurahan</th>
          <th style="border: 1px solid #dddddd;">Kecamatan</th>
          <th style="border: 1px solid #dddddd;">Kabupaten</th>
        </tr>
        <?php foreach ($pengguna as $p): ?>
          <tr>
            <td style="border: 1px solid #dddddd;"><?php echo $p['nik_pdk']; ?></td>
            <td style="border: 1px solid #dddddd;"><?php echo ucwords(strtolower($p['nama_pdk'])); ?></td>
            <td style="border: 1px solid #dddddd;"><?php echo $p['nama_rt']; ?></td>
            <td style="border: 1px solid #dddddd;"><?php echo $p['nama_rw']; ?></td>
            <td style="border: 1px solid #dddddd;"><?php echo $p['nama_dusun']; ?></td>
            <td style="border: 1px solid #dddddd;"><?php echo $p['nama_kel']; ?></td>
            <td style="border: 1px solid #dddddd;"><?php echo $p['nama_kec']; ?></td>
            <td style="border: 1px solid #dddddd;"><?php echo $p['nama_kab']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>
