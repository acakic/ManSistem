<?php

class AuthController
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $re_password = '';
    public $city = '';
    public $zipcode = '';
    public $address = '';
    public $registrate = '';

    public $error = [];

    /*
     * Method for validating  data from registration form and sending to userModel!
     */
    public function register()
    {
        if (isset($_POST)) {
            $this->first_name = $_POST['first_name'];
            $this->last_name = $_POST['last_name'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->re_password = $_POST['re_password'];
            $this->city = $_POST['city'];
            $this->zipcode = $_POST['zipcode'];
            $this->address = $_POST['address'];


            //Remove any excess whitespace
            $this->first_name = trim($this->first_name);
            $this->last_name = trim($this->last_name);
            $this->email = trim($this->email);
            $this->password = trim($this->password);
            $this->re_password = trim($this->re_password);
            $this->city = trim($this->city);
            $this->zipcode = trim($this->zipcode);
            $this->address = trim($this->address);


            //Check that the input values are of the proper format
            if (!preg_match('/^[a-zA-Z]+$/', $this->first_name)) {
                $this->error['first_name'] = 'Uneti ponovo ime!'; 
            }
            if (!preg_match('/^[a-zA-Z]+$/', $this->last_name)) {
                $this->error['last_name'] = 'Uneti ponovo prezime!'; 
            }
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->error['email'] = 'Email adresa nije validna!'; 
            }
            if (!preg_match('/^[a-zA-Z]+$/', $this->city)) {
                $this->error['city'] = 'Uneti ponovo grad!'; 
            }
            if (!preg_match('/^[0-9]{5}(-[0-9]{4})?$/', $this->zipcode)) {
                $this->error['zipcode'] = 'Uneti ponovo zip code!'; 
            }
            if (!preg_match('/[^A-Za-z0-9]+/', $this->address)) {
                $this->error['address'] = 'Uneti ponovo adresu!'; 
            }
            if (empty($this->first_name)) {
               $this->error['first_name'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->last_name)) {
                $this->error['last_name'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->email)) {
                $this->error['email'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->password)) {
                $this->error['password'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->city)) {
                $this->error['city'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->zipcode)) {
                $this->error['zipcode'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->address)) {
                $this->error['address'] = 'Polje ne sme biti prazno!';
            }
            if ($this->re_password != $this->password || empty($this->re_password)) {
                $this->error['password'] = 'Sifre se ne poklapaju!';

            }

            //  if have errors adds ?, if there only one err add =error + msg, if have more errs adding & after each err msg.
            if (!empty($this->error)) {
                $errors = '?';
                $lastKey = $this->_array_key_last($this->error);
                foreach ($this->error as $error => $msg) {
                    if ($error == $lastKey) {
                        $errors .= $error . '=' . $msg;
                    } else {
                        $errors .= $error . '=' . $msg . '&';
                    }
                }
                header('Location: /users/register?error=' . $errors);
            } else {

                // creates a new password hash, PASSWORD_DEFAULT - Use the bcrypt algorithm
                $enc_pass = password_hash($this->password, PASSWORD_DEFAULT); 
                $user = new User();
                // checking if email exists in db.
                if ($user->checkIfAvailable($this->email)) {
                    $is_created = $user->register($this->first_name,$this->last_name,$this->email, $enc_pass ,$this->city, $this->zipcode, $this->address);            
                    if($is_created){
                        $msg = 'Uspesno ste se registrovali!';     
                        header('Location: /?success=' . $msg);            
                    } else{
                        $msg = 'Pokusajte ponovo, nesto je pogresno!';
                        header('Location: /users/register?error=' . $msg);
                    }
                } else{
                    $msg = 'Unete email adresa postoji, pokusajte da se ulogujete!';
                    header('Location: /users/register?error=' . $msg);
                }
            } 
        }
    }

    /*
     * Method for validating  data from login form and sending to userModel!
     */
    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $this->password = $_POST['password'];
            $this->email = $_POST['email'];

            $user = new User();
            $loggedUser = $user->login($this->email, $this->password);
            if ($loggedUser) {
                if (!isset($_SESSION['loggedUser'])) {
                    $_SESSION['loggedUser'] = $loggedUser;
                $msg = 'Uspesno ste se ulogovali!';
                header('Location: /?success=' . $msg);
                }
            } else {
                $msg = 'Nalog ne postoji ili su podaci pogresni!';
                header('Location: /users/login?error=' . $msg);
            }

        } else {
            //potrebno popuniti sva polja
        }

    }

    /*
     * Method for logout user! just unset ssession[loggedUser];
     */
    public function logout()
    {
        unset($_SESSION['loggedUser']);
        header('Location: /');
    }

    /*
    *   Function for finding last key in an array.
    */ 
    private function _array_key_last(array $array){
        return (!empty($array)) ? array_keys($array)[count($array)-1] : null;
    }
}