<?php
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Podcast account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'Spencer');
$I->fillField('Email:', 'test@spencerbrigham.com');
$I->fillField('Password:', 'pass');
$I->fillField('Confirm Password:', 'pass');
$I->click('Sign Up!');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Podcast');

$I->seeRecord('users', [
    'username' => 'Spencer',
    'email' => 'test@spencerbrigham.com'
]);

$I->assertTrue(Auth::check());





