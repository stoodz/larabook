<?php

use Illuminate\Routing\Controller;
use Larabook\Forms\SignInForm;

class SessionController extends BaseController {

    /**
     * @var SignInForm
     */
    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        $this->signInForm = $signInForm;
    }


    /**
     * Display a listing of the resource.
     * GET /session
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /session/create
     *
     * @return Response
     */
    public function create()
    {
       return View::make('sessions.create');
    }


    /**
     *
     */
    public function store()
    {
        $formData = Input::only('email', 'password');

        $this->signInForm->validate($formData);

        if (! Auth::attempt($formData)) ;
        {
            Flash::error('We were unable to sign you in, please check your credentials');

            return Redirect::back()->withInput();
        }

        Flash::message('Welcome back!');
        return Redirect::intended('statuses');

    }

    /**
     * Destroys the Larabook user's auth session
     *
     * @return mixed
     */
    public function destroy()
    {
        Auth::logout();

        Flash::message('You have now been successfully logged out');
        return Redirect::home();
    }
}
