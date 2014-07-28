<?php

$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign into the website.');

$I->amOnPage('/');
$I->click('Login');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'test@spencerbrigham.com');

//$I->fillField('password', 'pass');
//$I->click('Login!');
//
//$I->seeCurrentUrlEquals('');
//$I->see('Hello '. 'Spencer!');
//$I->assertTrue(Auth::check());





