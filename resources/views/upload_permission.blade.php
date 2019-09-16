@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-0">Upload your permission</h1>
                        <p class="text-muted">There's no maximum size atm. You can upload any size of text</p>
                        <hr>

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }} <br/>
                                @endforeach
                            </div>
                        @endif

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="card card-inactive">
                            {!! Form::open(['route' => 'submit_data', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div>
                                    {{ Form::file('Select file', ['accept' => '.permission', 'name' => 'select_file']) }}
                                </div>
                                <div style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-cloud-upload-alt"></i> Submit</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection