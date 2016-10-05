<?php

namespace App\Services;

use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkRoom;;

class ChatworkService
{
    public function sendMessageToRoom($message) {
        $roomId = env('CHATWORK_ROOM_ID');
        $apiKey = env('CHATWORK_API_KEY');
        ChatworkSDK::setApiKey($apiKey);
        $room = new ChatworkRoom($roomId);
        $room->sendMessageToAll($message);
    }
}
