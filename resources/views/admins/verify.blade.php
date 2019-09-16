@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">List of Unverified Uploads</div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-md btn-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>File Name</th>
                                    <th>Submitted By</th>
                                    <th>Date Submitted</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($permissionData))
                                    @if(count($permissionData) > 0)
                                        @foreach($permissionData as $pData)
                                            <tr>
                                                <th scope="row">{{ $pData->id }}</th>
                                                <td>{{ $pData->file_name }}</td>
                                                <td>{{ $pData->submitted_by }}</td>
                                                <td>{{ $pData->created_at }}</td>
                                                <td>
                                                    {{-- Delete --}}
                                                    <form action="{{ URL::route('delete_permission_data', $pData->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                    </form>

                                                    {{-- Accept --}}
                                                    <form action="{{ URL::route('accept_permission_data', $pData->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-clipboard-check"></i></button>
                                                    </form>

                                                    {{-- Preview --}}
                                                    <form action="{{ URL::route('show_permission_data', $pData->id) }}" method="GET" style="display: inline;">
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection