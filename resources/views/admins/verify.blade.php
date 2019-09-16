@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                    @foreach($permissionData as $pData)
                                        <tr>
                                            <th scope="row">{{ $pData->id }}</th>
                                            <td>{{ $pData->file_name }}</td>
                                            <td>{{ $pData->submitted_by }}</td>
                                            <td>{{ $pData->created_at }}</td>
                                            <td>
                                                {{-- Delete --}}
                                                <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                {{-- Accept --}}
                                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-clipboard-check"></i></button>
                                                {{-- Preview --}}
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection