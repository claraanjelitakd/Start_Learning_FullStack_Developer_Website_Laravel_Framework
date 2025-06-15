<?php

namespace App\Http\Controllers;
use App\Movie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
    }
    public function movie()
    {
        $movie = Movie::orderBy('imdb', 'desc')->get();
        return view('movie', ['key' => 'movie', 'mv' => $movie]);
    }
    public function kategori()
    {
        return view('kategori', ['key' => 'kategori']);
    }
    public function genre()
    {
        return view('genre', ['key' => 'genre']);
    }
    public function addmovie()
    {
        return view('formmovie', ['key' => 'movie']);
    }
    public function savemovie(Request $request)
    {
        if ($request->hasFile('poster')) {
            $file_name = time() . '-' . rand() . $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
        } else {
            $path = '';
        }
        Movie::create([
            'imdb' => $request->imdb,
            'title' => $request->title,
            'year' => $request->year,
            'genre' => $request->genre,
            'poster' => $path
        ]);
        return redirect('movie')->with('alert','Data Movie Berhasil Disimpan');
    }
    public function editmovie($id)
    {
        $id = Movie::find($id);

        return view('editmovie', ['key' => 'movie', 'id_movie' => $id]);
    }
    public function updatemovie($id, Request $request)
    {
        $movie = Movie::find($id);
        $movie->imdb = $request->imdb;
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->genre = $request->genre;
        if ($request->poster) {
            if ($movie->poster) {
                //menghapus file poster yang lama
                Storage::disk('public')->delete($movie->poster);
            }
            $file_name = time() . '-' . rand() . $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
            $movie->poster = $path;
        }
        // else{
        //     $movie->poster = $movie->poster;
        // }
        $movie->save();
        // $movie->update($request->all());
        return redirect('movie')->with('alert','Data Movie Berhasil Diubah');
    }
    public function deletemovie($id)
    {
        //mengambil id movie yang akan dihapus
        $movie = Movie::find($id);
        //mengecek apakah ada poster dari data yang akan dihapus.
        if ($movie->poster) {
            //menghapus file poster yang lama
            Storage::disk('public')->delete($movie->poster);
        }
        //menghapus data movie dari database
        $movie->delete();
        //mengalihkan ke halaman movie
        return redirect('movie')->with('alert','Data Movie Berhasil Dihapus');
    }
    public function login()
    {
        return view('login');
    }
    public function ceklogin(Request $request)
    {
        //proses otentikasi hanya pakai auth
        // jika gagal, akan mengembalikan ke halaman login dengan pesan error
        if (!Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ]))
        {
            return redirect('/');
        }
        else
        {
            //jika berhasil, akan mengalihkan ke halaman home
            return redirect('/home');
        }
    }
    public function ubahpass()
    {
        return view('formpass',['key'=>'']);
    }
    public function updatepass(Request $request)
    {
        if ($request->password == $request->konfirmasi_password) {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/ubahpass')->with('info', 'Password berhasil diubah!');
        }
        else
        {
            return redirect('/ubahpass')->with('info', 'Password Gagal diubah!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function searchMovie(Request $request)
    {
        // $keyword = $request->input('keyword');
        // $movies = Movie::where('title', 'LIKE', '%' . $keyword . '%')->get();
        return view('searchmovie');
    }
    public function actsearchmovie(Request $request)
    {
        $keyword = $request->input('q');
        $movies = Movie::where('title', 'LIKE', '%' . $keyword . '%')->get();
        return view('actsearchmovie', ['data' => $movies]);
    }
}
