<?php
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Podcast account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'test');
$I->fillField('Email:', 'test@test.com');
$I->fillField('Password:', 'pass');
$I->fillField('Confirm Password:', 'pass');
$I->click('Sign Up!');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Podcast');

$I->seeRecord('users', [
    'username' => 'test',
    'email' => 'test@test.com'
]);

$I->assertTrue(Auth::check());





