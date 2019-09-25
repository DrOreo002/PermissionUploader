@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Auth::user()->roleLvl >= 1)
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <h4 class="alert-heading">Welcome Admin!</h4>
                        <p>
                            Welcome to the main dashboard!, here you can find a lot of<br>
                            useful tools for managing uploaded permissions!
                        </p>
                        <hr>
                        <p class="mb-0">{{ Config::get('app.custom.app_info') }}</p>
                    </div>
                @endif
                <div class="container">
                    <button type="button" class="btn btn-primary btn-lg" onclick="window.location= '{{ url("/upload") }}'"><i class="fas fa-upload"></i> Upload Permission</button>
                </div>
            </div>
            @if (Auth::user()->roleLvl >= 1)
                @include('side.admin_tools')
            @endif
        </div>
    </div>
@endsection
