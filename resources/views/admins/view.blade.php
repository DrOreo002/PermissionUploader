@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(isset($pData))
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mb-0">Previewing data</h1>
                            <p class="text-muted">{{ $pData->file_name }}</p>
                            <div class="form-group green-border-focus" style="margin-bottom: 0;">
                                <textarea name="permission_data" class="form-control" wrap="off">{!! $fileContent !!}</textarea>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="container">
                    @if(isset($error))
                        <div class="alert alert-danger"><i class="fas fa-info-circle"></i> {{ $error }}</div>
                    @else
                        @if($pData->verified)
                            <div class="alert alert-success"><i class="fas fa-check-circle"></i> This data is verified</div>
                        @else
                            <div class="alert alert-danger"><i class="fas fa-window-close"></i> This data is not yet verified</div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection