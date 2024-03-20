@extends("layout")

@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Insert Jawaban</h1>
                        <button class="btn btn-success" onclick="tambahJawaban()">Tambah Jawaban</button>
                    </div>

                    <div class="mb-4">
                        <div class="card border-left-primary p-4 h-100 w-50">
                            <form action="/formmanagement/jawaban/post" method="post">
                                @csrf
                                <ul id="jawaban" class="d-flex gap-3 flex-column">
                                    <li>
                                        <input type="text" name="answers[]" class="form-control" required>
                                    </li>
                                    <li>
                                        <input type="text" name="answers[]" class="form-control" required>
                                    </li>
                                </ul>
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="form" value="{{$form}}">
                                <button type="submit" class="btn btn-primary d-block">Create</button>
                            </form>
                        </div>
                    </div>

                    <script>
                        function tambahJawaban(){
                            const jawaban = document.querySelector("#jawaban");

                            jawaban.innerHTML += "<li><input type='text' name='answers[]' class='form-control' required></li>"
                        }
                    </script>
@endsection