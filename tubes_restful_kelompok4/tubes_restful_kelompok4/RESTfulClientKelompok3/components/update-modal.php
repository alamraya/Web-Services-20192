<!-- Modal -->
<div class="modal fade" id="updateModal<?= $herb["id"]; ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="labelModalKu">Ubah Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="update-data.php" method="post">
                    <input type="hidden" name="id" value="<?= $herb["id"]; ?>">
                    <div class="form-group">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" id="namaProduk" placeholder="Nama produk..." value="<?= $herb["nama"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Kategori produk..." value="<?= $herb["kategori"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga produk..." value="<?= $herb["harga"]; ?>">
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary submitBtn" name="submit">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
