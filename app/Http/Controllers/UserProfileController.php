<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Models\Test;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
    $user = Auth::user();
    $emailVerified = $user->email_verified_at !== null ? 'Да' : 'Нет';

    $createdTestsCount = $user->createdTests()->count();

    $completedTestsCount = $user->completedTests()->count();

    $averagePercentage = $user->completedTests()->count()
        ? number_format($user->completedTests()->avg('percentage'), 2)
        : "Нет пройденных тестов";

    $latestTest = $user->completedTests()->latest()->first();
    $latestTestTitle = $latestTest->test->title;

    // dd($user, $createdTestsCount, $completedTestsCount, $averagePercentage, $latestTest, $latestTestTitle);
    return view('profile', compact('user', 'emailVerified', 'createdTestsCount', 'completedTestsCount', 'averagePercentage', 'latestTest', 'latestTestTitle',));
    }

}
