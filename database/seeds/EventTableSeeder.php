<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new \App\Event([
            'title' => '○○高校　△△期　同窓会',
            'outline' =>'拝啓　○○の候　皆様にはますますご健勝のことと存じます。
さて　同窓会を計画いたしましたので皆様のご参加をお願いいたします。',
            'date' =>'令和○○年○○月○○日（○）　午前○○時より',
            'place' =>'○○○○○ホテル　○○の間',
            'cost' =>'○○○○円（当日お持ちください）',
            'time_limit' =>'○○月△△日',
            'others' =>'同窓会幹事　○○　○○TEL○○○-○○○○-○○○○',
            'user_id'=>1
            ]);
        $event->save();
        
        $event = new \App\Event([
            'title' =>'同窓会　２次会　サッカー部' ,
            'outline' =>'同窓会の後サッカー部で二次会しましょう！',
            'date' =>'○○月○○日',
            'place' =>'土間土間　新宿西口点',
            'cost' =>'3500円',
            'time_limit' =>'○○月○○日',
            'others' =>'当日参加OKです！',
            'user_id'=>2
            ]);
        $event->save();
        
        $event = new \App\Event([
            'title' => '３年５組クラス会',
            'outline' =>'同窓会と別日でクラス会やりましょー',
            'date' =>'未定',
            'place' =>'未定',
            'cost' =>'',
            'time_limit' =>'',
            'others' =>'',
            'user_id'=>2
            ]);
        $event->save();
                
    }
}
