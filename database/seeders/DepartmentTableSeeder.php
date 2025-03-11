<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
            [
                'name' => 'Information Technology Department',
                'description' => 'Handles computer systems, software, networks, and data management to support business operations and innovation.',
            ],
            [
                'name' => 'Human Resources Department',
                'description' => 'Manages employee relations, benefits, recruitment, training, and workplace policies to ensure a productive environment.',
            ],
            [
                'name' => 'Finance Department',
                'description' => 'Responsible for budgeting, financial reporting, expense tracking, and ensuring the company’s financial health.',
            ],
            [
                'name' => 'Marketing Department',
                'description' => 'Develops and executes strategies to promote products, build brand awareness, and attract potential customers.',
            ],
            [
                'name' => 'Customer Support Department',
                'description' => 'Provides assistance to customers, resolves issues, and ensures customer satisfaction with products or services.',
            ],
            [
                'name' => 'Sales Department',
                'description' => 'Focuses on generating revenue by selling products or services, managing client relationships, and driving business growth.',
            ],
            [
                'name' => 'Research and Development Department',
                'description' => 'Innovates and improves products or services through research, prototyping, and technological advancements.',
            ],
            [
                'name' => 'Operations Department',
                'description' => 'Oversees day-to-day business activities, ensures efficient processes, and optimizes workflow for maximum productivity.',
            ],
            [
                'name' => 'Legal Department',
                'description' => 'Manages legal affairs, ensures compliance with laws and regulations, drafts contracts, and mitigates legal risks.',
            ],
            [
                'name' => 'Administration Department',
                'description' => 'Handles administrative tasks, manages office logistics, and provides organizational support to all departments.',
            ],
        ]);
    }
}
