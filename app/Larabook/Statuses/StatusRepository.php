<?php namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository {


//    public function getAllForUser(User $user)
//    {
//        return $user->statuses();
//    }

    public function getAllForUser($userId)
    {
        return User::find($userId)->statuses()->latest()->get();
    }

    public function getFeedForUser(User $user)
    {
        $userIds = $user->follows()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }

    /**
     * Save a new status for a specific user
     *
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
       return User::findOrFail($userId)->statuses()->save($status);
    }

    public function leaveComment($userId, $statusId, $body)
    {
        $comment = Comment::leave($body, $statusId);

        User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }
} 