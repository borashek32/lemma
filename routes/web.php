<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\Order\SaveForLaterController;
use App\Http\Livewire\Admin\Blog\Tags;
use App\Http\Livewire\Admin\Contacts\Contacts;
use App\Http\Livewire\Admin\Shop\Products;
use App\Http\Livewire\Admin\Blog\Categories;
use App\Http\Livewire\Admin\Blog\Comments;
use App\Http\Livewire\Admin\Reviews\Reviews;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AutopartController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Livewire\Admin\Users\Users;

Route::get('/sitemap.xml', [SiteController::class, 'sitemap']);

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});
// SITE
// COMMON ROUTES
Route::get('/', [AutopartController::class, 'autoparts'])->name('auto-parts');
Route::post('/', [SiteController::class, 'submit'])->name('contact-form');
//Route::get('/services', [SiteController::class, 'services'])->name('services');
//Route::get('/before', [SiteController::class, 'before'])->name('before');
//Route::get('/possibilities', [SiteController::class, 'possibilities'])->name('possibilities');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/partners', [AutopartController::class, 'partners'])->name('partners');
Route::get('/law', [AutopartController::class, 'law'])->name('law');
Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('about-us');
Route::get('/reviews', [ReviewController::class, 'reviewsPost'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'reviewsWrite'])
    ->name('reviews-form')->middleware('auth');
Route::get('/requisites', [SiteController::class, 'requisites'])->name('requisites');

// BLOG ROUTES
Route::get('/auto-magazine', [BlogController::class, 'blog'])->name('blog');
Route::get('/auto-magazine/posts/{slug}', [BlogController::class, 'onePost'])->name('post');
Route::post('/auto-magazine/posts/{slug}', [BlogController::class, 'addComment'])->name('comment');
Route::post('/auto-magazine/posts', [BlogController::class, 'reply'])->name('reply');
Route::get('/auto-magazine/category/{slug}', [BlogController::class, 'category'])->name('category');
Route::post('/auto-magazine/posts/{post}/likes', [PostLikeController::class, 'store'])
    ->name('post.like')->middleware('auth');
Route::delete('/auto-magazine/posts/{post}/likes', [PostLikeController::class, 'destroy'])
    ->name('post.like')->middleware('auth');
Route::get('/auto-magazine/tag/{slug}', [BlogController::class, 'tag'])->name('tag');

//COMMENTS
Route::post('comments', [\App\Http\Controllers\Comments\CommentController::class, 'store'])
    ->name('comments.store');
Route::delete('comments/{id}', [\App\Http\Controllers\Comments\CommentController::class, 'destroy'])
    ->name('comments.destroy');
Route::put('comments/{comment}', [\App\Http\Controllers\Comments\CommentController::class, 'update'])
    ->name('comments.update');
Route::post('comments/{comment}', [\App\Http\Controllers\Comments\CommentController::class, 'reply'])
    ->name('comments.reply');


// USERS DASHBOARD
// INFORMATION ROUTES
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('profile.welcome');
//})->name('welcome');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'welcome'])
    ->name('welcome')->middleware('auth');
Route::resource('/mailings', \App\Http\Controllers\MailingController::class)
    ->middleware('auth');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/profile', function () {
    return view('profile.show');
})->name('profile');
Route::resource('/addresses', \App\Http\Controllers\User\AddressController::class);

// CART ROUTES
Route::get('/dashboard/cart', [\App\Http\Controllers\Order\CartController::class, 'index'])
    ->name('cart.index')->middleware('auth');
Route::post('/dashboard/cart', [\App\Http\Controllers\Order\CartController::class, 'store'])
    ->name('cart.store')->middleware('auth');
Route::patch('/dashboard/cart/{product}', [\App\Http\Controllers\Order\CartController::class, 'update'])
    ->name('cart.update')->middleware('auth');
Route::delete('/dashboard/cart/{product}', [\App\Http\Controllers\Order\CartController::class, 'destroy'])
    ->name('cart.destroy')->middleware('auth');
Route::post('/dashboard/cart/save-for-later/{product}', [\App\Http\Controllers\Order\CartController::class, 'switchToSaveForLater'])
    ->name('cart.switchToSaveForLater')->middleware('auth');
// SAVE FOR LATER
Route::post('/dashboard/cart/save-for-later/{product}', [SaveForLaterController::class, 'switchToSaveForLater'])
    ->name('cart.switchToSaveForLater')->middleware('auth');
Route::delete('/dashboard/cart/switch-to-cart/{product}', [SaveForLaterController::class, 'destroy'])
    ->name('saveForLater.destroy')->middleware('auth');
Route::post('/dashboard/cart/switch-to-cart/{product}', [SaveForLaterController::class, 'switchToCart'])
    ->name('saveForLater.switchToCart')->middleware('auth');


// SHIPMENT ROUTE
Route::get('dashboard/cart/shipment', [\App\Http\Controllers\Order\OrderController::class, 'shipment'])
    ->name('shipment')->middleware('auth');

// ORDER ROUTES
Route::resource('/orders', \App\Http\Controllers\Order\OrderController::class)
    ->middleware('auth');
Route::get('/dashboard/orders', [\App\Http\Controllers\DashboardController::class, 'orders'])
    ->name('orders.all');
Route::get('/dashboard/orders/{id}', [\App\Http\Controllers\DashboardController::class, 'orderDetails'])
    ->name('order.details');


// ADMIN DASHBOARD
// CRUD ROUTES
Route::group(['middleware' => ['role:super-admin']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('/members', MemberController::class);
        Route::resource('/posts', PostController::class);
        Route::resource('/advertisements', AdvertisementController::class);

        Route::resource('/admin-orders', AdminOrderController::class)->names('admin-orders');
        Route::post('order_status', [\App\Http\Controllers\Admin\AdminOrderController::class, 'orderStatus'])
            ->name('admin-orders.status');

        Route::get('/categories', Categories::class)->name('cats');
        Route::get('/comments', Comments::class)->name('comments-admin');
        Route::get('/users', Users::class)->name('users');
        Route::get('/reviews', Reviews::class)->name('reviews-admin');
        Route::get('/offices', Contacts::class)->name('offices');
        Route::get('/tags', Tags::class)->name('tags');
        Route::get('/requisites', \App\Http\Livewire\Admin\Requisites::class)->name('requisites-admin');

        Route::get('/auto-parts', Products::class)->name('auto-parts-admin');
        Route::post('auto-parts/import', [\App\Http\Controllers\Admin\ImportController::class, 'import'])
            ->name('products-import');
    });
});

// SOCIAL LOGIN ROUTES
Route::group(['role:user'], function() {
    Route::get('/sign-in/github', [\App\Http\Controllers\SocialController::class, 'github'])->name('github');
    Route::get('/sign-in/github/redirect', [\App\Http\Controllers\SocialController::class, 'githubRedirect']);

    Route::get('/sign-in/facebook', [\App\Http\Controllers\SocialController::class, 'facebook'])->name('facebook');
    Route::get('/sign-in/facebook/redirect', [\App\Http\Controllers\SocialController::class, 'facebookRedirect']);

    Route::get('/sign-in/google', [\App\Http\Controllers\SocialController::class, 'google'])->name('google');
    Route::get('/sign-in/google/redirect', [\App\Http\Controllers\SocialController::class, 'googleRedirect']);

    Route::get('/sign-in/vkontakte', [\App\Http\Controllers\SocialController::class, 'vkontakte'])->name('vkontakte');
    Route::get('/sign-in/vkontakte/redirect', [\App\Http\Controllers\SocialController::class, 'vkontakteRedirect']);
});
