$users = Users::onlyTrashed()->get();
return view('users_trash', ['user' => $guru]);