<?php


namespace Database\Factories;
use App\Models\ModulesData;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubjectCategory;

class ModulesDataFactory extends Factory
{
    protected $model = ModulesData::class;

    public function definition()
    {
        $subject = SubjectCategory::query()->inRandomOrder()->first();

        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'module_id' => 15, // Adjust range according to your module IDs
            'description' => $this->faker->paragraph,
            'category' => $subject->id, // Adjust range according to your categories
            // Add more fields here as needed
            'status' => 'active', // Assuming all records are active by default
            'meta_title'=>$this->faker->slug,
            'model_name'=>'App\Models\SubjectCategory',
            'meta_keywords'=>$this->faker->slug,
            'meta_description'=>$this->faker->text(200),
            'images' => 'https://picsum.photos/400/300',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}