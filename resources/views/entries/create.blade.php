@extends('layouts.app')

@section('content')

        <!-- Contact-->
        <section class="masthead page-section" id="dodaj" style="background-color: grey !important;">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nowy wpis</h2>
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
                <form id="contactForm" action="{{ route('entries.store') }}" method="POST">
                 @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                            <select required id="category_id" name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Nazwa wpisu" required="required" value="{{ old('name') }}"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="www" type="text" name="www" placeholder="Adres WWW" required="required" value="{{ old('www') }}"/>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="address" type="text" name="address" placeholder="Adres" required="required" value="{{ old('address') }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="content" name="content" placeholder="Tutaj wpisz opis" required="required" value="{{ old('content') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Dodaj wpis</button></div>
                </form>
            </div>
        </section>

@endsection
      