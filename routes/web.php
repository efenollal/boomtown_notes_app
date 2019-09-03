<?php

Route::get('/', 'NoteController@index');
Route::resource('notes', 'NoteController');
Route::get('/notes/fetch-note/{id}', 'NoteController@fetchNote');
