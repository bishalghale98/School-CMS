<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = new User();
$user->name = 'Admin';
$user->email = 'admin@schoolcms.test';
$user->password = Hash::make('password');
$user->save();
echo 'User created: ' . $user->id . PHP_EOL;
