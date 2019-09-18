@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-{{ $btn_type }}">
                {{ $message }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Verified Uploads</div>
                    <div class="card-body">
                        <table class="table table-striped table-responsive-md btn-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>File Name</th>
                                <th>Submitted By</th>
                                <th>Date Submitted</th>
                                <th>File Path</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(isset($permissionData))
                                @if(count($permissionData) > 0)
                                    @foreach($permissionData as $pData)
                                        @if($pData->verified)
                                            <tr>
                                                <th scope="row">{{ $pData->id }}</th>
                                                <td>{{ $pData->file_name }}</td>
                                                <td>{{ $pData->submitted_by }}</td>
                                                <td>{{ $pData->created_at }}</td>
                                                <td>{{ $pData->file_path }}</td>
                                                <td>
                                                    {{-- Delete --}}
                                                    <form action="{{ URL::route('delete_permission_data', $pData->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                    </form>

                                                    {{-- Preview --}}
                                                    <form action="{{ URL::route('show_permission_data', $pData->id) }}" method="GET" style="display: inline;">
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
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