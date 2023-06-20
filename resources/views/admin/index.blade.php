@extends('layouts.app')
@section('content')
<h1>sono la pagina admin index</h1>
<div class="d-flex justify-content-around align-items-center flex-wrap">
    @forelse ($posts as $elem) 
    <a class="text-decoration-none" href="{{ route( 'admin.index.show', $elem ) }}">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$elem->title}}</h5>
              <p class="card-text">{{$elem->description}}</p>
              <div class="btn btn-primary">{{$elem->lang}}</div>
            </div>    
        </div>
    </a>
    @empty
    @endforelse
</div>
@endsection