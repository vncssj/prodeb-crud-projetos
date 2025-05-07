<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-05-07 18:13:57',
                'modified' => '2025-05-07 18:13:57',
                'status' => 'Lorem ipsum dolor sit amet',
                'last_login' => '2025-05-07 18:13:57',
                'token' => 'Lorem ipsum dolor sit amet',
                'token_expires' => '2025-05-07 18:13:57',
                'activation_date' => '2025-05-07 18:13:57',
                'reset_token' => 'Lorem ipsum dolor sit amet',
                'reset_expires' => '2025-05-07 18:13:57',
            ],
        ];
        parent::init();
    }
}
