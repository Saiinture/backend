<?php

use Illuminate\Http\Request;
use Dippuzen\Bots\Models\Bot;
use Dippuzen\Bots\Components\Update;
use Response;
use File;

Route::get('/', function () {
    return Redirect::to('/backend');
});

Route::get('getAllBots', function () {
    $bots = Bot::all();

    $botsWithAvatars = $bots->map(function ($bot) {
        return [
            'id' => $bot->id,
            'bot_id' => $bot->bot_id,
            'bot_name' => $bot->bot_name,
            'level' => $bot->level,
            'persona' => $bot->persona,
            'avatar_url' => $bot->avatar ? $bot->avatar->getPath() : null
        ];
    });

    return response()->json($botsWithAvatars)
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*');
});

Route::get('getBot/{id}', function ($id) {
    $bot = Bot::where('bot_id', $id)->first();
    if ($bot) {
         $data = [
            'id' => $bot->id,
            'bot_id' => $bot->bot_id,
            'bot_name' => $bot->bot_name,
            'level' => $bot->level,
            'persona' => $bot->persona,
            'avatar_url' => $bot->avatar ? $bot->avatar->getPath() : null,
        ];
        
        return response()->json($data)
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*');
    } else {
        return response()->json(['error' => 'Bot not found'], 404)
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*');
    }
});


