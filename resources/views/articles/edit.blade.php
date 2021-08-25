@extends('layouts.app')
@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.css">

@endsection
@section('content')

    <div id="wrapper">
        <div id="page" class="container">

            <h1 class="heading has-text-weight-bold is-size-4">edit article </h1>
            <form method="POST" action="{{route('update',$articles->id)}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="field">
                    <label class="label" for="">title</label>

                    <div class="control">
                        <input class="input" type="text" name="title" id="title" value="{{$articles->title}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="">excerpt</label>

                    <div class="control">
                        <input class="textarea" type="text" name="excerpt" id="excerpt" value="{{$articles->excerpt}}">
                    </div>
                </div>

                <div class="field">


                    <div class="control">
                        <img src="{{asset('images/articles/'.$articles->image)}} " width="100px"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="">body</label>

                    <div class="control">
                        <input class="textarea"  name="body" id="body" value="{{$articles->body}}">
                    </div>
                </div>
                <div class="field">
                    <div class="form-group">
                        <label class="label" for="file">image</label>
                        <div class="control">
                            <input type="file" name="file" id="file"  required>
                        </div>
                    </div>
                </div>

                <div class="field is-grouped">


                    <div class="control">
                        <button class="button is-link" type="submit">submit</button>
                    </div>
                </div>


            </form>

        </div>

@endsection

