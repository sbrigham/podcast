<?php 
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Podcast account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:', 'test');
$I->fillField('Email:', 'sdbrigha@buffalo.edu');
$I->fillField('Password:', 'pass');
$I->fillField('Password Confirmation:', 'pass');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('/');
$I->see('Welcome to Podcast');

