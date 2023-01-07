<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function getKanaAttribute(string $value): string
    {
        // KANAカラムの値を半角カナに変換
        return mb_convert_kana($value, "k");
    }

    public function setKanaAttribute(string $value): void
    {
        // KANAカラムの値を全角カナに変換
        $this->attributes['kana'] = mb_convert_kana($value, "KV");
    }
}
