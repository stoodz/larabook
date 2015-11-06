<?php namespace Larabook\Users;


class UserRepository {

    /**
     * Persist a User
     *
     * @param User $user
     * @return mixed
     */

    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 16)
    {
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * Fetch a user by their username
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }

    /**
     * Find a user by their id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Follow a larabook user
     *
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->follows()->attach($userIdToFollow);
    }

    public function unfollow($userIdToUnfollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }
} 