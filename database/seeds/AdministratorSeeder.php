<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator ->username = "administrator";
        $administrator ->name = "Site Administrator";
        $administrator ->email = "administrator@gmail.com";
        $administrator ->roles = json_encode(["ADMIN"]);
        $administrator ->password = \Hash::make("mygalon");
        $administrator ->gambar = "Tidak-ada-file.PNG"; 
        $administrator ->alamat = "Bandung,Jawa Barat";
        $administrator ->no_hp = "085315624707";
        $administrator ->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
