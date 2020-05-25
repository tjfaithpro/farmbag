<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
   /**
    * The database table used by the model.
    *
    * @var string
    */
    public $table = "products";
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   public $fillable = [
      //  'title', 'body', 'created_by'
   ];

   /*
   *Get Todo of User
   *
   * */
  public function posts()
  {
   //   return $this->hasMany(Post::class, 'created_by');
  }
 }

 ?>