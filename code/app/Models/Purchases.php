<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $fillable = [
        'name',
        'age',
        'pastpurchases'
    ];

    protected $casts = [
        'age' => 'integer'
    ];

    
}
//Create
#$purchases = Purchases::create([
    #'name' => 'Teddy Rooselvelt',
    #'age' => 28,
    #'pastpurchases' => 'Vacuum'
#]);

//Read
#$purchases = Purchases::all();
#$purchases = Purchases::find(2);

//Update
#$purchases = Purchases::find(6);
#$purchases->name = 'Theodore Rooselvelt';
#$purchases->save();

//Delete
#$purchases = Purchases::find(11);
#$purchases->delete();




    
