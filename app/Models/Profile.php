<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [

    ];

    public $steamid;
    public $appid;
    /**
     * @var mixed
     */


    /**
     * @return mixed
     */
    public static function getProfileSummary($id){
        return Http::get('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamids='. $id)->json();
    }

    /**
     * @return array|mixed
     */
    public static function getBanInfo($id){
        return Http::get('http://api.steampowered.com/ISteamUser/GetPlayerBans/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamids='. $id)->json();
    }

    /**
     * @return array|mixed
     */
    public static function getRecentlyPlayedGames($id){
        return Http::get('http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid='. $id .'&count=5')->json();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function getPlayerLevel($id){
        return Http::get("https://api.steampowered.com/IPlayerService/GetBadges/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid=".$id)->json();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function getProfileBackground($id){
        return Http::get("https://api.steampowered.com/IPlayerService/GetProfileBackground/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid=".$id)->json();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function getAvatarFrame($id){
        return Http::get("https://api.steampowered.com/IPlayerService/GetAvatarFrame/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid=".$id)->json();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function getOwnedGames($id) {
        return Http::get('https://api.steampowered.com/IPlayerService/GetOwnedGames/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid='.$id)->json();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function resolveCustomURL($id){
        return Http::get("https://api.steampowered.com/ISteamUser/ResolveVanityURL/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&vanityurl=".$id)->json();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function getBadges($id){
        return Http::get('https://api.steampowered.com/IPlayerService/GetBadges/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid='.$id)->json();
    }

    public static function getFriendList($id){
        return Http::get('https://api.steampowered.com/ISteamUser/GetFriendList/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid='.$id)->json();
    }

    public static function getAchievementProgress($id, $apps){
        return Http::get('http://api.steampowered.com/ISteamUserStats/GetPlayerAchievements/v0001/?appid='.$apps.'&key=3FE725B04637FA6637A3BA1684CFEEF9&steamid='.$id)->json();
    }
}
