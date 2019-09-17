@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-0">Upload your permission</h1>
                        <p class="text-muted">We only accept text based file</p>
                        <hr>

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }} <br/>
                                @endforeach
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <div class="card card-inactive">
                            {!! Form::open(['route' => 'submit_data', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div>
                                    {{ Form::file('Select file', ['accept' => '.txt', 'name' => 'select_file']) }}
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