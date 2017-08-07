<table class="table table-condensed">
  <tbody><tr>
    <th style="width: 10px">#</th>
    <th>Nama Foto</th>
    <th>Hapus</th>
    <th>Lihat</th>
  </tr>

  <?php $counter=0; ?>

  <?php foreach ($this->load_data->gambar($pengaduan['id_pengaduan']) as $foto): ?>

    <?php $this->view('frontend/pengaduan/edit/detailGambar', ['foto' => $foto]) ?>

    <tr>
      <td><?= $counter+=1; ?>.</td>
      <td><?= $foto['nama_gambar'] ?></td>
      <td>
        <a class="badge bg-red" href="<?= base_url('gambar/hapus/'.$pengaduan['id_pengaduan'].'/'.$foto['id_gambar']) ?>" onclick="return confirm('Yakin ingin menghapus foto ini?');">Hapus</a>
      </td>
      <td>
        <a class="badge bg-green" data-toggle="modal" data-target="#<?= $foto['id_gambar'] ?>">Lihat</a>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody></table>
<hr>
