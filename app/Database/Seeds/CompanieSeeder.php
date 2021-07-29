<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompanieSeeder extends Seeder
{
        public function run()
        {
            for ($i=1; $i <= 9; $i++) { 
                $data =
                [
                    'name' => 'test '.$i.'',
                    'CIF'    => 'A11111111'.$i.'',
                    'shortdesc'    => 'shortdesc'.$i.'',
                    'description'    => 'description'.$i.'',
                    'email'    => 'test'.$i.'@test.com',
                    'CCC'    => '4547852475961235789'.$i.'',
                    'date'    => '2021/0'.$i.'/05 12:00:00',
                    'created_at'    => '2021/05/05 1'.$i.':30:00',
                    'updated_at'    => '2021/05/05 1'.$i.':30:00',
                    'status'    => 1,
                    'logo'    => 'testlogo'.$i.''
                ];
    
                $this->db->table('companies')->insert($data);
            }
        }
}