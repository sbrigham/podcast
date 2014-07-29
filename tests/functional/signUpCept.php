<?php
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Podcast account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'Drew');
$I->fillField('Email:', 'test@tester.com');
$I->fillField('Password:', 'password');
$I->fillField('password_confirmation', 'password');
$I->click('Sign Up!');
//
//$I->seeCurrentUrlEquals('');
//$I->see('Welcome to Podcast');
//
//$I->seeRecord('users', [
//    'username' => 'Spencer',
//    'email' => 'test@spencerbrigham.com'
//]);
//
//$I->assertTrue(Auth::check());





