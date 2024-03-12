<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;



    public function test_index_users()
    {
        // Crea un usuario para que haya al menos uno en la base de datos
        $this->postJson('/api/users', [
            "name" => "jhonfttrt",
            "email" => "jhon@gmail.com",
            "password" => "12345655789"
        ]);
    
        // Realiza la solicitud para obtener todos los usuarios
        $response = $this->get('/api/users');
    
        $response->assertStatus(200)
            ->assertJson([
                "message" => "lista de users", // Actualiza el mensaje a reflejar la solicitud de índice
                "statusCode" => 200,
                "error" => false,
            ])
            ->assertJsonFragment([
                "id" => 1,
                "name" => "jhonfttrt",
                "email" => "jhon@gmail.com",
                "email_verified_at" => null,
            ]);
    }
    






    public function test_store_users()
    {
        $response = $this->postJson('/api/users', [
            "name" => "jhon ariza",
            "email" => "jhonariza@gmail.com",
            "password" => "12345655789"
        ]);
    
         
        $response->assertStatus(201)
        ->assertJson([
            'data' => [
                'name' => 'jhon ariza',
                'email' => 'jhonariza@gmail.com',
            ],
        ]);
    }
    



    public function test_store_users_update_no()
    {
        $response = $this->postJson('/api/users/2', [
            "name" => "jhon duarte",
            "email" => "jhonariza@gmail.com",
            "password" => "12345655789"
        ]);
    
         
        $response->assertStatus(404)
        ->assertJson([
            
                "message"=>"user no encontrado",
                "statusCode"=> 404,
                "error"=>false,
                "data"=>[]
          
        ]);
    }


    public function test_delete_user()
    {
        // Crea un usuario para luego eliminarlo
        $response = $this->postJson('/api/users', [
            'name' => 'jhon alexander  duarte',
            'email' => 'jhonduarte@gmail.com',
            'password' => '12345655789',
        ]);

        // Extrae el ID del usuario creado
        $userId = $response->json('data.id');

        // Realiza la solicitud de eliminación del usuario
        $response = $this->delete("/api/users/{$userId}");

        // Verifica que la eliminación del usuario fue exitosa
        $response->assertStatus(200);

        // Verifica que la respuesta tenga la estructura esperada
        $response->assertJsonStructure([
            'message',
            'statusCode',
            'error',
        ]);

        // Verifica que los datos en la base de datos hayan sido eliminados
        $this->assertDatabaseMissing('users', [
            'id' => $userId,
        ]);
    }







 }










//  {
//     "message": "user encontrado exitosamente",
//     "statusCode": 200,
//     "error": false,
//     "data": {
//         "id": 47,
//         "name": "juanhghgh",
//         "email": "lunanll@gmail.com",
//         "email_verified_at": null,
//         "created_at": "2024-03-12T18:20:40.000000Z",
//         "updated_at": "2024-03-12T19:57:03.000000Z"
//     }
// }




























 