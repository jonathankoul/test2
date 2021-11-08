<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserTest extends TestCase
{
    private $header = [ 'Authorization' => 'Bearer RXZEWWh2Mmlqbw=='];
    
    /**
     * GET Users
     */
    public function testShouldReturnAllUsers()
    {
        $this->get("api/users", $this->header);
        $this->seeStatusCode(200);
    }
    
    /**
     * GET User/{id}
     */
    public function testShouldReturnSingleUser()
    {
        $this->get("api/users/11", $this->header);
        $this->seeStatusCode(200);
    }
    
    /**
     * POST User
     */
    public function testShouldPostUser()
    {
        $parameters = [
            'first_name' => 'Jonny',
            'last_name' => 'Koulouris',
            'phone' => '01234123123',
            'email' => 'jonathankoul@gmail.com',
            'password' => 'password',
        ];
        
        $this->post("api/users", $parameters, $this->header);
        $this->seeStatusCode(201);  
    }
    
    /**
     * PUT User
     */
    public function testShouldPutUser()
    {
        $parameters = [
            'first_name' => 'Jonny',
            'last_name' => 'Koulouris',
            'phone' => '01234123123',
            'email' => 'jonathankoul@gmail.com',
            'password' => 'password',
        ];
        
        $this->post("api/users", $parameters, $this->header);
        $this->seeStatusCode(201); 
    }
    
    /**
     * DELETE User/{id}
     */
    public function testShouldDeleteUser()
    {
        $parameters = [
        ];
        $this->delete("api/users/7",$parameters, $this->header);
        $this->seeStatusCode(410); 
    }
}