<?php
/**
 * @author yerurui
 * Date: 10/29/15
 * Time: 2:40 PM
 */


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Utils\UuidUtil;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('users')->delete();

        $users = array(
            ['username'=>'a', 'uuid'=>UuidUtil::getUuid() ,'name' => 'Ryan Chenkie', 'email' => 'ryanchenkie@gmail.com', 'phone'=> '1234', 'password' => Hash::make('secret')],
            ['username'=>'b', 'uuid'=>UuidUtil::getUuid() ,'name' => 'Chris Sevilleja', 'email' => 'chris@scotch.io', 'phone'=> '12345','password' => Hash::make('secret')],
            ['username'=>'c', 'uuid'=>UuidUtil::getUuid() ,'name' => 'Holly Lloyd', 'email' => 'holly@scotch.io','phone'=> '123456', 'password' => Hash::make('secret')],
            ['username'=>'d', 'uuid'=>UuidUtil::getUuid() ,'name' => 'Adnan Kukic', 'email' => 'adnan@scotch.io', 'phone'=> '1234567', 'password' => Hash::make('secret')],
        );

        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}