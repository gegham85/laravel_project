<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->assertTrue(true);
        
    	//given I have two records in the database that are posts,
    	//and each one is posted a month apart.
    	$first = factory(Post::class)->create(); // one post created this month
    	$second = factory(Post::class)->create([ // one post created last month
    		'created_at' => \Carbon\Carbon::now()->subMonth(),
    	]);
    	
    	//when I fetch the archives.
    	$posts = Post::archives();
    	
    	//then the response should be in the proper format.
    	$this->assertCount(2, $posts);
    }
}
