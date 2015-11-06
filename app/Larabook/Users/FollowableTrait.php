<?php namespace Larabook\Users;


trait FollowableTrait {


    /**
     * Get the list of users that the current user follows.
     *
     * @return mixed
     */
    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }


    /**
     * Determine if current user follows another user
     *
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }
} 