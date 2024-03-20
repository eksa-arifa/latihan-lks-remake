@extends("layout")

@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Soal</h1>
                    </div>

                    <div class="mb-4">
                        <div class="card border-left-primary py-2 h-100">
                            <form class="p-4" method="post" action="/formmanagement/soal/editpost">
                                @csrf
                                @method('patch')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Question</label>
                                    <input type="text" name="question" value="{{$question->question}}" class="form-control" id="title" required aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select">
                                        @if($question["type"] == "multiple-answer")
                                        <option value="multiple-answer">Multiple answer</option>
                                        <option value="short-answer">Short answer</option>
                                        @else
                                        <option value="short-answer">Short answer</option>
                                        <option value="multiple-answer">Multiple answer</option>
                                        @endif
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="{{$id}}">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
@endsection