@extends("layout")

@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Form</h1>
                    </div>

                    <div class="mb-4">
                        <div class="card border-left-primary py-2 h-100">
                            <form class="p-4" method="post" action="/formmanagement/formeditpost">
                                @csrf
                                @method("patch")
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" value="{{$form->title}}" class="form-control" id="title" required aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" value="{{$form->description}}" class="form-control" id="description" required aria-describedby="emailHelp">
                                </div>
                                <input type="hidden" name="id" value="{{$id}}">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
@endsection