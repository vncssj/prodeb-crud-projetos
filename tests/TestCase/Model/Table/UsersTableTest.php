<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    protected $Users;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = $this->getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        // Teste com dados válidos
        $validData = [
            'username' => 'usuario_valido',
            'email' => 'email@valido.com',
            'password' => 'senhaSegura123',
        ];

        $user = $this->Users->newEntity($validData);
        $this->assertEmpty($user->getErrors());

        // Testar username obrigatório
        $noUsername = $validData;
        unset($noUsername['username']);
        $user = $this->Users->newEntity($noUsername);
        $this->assertArrayHasKey('username', $user->getErrors());

        // Testar email inválido
        $invalidEmail = $validData;
        $invalidEmail['email'] = 'email-invalido';
        $user = $this->Users->newEntity($invalidEmail);
        $this->assertArrayHasKey('email', $user->getErrors());

        // Testar senha curta
        $shortPassword = $validData;
        $shortPassword['password'] = '123';
        $user = $this->Users->newEntity($shortPassword);
        $this->assertArrayHasKey('password', $user->getErrors());
    }

    /**
     * @dataProvider validationDataProvider
     */
    public function testValidation($field, $value, $expected): void
    {
        $data = [
            'username' => 'usuario_valido',
            'email' => 'email@valido.com',
            'password' => 'senhaSegura123',
        ];

        $data[$field] = $value;
        $user = $this->Users->newEntity($data);

        $errors = $user->getErrors();
        if ($expected) {
            $this->assertArrayNotHasKey($field, $errors);
        } else {
            $this->assertArrayHasKey($field, $errors);
        }
    }

    public function validationDataProvider(): array
    {
        return [
            ['username', 'usuario_valido', true],
            ['username', '', false],
            ['username', str_repeat('a', 256), false], // muito longo
            ['email', 'email@valido.com', true],
            ['email', 'email-invalido', false],
            ['password', 'senhaSegura123', true],
            ['password', '123', false], // muito curta
        ];
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
