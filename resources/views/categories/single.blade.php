@extends('layouts.app')

@section('content')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Wszystkie wpisy</div>
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
                    <h2 class="section-heading text-uppercase">Wpisy w kategorii {{ $category->name}}</h2>
                </div>                                
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">WWW</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Data dodania</th>
                            <th scope="col">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->entry as $entry)
                                <tr>
                                <th scope="row">{{ $entry->id }}</th>
                                <td> {{ $entry->name }} </td>
                                <td> {{ $entry->www }}</td>
                                <td> {{ $entry->address}}</td>
                                <td> {{ $entry->content}}</td>
                                <td> {{ $entry->created_at }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('entries.edit', ['wpisy' => $entry->id ]) }}">Edytuj</a>
                                    <form method="POST" action="{{ route('entries.destroy', ['wpisy' => $entry->id ]) }}">
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
  
