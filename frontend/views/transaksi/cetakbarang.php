<h2>Laporan Barang</h2>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Harga</th>
                      <th>Tgl Post</th>
                      <th>Stok</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                          <?php foreach ($katalog as $katalog): ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $katalog['KATALOG_JUDUL'] ?></td>
                                <td>Rp. <?= number_format($katalog['KATALOG_HARGA']) ?></td>
                                <td><?= $katalog['KATALOG_TGL_POST'] ?></td>
                                <td><?= $katalog['STOK'] ?></td>
                              </tr>

                          <?php $no++; ?>
                      <?php endforeach ?>
                    </tbody>
                </table>