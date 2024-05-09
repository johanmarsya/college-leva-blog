<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; //delete関数での実行を物理削除ではなく、論理削除に変更
    
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id'
        ];
    
    public function getPaginateByLimit(int $limit_count = 10) {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category', 'user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // Categoryに対するリレーション
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
