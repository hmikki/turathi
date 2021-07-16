<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rules\In;
use phpseclib3\Math\PrimeField\Integer;

/**
 * @property integer id
 * @property mixed user_id
 * @property string title
 * @property string title_ar
 * @property mixed image
 * @property float price
 * @property string email
 * @property string description
 * @property string description_ar
 * @property integer mobile
 * @property mixed rate
 * @property string|null lat
 * @property string|null lng
 * @property string|null location
 * @property mixed page_id
 * @property integer|null category_id
 * @property boolean is_active
 * @method Advertisement find(mixed $advertisement_id)
 */
class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = ['user_id','title','title_ar', 'description' , 'description_ar' , 'image', 'category_id' , 'price' , 'email' , 'mobile' , 'rate' ,'lat' , 'lng' , 'location' , 'page_id' ,'is_active'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitleAr(): string
    {
        return $this->title_ar;
    }

    /**
     * @param string $title_ar
     */
    public function setTitleAr(string $title_ar): void
    {
        $this->title_ar = $title_ar;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescriptionAr(): string
    {
        return $this->description_ar;
    }

    /**
     * @param string $description_ar
     */
    public function setDescriptionAr(string $description_ar): void
    {
        $this->description_ar = $description_ar;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng(): string
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng(string $lng): void
    {
        $this->lng = $lng;
    }

    /**
     * @return mixed
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * @param mixed $page_id
     */
    public function setPageId(string $page_id): void
    {
        $this->page_id = $page_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId(): Integer
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId(string $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return bool
     */
    public function isIsActive(): bool
    {
        return $this->is_active;
    }

    /**
     * @param bool $is_active
     */
    public function setIsActive(bool $is_active): void
    {
        $this->is_active = $is_active;
    }
}
