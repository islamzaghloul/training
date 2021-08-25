@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('main-page') }}</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
<p> click articles to see all  or login to (edit,add)</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
