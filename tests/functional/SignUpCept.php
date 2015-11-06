<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Sign up for a larabook account');

$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');

$I->fillField('username', 'JohnDoe');
$I->fillField('email', 'John@example.com');
$I->fillField('password', 'demo');
$I->fillField('password_confirmation', 'demo');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook!');
$I->seeRecord('users', [
   'username' => 'JohnDoe',
   'email' => 'john@example.com'
]);

