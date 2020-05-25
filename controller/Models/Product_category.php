<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Product_category extends Model
{
   /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = "product_categories";
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        // 'name', 'email', 'password'
    ];
   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        // 'password', 'remember_token',
    ];
   /*
    * Get Todo of User
    *
    */
    public function posts()
    {
        return $this->hasMany(Product_category::class, 'created_by');
    }
}

?>