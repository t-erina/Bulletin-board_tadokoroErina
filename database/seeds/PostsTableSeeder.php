<?php

use App\Models\Posts\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
                'user_id' => '1',
                'post_sub_category_id' => '1',
                'title' => 'ZhatGPTが今アツい',
                'post' => '秘密文字生成や上級忍術書の翻訳、潜入対策のロールプレイにもジャジャッと大活躍！',
                'event_at' => '2023-06-25',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => '2',
                'post_sub_category_id' => '1',
                'title' => '忍術書のクラウド化',
                'post' => '防火・防虫対策や湿度管理など、物理的な管理コストの高い秘伝書もクラウド化で楽々便利♪',
                'event_at' => '2023-06-25',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
