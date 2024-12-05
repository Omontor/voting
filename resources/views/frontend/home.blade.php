@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    "Ay ermoso!!"  <b> Bienvenido {{auth()->user()->name}} </b>


                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ranking</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse($candidates as $candidate)

                    <div class="card">
                        <div class="card-header">
                         # {{$loop->index + 1}}  <b> </b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    <center>
                                        <img src="{{$candidate->image->getUrl()}}" alt="" style="width:100px;">
                                    </center>
                                </div>
                                <hr>
                                <div class="col-xs-12 col-md-9">
                                    <b>Título: </b> {{$candidate->name}} <br>
                                    <b>Mes: </b>  {{$candidate->month->name}}  <br>
                                    <b>Calificación Actual: {{$candidate->getVotesSum()}}</b> <br>
                                </div>
          
                               <div class="col-12">
                                <br>
                                <center>
                                    <a href="{{route('frontend.candidates.show', $candidate)}}" class="btn btn-block btn-primary">Ver</a>
                                </center>
                                <br>
                               </div>
                            </div>
                            <div class="card-bottom">
                                Autor: {{$candidate->creator->name}} 
                               </div>
                         
                        </div>

                      </div>

                      <br>
                    @empty
                    @endforelse

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection