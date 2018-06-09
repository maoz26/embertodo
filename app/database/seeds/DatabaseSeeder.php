<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
        $this->call('TodoTableSeeder');
        $this->command->info('Todo table seeded!');
	}

}

class TodoTableSeeder extends Seeder {
    /** task seeder */
    public function run()
    {
        DB::table('todos')->delete();
        for ($i=1; $i< 10; $i++){
            $taskName = "משימה ".$i;
            DB::table('todos')->insert([
                'title' =>  $taskName,
                "isCompleted" => false
            ]);
        }
    }

}
