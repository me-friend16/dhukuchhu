<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Get all firm mapping records (firm_users) for this firm.
    public function firmUsers()
    {
        return $this->hasMany(FirmUser::class);
    }

    // Get all actual users in the firm.
    public function users()
    {
        return $this->hasManyThrough(User::class, FirmUser::class, 'firm_id', 'id', 'id', 'user_id');
    }

    // public function users()
    // {
    //     return $this->hasMany(FirmUser::class);
    // }
}
