<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Ramsey\Uuid\Uuid;

use function PHPSTORM_META\type;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {  

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'civility'=>'required',
            'branch'=>'required',
            'function'=>'required',
            'path'=>'required',
        ],[
            'name'=>'Le champs nom est vide',
            'path.upload'=>"le fichier n'a pas pu téléger"
        ])->validate();

        $nameImage = time().$_FILES['path']['name'];   
        $path = storage::putFileAs('images', new file($input['path']), $nameImage);

        return User::create([
            'token' => (string) Uuid::uuid4(),
            'name' => $input['name'],
            'firstname' => $input['firstname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'function' => $input['function'],
            'civility' => $input['civility'],
            'authorization'=>0,
            'token_branch'=> $input['branch'],
            'path'=> $nameImage,
        ]);
       
    }
}
