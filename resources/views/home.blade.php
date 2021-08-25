@extends('layouts.app')
@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.css">

@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
@foreach($articles as $article)
                <div class="title">{{ $article->title }} </div>

                <img src="{{asset('images/articles/'.$article->image)}}" alt="" class="image image-full" WIDTH="500px" />
                <BR>
                    <div class="field is-grouped">
                        <div class="control">
                 <a href="articles/edit/{{$article->id}}"><button class="button is-link" >edit</button></a>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <a href="articles/delete/{{$article->id}}"><button class="button is-link" >delete</button></a>
                        </div>
                    </div>
              <p>  {{$article->body}}</p>
<br>
    <br>
    <br>
                @endforeach
            </div>


        </div>
    </div>

@endsection

