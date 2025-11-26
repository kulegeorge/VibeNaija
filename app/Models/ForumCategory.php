<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','description','position'];

    public function threads()
    {
        return $this->hasMany(ForumThread::class, 'category_id');
    }
}
