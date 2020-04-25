<?php

namespace App;

use Carbon\Carbon;
use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Keygen;

class ServerAccount extends Model
{
    protected $guarded = [];

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    public function serverTokens()
    {
        return $this->hasMany(ServerToken::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'server_account_members');
    }

    public function players()
    {
        return $this->hasManyThrough(Player::class, Server::class);
    }

    public function serverAccountMembers()
    {
        return $this->hasMany(ServerAccountMember::class);
    }

    public function bans()
    {
        return $this->hasMany(Moderation::class)->where('moderation_type', '=', 'ban');
    }

    public function warnings()
    {
        return $this->hasMany(Moderation::class)->where('moderation_type', '=', 'warning');
    }

    public function activeServerTokens()
    {
        return ServerToken::all()->where('expiry_date', '>=', Carbon::now())->sortBy('created_at');
    }

    public function createServerToken()
    {
        DB::beginTransaction();
        try {
            $serverToken = new ServerToken([
                'token' => Keygen::alphanum(8)->generate(),
                'server_account_id' => $this->id,
                //'expiry_date' => date('Y-m-d H:i:s', time() + 7200),
                'expiry_date' => Carbon::now()->addHours(2),
            ]);
            $serverToken->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();

        return $serverToken;
    }

    public static function createNew(int $userId, string $name, int $planLevel)
    {
        $user = User::find($userId);

        if (!$user) {
            throw new \Exception('Specified user id doesn\'t exist!');
        }

        DB::beginTransaction();

        try {
            $serverAccount = new ServerAccount([
                'name' => $name,
                'plan_level' => $planLevel,
            ]);
            $serverAccount->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        try {
            $serverAccountMember = new ServerAccountMember([
                'role_id' => 1,
                'server_account_id' => $serverAccount->id,
                'user_id' => $userId,
            ]);
            $serverAccountMember->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        try {
            $user->serverAccountMembers()->save($serverAccountMember);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();

        return $serverAccount;
    }
}
