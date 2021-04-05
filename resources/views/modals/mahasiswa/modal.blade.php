<!-- Modal -->
<div class="modal fade" id="mahasiswa_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nama">
            </label>  
          Nama
          <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="form-group">
          <label for="kelas">
            Kelas
          </label>
          <input type="text" class="form-control" name="kelas" id="kelas">
        </div>
        <div class="form-group">
          <label for="jk">
            Jenis Kelamin
          </label>
          <select name="jk" id="jk" class="form-control" style="cursor: pointer;">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="alamat">
            Alamat
          </label>
          <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="simpan" class="btn btn-primary add-mahasiswa">Simpan</button>
        <button type="button" class="btn btn-secondary clse" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>