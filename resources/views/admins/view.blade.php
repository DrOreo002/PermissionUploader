@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-0">Previewing data</h1>
                        <p class="text-muted">Current data is {{ $pData->file_name }}</p>
                    </div>
                    <div class="container">
                        @if($pData->verified)
                            <div class="alert alert-success"><i class="fas fa-check-circle"></i> This data is verified</div>
                        @else
                            <div class="alert alert-danger"><i class="fas fa-window-close"></i> This data is not yet verified</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection