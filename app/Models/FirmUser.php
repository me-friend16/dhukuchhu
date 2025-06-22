<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'firm_id', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
}
