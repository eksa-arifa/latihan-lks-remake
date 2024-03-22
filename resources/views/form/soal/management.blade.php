@extends("layout")


@section("content")
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Soal Management</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Soal Management</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Create soal
                            </button>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Question</th>
                                            <th>Type</th>
                                            <th>Answers</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($questions) > 0)
                                        @foreach($questions as $q)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$q["question"]}}</td>
                                            <td>{{$q["type"]}}</td>
                                            <td id="answers{{$loop->index}}">
                                              @if($q["type"] == "multiple-answer")
                                              <ul>
                                                @foreach($q->answer as $a)
                                                  

                                                    <li>{{$a["answer"]}}</li>

                                                @endforeach
                                              </ul>
                                                   
                                                @else
                                                    None
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/formmanagement/soal/hapus/{{$q["id"]}}" class="btn btn-danger">Hapus</a>
                                                <a href="/formmanagement/soal/edit/{{$q["id"]}}" class="btn btn-warning">Edit</a>
                                            </td>
                                        </tr>

                                        <script>
  let answers{{$loop->index}} = document.getElementById("answers{{$loop->index}}");



    if(answers{{$loop->index}}.innerText == ""){
      answers{{$loop->index}}.innerHTML = " <a href='/formmanagement/jawaban/{{$q['id']}}/{{$id}}' class='btn btn-success'>jawaban</a>"
    }
  
</script>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Soal masih kosong
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{$questions->links()}}
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Soal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/formmanagement/soal/create">
          @csrf
          <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" required>
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select">
                <option value="multiple-answer">Multiple answer</option>
                <option value="short-answer">Short answer</option>
            </select>
          </div>

          <input type="hidden" value="{{$id}}" name="id">
          
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