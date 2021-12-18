<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('private-test-channel', function () {
//     return true;
//   });
Broadcast::channel('channel-demo-real-time', function ($nguoi_dung) {
      return true;
});
// Broadcast::channel('chatroom', function ($user) {
//     return $user;
// });
