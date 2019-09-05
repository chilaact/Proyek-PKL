@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
            </head>
            <body>
                <div style="text-align: right">
                    <iframe
                        allow="microphone"
                        width="350"
                        height="500"
                        src="https://console.dialogflow.com/api-client/demo/embedded/46f7eea8-6fe0-48e4-9084-b78759f89c3f">
                </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Calon Siswa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      
                    <p>Anda login sebagai <strong>{{ Auth::user()->Biodata->nama }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection