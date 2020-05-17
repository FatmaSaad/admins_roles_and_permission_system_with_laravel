@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit this Permission</div>

                <div class="card-body">
                    <form action="{{ route('admin.permission.update', $permission->id) }}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="permission">Permission Name</label>
                            <input type="text" value="{{ $permission->name }}" name="name" class="form-control" id="permission">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        <a href="{{ route('admin.permission') }}" class="btn btn-danger btn-sm float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
