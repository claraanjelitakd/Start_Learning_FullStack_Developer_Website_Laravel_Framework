<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('movie_0607')->insert([
        [
            'imdb' => '111222',
            'title' => 'Batman',
            'year' => '2010',
            'genre' => 'Fiksi',
            'poster' => 'batman.jpg',
        ],
        [
            'imdb' => '222333',
            'title' => 'Ga ada sinyal',
            'year' => '2015',
            'genre' => 'Fiksi',
            'poster' => 'superman.jpg',
        ],
        [
            'imdb' => '333444',
            'title' => 'Spiderman',
            'year' => '2020',
            'genre' => 'Fiksi',
            'poster' => 'spiderman.jpg',
        ],
        [
            'imdb' => '444555',
            'title' => 'Avengers',
            'year' => '2018',
            'genre' => 'Fiksi',
            'poster' => 'avengers.jpg',
        ],
        [
            'imdb' => '555666',
            'title' => 'Superman',
            'year' => '2019',
            'genre' => 'Fiksi',
            'poster' => 'superman.jpg',
        ],
        [
            'imdb' => '666777',
            'title' => 'Ironman',
            'year' => '2021',
            'genre' => 'Fiksi',
            'poster' => 'ironman.jpg',
        ],
        [
            'imdb' => '777888',
            'title' => 'Captain America',
            'year' => '2022',
            'genre' => 'Fiksi',
            'poster' => 'captainamerica.jpg',
        ],
        [
            'imdb' => '888999',
            'title' => 'Thor',
            'year' => '2023',
            'genre' => 'Fiksi',
            'poster' => 'thor.jpg',
        ],
        [
            'imdb' => '999000',
            'title' => 'Hulk',
            'year' => '2024',
            'genre' => 'Fiksi',
            'poster' => 'hulk.jpg',
        ],
        [
            'imdb' => '000111',
            'title' => 'Black Widow',
            'year' => '2025',
            'genre' => 'Fiksi',
            'poster' => 'blackwidow.jpg',
        ],
        [
            'imdb' => '111000',
            'title' => 'Doctor Strange',
            'year' => '2026',
            'genre' => 'Fiksi',
            'poster' => 'doctorstrange.jpg',
        ],
        [
            'imdb' => '222111',
            'title' => 'Black Panther',
            'year' => '2027',
            'genre' => 'Fiksi',
            'poster' => 'blackpanther.jpg',
        ],
    ]);
    }
}
