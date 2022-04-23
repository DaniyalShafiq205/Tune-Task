<?php

namespace Tests\Feature;

use App\Models\Log;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{

    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_testG()
    {

        Log::factory()->count(10)->create();
        $this->get('/getChartData');
        $fields = [
            'revenue_sum',
            'conversion_count',
            'impression_count',
            'name'

        ];


        foreach ($fields as  $value) {
            $this->get('/getUserData?sortBy=' . $value . '&order=desc')->assertStatus(200);
            $this->get('/getUserData?sortBy=' . $value . '&order=asc')->assertStatus(200);
        }
        $this->get('/getUserData?search=char')->assertStatus(200);
    }
}
