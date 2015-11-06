<?php 
$I = new FunctionalTester($scenario);
$I->am('A Larabook user');
$I->wantTo('Post a status to my statuses page');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My first post');

$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post');