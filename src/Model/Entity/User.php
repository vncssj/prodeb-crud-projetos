<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $role
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $last_login
 * @property string|null $token
 * @property \Cake\I18n\DateTime|null $token_expires
 * @property \Cake\I18n\DateTime|null $activation_date
 * @property string|null $reset_token
 * @property \Cake\I18n\DateTime|null $reset_expires
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'role' => false,
        'created' => false,
        'modified' => false,
        'status' => false,
        'last_login' => false,
        'token' => false,
        'token_expires' => false,
        'activation_date' => false,
        'reset_token' => false,
        'reset_expires' => false,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
        'token',
    ];

    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
