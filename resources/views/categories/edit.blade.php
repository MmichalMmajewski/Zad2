@extends('layouts.app')

@section('content')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">API do zarządzania zapleczem</div>
<!--
                <div class="masthead-heading text-uppercase"></div>
-->
                <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('category-index') }}">Wróć</a>
            </div>
        </header>
        <section class="page-section" id="dodaj">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Edycja kategorii {{ $edit_category->id }}</h2>
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
                <form id="contactForm" action="{{ route('category-update', ['id' => $edit_category->id]) }}" method="POST">
                    @csrf
                    @method('PUT');
<!-- HTML rozpozna tylko GET i POST --> 
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6" style="margin-left:auto;margin-right:auto;">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" name="name" value="{{ $edit_category->name }}" type="text" placeholder="Nowa nazwa kategorii"/>
                            </div>
                        </div>
                       
                    </div>
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Zapisz kategorię</button></div>
                </form>
            </div>
        </section>
@endsection()