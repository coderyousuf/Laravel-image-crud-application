@extends('students.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Student</h2>
                    </div>

                      <div class="card-body">
                        <form action="{{ url('students/' .$students->id) }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method("PATCH")
                            <label class="control-label">Name</label><br>
                            <input type="text" name="name" id="name" class="form-control
                            @error('name')
                                is-invalid
                             @enderror" value="{{$students->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span><br>
                            @enderror
                            <label class="control-label">Roll</label><br>

                            <input type="number" name="roll" id="roll" class="form-control @error('roll')
                                is-invalid
                            @enderror" value="{{$students->roll}}">
                            @error('roll')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror

                            <label class="control-label">Image</label><br>
                            <input type="file" name="img" id="img" class="form-control @error('img')
                                is-invalid
                            @enderror">
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>


                            <br>
                            <input type="submit" value="save" class="btn btn-success">

                        </form>
                      </div>
                </div>
            </div>

        </div>
    </div>
@endsection
