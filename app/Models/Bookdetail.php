<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookdetail extends Model
{
    use HasFactory;

    /**
     *  書籍詳細と紐づく書籍レコードを取得
     */
    public function book()
    {
        return $this->belongsTo('\App\Models\Book');
    }
}
