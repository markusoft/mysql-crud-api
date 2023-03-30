<?php

/**
 * @author        	Mark Angelo Angulo
 * @created             12/25/2022
 * @why                 Because Laziness is a Virtue
 */

interface MySqlCrudApi
{
    /**
     * Manage api calls
     */
    public function manage();
    
    /**
     * Create custom response
     * @param array $data - Response data
     * @param array $envelope - API envelop
     */
    public function response($data = [], $envelope = [
        'status' => 'Success',
        'code' => 200,
        'message' => 'Response message',
        'fetch_date' => 'Current date',
        'wrapper' => 'data'
    ]);
    
}