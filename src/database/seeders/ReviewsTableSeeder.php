<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'shop_id' => 1,
            'score' => 4,
            'image' => 'review/20240224.jpg',
            'comment' => 'コースでいい値段ですが、お店んの雰囲気はフォーマルなカジュアルで雰囲気です。予約していきましたが、テーブルに感謝のメッセージが書かれたありました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 2,
            'score' => 2,
            'image' => 'review/20240224.jpg',
            'comment' => 'ほとんどの人はそう思っているようだが、私はまったく違うと思っている。それどころか、私の観察結果はつねに同じで、すべての現象が私の仮説を裏付けるものばかりだ。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 3,
            'score' => 5,
            'image' => 'review/20240224.jpg',
            'comment' => '「あのねえ、それを行動経済学では『確証バイアス』（自分の思い込みや願望を肯定する情報に注目し、否定する趣旨の情報を軽視しやすくなる心理）と言うんだよ、小幡くん」と言わそうだが、とんでもない。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 4,
            'score' => 2,
            'image' => 'review/20240224.jpg',
            'comment' => '客観的には、この数年の株式市場で起きている現象はすべて、ただ1つの事実を指し示している。「現在、株式市場はバブルの真っただ中だ」と。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 1,
            'score' => 2,
            'image' => 'review/20240224.jpg',
            'comment' => '私は2月17日土曜日の朝に、株価の見通しについて議論するテレビ番組に出席したが、プロフェッショナル2人を差し置いて、私の株価予想が一番高く、「3月8日までに日経平均株価4万円を必ず突破する」「1989年につけた過去の最高値3万8915円は、2月19日の月曜日にでもすぐ突破するか、あるいはその週の22日までには必ず突破する。もし突破すればその勢いで4万円も必ず突破する」などとコメントした。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 2,
            'score' => 2,
            'image' => 'review/20240224.jpg',
            'comment' => 'コースでいい値段ですが、お店んの雰囲気はフォーマルなカジュアルで雰囲気です。予約していきましたが、テーブルに感謝のメッセージが書かれたありました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 3,
            'score' => 5,
            'image' => 'review/20240224.jpg',
            'comment' => '一方、2月21日水曜日の朝7時過ぎのラジオ番組では、一転して「明日は大暴落するかもしれない」と発言した。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 4,
            'score' => 1,
            'image' => 'review/20240224.jpg',
            'comment' => 'そもそも「明日大暴落する」などと軽々に発言する人は、小幡しかこの世にいないわけで、それだけですでにクレージーであるが、「4万円は必ず行く」と言ったその4日後に「大暴落する」と正反対のことを言い切ってしまうのだから、どうかしている。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'shop_id' => 1,
            'score' => 3,
            'image' => 'review/20240224.jpg',
            'comment' => 'そして、その断言は見事に外れ、いやそれどころかまさに正反対、22日の日経平均は前日比836円もの大幅上昇となり、日経平均3万8915円の史上最高値をあっさり更新してしまった。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'shop_id' => 2,
            'score' => 4,
            'image' => 'review/20240224.jpg',
            'comment' => 'しかし、だからこそ、私は「まごうことなきバブルであり、ほぼ頂点にある」という私の仮説に対するエビデンス（証拠）が次々にそろい続けていると思うのだ。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'shop_id' => 3,
            'score' => 2,
            'image' => 'review/20240224.jpg',
            'comment' => '第1に、乱高下を繰り返している。バブルの頂点付近であるからこそ、乱高下し、急騰し急落し、それを繰り返しながら最後に大暴騰するのだ。まさにバブルの頂点に典型的な動きを毎日続けている。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 3,
            'shop_id' => 4,
            'score' => 5,
            'image' => 'review/20240224.jpg',
            'comment' => '第2に、上がり方が急激である。わずか数十分で日経平均が簡単に200円以上も上がることさえある。バブルの頂点では、最後に急激に上がる。そして、崩壊するのである。最後はスピード違反が起きて、暴走し、それで崩壊するのだ。1月からスピード違反を続けているが、今、最後にとことん違反をして暴走し、クラッシュしようとしている。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 4,
            'shop_id' => 1,
            'score' => 3,
            'image' => 'review/20240224.jpg',
            'comment' => '第3に、取引高が急増している。バブルのピークでは売り買いが交錯し、また乱高下を利用して、トレーダーたちはとにかく売買を繰り返す。乱高下で値幅が大きくなったことを最大限活用し、荒く稼ごうとする。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 4,
            'shop_id' => 2,
            'score' => 1,
            'image' => 'review/20240224.jpg',
            'comment' => 'コースでいい値段ですが、お店んの雰囲気はフォーマルなカジュアルで雰囲気です。予約していきましたが、テーブルに感謝のメッセージが書かれたありました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 4,
            'shop_id' => 3,
            'score' => 1,
            'image' => 'review/20240224.jpg',
            'comment' => '第4に、先物主導である。さらにTOPIX（東証株価指数）ではなく、日経225先物に偏った動きである。「半導体株が主導している相場だから」と説明されるが、日経225先物が主導で、例えば19日の週は午前中に何度も3万8915円に挑むような動きをつくり、それに誰も乗ってこなくて、その後は失速し下げる、ということを繰り返していた。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 5,
            'score' => 5,
            'image' => 'review/20240224.jpg',
            'comment' => 'コースでいい値段ですが、お店んの雰囲気はフォーマルなカジュアルで雰囲気です。予約していきましたが、テーブルに感謝のメッセージが書かれたありました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 5,
            'score' => 2,
            'image' => 'review/20240224.jpg',
            'comment' => '2月22日の史上最高値更新も先物主導で上がっていき、午後に最高値付近で現物も張り付いて、高値を続けている。先物主導、日経225主導（TOPIXでなく）というのは、まさに投機的な動きのパターンである。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 6,
            'score' => 4,
            'image' => 'review/20240224.jpg',
            'comment' => '第5に、史上最高値更新だけが焦点になっている。株価のファンダメンタルズと無関係なことだけが注目されている。そして、実際、先物の動きがすべて従来の最高値3万8915円を中心に動いた。そこがターゲットになり、そこに近づける仕掛けがあり、そこから引き潮があり、翌日、また3万8915円にチャレンジする。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 6,
            'score' => 5,
            'image' => 'review/20240224.jpg',
            'comment' => 'そして、22日にも何度も3万8915円を意識し、最後に突破してからは一気に上げる。つまり、理屈抜きに、史上最高値更新か否かだけが焦点になってせめぎ合いが行われた。これはバブル以外の何物でもない。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 7,
            'score' => 1,
            'image' => 'review/20240224.jpg',
            'comment' => '解説を加えると、バブル末期には動きは激しくなる。まともな投資家、長期の投資家は、ここが売りタイミングかどうかは思案するが、売り切っておしまいである。買い戻すことはないし、ポートフォリオの入れ替えすらしない。じっと様子見するか、売る株数をじっくり判断するだけである。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 7,
            'score' => 2,
            'image' => 'review/20240224.jpg',
            'comment' => 'つまり、大量に売買しているのは、短期トレーダーと投機家である。そして、異常に強気な短期投資家である。最後に、浮ついた個人である。すなわち、絶対的な株価水準などまったく気にしない取引者だけが残っているのである。あとは、異常に強気という誤った投資家と、狂った投資家だけである。。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 8,
            'score' => 5,
            'image' => 'review/20240224.jpg',
            'comment' => 'だから、まともな投資家は売るべきものは売りつくしている。売り手は存在せず、狂った買い手だけである。それゆえ株価は異常に高い水準であり、異常なスピードで上がっているときほど、ますます、とことん上がる。バブル崩壊直前の、断末魔ではなく、狂喜の叫びである。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 8,
            'score' => 4,
            'image' => 'review/20240224.jpg',
            'comment' => 'だから、取引量も膨らむ。同じトレーダーがとことん繰り返し仕掛けて、売買し続けているのである。今はプログラムが大半だが、プログラム同士の仕掛け合い、せめぎ合い、だまし合いが行われているのである。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 9,
            'score' => 3,
            'image' => 'review/20240224.jpg',
            'comment' => 'こういうゲームで重要なのは「降り時」である。いつ、このバブルゲームから撤退するか、というタイミングだけだ。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 9,
            'score' => 4,
            'image' => 'review/20240224.jpg',
            'comment' => 'タイミングの根拠は、ほかのトレーダーの動きだけである。多数派の動きに同調し、その流れに乗って、かつ利用して儲ける。モメンタム（勢い）がついているときはとことんついていく。しかし、モメンタムが失われる前に、逃げ遅れないように、ほかのトレーダーより一瞬先に降りる。そのタイミングを計っている。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 10,
            'score' => 3,
            'image' => 'review/20240224.jpg',
            'comment' => 'また、同時に、日柄（経過日数）が重要である。どのくらいの期間、熱狂が続いてきたか。これは、ある意味、体力、気力が持続する間の勝負だから、みな疲れてくる。そろそろ手じまいして、利益が熱いうちに降りたいと思い始める。しかし、とことん儲けたくもあるから、最後まで残っていたいことはいたい。しかし、疲れてきたら、そろそろ、ということである。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);
        $param = [
            'user_id' => 2,
            'shop_id' => 10,
            'score' => 5,
            'image' => 'review/20240224.jpg',
            'comment' => '2月19～21日の3日間はそろそろ疲れが見えてきたのであり、世界中のトレーダーが注視しているアメリカの画像処理半導体最大手エヌビディアの決算発表（日本時間22日午前6時過ぎ）を待って、小休止していたのである。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('reviews')->insert($param);

    }
}