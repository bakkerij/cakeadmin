<?php
  
use Cake\ORM\TableRegistry;
use Migrations\AbstractMigration;

class AddAdminUser extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
      $AdminTable = TableRegistry::get('Bakkerij/CakeAdmin.Administrators');
      $user = $AdminTable->newEntity([
        'name' => 'admin',
        'email' => 'admin@test.com',
        'password' => 'test',
        'active' => 1
      ]);
      $AdminTable->save($user);
    }
}