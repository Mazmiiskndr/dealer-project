<?php

namespace App\Livewire\Auth\Login;

use App\Models\User;
use Auth;
use Livewire\Component;

class Form extends Component
{
    // Declare public variables for username and password
    public $username, $password;

    // Define an array of validation rules for the variables
    protected $rules = [
        'username' => 'required', // The username is required
        'password' => 'required', // The password is required
    ];

    // Define an array of custom error messages for validation failures
    protected $messages = [
        'username.required' => 'Username is required!', // Error message if the username is not provided
        'password.required' => 'Password is required!', // Error message if the password is not provided
    ];

    /**
     * Update the specified property and validate it.
     * @param string $property
     * @return void
     */
    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.auth.login.form');
    }

    public function loginAction()
    {
        // Validate the form input fields
        $this->validate();

        try {
            // Check if the username exists in the database
            $user = User::where('username', $this->username)->first();

            if (!$user) {
                // If the username does not exist, give a specific error message
                session()->flash('error', "The username you entered does not exist. Please try again.");
                return redirect()->route('login');
            }

            // TODO: BUTUH STATUS ATAU TIDAKNYA
            // Check if the user is active
            // if ($user->status != 1) {
            //     // If the user is not active, give a specific error message
            //     session()->flash('error', "Your account is inactive. Please contact the administrator.");
            //     return redirect()->route('login');
            // }

            // Attempt to authenticate the user with the given credentials
            if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
                // If the validation was successful and the user is authenticated
                if (Auth::check()) {
                    // Redirect the user to the desired page with a success message
                    session()->flash('success', "You have successfully logged in!");
                    return redirect()->route('backend.dashboard');
                }
            }

            // If the username exists but the password is wrong, give a general error message
            session()->flash('error', "Incorrect username or password. Please try again.");
            return redirect()->route('login');
        } catch (\Exception $e) {
            // Flash a general error message
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('login');
        }
    }

}
