
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="user-form" action="{{ route('crud.store') }}" method="POST" enctype="multipart/form-data">
                        

                            <div class="form-group">
                                <label class="font-weight-bold">KODE</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode') }}" placeholder="kode">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="nama">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">ALAMAT</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="alamat">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>

<script>
	$('#user-form').submit(function(e) {
            e.preventDefault();

			$.ajax({
				headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				type: 'POST',
				url: $('#user-form').attr('action'),
				data: $('#user-form').serialize(),
				beforeSend: function () {

				},
				success: function(data) {
                    alert(data);
				}	
			});
    });
</script>