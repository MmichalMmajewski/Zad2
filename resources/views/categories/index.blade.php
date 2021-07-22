@extends('layouts.app')

@section('content')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Wszystkie kategorie</div>
            </div>
        </header>

        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">

            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Kategorie</h2>
                </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Numer kategorii</th>
                            <th scope="col">Nazwa kategorii</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Akcja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($output_categories as $category)
                                <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td> <a href="{{ route('category-single', ['id' => $category->id ]) }}" class="single-link">{{ $category->name }}</a> </td>
                                <td> {{ $category->created_at }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('category-edit', ['id' => $category->id ]) }}">Edytuj</a>
                                    <form method="POST" action="{{ route('category-delete', ['id' => $category->id ]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Usuń</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        
                          
                        
                    </div>
                </div>
            </div>
        </section>

@endsection
  
