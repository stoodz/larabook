<?php namespace Larabook\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter{

    /**
     * Display how long it's been since date published
     *
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }

} 