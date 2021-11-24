<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
use Faker\Factory as Faker;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'amount' => $faker->numberBetween(12000000, 9500000000),
            'status' => $faker->randomElement(['paid', 'initialized', 'failed', 'cancelled', 'error']),
            'transaction_id' => \Str::random(64),
            'user_id' => $faker->numberBetween(1, 300),
            'reference' => \Str::uuid(),
            'currency' => $faker->randomElement(['USD', 'NGN', 'RAND', 'CAD', 'AUD', 'EURO', 'POUNDS']),
        ];
    }
}
