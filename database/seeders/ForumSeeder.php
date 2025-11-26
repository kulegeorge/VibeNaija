<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForumCategory;
use App\Models\ForumThread;
use App\Models\User;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            ['name'=>'General','slug'=>'general','description'=>'General discussion'],
            ['name'=>'Announcements','slug'=>'announcements','description'=>'Official updates'],
            ['name'=>'Challenges','slug'=>'challenges','description'=>'Share challenge entries'],
            ['name'=>'Help & Support','slug'=>'help','description'=>'Platform help'],
        ];

        foreach ($cats as $c) {
            ForumCategory::firstOrCreate(['slug' => $c['slug']], $c);

        }

        $user = User::first();
        if ($user) {
            ForumThread::create([
                'category_id' => ForumCategory::where('slug','general')->first()->id,
                'user_id' => $user->id,
                'title' => 'Welcome to the VibeNaija Forum',
                'body'  => 'Share your experiences, ask questions, and post challenge results here. Be kind and have fun!'
            ]);
        }
    }
}
