<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete {id : The ID of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a user from the users table along with their thumbnail image';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userId = $this->argument('id');

        $user = User::find($userId);

        if ($user) {
            // Delete the user's thumbnail image if it exists
            if ($user->thumbnail && Storage::exists($user->thumbnail)) {
                Storage::delete($user->thumbnail);
            }

            // Delete the user
            $user->delete();
            $this->info("User with ID {$userId} and their thumbnail have been deleted.");
        } else {
            $this->error("User with ID {$userId} not found.");
        }

        return 0;
    }
}

//php artisan user:delete {id}

