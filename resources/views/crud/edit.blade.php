
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="user-form" action="{{ route('crud.update',$post->id) }}" method="PUT" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <label class="font-weight-bold">KODE</label>
                                <input type="text" class="form-control" name="kode" value="{{ $post->kode }}" placeholder="kode">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control" name="nama" value="{{ $post->nama }}" placeholder="nama">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">ALAMAT</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $post->alamat }}" placeholder="alamat">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
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
				type: 'PUT',
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