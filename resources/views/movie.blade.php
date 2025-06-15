@extends('layouts.main')
<!-- layout.main itu file main didalam layout -->
@section('title', 'Movie')
@section('content')
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <a href="/movie/form-movie" class="btn btn-primary"><i class="bi bi-folder-plus"></i> Movie</a>
            </div>
            <div class="card-body">
                @if(session('alert'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('alert') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="display" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>imdb</th>
                            <th>title</th>
                            <th>year</th>
                            <th>genre</th>
                            <th>poster</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mv as $idx => $m)
                            <tr>
                                <td>{{$idx + 1}}</td>
                                <!-- $idx itu index dari array -->
                                <td>{{$m->imdb}}</td>
                                <td>{{$m->title}}</td>
                                <td>{{$m->year}}</td>
                                <td>{{$m->genre}}</td>
                                <td>
                                    @if($m->poster)
                                        <img src="{{ asset('storage/' . $m->poster) }}" alt="{{ $m->title }}" width="80">
                                    @else
                                        <img src="https://media.istockphoto.com/id/1216251206/vector/no-image-available-icon.jpg?s=170667a&w=0&k=20&c=N-XIIeLlhUpm2ZO2uGls-pcVsZ2FTwTxZepwZe4DuE4="
                                            alt="No Image" width="80">
                                    @endif
                                </td>
                                <td>
                                    <a href="/movie/form-ubah/{{ $m->id }}" class="btn btn-primary"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <a href="/delete/{{ $m->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
