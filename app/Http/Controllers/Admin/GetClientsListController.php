<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class GetClientsListController
{
  public function __invoke(Request $request): array
  {
    $users = User::query()
      ->get()
      ->toArray();

    return $this->convertUsers($users);
  }

  private function convertUsers(array $users): array
  {
    foreach ($users as &$user) {
      $user['createdAt'] = Carbon::createFromDate($user['created_at'])->format('Y-m-d H:i:s');
      unset($user['created_at']);
    }
    return $users;
  }
}
