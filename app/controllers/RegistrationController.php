<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;

class RegistrationController extends BaseController {

    /**
     * @var RegistrationForm
     */
    private $registrationForm;


    /**
     * Constructor
     *
     * @param RegistrationForm $registrationForm
     */
    function __construct(RegistrationForm $registrationForm)
    {

        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');
    }

	/**
	 * Show the form for registering a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('registration.create');
	}

    /**
     * Create a new Larabook user
     *
     * @return string
     */
    public function store()
    {
        $this->registrationForm->validate(Input::all());

        $user = $this->execute(RegisterUserCommand::class);

        Auth::login($user);

        Flash::success('Glad to have you as a new subscriber');

        return Redirect::home();
    }
}
