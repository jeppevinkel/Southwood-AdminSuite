<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Server extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'api_token',
        'server_account_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class)->withTimestamps();
    }

    public function serverAccount()
    {
        return $this->belongsTo(ServerAccount::class);
    }

    public function newPlayers()
    {
        return $this->players()->wherePivot('created_at', '>', Carbon::today());
    }

    public function onlinePlayers()
    {
        return $this->players()->wherePivot('updated_at', '>', Carbon::now()->subMinutes(2));
    }

    public function linkServer(string $token)
    {
        $serverToken = ServerToken::all()->where('expiry_date', '>', Carbon::now())->find($token);

        if (!$serverToken) {
            throw new \Exception('Invalid token');
        }

        DB::beginTransaction();
        try {
            $this->server_account_id = $serverToken->server_account_id;
            $this->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        try {
            $serverToken->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();

        return $this;
    }
}
