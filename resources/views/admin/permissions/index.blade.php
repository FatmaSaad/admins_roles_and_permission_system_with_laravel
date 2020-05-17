@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    Permissions
                    @permitTo('CreatePermission')
                    <span class="float-right">
                        <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-success">New Permission</a>
                    </span>
                    @endpermitTo
                </div>

                <div class="card-body">
                    <ol class="list-group">
                        @foreach ($permissions as $permission)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $permission->name }}
                            {{-- <span class="badge badge-primary badge-pill">{{(App\Admin::permission($permission)->$id)->get()->count() }} 0000</span> --}}
                            {{-- <span class="badge badge-warning badge-pill">{{ $permission->permissions->count() }} --}}
                                {{-- Permissions</span> --}}
                            <div class="float-right">
                                {{-- @permitTo('DeletePermission,UpdatePermission') --}}
                                <a href="" class="btn btn-sm btn-secondary mr-3"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $permission->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $permission->id }}"
                                    action="{{ route('admin.permission.delete',$permission->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                {{-- @endpermitTo --}}

                                {{-- @permitTo('UpdatePermission') --}}
                                <a href="{{ route('admin.permission.edit',$permission->id) }}"
                                    class="btn btn-sm btn-primary mr-3">Edit</a>
                                {{-- @endpermitTo --}}
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
