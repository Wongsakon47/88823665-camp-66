<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    // ฟังก์ชั่นจัดการการส่งแบบฟอร์มและส่งข้อมูลเพื่อดู
    public function myfunction(Request $req, $var1="")
    {
        // รับค่าอินพุตจากแบบฟอร์ม
        $number = $req->input('number');
        
        // เตรียมข้อมูลเบื้องต้นให้กับอาร์เรย์ว่างสำหรับผลลัพธ์การคูณ
        $multiplicationTable = [];

        // ถ้าระบุตัวเลข ให้คำนวณตารางสูตรคูณ
        if ($number) {
            for ($i = 1; $i <= 12; $i++) {
                $multiplicationTable[] = [
                    'expression' => "$number x $i",
                    'result' => $number * $i
                ];
            }
        }

        // ส่งข้อมูลไปยัง view
        return view('myview', [
            'number' => $number,
            'multiplicationTable' => $multiplicationTable
        ]);
    }
}
