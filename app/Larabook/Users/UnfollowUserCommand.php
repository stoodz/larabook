<?php namespace Larabook\Users;


class UnfollowUserCommand {

    public $userId;

    public $userIdToUnfollow;

    function __construct($userIdToUnfollow, $userId)
    {
        $this->userIdToUnfollow = $userIdToUnfollow;
        $this->userId = $userId;
    }


} 