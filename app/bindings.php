<?php
// When using 'PhotoRepository', Laravel automatically uses the EloquentPhotoRepository
$this->app->bind('Repositories\PhotoRepository', 'Family\Gallery\EloquentPhotoRepository');
// The same for Albums
$this->app->bind('Repositories\AlbumRepository', 'Family\Gallery\EloquentAlbumRepository');

// Place the section below in app/bindings.php to use Flickr instead of Eloquent.
/*

$this->app->bind('Repositories\PhotoRepository', 'JeroenG\LaravelPhotoGallery\Repositories\FlickrPhotoRepository');

$this->app->bind('Repositories\AlbumRepository', 'JeroenG\LaravelPhotoGallery\Repositories\FlickrAlbumRepository');

*/