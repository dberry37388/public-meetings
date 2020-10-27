<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\Rsvp;
use Illuminate\Database\Eloquent\Factories\Factory;

class RsvpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rsvp::class;

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
            'email' => $this->faker->safeEmail,
            'response' => $this->faker->randomElement(['Yes', 'No', 'Maybe'])
        ];
    }
}
