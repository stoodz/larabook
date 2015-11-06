<?php namespace Larabook\Registration\Events;


use Larabook\Users\User;

class UserHasRegistered {

    public $user;

    /**
     * @param $user
     */
    function __construct(User $user)
    {
        $this->user = $user;
    }


} 