@extends('layouts.main')
<!-- layout.main itu file main didalam layout -->
@section('title', 'Form Edit Movie')
@section('content')
    <div class="container-fluid pt-3">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/update/{{ $id_movie->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>imDb</label>
                    <input type="number" name="imdb" class="form-control" value="{{ $id_movie->imdb }}" required>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $id_movie->title }}" required>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input type="number" name="year" class="form-control" value="{{ $id_movie->year }}" required>
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <select name="genre" class="form-control" required>
                        <option value="0">--Pilih Genre--</option>
                        <option value="Horror" {{ ($id_movie->genre == "Horror") ? "selected" : "" }}>Horror</option>
                        <option value="Fiksi" {{ ($id_movie->genre == "Fiksi") ? "selected" : "" }}>Fiksi</option>
                        <option value="Triler" {{ ($id_movie->genre == "Triler") ? "selected" : "" }}>Triler</option>
                        <option value="Komedi" {{ ($id_movie->genre == "Komedi") ? "selected" : "" }}>Komedi</option>
                        <option value="Anime" {{ ($id_movie->genre == "Anime") ? "selected" : "" }}>Anime</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <input type="file" accept="image/*" name="poster" class="form-control-file">
                </div>
                <div class="form-group">
                    @if($id_movie->poster)
                        <img src="{{ asset('storage/' . $id_movie->poster) }}" alt="{{ $id_movie->poster }}" width="80">
                    @else
                        <img src="https://media.istockphoto.com/id/1216251206/vector/no-image-available-icon.jpg?s=170667a&w=0&k=20&c=N-XIIeLlhUpm2ZO2uGls-pcVsZ2FTwTxZepwZe4DuE4="
                            alt="No Image" width="80">
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
@endsection
