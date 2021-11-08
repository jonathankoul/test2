<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AddresseeTest extends TestCase
{
    private $header = [ 'Authorization' => 'Bearer RXZEWWh2Mmlqbw=='];
    
    /**
     * GET Addressees
     */
    public function testShouldReturnAllAddressees()
    {
        $this->get("api/addressees", $this->header);
        $this->seeStatusCode(200);
    }
    
    /**
     * GET Addressee/{id}
     */
    public function testShouldReturnSingleAddressee()
    {
        $this->get("api/addressees/2", $this->header);
        $this->seeStatusCode(200);
    }
    
    /**
     * POST Addressee
     */
    public function testShouldPostAddressees()
    {
        $parameters = [
            'first_name' => 'Jonny',
            'last_name' => 'Koulouris',
            'phone' => '01234123123',
            'email' => 'jonathankoul@gmail.com',
        ];
        
        $this->post("api/addressees", $parameters, $this->header);
        $this->seeStatusCode(201);  
    }
    
    /**
     * PUT Addressee
     */
    public function testShouldPutAddressees(){
        $parameters = [
            'first_name' => 'Jonny',
            'last_name' => 'Koulouris',
            'phone' => '01234123123',
            'email' => 'jonathankoul@gmail.com',
        ];
        
        $this->post("api/addressees", $parameters, $this->header);
        $this->seeStatusCode(201); 
    }
    
    /**
     * DELETE Addressee/{id}
     */
    public function testShouldDeleteAddressee()
    {
        $parameters = [
        ];
        $this->delete("api/addressees/7",$parameters, $this->header);
        $this->seeStatusCode(410); 
    }
}