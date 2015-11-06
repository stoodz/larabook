<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Login to Larabook');

$I->signIn(); //signin logic in Functional Helper

$I->seeInCurrentUrl('/statuses');
$I->see('Post a status');
