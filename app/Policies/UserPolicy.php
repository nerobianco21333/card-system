<?php
namespace App\Policies; use App\User; use Illuminate\Auth\Access\HandlesAuthorization; class UserPolicy { use HandlesAuthorization; public function __construct() { } public function admin($sp5b5487) { } public function merchant($sp5b5487) { } public function before($sp5b5487, $spe1ad18) { return $sp5b5487->role === $spe1ad18; } }