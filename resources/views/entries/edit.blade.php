@extends('layouts.app')

@section('content')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">API do zarządzania zapleczem</div>
            </div>
        </header>
        <section class="page-section" id="dodaj">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Edycja wpisu {{ $entry->name }}</h2>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="contactForm" action="{{ route('entries.update', ['wpisy' => $entry->id]) }}" method="POST">
                    @csrf
                    @method('PUT');
<!-- HTML rozpozna tylko GET i POST --> 
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                        <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">                               
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select></br>
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" type="text" value="{{ $entry->name }}" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">{{ $entry->name }}</div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="www" type="text" name="www" value="{{ $entry->www }}"/>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="address" type="text" name="address" value=" {{ $entry->address }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="content" name="content">{{ $entry->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Zapisz wpis</button></div>
                </form>
            </div>
        </section>
@endsection()