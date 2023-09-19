<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

//  Eloquent предполагает, что первичный ключ представляет собой увеличивающееся
//  целочисленное значение, а это означает, что Eloquent автоматически преобразует
//  первичный ключ в целое число. Если вы хотите использовать неинкрементирующий или
//  нечисловой первичный ключ, вы должны определить общедоступное $incrementing свойство
//  вашей модели, для которого установлено значение false:
    public $incrementing = false;

//    Функция $fillable показывает какие поля будут
//    заполнятся в БД если тут не указоно поле которое будут пытаться заполнить
//    оно его пропустит и не выдаст ошибку
    protected $fillable = [
       'id', 'name', 'price',
        'active', 'sort',
    ];

//    Скрывает поля которые не нужно показывать
    protected $hidden =[
        'price'
    ];

//    Для каждого свойсва указываем тип данных
    protected $casts = [
      'price' => 'float',
      'active' => 'boolean',
      'sort' => 'integer',
    ];

//    Кастомные даты когда хотим чтобы они автоматом преобразовывались
//    в объект класса Carbon
    protected $dates = [
      'active_at',
    ];

}
