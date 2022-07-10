<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;

  //default to always eager load. Saves having to do it in route / controller
  protected $with = ['category', 'author'];

  // protected $guarded = ['id'];
  // empty array to disable mass assignment =  protected $guarded = [];
  protected $fillable = ['title', 'excerpt', 'body'];


  //query scopes example. Name it scope{name}.
  public function scopeFilter($query,  array $filters)
  {
    //search form
    $query->when(
      $filters['search'] ?? false,
      fn ($query, $search) =>
      $query->where(
        fn ($query) =>
        $query
          ->where('title', 'like', '%' . $search . '%')
          ->orWhere('body', 'like', '%' . $search . '%')
      )
    );

    //category 
    $query->when(
      $filters['category'] ?? false,
      fn ($query, $category) =>
      $query
        ->whereHas(
          'category',
          fn ($query) =>
          $query->where('slug', $category)
        )
    );
    //author / username
    $query->when(
      $filters['author'] ?? false,
      fn ($query, $author) =>
      $query
        ->whereHas(
          'author',
          fn ($query) =>
          $query->where('username', $author)
        )
    );
  }

  //overwrite default route model binding to use slug not id
  public function getRouteKeyName()
  {
    return 'slug';
  }


  //call as a property not a method
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  /**
   * Need to specify user_id here as that's the collumn we are
   * using for the relationship, not 'author(_id)'
   */
  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
}
