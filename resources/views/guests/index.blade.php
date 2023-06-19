@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-around align-items-center flex-wrap">
    @forelse ($projects as $elem) 
  
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$elem->title}}</h5>
              <p class="card-text">{{$elem->description}}</p>
              <div class="btn btn-primary">{{$elem->lang}}</div>
            </div>
        </div>
    
    @empty
    @endforelse
</div>
@endsection
    