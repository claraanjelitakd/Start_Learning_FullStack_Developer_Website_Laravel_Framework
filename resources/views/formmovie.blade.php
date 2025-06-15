@extends('layouts.main')
<!-- layout.main itu file main didalam layout -->
@section('title', 'Form Add Movie')
@section('content')
    <div class="container-fluid pt-3">
        <div class="card-header"></div>
        <div class="card-body">
    <form action="/savemovie" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>imDb</label>
            <input type="number" name="imdb" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Year</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select name="genre" class="form-control" required>
                <option value="0">--Pilih Genre--</option>
                <option value="Horror">Horror</option>
                <option value="Fiksi">Fiksi</option>
                <option value="Triler">Triler</option>
                <option value="Komedi">Komedi</option>
                <option value="Anime">Anime</option>
            </select>
        </div>
        <div class="form-group">
            <label>Poster</label>
            <input type="file" accept="image/*" name="poster" class="form-control-file">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
