<div class="modal-body">
  <h4>Alasan: @isset($absen->alasan_s) {{ $absen->alasan_s }} @endisset</h4>
  <h5>Surat Dokter: </h5>
  @isset($absen->surat_dokter)
    <img src="/{{ $absen->surat_dokter }}" style="display: block; margin: 0 auto; width: 80%; height: auto;" alt="">
  @endisset
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>