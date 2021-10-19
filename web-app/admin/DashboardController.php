<?php



Request::method('', function(){
    
});

Request::method('logout', function(){
    session::destroy();
    redirect_to('/');
    
});

Request::method('main',function(){

});