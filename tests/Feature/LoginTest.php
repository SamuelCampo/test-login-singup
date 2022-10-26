<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

	public function test_singup()
	{
		$response = $this->get('/singup');
        $response->assertStatus(200);
	}

	public function test_the_email_is_required_singup()
	{
		$response = $this->post('/singup',[
			'email' => '',
			'password' => '123456',
			'name' => 'Test Email',
		]);

		$response->assertStatus(302);
	}

	public function test_the_password_is_required_singup()
	{
		$response = $this->post('/singup',[
			'email' => 'exist@email.com',
			'password' => '',
			'name' => 'Test Email',
		]);

		$response->assertStatus(302);
	}

	public function test_the_name_is_required_singup()
	{
		$response = $this->post('/singup',[
			'email' => 'exist@email.com',
			'password' => '123456',
			'name' => '',
		]);
		$response->assertStatus(302);
	}

	public function test_create_user_full_field()
	{

		User::create([
            'email' => 'test@test.com',
			'password' => '123456',
			'name' => 'test',
        ]);

		$response = $this->post('/singup',[
			'email' => 'test@test.com',
			'password' => '123456',
			'name' => 'test',
		])->assertRedirect('/singup');

		User::where('email','test@test.com')
			->delete();
	}

	public function test_view_panel()
	{
		$user = User::factory()->create();
        $response = $this->actingAs($user)
                         ->withSession(['banned' => true])
                         ->get('/panel');

		$response->assertStatus(200);
	}

	public function test_code_lenght_max6_min6_confirmation_view(){
		/* Error por el codigo no cumple con los 6 caracteres */
		$this->get('/confirmation/12345/correo@correo.com')
			->assertStatus(302);
	}

	public function test_confirmation_code(){
		/* Error por el codigo no cumple con los 6 caracteres */
		$this->get('/confirmation/123456/correo@correo.com')
			->assertRedirect('/confirmacion_login')
			->assertStatus(302);
	}

}
