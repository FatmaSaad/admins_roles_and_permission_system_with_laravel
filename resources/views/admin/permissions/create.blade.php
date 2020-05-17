@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Add New Permission</div>

                <div class="card-body">
                    <form action="{{ route('admin.permission.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="permission">Permission Name</label>
                            <input type="text" placeholder="Give an awesome name for permission" name="name"
                                class="form-control" id="permission" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('admin.permission') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
