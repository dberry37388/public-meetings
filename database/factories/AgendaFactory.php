<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AgendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agenda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $meetingIds = Meeting::pluck('id');

        return [
            'meeting_id' => $this->faker->randomElement($meetingIds),
            'topic' => 'Item #' . $this->faker->numberBetween(0, 1000),
            'description' => $this->faker->sentences(6, true),
        ];
    }
}
