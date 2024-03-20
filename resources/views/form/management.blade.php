@extends("layout")

@section("content")
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Form Management</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-wrap justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Form Management</h6>
                            <span>Klik "detail" untuk menambahkan soal</span>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Create new form
                            </button>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tittle</th>
                                            <th>Description</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($form) > 0)
                                        @foreach($form as $f)
                                            <tr>
                                              <td>{{$loop->index + 1}}</td>
                                              <td>{{$f["title"]}}</td>
                                              <td>{{$f["description"]}}</td>
                                              <td>{{"http://". $host . "/form/" .$f["slug"]}}</td>
                                              <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus</a><a href="/formmanagement/edit/{{$f['id']}}" class="btn btn-warning mx-2">Edit</a>
                                                  <a href="/formmanagement/soal/{{$f['id']}}" class="btn btn-primary">Detail</a></td>
                                            </tr>

                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "hapus" jika kamu benar-benar yakin.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/formmanagement/hapus/{{$f['id']}}">Hapus</a>
                </div>
            </div>
        </div>
    </div>
                                        @endforeach
                                        @else
                                        <tr>
                                          <td colspan="5" class="text-center">Form masih kosong</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{$form->links()}}
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create new form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="formmanagement/createform">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection