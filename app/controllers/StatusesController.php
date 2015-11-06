<?php

use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;

/**
 * Class StatusController
 */
class StatusesController extends \BaseController {


    /**
     * @var StatusRepository
     */
    protected $statusRepository;
    /**
     * @var PublishStatusForm
     */
    protected $publishStatusForm;

    /**
     * @param PublishStatusForm $publishStatusForm
     * @param StatusRepository $statusRepository
     */
    function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->publishStatusForm = $publishStatusForm;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::guest())
        {
            return Redirect::home();
        }
//        $statuses = $this->statusRepository->getAllForUser(Auth::user());
        $statuses = $this->statusRepository->getFeedForUser(Auth::user());
      //  dd(compact($statuses));
        return View::make('statuses.index', compact('statuses'))->withUser(Auth::user());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Save a new status
	 *
	 * @return Response
	 */
	public function store()
	{
//        $input = Input::get();
//        $input['userId'] = Auth::id();
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->publishStatusForm->validate($input);

        $this->execute(PublishStatusCommand::class, $input);

//        $status = $this->execute(new PublishStatusCommand(Input::get('body'), Auth::user()->id));

        Flash::message('Your status has been updated');

        return Redirect::back();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
