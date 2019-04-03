<?php
namespace App; use Carbon\Carbon; use Illuminate\Notifications\Notifiable; use Illuminate\Foundation\Auth\User as Authenticatable; class User extends Authenticatable { use Notifiable; protected $guarded = array(); protected $hidden = array('password', 'remember_token'); protected $appends = array('m_balance'); const ID_CUSTOMER = -1; const inventory_real = 1; const inventory_range = 0; const STATUS_OK = 0; const STATUS_FROZEN = 1; function getMBalanceAttribute() { return $this->m_all - $this->m_paid - $this->m_frozen; } function getMBalanceWithoutTodayAttribute() { $sp570b01 = (int) \App\Order::where('user_id', $this->user_id)->where('status', \App\Order::STATUS_SUCCESS)->whereDate('paid_at', Carbon::today())->sum('income'); return $this->m_all - $this->m_paid - $this->m_frozen - $sp570b01; } function categories() { return $this->hasMany(Category::class); } function products() { return $this->hasMany(Product::class); } function cards() { return $this->hasMany(Card::class); } function orders() { return $this->hasMany(Order::class); } function coupons() { return $this->hasMany(Coupon::class); } function logs() { return $this->hasMany(Log::class); } function shop_template() { return $this->belongsTo(ShopTemplate::class); } }