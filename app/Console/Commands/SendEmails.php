<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send e-mails to a user';
    
    /**
     * The drip e-mail service.
     *
     * @var DripEmailer
     */
    protected $drip;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$headers = ['Name', 'Email'];
    	
    	$users = array(
    			array(
					'user' => 'gegham', 
					'email' => 'g@g.com',
    			),
    			array(
    					'user' => 'arbi',
    					'email' => 'g@g.com',
    			)
    	);
    	
    	$this->table($headers, $users);
    }
}
