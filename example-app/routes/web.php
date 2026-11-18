<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.send');
Route::view('/', 'home')->name('home');
Route::get('/photography', function () {
    $sections = collect(['football' => 'Sports photography', 'portraits' => 'Portrait photography'])
        ->map(function ($title, $category) {
            $albums = collect(glob(public_path('images/'.$category.'/*'), GLOB_ONLYDIR) ?: [])
                ->map(function ($folder) use ($category) {
                    $photos = collect(glob($folder.'/*') ?: [])
                        ->filter(fn ($path) => is_file($path) && in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'avif']))
                        ->sort(SORT_NATURAL)->values();
                    return ['name' => basename($folder), 'count' => $photos->count(),
                        'cover' => $photos->isEmpty() ? null : 'images/'.$category.'/'.basename($folder).'/'.basename($photos->first())];
                })->filter(fn ($album) => $album['count'] > 0);
            return compact('title', 'category', 'albums');
        });
    return view('photography', compact('sections'));
})->name('photography');
foreach (['football', 'portraits'] as $category) {
Route::get('/photography/'.$category.'/{album?}', function ($album = null) use ($category) {
    $folders = collect(glob(public_path('images/'.$category.'/*'), GLOB_ONLYDIR) ?: [])
        ->keyBy(fn ($path) => basename($path));
    abort_if($album !== null && !$folders->has($album), 404);
    $readPhotos = fn ($folder) => collect(glob($folder.'/*') ?: [])
        ->filter(fn ($path) => is_file($path) && in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'avif']))
        ->sort(SORT_NATURAL)->values()
        ->map(fn ($path) => 'images/'.$category.'/'.str_replace(DIRECTORY_SEPARATOR, '/', substr($path, strlen(public_path('images/'.$category)) + 1)));
    $albums = $folders->map(fn ($folder, $name) => [
        'name' => $name, 'photos' => $readPhotos($folder),
    ])->filter(fn ($item) => $item['photos']->isNotEmpty());
    $photos = $album === null ? collect() : $readPhotos($folders->get($album));
    return view($category === 'football' ? 'football-photography' : 'portrait-photography', compact('photos', 'albums', 'album'));
})->name('photography.'.$category);
}
foreach (['about', 'portfolio', 'skills', 'experience', 'contact'] as $page) {
Route::view('/'.$page, 'detail', ['page' => $page])->name($page);
}
Route::redirect('/pink', '/');
Route::redirect('/dark', '/')->name('home.dark');
