<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run() {
    DB::table('ingredients')->insert([
      ['id' => '1','name' => 'olio di oliva','type' => '','created_at' => '2016-03-01 16:19:45','updated_at' => '2016-03-01 16:19:45'],
      ['id' => '2','name' => 'pollo','type' => '','created_at' => '2016-03-01 16:19:45','updated_at' => '2016-03-01 16:19:45'],
      ['id' => '3','name' => 'patate','type' => '','created_at' => '2016-03-01 16:19:45','updated_at' => '2016-03-01 16:19:45'],
      ['id' => '4','name' => 'aglio','type' => '','created_at' => '2016-03-01 16:19:45','updated_at' => '2016-03-01 16:19:45'],
      ['id' => '6','name' => 'prezzemolo','type' => '','created_at' => '2016-03-01 20:31:59','updated_at' => '2016-03-01 20:31:59'],
      ['id' => '7','name' => 'vongole','type' => '','created_at' => '2016-03-01 20:31:59','updated_at' => '2016-03-25 15:08:38'],
      ['id' => '8','name' => 'vino','type' => '','created_at' => '2016-03-01 20:31:59','updated_at' => '2016-03-01 20:31:59'],
      ['id' => '9','name' => 'pomodori','type' => '','created_at' => '2016-03-01 20:31:59','updated_at' => '2016-03-01 20:31:59'],
      ['id' => '10','name' => 'pasta filo','type' => '','created_at' => '2016-03-01 21:28:41','updated_at' => '2016-03-01 21:28:41'],
      ['id' => '11','name' => 'panna fresca','type' => '','created_at' => '2016-03-01 21:28:41','updated_at' => '2016-03-01 21:28:41'],
      ['id' => '12','name' => 'sale','type' => '','created_at' => '2016-03-01 21:28:41','updated_at' => '2016-03-01 21:28:41'],
      ['id' => '13','name' => 'uova','type' => '','created_at' => '2016-03-01 21:28:41','updated_at' => '2016-03-01 21:28:41'],
      ['id' => '14','name' => 'parmigiano','type' => '','created_at' => '2016-03-01 21:28:41','updated_at' => '2016-03-01 21:28:41'],
      ['id' => '15','name' => 'erba cipollina','type' => '','created_at' => '2016-03-01 21:28:41','updated_at' => '2016-03-01 21:28:41'],
      ['id' => '16','name' => 'butto','type' => '','created_at' => '2016-03-02 13:05:14','updated_at' => '2016-03-02 13:05:14'],
      ['id' => '17','name' => 'scorze di arancia','type' => '','created_at' => '2016-03-02 13:05:14','updated_at' => '2016-03-02 13:05:14'],
      ['id' => '18','name' => 'zucchero','type' => '','created_at' => '2016-03-02 13:05:14','updated_at' => '2016-03-02 13:05:14'],
      ['id' => '19','name' => 'gocce di cioccolato','type' => '','created_at' => '2016-03-02 13:05:14','updated_at' => '2016-03-02 13:05:14'],
      ['id' => '20','name' => 'farina','type' => '','created_at' => '2016-03-02 13:05:14','updated_at' => '2016-03-02 13:05:14'],
      ['id' => '21','name' => 'fecola','type' => '','created_at' => '2016-03-02 13:05:14','updated_at' => '2016-03-02 13:05:14'],
      ['id' => '22','name' => 'uovo','type' => '','created_at' => '2016-03-02 13:05:14','updated_at' => '2016-03-02 13:05:14'],
      ['id' => '23','name' => 'carne di cavallo','type' => '','created_at' => '2016-03-02 13:39:40','updated_at' => '2016-03-02 13:39:40'],
      ['id' => '24','name' => 'alloro','type' => '','created_at' => '2016-03-02 13:39:40','updated_at' => '2016-03-02 13:39:40'],
      ['id' => '25','name' => 'dado','type' => '','created_at' => '2016-03-02 13:39:40','updated_at' => '2016-03-02 13:39:40'],
      ['id' => '26','name' => 'vino binaco','type' => '','created_at' => '2016-03-02 13:39:40','updated_at' => '2016-03-02 13:39:40'],
      ['id' => '27','name' => 'panna','type' => '','created_at' => '2016-03-03 14:54:09','updated_at' => '2016-03-03 14:54:09'],
      ['id' => '29','name' => 'pesche','type' => '','created_at' => '2016-03-07 16:57:04','updated_at' => '2016-03-07 16:57:04'],
      ['id' => '30','name' => 'amido di mais','type' => '','created_at' => '2016-03-07 16:57:04','updated_at' => '2016-03-07 16:57:04'],
      ['id' => '31','name' => 'burro','type' => '','created_at' => '2016-03-07 16:57:04','updated_at' => '2016-03-07 16:57:04'],
      ['id' => '32','name' => 'aceto','type' => '','created_at' => '2016-03-07 16:57:04','updated_at' => '2016-03-07 16:57:04'],
      ['id' => '33','name' => 'limone','type' => '','created_at' => '2016-03-07 16:57:04','updated_at' => '2016-03-07 16:57:04'],
      ['id' => '34','name' => 'ceci','type' => '','created_at' => '2016-03-07 19:17:24','updated_at' => '2016-03-07 19:17:24'],
      ['id' => '35','name' => 'olive nere','type' => '','created_at' => '2016-03-07 19:17:24','updated_at' => '2016-03-07 19:17:24'],
      ['id' => '36','name' => 'pomodoro','type' => '','created_at' => '2016-03-07 19:17:24','updated_at' => '2016-03-07 19:17:24'],
      ['id' => '37','name' => 'basilico','type' => '','created_at' => '2016-03-07 19:17:24','updated_at' => '2016-03-07 19:17:24'],
      ['id' => '38','name' => 'pepe','type' => '','created_at' => '2016-03-07 19:17:24','updated_at' => '2016-03-07 19:17:24'],
      ['id' => '39','name' => 'tonno','type' => '','created_at' => '2016-03-07 19:22:52','updated_at' => '2016-03-07 19:22:52'],
      ['id' => '40','name' => 'cipollotti','type' => '','created_at' => '2016-03-07 19:22:52','updated_at' => '2016-03-07 19:22:52'],
      ['id' => '41','name' => 'grana padano','type' => '','created_at' => '2016-03-07 19:22:52','updated_at' => '2016-03-07 19:22:52'],
      ['id' => '42','name' => 'pangrattato','type' => '','created_at' => '2016-03-07 19:22:52','updated_at' => '2016-03-07 19:22:52'],
      ['id' => '43','name' => 'pasta brisée','type' => '','created_at' => '2016-03-07 19:26:54','updated_at' => '2016-03-07 19:26:54'],
      ['id' => '44','name' => 'prosciutto','type' => '','created_at' => '2016-03-07 19:26:54','updated_at' => '2016-03-07 19:26:54'],
      ['id' => '45','name' => 'scalogni','type' => '','created_at' => '2016-03-07 19:26:54','updated_at' => '2016-03-07 19:26:54'],
      ['id' => '46','name' => 'brodo vegetale','type' => '','created_at' => '2016-03-07 19:26:54','updated_at' => '2016-03-07 19:26:54'],
      ['id' => '47','name' => 'estratto di carne','type' => '','created_at' => '2016-03-07 19:26:54','updated_at' => '2016-03-07 19:26:54'],
      ['id' => '49','name' => 'nocciole','type' => '','created_at' => '2016-03-07 19:29:24','updated_at' => '2016-03-07 19:29:24'],
      ['id' => '50','name' => 'cioccolato','type' => '','created_at' => '2016-03-07 19:29:24','updated_at' => '2016-03-07 19:29:24'],
      ['id' => '51','name' => 'lievito','type' => '','created_at' => '2016-03-07 19:29:24','updated_at' => '2016-03-07 19:29:24'],
      ['id' => '52','name' => 'stracchino','type' => '','created_at' => '2016-03-07 20:07:39','updated_at' => '2016-03-07 20:07:39'],
      ['id' => '53','name' => 'agretti','type' => '','created_at' => '2016-03-07 20:07:39','updated_at' => '2016-03-07 20:07:39'],
      ['id' => '54','name' => 'latte','type' => '','created_at' => '2016-03-07 20:07:39','updated_at' => '2016-03-07 20:07:39'],
      ['id' => '55','name' => 'cipolla','type' => '','created_at' => '2016-03-07 20:07:39','updated_at' => '2016-03-07 20:07:39'],
      ['id' => '56','name' => 'spaghetti','type' => '','created_at' => '2016-03-07 20:11:05','updated_at' => '2016-03-07 20:11:05'],
      ['id' => '57','name' => 'fagiolini','type' => '','created_at' => '2016-03-07 20:11:05','updated_at' => '2016-03-07 20:11:05'],
      ['id' => '58','name' => 'albumi','type' => '','created_at' => '2016-03-07 20:13:48','updated_at' => '2016-03-07 20:13:48'],
      ['id' => '59','name' => 'cannella','type' => '','created_at' => '2016-03-07 20:13:48','updated_at' => '2016-03-25 14:45:11'],
      ['id' => '60','name' => 'lenticchie','type' => '','created_at' => '2016-03-25 14:46:02','updated_at' => '2016-03-25 14:46:02'],
      ['id' => '61','name' => 'Semolino','type' => '','created_at' => '2016-03-25 14:54:22','updated_at' => '2016-03-25 14:54:22'],
      ['id' => '62','name' => 'pecorino','type' => '','created_at' => '2016-03-25 14:54:22','updated_at' => '2016-03-25 14:54:22'],
      ['id' => '63','name' => 'noce moscata','type' => '','created_at' => '2016-03-25 14:54:22','updated_at' => '2016-03-25 14:54:22'],
      ['id' => '64','name' => 'cacao','type' => '','created_at' => '2016-03-25 15:03:45','updated_at' => '2016-03-25 15:03:45'],
      ['id' => '65','name' => 'marsala','type' => '','created_at' => '2016-03-25 15:03:45','updated_at' => '2016-03-25 15:03:45'],
      ['id' => '66','name' => 'ricotta','type' => '','created_at' => '2016-03-25 15:03:45','updated_at' => '2016-03-25 15:03:45'],
      ['id' => '67','name' => 'strutto','type' => '','created_at' => '2016-03-25 15:03:45','updated_at' => '2016-03-25 15:03:45'],
      ['id' => '68','name' => 'ciliege','type' => '','created_at' => '2016-03-25 15:03:45','updated_at' => '2016-03-25 15:03:45'],
    ]);
  }
}
