<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Gig;
use Illuminate\Database\Eloquent\Factories\Factory;

class GigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gig::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get random start date
        $start_date = $this->faker->dateTimeBetween('-100 days', '+1 years');

        // Get random end date after the start date
        $end_date = $this->faker->dateTimeBetween($start_date, '+1 years');

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(),
            'dt_start' => $start_date,
            'dt_end' => $end_date,
            'positions' => rand(1,100),
            'pay_per_hour' => $this->faker->numerify('##.##'),
            'status' => rand(0,1),
            'company_id' => Company::factory(),
        ];
    }
}
