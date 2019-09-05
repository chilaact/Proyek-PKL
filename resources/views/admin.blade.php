@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      
                    <p>Anda login sebagai <strong><span class="text-danger">{{ Auth::user()->Biodata->nama }}</span></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection