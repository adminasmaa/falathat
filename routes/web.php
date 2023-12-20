<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\ActivitiesController;
use App\Http\Controllers\Front\ActivitiesController as FrontActivitiesController;
use App\Http\Controllers\Dashboard\BranchesController;
use App\Http\Controllers\Front\Auth\AuthenticationController;
use App\Http\Controllers\Front\Auth\RegistrationController;
use App\Http\Controllers\Front\BranchesController as FrontBranchesController;
use App\Http\Controllers\Dashboard\BulkActionsController;
use App\Http\Controllers\Dashboard\CommitteeMembersController;
use App\Http\Controllers\Dashboard\CommitteesController;
use App\Http\Controllers\Front\CommitteesController as FrontCommitteesController;
use App\Http\Controllers\Dashboard\GalleriesController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Front\MediaController;
use App\Http\Controllers\Front\NewsController as FrontNewsController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Dashboard\JobsController;
use App\Http\Controllers\Front\JobsController as FrontJobsController;
use App\Http\Controllers\Dashboard\MembersController;
use App\Http\Controllers\Dashboard\MessagesController;
use App\Http\Controllers\Dashboard\PermissionsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Front\ProfileController as FrontProfileController;
use App\Http\Controllers\Dashboard\ReportFilesController;
use App\Http\Controllers\Dashboard\ReportsController;
use App\Http\Controllers\Front\ReportsController as FrontReportsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SlidersController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\VideosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard Routes.
Route::group(['prefix' => 'dashboard'], function () {
    // Authentication Routes.
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create'])
            ->middleware('guest')
            ->name('login');
        Route::post('/', [AuthenticatedSessionController::class, 'store'])
            ->middleware('guest');
    });

    // Logout Route.
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Admin Dashboard Routes.
    Route::group(['middleware' => ['authorize']], function () {
        // Dashboard Routes.
        Route::group(['as' => 'dashboard.'], function () {
            // HomePage Route.
            Route::get('/', [HomeController::class, 'index'])->name('home');

            //Profile Routes.
            Route::group(['prefix' => 'profile'], function () {
                Route::get('/', [ProfileController::class, 'index'])->name('profile');
                Route::get('settings', [ProfileController::class, 'settings'])->name('profile.settings');

                // Change account settings routes.
                Route::get('change-password', [ProfileController::class, 'changePassword'])
                    ->name('profile.change.password');
                Route::post('update-profile', [ProfileController::class, 'updateProfile'])
                    ->name('profile.update.personal.information');
                Route::post('update-password', [ProfileController::class, 'updatePassword'])
                    ->name('profile.update.password');
            });

            // Roles Routes.
            Route::resource('roles', RolesController::class)->except('show');

            // Permissions Routes.
            Route::resource('permissions', PermissionsController::class)->only(['index', 'edit', 'update']);

            // Users' Routes.
            Route::resource('users', UsersController::class)->except('show');

            // Activities Routes.
            Route::resource('activities', ActivitiesController::class)->except('show');

            // News Routes.
            Route::resource('news', NewsController::class)->except('show');

            // Branches' Routes.
            Route::resource('branches', BranchesController::class)->except('show');

            // Message Routes.
            Route::resource('messages', MessagesController::class)->only(['index', 'destroy']);

            // Committees Routes.
            Route::resource('committees', CommitteesController::class)->except('show');

            // Committee Members Routes
            Route::resource('committees.members', CommitteeMembersController::class)->except('show');

            // Jobs Routes
            Route::resource('jobs', JobsController::class)->except('show');

            // Galleries Routes
            Route::resource('galleries', GalleriesController::class)->except(['show', 'edit', 'update']);

            // Videos Routes
            Route::resource('videos', VideosController::class)->except('show');

            // Members' Routes
            Route::resource('members', MembersController::class)->except('show');

            // Reports' Routes
            Route::resource('reports', ReportsController::class)->except('show');

            // Report Files Routes
            Route::resource('reports.files', ReportFilesController::class)->except(['show', 'edit', 'update']);

            // Sliders Routes
            Route::resource('sliders', SlidersController::class)->except('show');

            // Settings' Routes
            Route::resource('settings', SettingsController::class)->only(['index', 'store']);

            // Bulk Actions
            Route::group(['prefix' => 'bulk-actions', 'as' => 'bulk.'], function () {
                // Admin Bulk Actions
                Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {
                    Route::post('change-status', [BulkActionsController::class, 'adminChangeStatus'])->name('change.status');
                    Route::delete('delete', [BulkActionsController::class, 'adminDelete'])->name('delete');
                });

                // Roles Bulk Actions
                Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
                    Route::post('change-status', [BulkActionsController::class, 'rolesChangeStatus'])->name('change.status');
                    Route::delete('delete', [BulkActionsController::class, 'roleDelete'])->name('delete');
                });

                // Messages Bulk Actions
                Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'messagesDelete'])->name('delete');
                });

                // Messages Bulk Actions
                Route::group(['prefix' => 'messages', 'as' => 'branches.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'branchesDelete'])->name('delete');
                });

                // Committees Bulk Actions
                Route::group(['prefix' => 'committees', 'as' => 'committees.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'committeesDelete'])->name('delete');
                });

                // CommitteeMembers Bulk Actions
                Route::group(['prefix' => 'committee-members', 'as' => 'committees.members.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'committeeMembersDelete'])->name('delete');
                });

                // Jobs Bulk Actions
                Route::group(['prefix' => 'jobs', 'as' => 'jobs.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'jobsDelete'])->name('delete');
                });

                // Galleries Bulk Actions
                Route::group(['prefix' => 'galleries', 'as' => 'galleries.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'galleriesDelete'])->name('delete');
                });

                // Videos Bulk Actions
                Route::group(['prefix' => 'videos', 'as' => 'videos.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'videosDelete'])->name('delete');
                });

                // Members Bulk Actions
                Route::group(['prefix' => 'members', 'as' => 'members.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'membersDelete'])->name('delete');
                });

                // Reports Bulk Actions
                Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'reportsDelete'])->name('delete');
                });

                // Report Files Bulk Actions
                Route::group(['prefix' => 'report-files', 'as' => 'reports.files.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'reportFilesDelete'])->name('delete');
                });

                // Sliders Bulk Actions
                Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'slidersDelete'])->name('delete');
                });

                // Activities Bulk Actions
                Route::group(['prefix' => 'activities', 'as' => 'activities.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'activitiesDelete'])->name('delete');
                });

                // News Bulk Actions
                Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
                    Route::delete('delete', [BulkActionsController::class, 'newsDelete'])->name('delete');
                });
            });
        });
    });
});

// Reset Member's Password Routes
Route::get('forgot-password', [AuthenticationController::class, 'forget'])
    ->name('password.request');

Route::post('forgot-password', [AuthenticationController::class, 'sendResetLink'])
    ->name('password.email');

Route::get('reset-password/{token}', [AuthenticationController::class, 'resetPage'])
    ->name('password.reset');

Route::post('reset-password', [AuthenticationController::class, 'reset'])
    ->name('password.update');

// Front Routes.
Route::group(['as' => 'front.'], function () {
    // Authentication Routes.
    Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
        Route::get('/', [AuthenticationController::class, 'create'])->name('create');
        Route::post('/', [AuthenticationController::class, 'store'])->name('store');
    });
    Route::group(['prefix' => 'register', 'as' => 'register.'], function () {
        Route::get('/', [RegistrationController::class, 'create'])->name('create');
        Route::post('/', [RegistrationController::class, 'store'])->name('store');
    });

    // Profile Requests.
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [FrontProfileController::class, 'index'])->name('index');
        Route::post('/', [FrontProfileController::class, 'update'])->name('update');
    });

    // Logout Route.
    Route::get('logout', [AuthenticationController::class, 'destroy'])->name('logout');

    // Home Route.
    Route::get('/', [FrontHomeController::class, 'index'])->name('home');

    // About Route.
    Route::get('about', [FrontHomeController::class, 'about'])->name('about');

    // Members Route.
    Route::get('members', [FrontHomeController::class, 'members'])->name('members');

    // Branches Route.
    Route::resource('branches', FrontBranchesController::class)->only(['index', 'show']);

    // Media Routes.
    Route::get('media-center', [FrontHomeController::class, 'mediaCenter'])->name('media.center');
    Route::resource('news', FrontNewsController::class)->only(['index', 'show']);
    Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
        Route::get('/', [MediaController::class, 'index'])->name('index');
        Route::get('images', [MediaController::class, 'images'])->name('images');
        Route::get('videos', [MediaController::class, 'videos'])->name('videos');
    });
    Route::resource('reports', FrontReportsController::class)->only(['index', 'show']);
    Route::get('file-download/{file}', [FrontReportsController::class, 'download'])->name('files.download');
    Route::resource('activities', FrontActivitiesController::class)->only(['index', 'show']);

    // Committees Route.
    Route::resource('committees', FrontCommitteesController::class)->only(['index', 'show']);

    // Jobs Route.
    Route::resource('jobs', FrontJobsController::class)->only(['index', 'store']);
});
