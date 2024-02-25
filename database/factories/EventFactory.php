<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Event::class;
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_datetime' => $this->faker->dateTimeBetween('now', '+30 days'),
            'end_datetime' => $this->faker->dateTimeBetween('+31 days', '+60 days'),
            'vip_ticket_price' => $this->faker->randomFloat(2, 20, 100),
            'regular_ticket_price' => $this->faker->randomFloat(2, 10, 50),
            'max_attendees' => $this->faker->numberBetween(50, 200),
        

            //
        ];
    }
}
