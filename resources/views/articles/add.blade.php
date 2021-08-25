@extends('layouts.app')
@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.css">

@endsection
@section('content')

    <div id="wrapper">
        <div id="page" class="container">

            <h1 class="heading has-text-weight-bold is-size-4">{{__('messages.new article')}} </h1>
            <form method="POST" action="/articles/add" enctype="multipart/form-data" >
                @csrf
                <div class="field">
                    <label class="label" for="">title</label>

                    <div class="control">
                        <input class="input" type="text" name="title" id="title">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="">excerpt</label>

                    <div class="control">
                        <input class="textarea" type="text" name="excerpt" id="excerpt">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="">body</label>

                    <div class="control">
                        <input class="textarea"  name="body" id="body">
                    </div>
                </div>
                    <div class="field">
                    <div class="form-group">
                        <label class="label" for="file">image</label>
                        <div class="control">
                        <input type="file" name="file" id="file" required>
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

