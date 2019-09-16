@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert ale rt-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome user {{ Auth::user()->name }} into the main Dashboard :D
                        <br>
                        Thank you for using my plugin! ~ DrOreo002
                        <br>
                        <br>
                        <button type="button" class="btn btn-primary btn-lg" onclick="window.location= '{{ url("/upload") }}'"><i class="fas fa-upload"></i> Upload Permission</button>
                    </div>
                </div>
            </div>
            @if (Auth::user()->roleLvl >= 1)
                @include('side.admin_tools')
            @endif
        </div>
    </div>
@endsection
