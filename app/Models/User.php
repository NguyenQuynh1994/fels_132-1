<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Activity;
use App\Models\Lesson;
use App\Models\UserWord;
use App\Models\Relationship;
use Hash;
use File;
use Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ROLE_MEMBER = 1;
    const ROLE_ADMIN = 0;
    protected $fillable = ['name', 'email', 'avatar', 'password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function userWord()
    {
        return $this->belongsToMany(Word::class, 'user_words');
    }

    public function userWords()
    {
        return $this->hasMany(UserWord::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function getLinkReset($token)
    {
        $link = url('password/reset', $token) . '?email=' . urlencode($this->getEmailForPasswordReset());

        return $link;
    }

    public function followers()
    {
        return $this->hasMany(Relationship::class, 'following_id');
    }

    public function followings()
    {
        return $this->hasMany(Relationship::class, 'follower_id');
    }

    public function updateUser($request)
    {
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];
        $this->update($userData);
    }

    public function updatePassword($password)
    {
        $this->password = Hash::make($password);
        $this->save();
    }

    public function updateAvatar($request, $oldImage)
    {
        $imagePath = public_path('uploads/image/');
        $image = $request->file('avatar');
        $extenstion = $image->getClientOriginalExtension();
        $fileName = md5(rand()) . '.' . $extenstion;
        $image->move($imagePath, $fileName);
        $userData = [
            'avatar' => $fileName,
        ];

        if (!empty($oldImage)) {
            File::delete($imagePath . $oldImage);
        }

        $this->update($userData);
    }

    public function isAdmin()
    {
        return ($this->role == User::ROLE_ADMIN);
    }
}
